<?php
    include_once "includes/dbh.inc.php";
?>

<!DOCTYPE html> 
<html>
    <head>
        <link rel="stylesheet" href="css/index.css">
    </head>
    <div style="text-align:center;font-size:32px;font-weight:bold;">Student Records</div>
    <body>
        <wrap style="display:flex;">
            <div class="options">
                <!-- Add Student Record -->
                <form action="includes/addrecord.php" method="POST">
                    <label>Add Student Record:</label><br>
                    <input type="text" name="f_name" placeholder="First Name"><br>
                    <input type="text" name="l_name" placeholder="Last Name"><br>
                    <input type="number" name="year" placeholder="Current Year"><br>
                    <input type="text" name="gpa" placeholder="GPA"><br>
                    <button type="submit" name="submit">Add</button>
                </form>
                <!-- Remove Student Record by name -->
                <form action="includes/removerecord.php" method="POST">
                    <label>Remove Student Record:</label><br>
                    <input type="text" name="f_name" placeholder="First Name"><br>
                    <input type="text" name="l_name" placeholder="Last Name"><br>
                    <button type="submit" name="submit">Remove by name</button>
                </form>
                <!-- Remove Student Record by id -->
                <form action="includes/removerecord.php" method="POST">
                    <label>Remove Student Record:</label><br>
                    <input type="number" name="id" placeholder="ID"><br>
                    <button type="submit" name="submit">Remove by ID</button>
                </form>
            </div>
            <div class="display">
                <?php
                    $qry = mysqli_query($conn, "SELECT * FROM strec");
                    while($result = mysqli_fetch_array($qry)){
                        echo "First name: "."<strong>".$result["f_name"]."</strong> Last name: <strong>".$result["l_name"]."</strong> Year of study: <strong>".$result["study_year"]."</strong> GPA: <strong>".$result["gpa"]."</strong><br>";
                    };
                ?>
            </div>
        </wrap>
    </body>
</html>