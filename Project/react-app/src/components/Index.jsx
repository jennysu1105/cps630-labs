import React, { useEffect, useState } from 'react';
import axios from 'axios';
import shirt from '../static/img/shirt.jpg';

const Index = () => {
    const [items, setItems] = useState([]);
    const [data, setData] = useState("");

    useEffect(() => {
        axios.get("http://localhost:8000/getItemsTest.php").then((response) => {
            // setItems(response.data);
            setData(response.data);
            console.log(response.data);
        });
    }, []);

    return (
        <div class="container">
            <div class="row">
                <h3 class="mt-4">Smart Customer Services</h3>
                <h6>Drag an item to add it to your shopping cart</h6>
            </div>
            <div class="row mt-4 mb-5">
                <div class="col-md-9">
                    {items.map((item) => (
                        <div class="card mb-3">
                            <img src={shirt} draggable="true" ondragstart="drag(event)" />
                            <hr />
                            <h4>{item.item_name}</h4>
                            {item.item_price}
                        </div>

                    ))}
                </div>
                <div
                    dangerouslySetInnerHTML={{ __html: data }}
                />
                <div class="col-md-3">
                    <div id="shopping_cart" ondrop="drop(event)" ondragover="allowDrop(event)">
                        <h5>Your Shopping Cart</h5>
                        <span>Current subtotal: $</span>
                        <span id="cart_total"></span>
                        <br />
                        <hr />
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Index;