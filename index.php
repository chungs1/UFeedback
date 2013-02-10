<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv='content-type' content = 'text/html; charset=UTF-8'>
		<meta charset='utf-8'>
		<title>UFeedback</title>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
		
		<!-- Stylesheets -->
		<link href='bootstrap/css/bootstrap.css' rel='stylesheet'>
		<link href='bootstrap/css/bootstrap-responsive.min.css' rel='stylesheet'>
		
		<style>
			.grey_box.list {
				margin-top:15px;
			}
			.grey_box {
				
				border: 1px solid #e6e6e6;
				background: -webkit-linear-gradient(top,#f6f8fa 0,#eceff3 100%);
				background: -moz-linear-gradient(center top,#f6f8fa,#eceff3);
				background: -ms-linear-gradient(top,#f6f8fa 0,#eceff3 100%);
				background: -o-linear-gradient(top,#f6f8fa 0,#eceff3 100%);
				background: linear-gradient(top,#f6f8fa 0,#eceff3 100%);
				-webkit-border-radius: 5px;
				border-radius: 5px;
				-mox-background-clip: padding-box;
				background-clip: padding-box;
				width:700px;
				margin: 20px 15px 25px 25px;
				padding: 10px 20px;
				text-align:center;
				
			}
		</style>
		
	</head>
	
	<body style="background-image:url('images/gradient.png');background-repeat:repeat-x;">
		<!--topppppp bar thing-->
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span8 offset2" style="margin-top:2%; margin-bottom:1%">
					<div class="container-fluid">
						<h3 class="span2" style="margin-top:-.5%;color:white;">UFeedback</h3>
						<span id="not_logged_in">
							<a href="#loginModal" role="button" class="btn btn-success pull-right" data-toggle="modal">Login</a>
							<a href="#registerModal" role="button" class="btn pull-right" data-toggle="modal" style="margin-right:2%">Register</a>
						</span>
						<span style="display:none;" id='logged_in'>
						
							<a href='logout.php'><Button class="btn
							btn-success pull-right" >Logout</Button></a>
							
							<span class='pull-right' style='color:white; margin-right:1%;'>Welcome <?php session_start(); echo $_SESSION['email']; ?>
							</span>
							
						</span>
					</div>
				</div>
			</div>
		</div>
		
		<!--body thiingng-->
		<div class="banner" >
			<div class="container fluid">
				<div class="container-fluid">
					<div class="row-fluid">
						<div class="span10 offset1"style="height:auto;background-color:white ">
							<center><h2>Live Feedback</h2>
							<p style="max-width:400px;"><b>Suggestion boxes are so unweldy.</b>
							<br />
							Instead of waiting weeks or days for suggestions to trickle in, it's much more efficient to have live updates.
							</p>
							</center>
							<div class='grey_box list login-but' style="margin-top:3%; margin-left:10.5%">
								<div class="row-fluid">
									<div class="span12">
										<h1>Let's Get Started</h1>
										<a href="#createModal" class="btn btn-success btn-large" data-toggle="modal">Create a session</a>
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--button that creates a session, only accessible AFTER professor logs in
		<div class="container-fluid">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span7 offset2">
						
					</div>
				</div>
			</div>
		</div> -->
		
		<!--Instructions? just design-->
		<div id="bann" style="margin-top:3%">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span10">
						<ul class="thumbnails" style="margin-left:-7%">
							<li class="span3 offset3">
								<div class="thumbnail">
									<center><h3>1. Log In<h3>
									<img src="images/login.jpg" alt="" style='height:189px; max-width:100%'/></center>
								</div>
							</li>
							<li class="span3">
								<div class="thumbnail">
									<center><h3>2. Create a Session</h3>
									<img src="images/list.jpg" alt="" style="height:189px; max-width:100%" /></center>
								</div>
							</li>
							<li class="span3">
								<div class="thumbnail">
									<center><h3>3. PROFIT</h3>
									<img src="images/profit.jpg" alt="" style="height:189px; max-width:100%" /> </center>
								</div>
							</li>
						</ul>
					</div>
				</div>
			<div>
		</div>
		
		<!--Login modal-->
		<div id="loginModal" class="modal hide fade" tabindex="-1" role="form" aria-labelledby="Login" aria-hidden="true">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
			<h3 id="myModalLabel">Login</h3>
		  </div>
		  	<form>
		 	 <div class="modal-body">
			
			<fieldset style="margin-left:8%">
				<label>Email</label>
				<input id="login_email" type="text" name='email' placeholder="john@example.com">
				<label>Password</label>
				<input id="login_password" type="password" name='password' placeholder="Password">
				<br />
			</fieldset>
			
		  </div>
		  <div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<button class="btn btn-primary" data-dismiss="modal" id="submit_login">Submit</button>
		  </div>
		  </form>
		</div>
		
		<!--RegisterModal-->
		<div id="registerModal" class="modal hide fade" tabindex="-1" role="form" aria-labelledby="Login" aria-hidden="true">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
			<h3 id="myModalLabel">Register</h3>
		  </div>
		  	<form>
		  <div class="modal-body">
	
			<fieldset style="margin-left:8%">
				<label>Name</label>
				<input type="text" placeholder="John Smith">
				<label>Email</label>
				<input type="text" placeholder="john@example.com">
				<label>Password</label>
				<input type="text" placeholder="Password">
				<input type="text" placeholder="Confirm Password">
				<br />
			</fieldset>
			
		  </div>
		  <div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<button class="btn btn-primary">Submit</button>
		  </div>
		  </form>
		</div>
		<!--Create modal-->
		<div id="createModal" class="modal hide fade" tabindex="-1" role="form" aria-labelledby="Login" aria-hidden="true">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
			<h3 id="myModalLabel">Create a New Session</h3>
		  </div>
		  	<form action='gen_session.php' method='post'>
		  <div class="modal-body">
	
			<fieldset style="margin-left:8%">
				<label>Title</label>
				<input type="text" name='title' placeholder="Math 53: Lecture 002">
				<br />
			</fieldset>
			
		  </div>
		  <div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			<button type="submit" class="btn btn-primary">Submit</button>
		  </div>
		  </form>
		</div>
		
		<script type="text/javascript" src='js/jquery.js'></script>
		<script type="text/javascript" src='bootstrap/js/bootstrap.js'></script>
		<script>
			$(document).ready(function() {
				$('#submit_login').click(function() {
					
					var new_email = $('#login_email').val();
					var new_password = $('#login_password').val();
					var login_information = {email: new_email, password: new_password};
					var posting = $.post('login.php', login_information);
					
					posting.done(function(data) {
						console.log(data);
						if (data == 1) {
							
							$('#not_logged_in').css("display","none");
							$('#logged_in').css("display","inline");

						}
					});
				});
			});
		</script>
	</body>
</html>