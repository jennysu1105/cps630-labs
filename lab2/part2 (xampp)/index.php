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
                    <input type="number" name="study_year" placeholder="Current Year"><br>
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
                <!-- Update Record -->
                <form action="includes/updaterecord.php" method="POST">
                    <label>Update Student Record:</label><br>
                    <input type="number" name="id" placeholder="ID"><br>
                    <input type="text" name="gpa" placeholder="Updated GPA"><br>
                    <input type="number" name="study_year" placeholder="Updated Year"><br>
                    <button type="submit" name="submit">Update Record</button>
                </form>
                <!-- Add Column -->
                <form action="includes/addfield.php" method="POST">
                    <label>Add Field to Record:</label><br>
                    <input type="text" name="field" placeholder="Field"><br>
                    <input type="text" name="type" placeholder="Type"><br>
                    <button type="submit" name="submit">Update Record</button>
                </form>
                <!-- Delete Column -->
                <form action="includes/deletefield.php" method="POST">
                    <label>Delete Field from Record:</label><br>
                    <input type="text" name="field" placeholder="Field"><br>
                    <button type="submit" name="submit">Update Record</button>
                </form>
                <!-- Show Column-->
                <form action="includes/displayspecific.php" method="POST">
                    <label>Show specific Column(s)<br>
                    <input type="text" name="field" placeholder="Field"><br>
                    <button type="submit" name="submit">Show Record</button>
                </form>
            </div>
            <div class="display">
                <?php include "includes/display.php";?>
            </div>
        </wrap>
    </body>
</html>