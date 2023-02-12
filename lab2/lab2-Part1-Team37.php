<!--Jenny Su 500962385
    Tiffany Tran 500886609
    Kevin Tran 500967982
    Michael Widianto 501033366
-->
<!-- php code for saving and clearing --> 
<?php
	// saving
	if(isset($_POST['save'])){
		// Getting input
		$genre = $_POST['genre'];
		$type = $_POST['type'];
		$subject = $_POST['subject'];
		$specifications = $_POST['specifications'];
		$year = $_POST['year'];
		$museum = $_POST['museum'];
		// Getting existing cookie
		//		no cookie created
		if(!isset($_COOKIE['data'])){
			$info = array();
		}
		//		if there is a cookie
		else{
			$info = json_decode($_COOKIE['data'], true);
		}
		// if there is a painting, add subject to array
		if($type == "Painting"){
			$record = array($genre, $type, $subject, $specifications, $year, $museum);
		}
		// if it is a sculpture, leave subject blank
		else {
			$record = array($genre, $type, "", $specifications, $year, $museum);
		}
		// add record to info
		array_push($info, json_encode($record));
		// add info to cookie data
		setcookie("data", json_encode($info));
		
		// update table by refreshing
		header("Refresh:0");
	}
	// clearing a record
	if(isset($_POST['clear'])){
		// getting input data
		$genre = $_POST['genre'];
		$type = $_POST['type'];
		$subject = $_POST['subject'];
		$specifications = $_POST['specifications'];
		$year = $_POST['year'];
		$museum = $_POST['museum'];
		// assembling comparison array
		if($type == "Painting"){
			$data = array(json_encode(array($genre, $type, $subject, $specifications, $year, $museum)));
		}
		else {
			$data = array(json_encode(array($genre, $type, "", $specifications, $year, $museum)));
		}
		// getting cookie data
		if(!isset($_COOKIE['data'])){
			$info = array();
		}
		else{
			$info = json_decode($_COOKIE['data'], true);
		}
		// remove input from array
		$info_diff = array_values(array_diff($info, $data));
		// update cookie with new array
		setcookie("data", json_encode($info_diff));
	
		// update table by refreshing
		header("Refresh:0");
	}
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Art Work</title>
        <link href="./styles/lab2-Team37.css" rel="stylesheet">
        
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
			// Hides sub-menu of "Painting" option depending on if it's selected
			$(document).ready(
				function() {
					$("#topMenu").change( function(e){
						if ($("#topMenu option:selected").val() == "Painting"){
							document.getElementById("subMenu").hidden = false;
						} else if ($("#topMenu option:selected").val() == "Sculpture"){
							document.getElementById("subMenu").hidden = true;
						}
				});
			});
		</script>
	</head>
	<body>
		<!-- Title division -->
		<div class="title">
			<h1>Art Work Database</h1>
		</div>
		<!-- Description division -->
		<div class="description">
			<p>Collection of artwork. Added by you!</p>
		</div>
		<!-- Dropdown Menu: Made into a table *nicer to look at* -->
		<div class="dropdown">
			<hr>
			<form method="post" action="">
				<table class="dropdown">
					<!-- Genre dropdown -->
					<tr>
						<th class="dropdown inputs"><p>Genre</p></th>
						<td class="dropdown">
							<select class="inputs" name="genre">
								<option value="Abstract">Abstract</option>
								<option value="Baroque">Baroque</option>
								<option value="Gothic">Gothic</option>
								<option value="Renaissance">Renaissance</option>
							</select>
						</td>
					</tr>
					<!-- Type dropdown -->
					<tr>
						<th class="dropdown inputs">Type</th>
						<td class="dropdown">
							<select class="inputs" name="type" id="topMenu">
								<option value="Painting">Painting</option>
								<option value="Sculpture">Sculpture</option>
							</select>
						</td>
					</tr>
					<!-- Subject dropdown -->
					<tr id="subMenu">
						<th class="dropdown">Subject</th>
						<td class="dropdown">
							<select name="subject">
								<option value="Landscape">Landscape</option>
								<option value="Portrait">Portrait</option>
							</select>
						</td>
					</tr>
					<!-- Specifications dropdown -->
					<tr>
						<th class="dropdown">Specifications</th>
						<td class="dropdown">
							<select class="inputs" name="specifications">
								<option value="Commercial">Commercial</option>
								<option value="Non-Commercial">Non-Commercial</option>
								<option value="Derivative Work">Derivative Work</option>
								<option value="Non-Derivative Work">Non-Derivative Work</option>
							</select>
						</td>
					</tr>
					<!-- Year dropdown -->
					<tr>
						<th class="dropdown inputs">Year</th>
						<td class="dropdown inputs"><input type="text" name="year"></td>
					</tr>
					<!-- Museum dropdown -->
					<tr>
						<th class="dropdown inputs">Museum</th>
						<td class="dropdown inputs"><input type="text" name="museum"></td>
					</tr>
				</table>
				<hr>
				<!-- Save and clear buttons -->
				<button type="submit" name="save" id="update" style="left:15%">Save Record</button>
				<button type="submit" name="clear" id="update" style="right:20%">Clear Record</button>
				<br><hr>
			</form>
		</div>
		<!-- Database Table -->
		<div class="database body">
			<table id="database">
				<!-- Headers -->
				<tr>
					<th class="database">Genre</th>
					<th class="database">Type</th>
					<th class="database">Subject</th>
					<th class="database">Specifications</th>
					<th class="database">Year</th>
					<th class="database">Museum</th>
				</tr>
				<!-- data -->
				<?php
					// get cookie
					//		no cookie, then it is an empty array
					if(!isset($_COOKIE['data'])){
						$info = array();
					}
					//		retreive and decode cookie data
					else{
						$info = json_decode($_COOKIE['data'], true);
					}
					// make rows with info
					for ($i = 0; $i < count($info); $i += 1){
						echo "<tr>";
						$record = json_decode($info[$i],true);
						// place each information into it's place
						for ($y = 0; $y < 6; $y += 1){
							echo "<td>";
							echo $record[$y];
							echo "</td>";
						}
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</body>
</html>
