<!DOCTYPE html>
<html>
<head>
	<title> Login - Rental Mobil Berbasis WEB</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>

</head>
<body background="assets/mobil.png">
  	
	<div class="col-md-4 col-md-offset-4" style="margin-top: 50px">
		<center>
			<h2>APLIKASI RENTAL MOBIL</h2>
			<h3>LOGIN</h3>
			
		</center>
		<br/>
		<?php 
		if (isset($_GET['pesan'])){
			if ($_GET['pesan'] == "gagal"){
				echo "<div class='alert alert-danger alert-danger'>";
				echo $this->session->flashdata('alert');
				echo "</div>";
			}else if ($_GET['pesan'] == "logout"){
				if ($this->session->flashdata()) 
				{
					echo "<div class='alert alert-danger alert-success'>";
					echo $this->session->flashdata('Anda Telah Logout');
					echo "</div>";
				}
				//echo "<div class='alert alert-primary'>Anda telah logout.</div>";
			}else if ($_GET['pesan'] == "belumlogin"){
				if ($this->session->flashdata())
				{
					echo "<div class='alert alert-danger alert-primary'>";
					echo $this->session->flashdata('alert');
					echo "</div>";
				}
				//echo "<div class='alert alert-primary'>Silahkan login dulu.</div>";
			}
		}else{
			if ($this->session->flashdata()) 
			{
				echo "<div class='alert alert-danger alert-message'>";
				echo $this->session->flashdata('alert');
				echo "</div>";
			}
		}
		?>
		<br/>
		<div class="panel panel-default">
			<div class="panel-body">
			<br/>
			<br/>
		<form action="<?php echo base_url().'welcome/login' ?>" method="post">
			<div class="form-group">
				<input type="text" name="username" placeholder="username" class="form-control">
				<?php echo form_error('username'); ?>
			</div>

			<div class="form-group">
				<input type="password" name="password" placeholder="password" class="form-control">
				<?php echo form_error('password'); ?>
			</div>

			<button type="submit" value="login" class="btn btn-primary btn-user btn-block"> Login
			</button>
		</form>
		<hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('registrasion')?>">Create an Account!</a>
                  </div>	
		<br/>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.alert-message').alert().delay(3000).slideUp('slow');
</script>
</body>
</html>