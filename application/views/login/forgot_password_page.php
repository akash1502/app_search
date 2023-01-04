
<!-- Head Section -->
	<section class="small-section bg-dark-lighter">
		<div class="relative container align-left">
			
			<div class="row">
				
				<div class="col-md-12 align-center">
					<h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Forgot Password</h1>
				</div>
			</div>
			
		</div>
	</section>
	<!-- End Head Section -->
	
	
	<!-- Section -->
	<section class="page-section" >
		<div class="container relative">
			
			<!-- Tab panes -->
			<div class="tab-content tpl-minimal-tabs-cont section-text">
				
				<div class="tab-pane fade in active" id="mini-one">
					
					<!-- Login Form -->                            
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="row" >
								<p style="color:#a94442; display:none;" class="errormsg"></p>
								<p style="color:#287928 !important; display:none;" class="succesmsg"></p>
							</div>
							<form class="form contact-form" id="forgot_password_form" action='' method="post" enctype="multipart/form-data">
								<div class="clearfix">
									<input type='hidden' name='token' id='token' value="<?php echo $token;?>">
									<!-- Username -->
									<label class="email_cls" style="display:none">Note:User can not updated the email id.Please enter the email id for to send the reset password link.</label>
									<div class="form-group">
										<input type="text" name="f_username" id="f_username" class="input-md round form-control" placeholder="Username" required aria-required="true"  data-bv-notempty-message="Please Enter Username" style="text-transform: none !important;">
									</div>

									<div class="form-group email_cls" style="display:none">
										<input type="email" name="f_emailid" id="f_emailid" class="input-md round form-control" placeholder="Please enter email id to send link on mail"  aria-required="true"  data-bv-notempty-message="Please enter email id to send the reset Password link" style="text-transform: none !important;">
									</div>
										
								</div>
								
								<div class="clearfix">
									<div class="row">
										<!-- Send Button -->
										<div class="align-center pt-10">
											<button type="submit" class="submit_btn btn btn-mod btn-medium btn-round" id="submit-btn">Submit</button>
										</div>
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
	<!-- End Section -->
	
	
<script type="text/javascript">  
	$(document).ready(function() {
		$(".alert-danger").hide();
		$(".alert-success").hide();
    	$('#forgot_password_form').bootstrapValidator()
			.on('success.form.bv', function(e) {
			e.preventDefault();
			$(".errormsg").hide();
			
			$(".errormsg").hide();
			// AJAX Code To Submit Form.  
				$.ajax({  
					type: "POST",
					url:  "<?php echo base_url(); ?>" + "submit_forgot_password_form",  
					data: $(this).serialize(),  
					dataType: "json", 
					cache: false,  
					success: function(data){
						console.log(data);
						$(".errormsg").hide();
						if(data.type==2){
							$(".submit_btn").removeAttr("disabled");
							$(".email_cls").show();				
							//window.location.replace("<?php echo base_url(); ?>" + "dashboard"); 
						}else if(data.type==3){	
							var output = 'Reset Password Link mail successfully sent on mail Please check it procced it !';
		        			$(".succesmsg").show().html(output);    
							setTimeout(function () {
								//window.location.replace(data.temp_redirect);
								window.location.reload(); 
							}, 3000);			
						}else if(data.type==1){
							//On success redirect.
							$(".errormsg").html(data.msg).show();
						}else {
							$(".errormsg").html(data.msg).show();  
						}
					}  
				}); // end ajax 
				return false; 
        });
    });
</script>