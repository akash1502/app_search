

<link href="<?php echo base_url('/assets/css/captcha.css') ?>" rel="stylesheet" />

<!-- Page content-->
<div class=" container-fluid container">
  <h1>Apply Organization</h1>
  <div class="form-box">

    <div class="align-right pt-10">
      <p>
        Allready memner of system? <a href="<?php echo base_url('app_login'); ?>" >Sign in here...</a>.
      </p>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data" id="org_apply_form">

      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="comp_name">First Name</label>
              <input class="form-control" id="first_name" type="text" name="first_name" placeholder="Enter your First name" autocomplete="off" value="">
              <span class="error_flag" id="first_name_err"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="comp_name">Last Name</label>
              <input class="form-control" id="last_name" type="text" name="last_name" placeholder="Enter your Last name" autocomplete="off" value="">
              <span class="error_flag" id="last_name_err"></span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="email_id">Email</label>
              <input class="form-control" id="email_id" type="email" name="email_id" placeholder="Enter your Official Email ID" autocomplete="off" value="">
              <span class="error_flag" id="email_id_err"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="mob_no">Mobile No</label>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                    <select class="form-control" id="country_code" type="text" name="country_code" autocomplete="off">
                      <option value="---">Country</option>
                    </select>
                  </div>
                  <div class="col-md-8">
                    <input class="form-control" id="mob_no" type="text" name="mob_no" autocomplete="off" placeholder="Number"  value="">
                  </div>
                </div>
              </div>
              <span class="error_flag" id="mob_no_err"></span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="email_id">Organization</label>
              <input class="form-control" id="org_name" type="text" name="org_name" placeholder="Organization Name" autocomplete="off" value="">
              <span class="error_flag" id="org_name_err"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="email_id">Website</label>
              <input class="form-control" id="org_website" type="text" name="org_website" placeholder="Organization Website URL" autocomplete="off" value="">
              <span class="error_flag" id="org_website_err"></span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label >Captcha - 1</label>
              <div class="col-md-6 captchaBackground">
                <span id="captcha_1">captcha</span>
              </div>
              <div class="col-md-6">
                <input id="captchatextBox_1" class="col-md-8" type="text" name="captchatextBox_1" >
                <button type="button" id='captcharefresh_1' class="btn btn-dark col-md-4 captcharefresh" name="captcharefresh_1"><i class="fa fa-refresh" aria-hidden="true"></i></button>
              </div>
              <span class="redText" id="captchaoutput_1"></span>
            </div>
          </div>

          <?php if (isset($ip_address) && empty($ip_address)): ?>

          <div class="col-md-6">
            <div class="form-group">
              <label >Captcha - 2</label>
              <div class="col-md-6 captchaBackground">
                <span id="captcha_2">captcha</span>
              </div>
              <div class="col-md-6">
                <input id="captchatextBox_2" class="col-md-8" type="text" name="captchatextBox_2" >
                <button type="button"  id='captcharefresh_2' class="btn btn-dark col-sd-4 captcharefresh" name="captcharefresh_2"><i class="fa fa-refresh" aria-hidden="true"></i></button>
              </div>
              <span class="redText" id="captchaoutput_2"></span>
            </div>
          </div>

        <?php endif?>

      </div>
    </div>

    <div class="form-actions col-md-12" >
      <div class="row">
        <div class="col-md-8" style="float:left;">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-7">
                <label for="ip_address">IP Address for this application is</label>

                <input class="form-control" id="ip_address" type="text" name="ip_address" value="<?php echo $ip_address; ?>" disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4" style="float:right;">
          <div class="col-md-offset">
            <a href="#" id="back" ><button type="button" class="btn btn-secondary">Back</button></a>
            <a href="<?php echo base_url('/apply_request'); ?>"><button type="button" class="btn btn-primary">Reset</button></a>
            <button type="submit" id="submit" class="btn btn-success">Save</button>
          </div>
        </div>
      </div>
    </div>

    <br><label class="error_flag" id="save_rs_err"></label>
    <br><label class="success_flag" id="save_rs_succ"></label>

  </form>
</div>
</div>


<script src="<?php echo base_url(); ?>/assets/js/app_helper.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/captcha.js"></script>
<script type="module" src="<?php echo base_url(); ?>/assets/js/org/org_applicant.js"></script>