import React, {useContext} from "react";
import {UserContext} from "../App";
import LoginModal from "./LoginModal";
import axios from "axios";
import Cookies from "universal-cookie";
import Navbar from "./Navbar";
import {toast, ToastContainer} from "react-toastify";
import 'react-toastify/dist/ReactToastify.css';
export default function Header() {

    const cookies = new Cookies();
    const {authenticatedUser, setAuthenticatedUser} = useContext(UserContext);

    const handleLogout = () => {
        axios.post("http://localhost:8000/api/auth/logout", {}, {
            withCredentials: true,
            headers: {
                Authorization: `Bearer ${new Cookies().get("Authorization")}`
            }
        }).then(res => {
                cookies.remove("Authorization");
                setAuthenticatedUser(null);
                toast.success(res.data['message'])
        })
    }
    // debugger
    return (
        <>
            <nav className="navbar navbar-expand-lg navbar-light bg-light mb-3">
                <div className="container-fluid">
                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul className="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                            <li className="nav-item">
                                <a className="nav-link active" aria-current="page" href="#">
                                    MegaOrion
                                </a>
                            </li>
                        </ul>

                        <div className="dropdown">
                            <ToastContainer/>
                            <button className="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Авторизация
                            </button>
                            <ul className="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                {!authenticatedUser ? (
                                    <>
                                        <li>
                                            <a className="dropdown-item" href="#" data-bs-toggle="modal"
                                               data-bs-target="#loginModal">
                                                Логин
                                            </a>
                                        </li>
                                    </>
                                ) : (
                                    <li>
                                        <a className="dropdown-item" href="#" onClick={handleLogout}>
                                            Выход
                                        </a>
                                    </li>
                                )}
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <LoginModal></LoginModal>
            {authenticatedUser
                ? <Navbar/>
                : null
            }
        </>
    );
}
