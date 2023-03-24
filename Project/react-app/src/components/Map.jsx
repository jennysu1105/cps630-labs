import React from 'react';

const Map = () => {
    // var theMap = new google.maps.Map();
    // var theRenderer = new google.maps.DirectionsRenderer();
    // var province = "";
    // var city = "";
    // var address = "";
    // var branch = "";

    // function initMap() {
    //     const directionsService = new google.maps.DirectionsService();
    //     const directionsRenderer = new google.maps.DirectionsRenderer();
    //     const map = new google.maps.Map(document.getElementById("map"), {
    //         zoom: 3,
    //         center: { lat: 59.105890, lng: -102.005848 }
    //     });
    //     theMap = map;
    //     theRenderer = directionsRenderer;
    //     theRenderer.setMap(map);
    // }

    // function changeProvince() {
    //     var geocoder = new google.maps.Geocoder();
    //     province = document.getElementById("province").value;
    //     if (province !== "empty") {
    //         geocoder.geocode({ address: province }).then((response) => {
    //             if (response.results[0]) {
    //                 var theJson = JSON.parse(JSON.stringify(response, null, 2));
    //                 theMap.panTo({ lat: theJson.results[0].geometry.location.lat, lng: theJson.results[0].geometry.location.lng });
    //                 theMap.setZoom(5);
    //                 city = "";
    //                 address = "";
    //                 document.getElementById("city").value = "";
    //                 document.getElementById("end").value = "";
    //                 document.getElementById("start").value = "empty";
    //             } else {
    //                 window.alert("No results found");
    //             }
    //         });
    //     }
    // }

    // function changeCity() {
    //     var geocoder = new google.maps.Geocoder();
    //     city = document.getElementById("city").value;
    //     var provCity = province + " " + city;
    //     geocoder.geocode({ address: provCity }).then((response) => {
    //         if (response.results[0]) {
    //             var theJson = JSON.parse(JSON.stringify(response, null, 2));
    //             theMap.panTo({ lat: theJson.results[0].geometry.location.lat, lng: theJson.results[0].geometry.location.lng });
    //             theMap.setZoom(11);
    //         } else {
    //             window.alert("No results found");
    //         }
    //     });
    // }

    // function changeAddress() {
    //     var geocoder = new google.maps.Geocoder();
    //     address = document.getElementById("end").value;
    //     var provCityAddress = province + " " + city + " " + address;
    //     geocoder.geocode({ address: provCityAddress }).then((response) => {
    //         if (response.results[0]) {
    //             var theJson = JSON.parse(JSON.stringify(response, null, 2));
    //             theMap.panTo({ lat: theJson.results[0].geometry.location.lat, lng: theJson.results[0].geometry.location.lng });
    //             theMap.setZoom(14);
    //         } else {
    //             window.alert("No results found");
    //         }
    //     });
    // }

    // function changeBranch() { if (document.getElementById("start").value !== "empty") { branch = document.getElementById("start").value; } }

    // function generatePath() {
    //     if (document.getElementById("start").value !== "empty" && document.getElementById("end").value.length !== 0) {
    //         const directionsService = new google.maps.DirectionsService();
    //         const directionsRenderer = new google.maps.DirectionsRenderer();
    //         directionsService
    //             .route({
    //                 origin: {
    //                     query: document.getElementById("start").value,
    //                 },
    //                 destination: {
    //                     query: document.getElementById("end").value,
    //                 },
    //                 travelMode: google.maps.TravelMode.DRIVING,
    //             })
    //             .then((response) => {
    //                 theRenderer.setDirections(response);
    //             })
    //             .catch((e) => window.alert("Directions request failed due to " + status));
    //     } else {
    //         alert("No delivery address added!")
    //     }
    // }
    // window.initMap = initMap;
    // <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLherBXiXAewyPuGAs-5Hs47p0-_D7VcQ&callback=initMap"></script>

    return (
        <div class="container">
            <div class="row mt-4" >
                <div class="col-md-4">
                    <div class="row gx-0">
                        <div>First name:</div><input type="text" name="fname" /><br />
                        <div>Last name:</div><input type="text" name="lname" /><br />
                        <div>Phone number:</div><input type="text" name="phone-number" /><br />
                        <div>Provines & Territories:</div>
                        <select name="province" id="province" onchange="changeProvince()">
                            <option value="empty"></option>
                            <option value="Alberta">Alberta</option>
                            <option value="British Columbia">British Columbia</option>
                            <option value="Manitoba">Manitoba</option>
                            <option value="New Brunswick">New Brunswick</option>
                            <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                            <option value="Nova Scotia">Nova Scotia</option>
                            <option value="Northwest Territories">Northwest Territories</option>
                            <option value="Nunavut">Nunavut</option>
                            <option value="Ontario">Ontario</option>
                            <option value="Prince Edward Island">Prince Edward Island</option>
                            <option value="Quebec">Quebec</option>
                            <option value="Saskatchewan">Saskatchewan</option>
                            <option value="Yukon">Yukon</option>
                        </select>
                        <div>City: </div><input type="text" name="city" id="city" onchange="changeCity()" /><br />
                        <div>Delivery Address:</div><input type="text" name="address" id="end" onchange="changeAddress()" /><br />
                    </div>
                    <div>Branch:</div>
                    <select id="start" onchange="changeBranch()">
                        <option value="empty"></option>
                        <option value="PGGX+54 Toronto, Ontario">Yorkdale</option>
                        <option value="MJ39+QP Toronto, Ontario">Eatons</option>
                        <option value="MH47+8P Toronto, Ontario">Dufferin Mall</option>
                    </select>
                    <input type="submit" onclick="generatePath()" />
                </div>
                <div class="col-md-8">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    );
}

export default Map;