import React, { useEffect, useState } from 'react';
import {useCookies} from 'react-cookie';
import axios from 'axios';

const Profile = () => {
    const [orders, setOrders] = useState([]);
    const [cookies, setCookie] = useCookies();

    useEffect(() => {
        axios.get("http://localhost:8000/getOrders.php", {params: {id: cookies.user, criteria: ""}}).then((response) => {
            if(response.data === ""){
                setOrders([]);
            }
            else {
                setOrders(response.data);
            }
        })
    },[]);

    const handleChange = event => {
        axios.get("http://localhost:8000/getOrders.php", {params: {id: cookies.user, criteria: event.target.value}}).then((response) => {
            //console.log(response.data);
            if(response.data === ""){
                setOrders([]);
            }
            else {
                setOrders(response.data);
            }
        })
    }

    return (
        <div class="container">
            <div class="row mt-4">
                <h3>Your Orders</h3>
                <h6>View your order history</h6>
            </div>
            <hr/>
            <div class="row">
                Search By Order Number: <input type="text" onChange={handleChange}></input>
            </div>
            <hr/>
            <div class="row">
                <table style={{backgroundColor: 'white'}}>
                    <tr>
                        <th style={{width: "10%"}}>Order Number</th>
                        <th style={{width: "10%"}}>Order Date</th>
                        <th style={{width: "10%"}}>Destination Code</th>
                        <th style={{width: "10%"}}>Total Price</th>
                        <th style={{width: "10%"}}>Payment</th>
                        <th>Items Purchased</th>
                    </tr>
                    {orders.map((order,index) => (
                    <tr>
                        <td>{order.order_id}</td>
                        <td>{order.date_received}</td>
                        <td>{order.destination_code}</td>
                        <td>{order.total_price}</td>
                        <td style={{textAlign: "left"}}>************{order.card_number.substring(12)}</td>
                        <td></td>
                    </tr>
                    ))}
                </table>
            </div>
        </div>
    )
}
export default Profile;