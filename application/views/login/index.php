<!DOCTYPE html>
<html>
<head>
</br></br>
	<h1><b>NEEV</b> </h1><br>
	<H2><b>A STRONG FOUNDATION</b></H2>
<title>Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/log_images/icons/favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url(); ?>assets/log_css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/log_css/animate.min.css" rel="stylesheet" type="text/css"> 
<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<style>
  h1{
	  font-family: 'Monoton', cursive;
  }
  h2{
	  font-family: 'verdana', cursive;
	}
  .msg
  {
  	color:#661a00; font-weight:bold;text-align: center;
  }
  html{
	background-image: url("./assets/images/bg1.jpg");
	background-repeat: no-repeat;
	background-size: cover;
	background-size: 100% 120%;
	background-position: right top;
 }
</style>
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>LOGIN</h1>
		<div class="main-agileinfo animated bounceIn" style="border: 1px solid #000;">
			<?php if($this->session->flashdata('msg')){ 
				echo $this->session->flashdata('msg');
			} ?>
			<form method="post" action="<?php echo base_url('login/loggedIn'); ?>">
				<div class="agileits-top"> 
			        <label style="color:black;">Username</label>
					<input class="text" type="text" name="Username" onkeyup="this.value = this.value.toUpperCase();" name="username" id="username" placeholder="Employee ID" autocomplete="off" value="<?php echo set_value('Username'); ?>">
					<br /><br />
					<label style="color:back;">Password</label>
					<input class="text" type="password" name="pass" id="pass" placeholder="Password" value="<?php echo set_value('pass'); ?>">
					<div class="wthree-text">    
						<div class="clear"> </div>
					</div>   
					<input type="submit" value="SIGN IN" class="animated heartBeat delay-2s">
					<p><a href="<?php echo base_url('forgot_password/Forgot_password'); ?>"> Forgot Password?</a></p>
					<p><center><div style="color:#661a00; font-weight:bold; display:none;" id="msg">Incorrect Username or Password !!</div></center></p>
				</div>	 
			</form>
		</div>	
		
		<!-- <ul class="w3lsg-bubbles">
			<li style="background:red; opacity:0.2"></li>
			<li style="background:#DC143C; opacity:0.2"></li>
			<li style="background:red; opacity:0.2"></li>
			<li style="background:#FFD700; opacity:0.2"></li>
			<li style="background:#F0E68C; opacity:0.2"></li>
			<li style="background:red; opacity:0.2"></li>
			<li style="background:#006400; opacity:0.2"></li>
			<li style="background:#20B2AA; opacity:0.2"></li>
			<li style="background:red; opacity:0.2"></li>
			<li style="background:#1E90FF; opacity:0.2"></li>
			<li style="background:#8A2BE2; opacity:0.2"></li>
			<li style="background:red; opacity:0.2"></li>
			<li style="background:#FF69B4; opacity:0.2"></li>
			<li style="background:#FFFFF0; opacity:0.2"></li>
			<li style="background:#8B4513; opacity:0.2"></li>
			<li style="background:red; opacity:0.2"></li>
			<li style="background:#FF4500; opacity:0.2"></li>
			<li style="background:#20B2AA; opacity:0.2"></li>
			<li style="background:red; opacity:0.2"></li>
			<li style="background:#20B2AA; opacity:0.2"></li>
			<li style="background:red; opacity:0.2"></li>
		</ul>
		
		<ul class="w3lsg-bubbles">
			<li style="background:red; opacity:0.2"></li>
			<li style="background:#DC143C; opacity:0.2"></li>
			<li style="background:red; opacity:0.2"></li>
			<li style="background:#FFD700; opacity:0.2"></li>
			<li style="background:#F0E68C; opacity:0.2"></li>
			<li style="background:red; opacity:0.2"></li>
			<li style="background:#006400; opacity:0.2"></li>
			<li style="background:#20B2AA; opacity:0.2"></li>
			<li style="background:red; opacity:0.2"></li>
			<li style="background:#1E90FF; opacity:0.2"></li>
			<li style="background:#8A2BE2; opacity:0.2"></li>
			<li style="background:red; opacity:0.2"></li>
			<li style="background:#FF69B4; opacity:0.2"></li>
			<li style="background:#FFFFF0; opacity:0.2"></li>
			<li style="background:#8B4513; opacity:0.2"></li>
			<li style="background:red; opacity:0.2"></li>
			<li style="background:#FF4500; opacity:0.2"></li>
			<li style="background:#20B2AA; opacity:0.2"></li>
			<li style="background:red; opacity:0.2"></li>
			<li style="background:#20B2AA; opacity:0.2"></li>
			<li style="background:red; opacity:0.2"></li>
		</ul> -->
	</div>	
	<!-- //main --> 
</body>
</html>
<script>
  function log(){
	  var username = $("#username").val();
	  var pass     = $("#pass").val();
	  $.post({
		  url: "<?php echo base_url(); ?>Login/logg",
		  type: "POST",
		  data: {username:username,pass:pass},
		  success: function(data){
			  if(data == 'Fees'){
				  window.location="<?php echo base_url('Login/fees_dashboard'); ?>";
			  }else if(data == 'Teacher'){
				  window.location="<?php echo base_url('Login/teacher_dashboard'); ?>";
			  }else if(data == 'Payroll'){
			  	  window.location="<?php echo base_url('Login/payroll_dashboard'); ?>";
			  }
			  else{
				  $("#msg").show();
				  $("#username").val('');
				  $("#pass").val('')
				  $("#msg").attr('class','animated infinite bounceIn');
			  }
		  }
	  });
  }
</script>