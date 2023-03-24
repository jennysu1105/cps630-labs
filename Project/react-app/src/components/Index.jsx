import React from 'react';

const Index = () => {
    return (
        <div class="container">
            <div class="row mt-4">
                <h3>Smart Customer Services</h3>
                <h6>Drag an item to add it to your shopping cart</h6>
            </div>
            <div class="row mt-4 mb-5">
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