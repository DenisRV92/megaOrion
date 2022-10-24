import React from "react";
import {NavLink} from "react-router-dom";

export default function Nabvar() {

    return (
        <>
            <div className="d-flex justify-content-around">
                <NavLink className="text-decoration-none text-danger h2" exact to="/date">Дата</NavLink>
                <NavLink className="text-decoration-none text-danger h2" exact to="/joke">Анекдот</NavLink>
            </div>
        </>
    );
}
