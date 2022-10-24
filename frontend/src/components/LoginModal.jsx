import React, {useContext, useRef} from "react";
import axios from "axios";
import {UserContext} from "../App";
import Cookies from "universal-cookie";
import {toast, ToastContainer} from "react-toastify";
import 'react-toastify/dist/ReactToastify.css';

export default function LoginModal() {
    const inputEmail = useRef(null);
    const inputPassword = useRef(null);
    const closeButtonModal = useRef(null);
    const cookies = new Cookies();
    const {authenticatedUser, setAuthenticatedUser} = useContext(UserContext)

    const handleLogin = async () => {
        const email = inputEmail.current.value;
        const password = inputPassword.current.value;
        await axios.get("http://localhost:8000/sanctum/csrf-cookie", {
            withCredentials: true
        });

        axios.post("http://localhost:8000/api/auth/login", {
            email: email,
            password: password,
        }, {
            withCredentials: true
        })
            .then((response) => {
                closeButtonModal.current.click();
                cookies.set("Authorization", response.data.token);
                setAuthenticatedUser(cookies.get("Authorization"));
            })
            .catch(res => toast.error(res.response.data['message']))
    }

    return (
        <div className="modal fade" id="loginModal" tabIndex="-1">
            <div className="modal-dialog">
                <div className="modal-content">
                    <ToastContainer/>
                    <div className="modal-header">
                        <h5 className="modal-title" id="exampleModalLabel">
                            Login
                        </h5>
                        <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div className="modal-body">
                        <form action="">
                            <div className="mb-3">
                                <label htmlFor="input-email" className="form-label">
                                    Email address
                                </label>
                                <input ref={inputEmail} type="email" className="form-control" id="input-email"/>
                            </div>

                            <div className="mb-3">
                                <label htmlFor="input-password" className="form-label">
                                    Password
                                </label>
                                <input ref={inputPassword} type="password" className="form-control"
                                       id="input-password"/>
                            </div>
                        </form>
                    </div>
                    <div className="modal-footer">
                        <button type="button" className="btn btn-secondary" data-bs-dismiss="modal"
                                ref={closeButtonModal}>
                            Close
                        </button>
                        <button type="button" className="btn btn-primary" onClick={handleLogin}>
                            Login
                        </button>
                    </div>
                </div>
            </div>
        </div>
    );
}
