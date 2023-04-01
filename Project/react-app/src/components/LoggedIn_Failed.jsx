import React from 'react';
import { Link } from "react-router-dom";

const LoggedIn_Failed = () => {
    return (
        <div class="container">
            <div class="row mt-4">
                <h3>Login failed - incorrect username or password. </h3>
                <Link to={'/'}><button>Try again</button></Link>
                <br />
            </div>
        </div>
    )
}
export default LoggedIn_Failed;