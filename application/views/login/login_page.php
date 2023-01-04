<style>
	.text-white{
		color: white;
	}

	.error_flag{
		color: red;
	}

	.success_flag{
		color: green;
	}
</style>
<?php $this->load->view('login/header');?>
<div class="sidenav img-responsive">
	<div class="text-white m-5">
		<h1>
			User Login<br />Authentication
		</h1>
		<p>
			Enter your login details<br /> to get into the application.
		</p>
	</div>
</div>
<div class="main">
	<div class="d-flex flex-column justify-content-center align-items-center">
		<div class="col-md-6 col-sm-12">
			<div class="login-form">
				<form class="form contact-form" id="login_form" action='lic_login' method="post" enctype="multipart/form-data">
					<!-- <input type='hidden' name='token' id='token' value=""> -->
					<div class="form-group">
						<label><b>Username</b></label>
						<input type="text" class="form-control mt-1" placeholder="Enter Username" name="username" id ="username">
						<span class="error_flag" id="username_err"></span>
					</div>
					<div class="form-group  mb-3">
						<label><b>Password</b></label>
						<input type="Password" class="form-control mt-1" placeholder="Enter Password" name="password" id ="password">
						<span class="error_flag" id="password_err"></span>
					</div>
					<!-- Send Button -->
					<div class="align-right pt-10">
						<button type="submit" class="submit_btn btn btn-primary btn-mod btn-medium btn-round" id="login-btn">Login</button>
					</div>

					<div class="align-right pt-10">
						<p>
							Are you a new user? <a href="<?php echo base_url('signupApplicant'); ?>" >Sign up here...</a>.
						</p>
					</div>
				</form>
				<div class="row" >
					<br><label class="error_flag" id="save_rs_err"></label>
					<br><label class="success_flag" id="save_rs_succ"></label>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('login/footer');?>
<script src="<?php echo base_url(); ?>/assets/js/app_helper.js"></script>
<script type="module" src="<?php echo base_url(); ?>/assets/js/login/login.js"></script>