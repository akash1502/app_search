
      <!-- Page content-->
      <div class=" container-fluid container">
        <h1>Add User</h1>
        <div class="form-box">

          <form action="#" method="POST" enctype="multipart/form-data" id="compReg_form">

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
              <input class="form-control" id="email_id" type="email" name="email_id" placeholder="Enter email id" autocomplete="off" value="">
              <span class="error_flag" id="email_id_err"></span>
            </div>

            <div class="form-group">
              <label for="mob_no">Contact No:</label>
              <input class="form-control" id="mob_no" type="text" name="mob_no" autocomplete="off" placeholder="Enter contact no."  value="">
              <span class="error_flag" id="mob_err"></span>
            </div>

            <div class="form-group">
              <label for="comp_name">Location Name:</label>
              <select class="form-control" id="loc_name" type="text" name="loc_name"  autocomplete="off">
                <option value="---">Select Location</option>
                <!-- <option value="HBDOFF">Hydrabad Office</option>
                <option value="MUMOFF">Mumbai Office</option>
                <option value="BANGOFF">Banglore Office</option>
                <option value="PUNOFF">Pune Office</option> -->
              </select>
              <span class="error_flag" id="loc_name_err"></span>
            </div>

            <div class="form-group">
              <label for="comp_name">Department Name:</label>
              <select class="form-control" id="dept_name" type="text" name="dept_name"  autocomplete="off">
                <option value="---">Select Department</option>
                <!-- <option value="HR">HR</option>
                <option value="SUPP">Support</option>
                <option value="MAINT">Maintaince</option>
                <option value="ACC">Account</option>
                <option value="PROD">Production</option> -->
              </select>
              <span class="error_flag" id="loc_name_err"></span>
            </div>


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
<!-- <script src="<?php echo base_url(); ?>/assets/js/FormValidate.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/comp_reg.js"></script> -->
<script type="text/javascript">
    $('#loc_name').select2({
      ajax: {
        url: '<?php echo base_url(); ?>'+'get_Location',
        dataType: 'json',
        data: function (params) {

            var queryParameters = {
                searchText: params.term
            }
            return queryParameters;
        },
        processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                  //console.log(item);
                    return {
                        text: item.text,
                        id: item.id
                    }
                })
            };
        }
      }
    });

    $('#dept_name').select2({
      ajax: {
        url: '<?php echo base_url(); ?>'+'get_DepartmentList',
        dataType: 'json',
        data: function (params) {

            var queryParameters = {
                searchText: params.term
            }
            return queryParameters;
        },
        processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                  //console.log(item);
                    return {
                        text: item.text,
                        id: item.id
                    }
                })
            };
        }
      }
    });
</script>
</html>
