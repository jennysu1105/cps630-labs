function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    var linebreak = document.createElement("br");
    var data = ev.dataTransfer.getData("text");
    var item = document.getElementById("item_" + data);
    var item_price = document.getElementById("price_" + data);

    ev.preventDefault();
    ev.target.append(item.innerHTML + " - $" + item_price.innerHTML);
    ev.target.appendChild(linebreak);

    var cart_total = document.getElementById("cart_total");
    var price = Number(item_price.innerHTML);

    try {
        cart_total.innerHTML = Number(cart_total.innerHTML) + price;
    }
    catch {
        cart_total.innerHTML = price;
    }
    
    var cookie = document.cookie.substring(5) + item.innerHTML + "," + item_price.innerHTML + "]";
    document.cookie = "item=" + cookie + "; path=/;";
}
