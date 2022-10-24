import React, {useContext, useEffect, useState} from "react";
import {UserContext} from "../App";


export default function Time() {
    const {authenticatedUser, setAuthenticatedUser} = useContext(UserContext);
    const [time, setTime] = useState(new Date().toLocaleString());

    useEffect(() => {
        setInterval(() => {
            setTime(new Date().toLocaleString());
        }, 1000);
    }, []);

    return (
        <div className=" h-75 d-flex align-items-center justify-content-center h3">
            {authenticatedUser
                ? time
                : "Не авторизован"}</div>
    );
}
