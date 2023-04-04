import React, { useEffect, useState } from 'react';
import {useCookies} from 'react-cookie';
import axios from 'axios';

const Profile = () => {
    const [orders, setOrders] = useState([]);
    const [cookies, setCookie] = useCookies();

    useEffect(() => {
        setOrders([]);
        axios.get("http://localhost:8000/getOrders.php", {params: {id: cookies.user, criteria: ""}}).then((response) => {
            console.log(response.data);
            setOrders(JSON.parse(response.data));
        })
    },[]);

    const handleChange = event => {
        setOrders([]);
        let search = event.target.value;
        if (search === ""){
            axios.get("http://localhost:8000/getOrders.php", {params: {id: cookies.user, criteria: ""}}).then((response) => {
                console.log(response.data);
                setOrders(JSON.parse(response.data));
            })
        }
        else {
            axios.get("http://localhost:8000/getOrders.php", {params: {id: cookies.user, criteria: search}}).then((response) => {
                console.log(response.data);
                setOrders(JSON.parse(response.data));
            })
        }
    }

    return (
        <div class="container">
            <div class="row mt-4">
                <h3>Your Orders</h3>
                <h6>View your order history</h6>
            </div>
            <hr/>
            <div class="row">
                Search: <input type="text" onChange={handleChange}></input>
            </div>
            <hr/>
            <div class="row">
                <table style={{backgroundColor: 'white'}}>
                    <tr>
                        <th style={{width: "10%"}}>Order Number</th>
                        <th style={{width: "10%"}}>Order Date</th>
                        <th style={{width: "10%"}}>Total Price</th>
                        <th>Items Purchased</th>
                    </tr>
                    {orders.map((order,index) => (
                    <tr>
                        <td>{order.order_id}</td>
                        <td>{order.date_received}</td>
                        <td>{order.total_price}</td>
                        <td></td>
                    </tr>
                    ))}
                </table>
            </div>
        </div>
    )
}
export default Profile;