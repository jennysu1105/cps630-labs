import React, { useEffect, useState } from 'react';
import axios from 'axios';

const Select = () => {
    const [data, setData] = useState("");

    useEffect(() => {
        axios.get("http://localhost:8000/selectPage.php").then((response) => {
            setData(response.data);
            console.log(response.data);
        });
    }, []);

    

    return (
        <div class="container">
            <div class="row">
                <h3 class="mt-4">Choose Table</h3>
            </div>
            <input type="checkbox" id="shopping" name="shopping" />
            <label for="shopping">Shopping Table</label>
            <input type="checkbox" id="truck" name="truck" />
            <label for="truck">Truck Table</label>
            <input type="checkbox" id="trip" name="trip" />
            <label for="trip">Trip Table</label>
            <input type="checkbox" id="user" name="user" />
            <label for="user">User Table</label>
            <input type="checkbox" id="item" name="item" />
            <label for="item">Item Table</label>
            <input type="checkbox" id="review" name="review" />
            <label for="review">Review Table</label>
            <input type="checkbox" id="payment" name="payment" />
            <label for="payment">Payment Table</label>
            <input type="checkbox" id="order" name="order" />
            <label for="order">Order Table</label>
            <div
                dangerouslySetInnerHTML={{ __html: data }}
            />
        </div>
    );
}

export default Select;