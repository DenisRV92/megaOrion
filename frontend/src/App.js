import './App.css';
import Header from "./components/Header";
import React, {useState} from "react";
import Cookies from "universal-cookie";
import {HashRouter, Route, Routes} from "react-router-dom";
import Time from "./components/Time";
import Joke from "./components/Joke";

export const UserContext = React.createContext();

function App() {
    const cookies = new Cookies();
    const [authenticatedUser, setAuthenticatedUser] = useState(cookies.get("Authorization"));
    return (
        <HashRouter>
            <UserContext.Provider value={{authenticatedUser, setAuthenticatedUser}}>
                <div className="App">
                    <Header/>
                    <Routes>
                        <Route path="/date" element={<Time/>}></Route>
                        <Route path="/joke" element={<Joke/>}></Route>
                    </Routes>
                </div>
            </UserContext.Provider>
        </HashRouter>

    );
}

export default App;
