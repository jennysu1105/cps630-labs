<html>

<head>
    <link rel="stylesheet" href="lab2,3-Part1-Team37.css">
    <title>Art Work Database</title>
    <meta charset="utf-8">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="jquery-3.6.1.min.js"></script>
    <script type="text/Javascript">
        function setValue(elem, target) {
            const text = document.getElementById(target);
            text.innerHTML = elem.value;
        }
        function clearRecord() {
            $(".userInput").map(function() {
                this.value = "";
            });
            $(".record").map(function() {
                this.innerHTML = "";
            });
        }
        function validate(){
            var data = $(".userInput").map(function() {
                return this.value;
            }).get();
            console.log(data);
            if(jQuery.inArray("", data) !== -1) {
                //returns -1 if element ("") not in array (data)
                alert("Enter all record");
                return false;
            };
        }
    </script>
</head>

<body>
    <!--(Part 1a)-->
    <header>
        <p class="headerText">Art Work Database</p>
    </header>
    <div class="secondaryHeader">
        <p class="descriptionText">description</p>
    </div>
    <!--(Part 1b and 1d)-->
    <form method="POST" enctype="multipart/form-data" action="record.php" target="action.php">
        <div class="partBD">
            <!--(Part 1b)-->
            <div class="partB">
                <div>
                    <label for="genre">Genre: </label>
                    <select class="userInput" name="genre" id="genre" oninput="setValue(this, 'pGenre')">
                        <option value="" selected hidden></option>
                        <option value="Abstract">Abstract</option>
                        <option value="Baroque">Baroque</option>
                        <option value="Gothic">Gothic</option>
                        <option value="Renaissance">Renaissance</option>
                    </select>
                </div>

                <div>
                    <label for="type">Type: </label>
                    <select class="userInput" name="type" id="type" oninput="setValue(this, 'pType')">
                        <option value="" selected hidden></option>
                        <optgroup label="Painting">
                            <option value="Landscape Painting">Landscape Painting</option>
                            <option value="Portrait Painting">Portrait Painting</option>
                        </optgroup>
                        <option value="Sculpture">Sculpture</option>
                    </select>
                </div>

                <div>
                    <label for="specification">Specification: </label>
                    <select class="userInput" name="specification" id="specification" oninput="setValue(this, 'pSpecification')">
                        <option value="" selected hidden></option>
                        <option value="Commercial">Commercial</option>
                        <option value="Non-commerical">Non-commerical</option>
                    </select>
                </div>

                <div>
                    <label for="year">Year: </label>
                    <input class="userInput" type="number" name="year" id="year" oninput="setValue(this, 'pYear')">
                </div>

                <div>
                    <label for="museum">Museum: </label>
                    <input class="userInput" type="text" name="museum" id="museum" oninput="setValue(this, 'pMuseum')">
                </div>
            </div>
            <!--(Part 1d)-->
            <div class="partD">
                <input type="submit" onclick="return validate()" value="Save Record">
                <button type="button" onclick="clearRecord()">Clear Record</button>
            </div>
        </div>
    </form>
    <!--(Part 1c)-->
    <div class="partC">
        <!--Default option-->
        <p class="record" id="pGenre"></p>
        <p class="record" id="pType"></p>
        <p class="record" id="pSpecification"></p>
        <p class="record" id="pYear"></p>
        <p class="record" id="pMuseum"></p>
    </div>
</body>


</html>