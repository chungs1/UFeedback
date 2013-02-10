$(document).ready(function() {
			$('#datePicker').datepicker();
	
			window.setInterval(function() {
				var posting = $.post('get_sessions.php', {id: '12345'});
				posting.done(function(data) {
					var json_array = jQuery.parseJSON(data);
					console.log(json_array);
				});
			}, 4000);
		});
		
		
		
		<div id="all_comments" class='span7' style ='height: 50%; overflow:auto;'>

				<div class='container-fluid box' style='background-color:white; margin-bottom:2%;'>
					<div class='span12'>
						<h5 style='margin-left: 68%'>Complaint</h5>
					</div>
					<p>
					Jesus this prof sucks i mean omfg wtf is going on here I can't even stay awake in class it's so sad :( :( :( :( asdjfioasdjfoasdfjoasigjaosdfjsoadifjasdofajsdofiasasdfsaodjfoasidfjasodfjsdoifjdoifjdofij
					</p>
				</div>

			</div>