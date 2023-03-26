import React, { useEffect, useState } from 'react';
import shirt from '../static/img/shirt.jpg';
import {useCookies} from 'react-cookie';
import axios from 'axios';

const Shopping_Cart = () => {
    const [cookies, setCookie] = useCookies(['items']);
    const [cartItems, setCartItems] = useState([]);
    const [total, calculateTotal] = useState([])

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
                <h3>Shopping Cart</h3>
                <h6>View your current shopping cart</h6>
            </div>
            <div class="container">
                <div class="row">
                    <div id="total" class="col-sm-9 p-3 mb-2 mr-2 bg-dark text-light"><span id="items">0</span> Items | Total: $<span id="price">0</span></div>
                    <button type="submit" onclick="window.location.href = 'checkout.php'" class="col-sm-3 p-3 mb-2 btn btn-secondary" >Checkout</button>
                </div>
                {cartItems.map((item,index) => (
                        <div class="col-sm-12 p-3 mb-2 bg-light text-dark text-start">
                          <p><img id={index} src={shirt} height="50px" />    {item.item_name} - ${item.item_price}</p>
                      </div>
                ))}
            </div>
        </div>
    );
}

export default Shopping_Cart;