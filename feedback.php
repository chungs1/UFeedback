<!DOCTYPE html>
<html>
<head>
	<title>Feedback Page </title>
	<link href='bootstrap/css/bootstrap.css' rel='stylesheet'>
	<link href='bootstrap/css/bootstrap-responsive.min.css' rel='stylesheet'>
	<link href='datepicker/css/datepicker.css' rel='stylesheet'>
	
	<style>
		.box {
			-moz-border-radius: 30px;
			border-radius: 30px;
		}
	
	</style>
	
</head>
<?php if(sizeof($_GET) > 0){ 
	$id = $_GET['id'];
}
?>

<body style="background-image:url('images/grad.png'); background-repeat: repeat-x;">

	<!--Navbar -->
	<div class='container-fluid'>
		<div class='row-fluid'>
			<div class='span8 offset2' style='margin-top:2%'>
				<div class='container-fluid'>
					<h3 'span2' style='margin-top:-.5%; color: white;'> UFeedback</h3>
					<a href='index.php' role='button' class='btn pull-right'>Sign Out</a>
				</div>
			</div>
		</div>
	</div>

	<div class='container-fluid' style='margin-top: 3%'>
 		<div class='row-fluid'>

			<!--Searchbar -->
	 		<div class='span3 offset1' style='background-color:white;'>
				<form style = 'margin-left: 5%' id='search'>
		 			<h3>Search</h3>	
					<h5>Date:</h5>
					<div class='input-append date'  data-date='1-1-2013' data-date-format='dd-mm-yyyy'>
						<input size='16' id='datePicker' type='text' value='1-1-2013'>
					</div>
					<input size='16' type='text' value='' placeholder='Session Number'>
					<input size='16' type='text' value='' placeholder='Topic'>
					<select>
						<option>Comment Type</option>
						<option value='Comment'>Comment</option>
						<option value='Complaint'>Complaint</option>
						<option value='Suggestion'>Suggestion</option>
					</select>
					<br>
					<button style='margin-right: 2%; margin-bottom: 2%;' class='btn btn-primary pull-right'>Submit</button>
				</form>
		 	</div>
		
			<!--Labelz -->
			<div class='span7' style='color:white;'>
				<div class='span6'>
					<h4>Session <?php echo $id; echo " (".$_GET['title'].")";?></h4>
				</div>
			</div>

			<!--Content -->
	 	 	<div id="all_comments" class='span7' style ='height: 500px; overflow:auto;'>
			</div>
		</div>
	</div>



	<script src='js/jquery.js'</script>
	<script src='bootstrap/js/bootstrap.js'></script>
	<script src='datepicker/js/bootstrap-datepicker.js' charset='UTF-8'></script>
	<script>
		$(document).ready(function() {
			var counter = 0;
	
			window.setInterval(function() {
				var posting = $.post('get_sessions.php', {id: <?php echo $id; ?>});
				posting.done(function(data) {
					var json_array = jQuery.parseJSON(data);
					for (var i = counter; i<json_array.length; i++) {
						var indiv_comment = jQuery.parseJSON(json_array[i]);
						var type = indiv_comment['Type'];
						var comment = indiv_comment['Comment'];
						if (type == "Complaint") {
							color = "red";
						}
						else if (type == "Comment") {
							color = "green";
						}
						else if (type == "Suggestion") {
							color = "gold";
						}
						$('#all_comments').prepend("<div class='container-fluid box' style='background-color:white; margin-bottom:2%;'><div class='span12'><h5 style='color:" + color + ";'>" + type + "</h5></div><p>" + comment + "</p></div>");
					}
					counter = json_array.length;
				});
						
				}, 2000);
		});
	</script>
</body>
</html>
