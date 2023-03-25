<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <select name="dbMaintain" id=operations>
        <option selected hidden>Select Operation</option>
        <option value="selectPage.php">Select</option>
        <option value="insertPage.php">Insert</option>
        <option value="updatePage.php">Update</option>
        <option value="deletePage.php">Delete</option>
    </select>

    <script>
        $(document).ready(function() {
            $("#operations").change(function (){
                var link = $(this).val();
                window.location = link;
            })
        })
    </script>

    <?php
        include_once "browserDetection.php";
    ?>
</body>

</html>