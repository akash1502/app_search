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
    <div class="col-md-8 col-sm-12">
      <div class="login-form">
        <form class="form contact-form" id="select_role_form" action='lic_login' method="post" enctype="multipart/form-data">
          <!-- <input type='hidden' name='token' id='token' value=""> -->


          <div class="form-group">

            <?php
$stringMsg = "Hello User <br> Please select the Role to get access..";
echo $stringMsg;
?>
            <span class="error_flag" id="username_err"></span>
          </div>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Sr no</th>
                <th scope="col">Organization Name</th>
                <th scope="col">Roles</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($session_users) && !empty($session_users)) {
	$cnt = 1;
	foreach ($session_users as $key => $sess_user) {
		//var_dump($sess_user);die;

		?>
                <tr>
                  <th scope="row"><?php echo $cnt++; ?></th>
                  <td><?php echo $sess_user['orgname']; ?></td>
                  <?php ?>
                  <td><?php echo $sess_user['rolename']; ?></td>
                  <td>
                    <div class='myDiv'>
                      <input class = "btn btn-primary selected_role" type="button" id="selected_role" name="selected_role" data-Select_role ="<?php echo $sess_user['keyid'] ?>" value="Enter">
                    </div>
                  </td>
                </tr>
                <?php
}
} else {
	echo "<tr><td colspan='5'>$errorMsg</td></tr>";
}?>
         </tbody>
       </table>
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