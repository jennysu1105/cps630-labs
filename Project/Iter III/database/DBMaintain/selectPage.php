<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="DBMaintain.css">
</head>

<body>
    <?php
        include_once "DBMaintain.php";
    ?>
    <h1>Choose Table</h1>
    <input type="checkbox" id="shopping" name="shopping">
    <label for="shopping">Shopping Table</label>
    <input type="checkbox" id="truck" name="truck">
    <label for="truck">Truck Table</label>
    <input type="checkbox" id="trip" name="trip">
    <label for="trip">Trip Table</label>
    <input type="checkbox" id="user" name="user">
    <label for="user">User Table</label>
    <input type="checkbox" id="item" name="item">
    <label for="item">Item Table</label>
    <input type="checkbox" id="review" name="review">
    <label for="review">Review Table</label>
    <input type="checkbox" id="payment" name="payment">
    <label for="payment">Payment Table</label>
    <input type="checkbox" id="order" name="order">
    <label for="order">Order Table</label>

    <script>
        $(document).ready(function() {
            $("input#shopping").change(function() {
                if (this.checked) {
                    $("div#shopping").css('display', 'block');
                } else {
                    $("div#shopping").css('display', 'none');
                }
            })

            $("input#truck").change(function() {
                if (this.checked) {
                    $("div#truck").css('display', 'block');
                } else {
                    $("div#truck").css('display', 'none');
                }
            })

            $("input#trip").change(function() {
                if (this.checked) {
                    $("div#trip").css('display', 'block');
                } else {
                    $("div#trip").css('display', 'none');
                }
            })

            $("input#user").change(function() {
                if (this.checked) {
                    $("div#user").css('display', 'block');
                } else {
                    $("div#user").css('display', 'none');
                }
            })

            $("input#item").change(function() {
                if (this.checked) {
                    $("div#item").css('display', 'block');
                } else {
                    $("div#item").css('display', 'none');
                }
            })

            $("input#review").change(function() {
                if (this.checked) {
                    $("div#review").css('display', 'block');
                } else {
                    $("div#review").css('display', 'none');
                }
            })

            $("input#payment").change(function() {
                if (this.checked) {
                    $("div#payment").css('display', 'block');
                } else {
                    $("div#payment").css('display', 'none');
                }
            })

            $("input#order").change(function() {
                if (this.checked) {
                    $("div#order").css('display', 'block');
                } else {
                    $("div#order").css('display', 'none');
                }
            })
        })
    </script>

    <?php
        include_once "../dbConnection.php";
        include_once "DBMaintainFunctions.php";

        print("<div class='mainContainer'>");
        createSelectHTMLTable("shopping");
        createSelectHTMLTable("truck");
        createSelectHTMLTable("trip");
        createSelectHTMLTable("user");
        createSelectHTMLTable("item");
        createSelectHTMLTable("review");
        createSelectHTMLTable("payment");
        createSelectHTMLTable("order");
        print("</div>");

        include_once "../../browserDetection.php";
    ?>
</body>

</html>