import React, { useEffect, useState } from 'react';
import shirt from '../static/img/shirt.jpg';
import {useCookies} from 'react-cookie';
import axios from 'axios';
import { Link } from "react-router-dom";

const Checkout = () => {
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
                <h3>Checkout</h3>
                <h6>Final steps to complete your order</h6>
            </div>
            <hr></hr>
            <div class="row">
                <div class = "col-md-1">
                </div>
                <div class = "col-md-6 text-start">
                    <form method="post" action="reviewOrder.php">
                        <input type="radio" id="new" name = "payment" value = "new"/>
                        <label for="new">
                            <div class="card text-start" style={{padding:'10px'}}>
                            Card Number: <input type="text" name="card_num" style={{width: "450px"}}></input>
                            Name: <input type="text" name="card_name" style={{width:"150px"}}></input>
                            Expiry Date: MM/YY <input type="text" name="card_expiry" style={{width:"100px"}}></input>
                            CVV: <input type="text" name="cvv" style={{width:"50px"}}></input>
                            </div>
                        </label>
                        <br/><input type="checkbox" name="save_card" value="save"/><label for="save_card"> Save this card</label><br/>
                        <hr/>
                        <p><b>Shipping Details</b></p>
                        <div class="card" style={{padding:"10px"}}>
                            Address Line 1: <input type="text" name="address_1" ></input>
                            Address Line 2: <input type="text" name="address_2" ></input>
                            City: <input type="text" name="city" style={{width:"150px"}}></input>
                            Province: <input type="text" name="province" style={{width:"150px"}}></input>
                            Postal Code: <input type="text" name="postal_code" style={{width:"150px"}}></input>
                        </div>
                        <hr/><button type="submit" class="bg-light text-dark">Place Order</button>
                    </form>
                    <hr/><br/>
                </div>
                <div class = "col-md-1">
                </div>
                <div class = "col">
                    <div class= "row">
                        <div id="total" class="col-sm-9 p-3 mb-2 mr-2 bg-dark text-light"><span id="items">0</span> Items <hr/> Total: $<span id="price">0</span><hr/>
                            {cartItems.map((item,index) => (
                                <div class="col-sm-12 p-3 mb-2 bg-light text-dark text-start">
                                <p><img id={index} src={shirt} height="50px" />    {item.item_name} - ${item.item_price}</p>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Checkout;