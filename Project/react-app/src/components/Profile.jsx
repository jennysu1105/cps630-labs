import React, { useEffect, useState } from 'react';
import {useCookies} from 'react-cookie';
import axios from 'axios';

const Profile = () => {
    const [orders, setOrders] = useState([]);
    const [cookies, setCookie] = useCookies();
    
    var items = {}

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
    useEffect(() => {
        orders.map((order, index) => (
            axios.get("http://localhost:8000/getItemsForOrder.php", {params: {order_id: order.order_id}}).then((response) => {
                let string = "";
                console.log(order.order_id)
                console.log(response.data)
                response.data.map((item, index) => (
                    string += item.num + "x " + item.item_name + ", "
                ))
                string = string.substring(0, string.length-2)
                items[order.order_id] = string
            })
        ))
        console.log(items)
    },[])

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
                        <td>{items[order.order_id]}</td>
                    </tr>
                    ))}
                </table>
            </div>
        </div>
    )
}
export default Profile;