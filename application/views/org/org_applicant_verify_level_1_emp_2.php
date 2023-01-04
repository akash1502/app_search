<?php
// echo "<br>orgApplicant--><pre>";
// print_r($_SESSION);
// print_r($orgApplicant);
// echo "</pre>";

?>
<!-- Page content-->
<div class="gm_page">
  <div class="container-fluid">
    <?php if (isset($appln_id) && !empty($appln_id)): ?>
    <br>
    <h3>Applicant: <?php echo $appln_id; ?> - <label style="color:green;"><?php echo $orgApplicant['Org_Name']; ?></label></h3>
    <hr>
    <br>
    <br>

    <div class="row" style="margin-bottom: 30px;margin-top: 30px;">
      <form id="verify_Level_1" action="#" method="POST">
        <div class="table-responsive col-md-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <td>Parameter</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <tr>
                  <td>
                    <div class="col-md-4">
                      <b>Contact No:</b>
                    </div>
                    <div class="col-md-8">
                      <span><?php echo $appln_contact; ?></span>
                      <span class="error_flag" id="mob_no_err"></span>
                    </div>
                  </td>
                  <td>
                    <a href="javascript:void(0)" class="btn_verify" data-appln_id="" style='margin-right:16px;color: #fd750d;color:#13a932'>Please Call to Applicant</a>
                    <select class="form-control selc_status" id="contact_no_status" type="text" name="contact_no_status" autocomplete="off">
                      <?php if (isset($fieldStatusList) && !empty($fieldStatusList)): ?>
                      <?php foreach ($fieldStatusList as $key => $status): ?>
                        <option value="<?php echo $key; ?>"><?php echo $status; ?></option>
                      <?php endforeach?>
                    <?php endif?>
                  </select>

                </td>
              </tr>

              <tr id="show_emailTr">
                <td>
                  <div class="col-md-4">
                    <b>Email Id:</b>
                  </div>
                  <div class="col-md-8">
                    <span><?php echo $appln_email ?></span>
                    <span class="error_flag" id="email_id_err"></span>
                  </div>
                </td>
                <td>
                  <button type="button" class="btn btn-primary btn_verify" id="verify_emailId">Verify?</button>
                </td>
              </tr>
              <tr id="show_webLinkTr">
                <td>
                  <div class="col-md-4">
                    <b>Website Link:</b>
                  </div>
                  <div class="col-md-8">
                    <span><?php echo $appln_weburl; ?></span>
                  </div>
                </td>
                <td >
                  <a href="<?php echo base_url('/goWebsiteUrl?urlString=' . $appln_weburl); ?>" target="_vfrLink" class="btn btn-success btn_verify" >Go to the link</a>
                </td>
              </tr>
              <tr>
                <td>Applicant Status</td>
                <td>
                 <a href ="javascript:void(0)" class="btn btn-secondary" id="btn_blacklist">Rejected</a>
                 <button type="submit" id="btn_verified" class="btn btn-success">Verified</button>
                 <input id="appln_id" type="hidden" name="appln_id" value="<?php echo $appln_id; ?>">
               </td>
             </tr>
           </tbody>
         </table>
       </div>
     </div>
   <?php endif?>

   <div class="row">
    <div class="col-md-12">
      <label class="error_flag" id="save_rs_err">
        <?php if (isset($errorMsg) && !empty($errorMsg)) {echo $errorMsg;}?>
      </label>
      <label class="success_flag" id="save_rs_succ"></label>
    </div>
  </div>

</div>
</div>

<script src="<?php echo base_url(); ?>/assets/js/app_helper.js"></script>
<script type="module" src="<?php echo base_url(); ?>/assets/js/org/org_applican_verify_L1E2.js"></script>

<style type="text/css">
  .form-group{
    margin-top: 5px;
    margin-bottom: 10px;
  }

  .btn_verify{
    width: 70%;
    max-width: 80%;
  }
  .selc_status{
    width: 70%;
    max-width: 80%;
  }
}
</style>
</html>
