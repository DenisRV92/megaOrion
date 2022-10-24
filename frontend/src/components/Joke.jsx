import React, {useContext, useRef} from "react";
import {UserContext} from "../App";
import axios from "axios";
import Cookies from "universal-cookie";
import {toast, ToastContainer} from "react-toastify";
import 'react-toastify/dist/ReactToastify.css';

export default function Joke() {
    const textJoke = useRef(null);
    const {authenticatedUser, setAuthenticatedUser} = useContext(UserContext);
    const formClick = async (event) => {
        event.preventDefault()
        const joke = textJoke.current.value;
        await axios.post("http://localhost:8000/api/joke", {
            joke: joke,
        }, {
            headers: {
                Authorization: `Bearer ${new Cookies().get("Authorization")}`
            },
            withCredentials: true
        })
            .then((res) => {
                if (res.data['error']) {
                    toast.error(res.data['error'])
                } else {
                    toast.success(res.data['access'])
                }
            })
            .catch(res => toast.error(res.data['error']))
    }
    return (
        <div className="h-75 d-flex align-items-center justify-content-center">
            <ToastContainer/>
            {authenticatedUser
                ? <form style={{"width": "500px"}} className="w-80" method="POST" onSubmit={formClick}>
                    <div className="form-group">
                        <label htmlFor="Joke">Анекдот</label>
                        <textarea ref={textJoke} className="form-control w-100" id="joke"/>
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
                : <div className=" h-75 d-flex align-items-center justify-content-center h3">Не авторизован</div>
            }
        </div>
    );
}

