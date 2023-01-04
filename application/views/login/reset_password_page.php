	<!-- Head Section -->
	<section class="small-section bg-dark-lighter">
		<div class="relative container align-left">
			
			<div class="row">
				
				<div class="col-md-12 align-center">
					<h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Reset Password</h1>
				</div>
			</div>
			
		</div>
	</section>
	<!-- End Head Section -->
	<!-- Section -->
	<section class="page-section" style="display: <?php echo ($valid_type =='ok') ? '':'none'; ?>">
		<div class="container relative">
			
			<!-- Nav Tabs
			
			 Tab panes -->
			<div class="tab-content tpl-minimal-tabs-cont section-text">
				
				<div class="tab-pane fade in active" id="mini-one">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="row" >
								<p style="color:#a94442; display:none;" class="errormsg"></p>
								<p style="color:#287928 !important; display:none;" class="succesmsg"></p>
							</div>
							<form class="form contact-form" id="login_form" action='' method="post" enctype="multipart/form-data">
								<div class="clearfix">
									<input type="hidden" name="token" value="<?php echo (!empty($token)) ? $token:''; ?>">
									<input type="hidden" name="username" value="<?php echo (!empty($username)) ? $username:''; ?>">
									<!-- Username -->
									<div class="form-group">
										<input type="password" name="new_password" id="new_password" class="input-md round form-control" placeholder="New Password" required aria-required="true"  data-bv-notempty-message="Please Enter New Password" style="text-transform: none !important;">
									</div>
									
									<!-- Password -->
									<div class="form-group">
										<input type="password" name="confg_password" id="confg_password" class="input-md round form-control" placeholder="Confirm Password" value="" required aria-required="true" data-bv-notempty-message='Please Enter Confirm Password' style="text-transform: none !important;">
									</div>
										
								</div>
								
								<div class="clearfix">
									<div class="align-center pt-10">
										<button type="submit" class="submit_btn btn btn-mod btn-medium btn-round" id="login-btn">Reset Password</button>
									</div>
									
								</div>
								
							</form>
							
						</div>
					</div>
					<!-- End Login Form -->
					
				</div>
				
			</div>
			
		</div>
	</section>
	<section class="page-section" style="display:<?php echo ($valid_type =='not ok') ? '':'none' ?>;">
		<div class="container relative">
			
			<!-- Nav Tabs
			
			 Tab panes -->
			<div class="tab-content tpl-minimal-tabs-cont section-text">
				
				<div class="tab-pane fade in active" id="mini-one">
					<div class="row">
						<div class="col-md-4 col-md-offset-4 align-center">
							<label>Invalid Token Or Token is expired</label><br>
							<a href="<?php echo base_url(); ?>" ><label style="cursor:pointer !important;">Home Page</label></a>
						</div>
					</div>
					<!-- End Login Form -->
					
				</div>
				
			</div>
			
		</div>
	</section>
	<!-- End Section -->
	
	
<script type="text/javascript">  
	$(document).ready(function() {
    $('#login_form').bootstrapValidator()
		.on('success.form.bv', function(e) {
			e.preventDefault();
			$(".errormsg").hide();
			var error_flag=true;

			if($("#new_password").val().length >20 ){
				error_flag=false;
				$(".errormsg").show();
				$(".errormsg").html(" Max 20 number of characters is allowed");
			}else if($("#new_password").val().length < 5){
				error_flag=false;
				$(".errormsg").show();
				$(".errormsg").html("Min 6 number of characters is allowed");
			}else if($("#new_password").val() != $("#confg_password").val()){
				error_flag=false;
				$(".errormsg").show();
				$(".errormsg").html("New Password and Confirm Password does not matched");
			}

			if(error_flag){
				$(".errormsg").hide();
				// Returns error message when submitted without req fields.  

				// AJAX Code To Submit Form.  
				$.ajax({  
					type: "POST",
					url:  "<?php echo base_url(); ?>" + "submit_reset_password_form",  
					data: $(this).serialize(),  
					dataType: "json", 
					cache: false,  
					success: function(data){
						console.log(data); 
						if(data.type==1){
							var output = 'Password changed successfully !';
		        			$(".succesmsg").show().html(output);    
							setTimeout(function () {
								window.location.replace("<?php echo base_url(); ?>"); 
							}, 3000);			
							//On success redirect.
						}else if(data.type==2){
							var output = data.msg;
		        			$(".succesmsg").show().html(output);    
							setTimeout(function () {
								window.location.replace("<?php echo base_url(); ?>"); 
							}, 3000);			
							//On success redirect.
						} else {
							$(".errormsg").html(data.msg).show();  
						}
					}  
				}); // end ajax
				return false;  
			} // end if
        });
    });
</script>