
      <!-- Page content-->
      <div class=" container-fluid container">
        <h1>Add Department</h1>
        <div class="form-box">

          <form action="#" method="POST" enctype="multipart/form-data" id="compReg_form">


            <div class="form-group">
              <label for="comp_name">Location Name:</label>
              <select class="js-data-example-ajax form-control" id="mySelect2"></select>
            </div>
            <a href="<?php echo base_url(); ?>add_new_department" style="float: right;">Create new department? </a>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexDept_1" name="flexDept_1">
                <label class="form-check-label" for="flexDept_1">
                  HR
                </label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexDept_2" name="flexDept_2">
                <label class="form-check-label" for="flexDept_2">
                  Support
                </label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexDept_3" name="flexDept_3">
                <label class="form-check-label" for="flexDept_3">
                  Account
                </label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexDept_4" name="flexDept_4">
                <label class="form-check-label" for="flexDept_4">
                  Production
                </label>
              </div>
            </div>

            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexDept_5" name="flexDept_5">
                <label class="form-check-label" for="flexDept_5">
                  Maintaince
                </label>
              </div>
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


<!-- <script src="<?php echo base_url(); ?>/assets/js/FormValidate.js"></script>
  <script src="<?php echo base_url(); ?>/assets/js/comp_reg.js"></script> -->
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
  <script type="text/javascript">
    $(document).ready(function() {


    $('#mySelect2').select2({
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



    });
  </script>
  </html>
