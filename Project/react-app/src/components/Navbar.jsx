import React from 'react';
import logo from '../static/img/system_logo.jpg'

const Navbar = () => {
    return (
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src={logo} alt="" width="30" height="24" class="d-inline-block align-text-top" />
                    SCS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about_us">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact_us">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/types_of_services">Types of services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/reviews">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/shopping_cart">Shopping cart</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                DBMaintain
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/select">Select</a></li>
                                <li><a class="dropdown-item" href="/insert">Insert</a></li>
                                <li><a class="dropdown-item" href="/update">Update</a></li>
                                <li><a class="dropdown-item" href="/delete">Delete</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/sign_in">Sign in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/sign_up">Sign up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    );
}

export default Navbar;