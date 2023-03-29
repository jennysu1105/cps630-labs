import React from 'react';
import Container from 'react-bootstrap/Container';
import Nav from 'react-bootstrap/Nav';
import Navbar from 'react-bootstrap/Navbar';
import NavDropdown from 'react-bootstrap/NavDropdown';
import logo from '../static/img/system_logo.jpg'

const Navigation = () => {
    return (
        <Navbar bg="light" expand="lg">
            <Container>
                <Navbar.Brand href="/">
                    <img
                        src={logo}
                        width="28"
                        height="28"
                        className="d-inline-block align-top"
                    />{' '}
                    SCS
                </Navbar.Brand>
                <Navbar.Toggle aria-controls="basic-navbar-nav" />
                <Navbar.Collapse id="basic-navbar-nav">
                    <Nav className="me-auto">
                        <Nav.Link href="/home">Home</Nav.Link>
                        <Nav.Link href="/about_us">About us</Nav.Link>
                        <Nav.Link href="/contact_us">Contact us</Nav.Link>
                        <Nav.Link href="/types_of_services">Types of services</Nav.Link>
                        <Nav.Link href="/reviews">Reviews</Nav.Link>
                        <Nav.Link href="/shopping_cart">Shopping cart</Nav.Link>
                        <NavDropdown title="DBMaintain" id="basic-nav-dropdown">
                            <NavDropdown.Item href="/select">Select</NavDropdown.Item>
                            <NavDropdown.Item href="/insert">Insert</NavDropdown.Item>
                            <NavDropdown.Item href="/update">Update</NavDropdown.Item>
                            <NavDropdown.Item href="/delete">Delete</NavDropdown.Item>
                        </NavDropdown>
                    </Nav>
                    <Nav>
                        <Nav.Link href="/">Logout</Nav.Link>
                    </Nav>
                </Navbar.Collapse>
            </Container>
        </Navbar>
    );
}

export default Navigation;