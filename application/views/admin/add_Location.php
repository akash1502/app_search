<div class=" container-fluid container">
    <h1>Add Location</h1>
    <div class="form-box">

      <form action="#" method="POST" enctype="multipart/form-data" id="add_location_from">

        <div id="location_admin_details">

          <p><h4>Location admin info</h4></p><hr>

          <div class="form-group">
            <label for="comp_name">First Name:</label>
            <input class="form-control" id="first_name" type="text" name="first_name" placeholder="Enter first name" autocomplete="off" value="">
            <span class="error_flag" id="first_name_err"></span>
          </div>

          <div class="form-group">
            <label for="comp_name">Last Name:</label>
            <input class="form-control" id="last_name" type="text" name="last_name" placeholder="Enter last name" autocomplete="off" value="">
            <span class="error_flag" id="last_name_err"></span>
          </div>

          <div class="form-group">
            <label for="email_id">Email id:</label>
            <input class="form-control" id="email_id" type="text" name="email_id" placeholder="Enter email id" autocomplete="off" value="">
            <span class="error_flag" id="email_id_err"></span>
          </div>

          <div class="form-group">
            <label for="mob_no">Contact No:</label>
            <input class="form-control" id="mob_no" type="text" name="mob_no" autocomplete="off" placeholder="Enter contact no."  value="">
            <span class="error_flag" id="mob_err"></span>
          </div>

          <div class="form-group">
            <button class="btn btn-primary" id="admin_next_btn">Next</button>
          </div>

        </div>

        <div id="location_details">
          <p><h4>Location info</h4></p><hr>
          <div class="form-group">
            <label for="comp_name">Location Name:</label>
            <input class="form-control" id="loc_name" type="text" name="loc_name" placeholder="Enter Location name" autocomplete="off" value="">
            <span class="error_flag" id="loc_name_err"></span>
          </div>

          <div class="form-group">
            <label for="mob_no">Address Line1:</label>
            <input class="form-control" id="address_line_1" type="text" name="address_line_1" autocomplete="off"  value="">
          </div>

          <div class="form-group">
            <label for="mob_no">Address Line2:</label>
            <input class="form-control" id="address_line_2" type="text" name="address_line_2" autocomplete="off"  value="">
          </div>

          <div class="form-group">
            <label for="mob_no">Country:</label>
            <select class="form-control" id="country_id" type="text" name="country_id" autocomplete="off">
              <option value="---">Select Country</option>
            </select>
            <!-- <select class="form-control" id="country_id" type="text" name="country_id"  autocomplete="off">
              <option value="---">Select Country</option>
              <option value="IND">India</option>
              <option value="USA">USA</option>
              <option value="BHU">BHUTAN</option>
              <option value="SHR">SHRI LANKA</option>
            </select> -->
            <span class="error_flag" id="country_id_err"></span>
          </div>

          <div class="form-group">
            <label for="mob_no">State:</label>
            <select class="form-control" id="state_id" type="text" name="state_id" autocomplete="off">
              <option value="---">Select State</option>
              <!-- <option value="MH">MAHARASHATRA</option>
              <option value="UP">UTTAR PRADESH</option>
              <option value="GU">GUJARAT</option>
              <option value="JK">J&K</option> -->
            </select>
            <span class="error_flag" id="state_id_err"></span>
          </div>

          <div class="form-group">
            <label for="mob_no">City:</label>
            <select class="form-control" id="city_id" type="text" name="city_id" autocomplete="off">
              <option value="---">Select City</option>
              <!-- <option value="MUM">MUMBAI</option>
              <option value="PUN">PUNE</option>
              <option value="NAS">NASHIK</option>
              <option value="NAG">NAGPUR</option> -->
            </select>
            <span class="error_flag" id="city_id_err"></span>
          </div>

          <div class="form-group">
            <label for="mob_no">Pin code:</label>
            <input class="form-control" id="pin_code" type="text" name="pin_code" autocomplete="off"  value="">
          </div>
          <div class="form-group">
            <button class="btn btn-secondary" id="admin_back_btn">Back</button>
            <button type="submit" class="btn btn-primary" id="save_location_from">Save</button>
          </div>
        </div>



        <div class="cmxform"></div>

        <br><label class="error_flag" id="save_rs_err"></label>
        <br><label class="success_flag" id="save_rs_succ"></label>

      </form>
    </div>
  </div>
  <style type="text/css">
  .form-group {
    padding-top: 10px;
    padding-bottom: 10px;

  }
  body {
    background: #f7f7f7;
  }

  .form-box {
    max-width: 800px;
    margin: auto;
    padding: 50px;
    background: #ffffff;
    border: 10px solid #f2f2f2;
  }

  h1, p {
    text-align: center;
  }

  input, textarea {
    width: 100%;
  }
  .error_flag{
    color: red;
    font-size: 13px;
  }
  .success_flag{
    color: green;
    font-size: 13px;
  }
</style>
<script src="<?php echo base_url(); ?>/assets/js/app_helper.js"></script>
<script type="module" src="<?php echo base_url(); ?>/assets/js/AdminActivity/add_location.js"></script>
