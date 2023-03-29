import React, { useEffect, useState } from 'react';
import {useCookies} from 'react-cookie';
import axios from 'axios';
import { Link } from "react-router-dom";

const LoggedIn = () => {
    const [cookies, setCookie] = useCookies(['user']);
    const parameters = new URLSearchParams(window.location.search);
    const id = parameters.get('user_id');

    useEffect(() => {
        setCookie("user", id, {path: '/'});
        console.log(cookies.user);
    },[])
    
    return (
        <div class="container">
            <div class="row mt-4">
                <h3>Successfully Logged In as user: {parameters.get('login_id')}</h3>
                <Link to={'/home'}><button>Go Shopping</button></Link>
                <br/>
            </div>
        </div>
    )
}
export default LoggedIn;