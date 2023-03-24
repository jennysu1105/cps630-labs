import React from 'react';
import shopping from '../static/img/shopping_icon.png'
import delivery from '../static/img/delivery_icon.png'

const Types_of_Services = () => {
    return (
        <div class="container">
            <div class="row mt-4">
                <h5>The Smart Customer Services (SCS) offers the following services</h5>
            </div>
            <div class="row mt-5 mb-5">
                <div class="col-md-6">
                    <img src={shopping} alt="shopping_icon" id="shopping_icon" />
                    <div>
                        <h5 class="mt-5">Online shopping</h5>
                        <a href="/" class="btn btn-success" role="button">To shopping</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src={delivery} alt="delivery_icon" id="delivery_icon" />
                    <div>
                        <h5 class="mt-5">Delivery</h5>
                        <a href="/map" class="btn btn-success" role="button">To delivery</a>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Types_of_Services;