import React, {useRef, useEffect, useState } from 'react';
import shirt from '../static/img/shirt.jpg';
import {useCookies} from 'react-cookie';
import axios from 'axios';
import { useLocation } from 'react-router-dom'

const Review_order = () => {
    const location = useLocation();
    const {data} = location.state;
    const info = data[0];
    const total_price = 0;

    const [cookies, setCookie] = useCookies();
    const [cartItems, setCartItems] = useState([]);
    const [total, calculateTotal] = useState([])
    const [payment, setPayment] = useState([]);
    const [order_id, setOrderId] = useState([]);
    const dataFetchedRef = useRef(false);

    useEffect(() => {
        axios.get("http://localhost:8000/getCartItems.php", {params: {items: JSON.stringify(cookies.items)}}).then((response) => {
            let results = response.data;
            console.log(results);
            let price = results.reduce((total, currentItem) => total = total + Number(currentItem.item_price), 0);
            var items = document.getElementById("items");
            items.innerHTML = results.length;
            var cart_total = document.getElementById("price");
            console.log(price)
            calculateTotal(price);
            console.log(total);
            cart_total.innerHTML = parseFloat(price).toFixed(2);
        });
    },[])

    function getPrice() {
        axios.get("http://localhost:8000/getCartItems.php", {params: {items: JSON.stringify(cookies.items)}}).then((response) => {
            let results = response.data;
            let price = results.reduce((total, currentItem) => total = total + Number(currentItem.item_price), 0);
            console.log(price);
            console.log(info['payment']);
            console.log(cookies.user);
            total_price = price;
        });
    }
    const fetchOrder = () => {
        axios.get("http://localhost:8000/submitOrder.php", {params: {total: total_price, user: cookies.user, payment: info['payment']}}).then((response) => {
            console.log(response.data);
            setOrderId(response.data);
        });
    }

    useEffect(() => {
        if (dataFetchedRef.current) return;
        dataFetchedRef.current = true;
        getPrice();
        fetchOrder();
    }, [])

    useEffect(() => {
        axios.get("http://localhost:8000/addPayment.php", {params: {info: JSON.stringify(info), user: cookies.user}}).then((response) => {
            console.log(JSON.stringify(info));
            console.log(response.data);
            setPayment(response.data);
        });
    },[])

    useEffect(() => {
        axios.get("http://localhost:8000/getCartItems.php", {params: {items: JSON.stringify(cookies.items)}}).then((response) => {
            setCartItems(response.data);
            console.log(JSON.stringify(cookies.items));
            console.log(response.data);
            setCookie("items", [], {path: '/'});
        });
    }, []);

    return (
        <div class="container">
            <div class="row mt-4">
                <h3>Your order has been sent!</h3>
                <h6>Your order number is #{order_id}</h6>
            </div>
            <div class="row mt-4">
                <div class="col-1">
                </div>
                <hr/>
                <div class="col-12 text-start">
                    <b>Order Details:</b>
                    <hr/>
                    <div class="row p-3 mb-2 mr-2 bg-dark text-light">
                        Payment Method:
                        <br/>{payment}
                        <hr/>Shipping to: <br/>
                        <br/>{info['address_2']} {info['address_1']}
                        <br/>{info['city']}
                        <br/>{info['region']}
                        <br/>{info['country']}
                        <br/>{info['postal_code']}
                    </div>
                    <div class="container">
                        <div class="row">
                            <div id="total" class="col-sm-12 p-3 mb-2 bg-dark text-light text-start"><span id="items">0</span> Items | Total: $<span id="price">0</span></div>
                        </div>
                        {cartItems.map((item,index) => (
                            <div class="col-sm-12 p-3 mb-2 bg-light text-dark text-start">
                                <p><img id={index} src={shirt} height="50px" />    {item.item_name} - ${item.item_price}</p>
                            </div>
                        ))}
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Review_order;