import React, { useEffect, useState } from 'react';
import shirt from '../static/img/shirt.jpg';
import {useCookies} from 'react-cookie';
import axios from 'axios';
import { Link } from "react-router-dom";

var data = [
    {
        payment: "new",
        card_num: "",
        card_name: "",
        card_expiry: "",
        cvv: "",

        address_1: "",
        address_2: "",
        city: "",
        region: "",
        country: "",
        postal_code: ""
    }
]
const Checkout = () => {
    const handleChange = event => {
        data[0][event.target.name] = event.target.value;
        console.log(data[0]);
    }

    const [cookies, setCookie] = useCookies();
    const [cartItems, setCartItems] = useState([]);
    const [total, calculateTotal] = useState([]);
    const [cards, setExistingCards] = useState([]);
        
    const handleClick = event => {
        let enable = data[0]['address_1'].length > 0 && data[0]['city'].length > 0 && data[0]['region'].length > 0 && data[0]['country'].length > 0 && data[0]['postal_code'].length > 5;
        let payment_enable = true;
        if (data[0]['payment'] === "new"){
            payment_enable = data[0]['card_num'].length > 15 && data[0]['card_name'].length > 0 && data[0]['card_expiry'].length > 4 && data[0]['cvv'].length > 2;
        }
        console.log(enable);
        console.log(payment_enable);
        let fullEnable = enable && payment_enable;
        if(!fullEnable) {
            event.preventDefault();
        }
        else{

        }
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
        setCartItems([]);
        if (cookies.items && cookies.items.length > 0) {
            console.log(cookies.user);
            axios.get("http://localhost:8000/getCartItems.php", {params: {items: JSON.stringify(cookies.items)}}).then((response) => {
                setCartItems(response.data);
                console.log(JSON.stringify(cookies.items));
                console.log(response.data);
            });
        }
    }, []);
    
    useEffect(() =>{
        axios.get("http://localhost:8000/getExistingCards.php", {params: {user_id: cookies.user}}).then((response) => {
            console.log(response.data);
            if (response.data.length > 0){
                setExistingCards(response.data);
            }
            else{
                setExistingCards([]);
            }
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
                    <form >
                        {cards.map((card, index) => (
                            <div class="container">
                                <input type="radio" id={index} name="payment" value={card.payment_id} onChange={handleChange}/>
                                <label for={index}>
                                    <div class="card" style={{padding:"10px"}}> ************ {card.card_number.substring(12)}
                                    <br/> {card.cardholder_name} | {card.expiration_date.substring(5,7)}/{card.expiration_date.substring(2, 4)}
                                    </div>
                                </label>
                                <br/>
                            </div>
                        ))}
                        <input type="radio" id="new" name = "payment" value = "new" onChange={handleChange}/>
                        <label for="new">
                            <div class="card text-start" style={{padding:'10px'}}>
                            Card Number: * <input type="text" name="card_num" style={{width: "450px"}} onChange={handleChange} maxLength="16"></input>
                            Name: * <input type="text" name="card_name" style={{width:"150px"}} onChange={handleChange}></input>
                            Expiry Date: (MM/YY) * <input type="text" name="card_expiry" style={{width:"100px"}} onChange={handleChange} maxLength="5"></input>
                            CVV: * <input type="text" name="cvv" style={{width:"50px"}} onChange={handleChange} maxLength="3"></input>
                            </div>
                        </label>
                        * Required for new cards
                        <br/>
                        <hr/>
                        <p><b>Shipping Details</b></p>
                        <div class="card" style={{padding:"10px"}}>
                            Address Line 1: * <input type="text" name="address_1" onChange={handleChange} required></input>
                            Address Line 2: <input type="text" name="address_2" onChange={handleChange}></input>
                            City: * <input type="text" name="city" style={{width:"150px"}} onChange={handleChange} required></input>
                            Province/State: * <input type="text" name="region" style={{width:"150px"}} onChange={handleChange} required></input>
                            Country: * <input type="text" name="country" style={{width:"150px"}} onChange={handleChange} required></input>
                            Postal Code (XXXXXX): * <input type="text" name="postal_code" style={{width:"150px"}} onChange={handleChange} maxLength="6" required></input>
                        </div>
                        * required fields
                        <hr/><Link to='/review_order' state={{data:data}} style={{ color: '#000', textDecoration: 'none' }} onClick={handleClick}>
                            <button class="bg-light text-dark">Place Order</button>
                            </Link>
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