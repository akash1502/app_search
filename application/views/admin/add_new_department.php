
      <!-- Page content-->
      <div class=" container-fluid container">
        <h1>Add New Department Name</h1>
        <div class="form-box">

          <form action="#" method="POST" enctype="multipart/form-data" id="compReg_form">


            <div class="form-group">
              <label for="nw_dep_name">Department Name</label>
              <input class="form-control" id="nw_dep_name" type="text" name="Name" placeholder="Enter new department name" autocomplete="off" value="">
              <span class="error_flag" id="compName_err"></span>
            </div>

              <table class="table table-bordered tbl">
                <thead>
                  <tr>
                    <th scope="col">Sir no</th>
                    <th scope="col">Department</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>HR</td>
                    <td><a href="" style='color: #fd750d;'>Delete</a></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Support</td>
                    <td><a href="" style='color: #fd750d;'>Delete</a></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Account</td>
                    <td><a href="" style='color: #fd750d;'>Delete</a></td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Production</td>
                    <td><a href="" style='color: #fd750d;'>Delete</a></td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Maintaince</td>
                    <td><a href="" style='color: #fd750d;'>Delete</a></td>
                  </tr>
                </tbody>
              </table>
            <div class="cmxform"></div>

            <br><label class="error_flag" id="save_rs_err"></label>
            <br><label class="success_flag" id="save_rs_succ"></label>
            <div class="form-actions col-md-12" >
              <div class="row" style="float:right;">
                <div class="col-md-offset">
                  <a href="#" id="back" class="btn btn-default">Back</a>
                  <a href="<?php echo base_url('cost_assgn_by_countery'); ?>"><button type="button" class="btn btn-primary">Reset</button></a>
                  <button type="submit" id="submit_btn" class="btn btn-success">Save</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>


<!-- <script src="<?php echo base_url(); ?>/assets/js/FormValidate.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/comp_reg.js"></script> -->
   <style type="text/css">
      .tbl{
        margin-top: 20px;
      }

      .form-group {
          padding-top: 10px;
          padding-bottom: 10px;

      }
      body {
        background: #f7f7f7;
      }

      .form-box {
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
  </html>

