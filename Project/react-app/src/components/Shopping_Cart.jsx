import React, { useEffect, useState } from 'react';
import {useCookies} from 'react-cookie';
import axios from 'axios';

const Shopping_Cart = () => {
    const [cookies, setCookie] = useCookies(['items']);
    const [cartItems, setCartItems] = useState([]);

    useEffect(() => {
        axios.get("http://localhost:8000/getCartItems.php", {params: {items: JSON.stringify(cookies.items)}}).then((response) => {
            setCartItems(response.data);
            console.log(JSON.stringify(cookies.items));
            console.log(response.data);
        });
    }, []);

    return (
        <div class="row mt-4">
            <h3>Shopping Cart</h3>
            <h6>View your current shopping cart</h6>
        </div>
    );
}

export default Shopping_Cart;