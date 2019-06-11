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

 <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="<?php base_url('registration');?>">
              
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Full name" value="<?= set_value('name'); ?>" >
                   <?=form_error('name','<small class="text-danger pl-3 ">',' </small>');?>
                </div>

                <div class="form-group">

                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                   <?=form_error('email','<small class="text-danger pl-3 ">',' </small>');?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                     <?=form_error('password1','<small class="text-danger pl-3 ">',' </small>');?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                     <?=form_error('password2','<small class="text-danger pl-3 ">',' </small>');?>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
            
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?=base_url('auth');?>">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
<script type="text/javascript">
  $('.alert-message').alert().delay(3000).slideUp('slow');
</script>
</body>
</html>