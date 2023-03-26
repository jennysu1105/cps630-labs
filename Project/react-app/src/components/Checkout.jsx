import React, { useEffect, useState } from 'react';
import shirt from '../static/img/shirt.jpg';
import {useCookies} from 'react-cookie';
import axios from 'axios';
import { Navigate, useNavigate } from "react-router-dom";

const Checkout = () => {
    let navigate = useNavigate();
    const [cookies, setCookie] = useCookies(['items']);
    const [cartItems, setCartItems] = useState([]);
    const [total, calculateTotal] = useState([])

    const routeChange = () => {
        let path = '/checkout';
        navigate(path);
    }

    useEffect(() => {
        axios.get("http://localhost:8000/getCartItems.php", {params: {items: JSON.stringify(cookies.items)}}).then((response) => {
            let results = response.data;
            console.log(results);
            let price = results.reduce((total, currentItem) => total = total + Number(currentItem.item_price), 0);
            var items = document.getElementById("items");
            items.innerHTML = results.length;
            var cart_total = document.getElementById("price");
            console.log(price)
            cart_total.innerHTML = parseFloat(price).toFixed(2);
        });
    },[])

    useEffect(() => {
        axios.get("http://localhost:8000/getCartItems.php", {params: {items: JSON.stringify(cookies.items)}}).then((response) => {
            setCartItems(response.data);
            console.log(JSON.stringify(cookies.items));
            console.log(response.data);
        });
    }, []);

    return (
        <div class="container">
            <div class="row mt-4">
                <h3>Checkout</h3>
                <h6>Final steps to complete your order</h6>
            </div>
        </div>
    );
}

export default Checkout;