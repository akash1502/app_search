
                <!-- Page content-->
                <div class=" container-fluid container">
                    <h1>Transfer Points Between Location</h1>
                    <div class="form-box">
                        <form enctype="multipart/form-data" id="compReg_form">
                            <div class="form-group">
                                <label for="comp_name">From Location Name</label>
                                <select class="form-control" id="from_loc_name" type="text" name="from_loc_name"  autocomplete="off">
                                  <option value="---">Select From Location Name</option>
                                  <!-- <option value="HBDOFF">Hydrabad Office</option>
                                  <option value="MUMOFF">Mumbai Office</option>
                                  <option value="BANGOFF">Banglore Office</option>
                                  <option value="PUNOFF">Pune Office</option> -->
                                </select>
                                <span class="error_flag" id="deptName_err"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Available to Transfer Points</label>
                                <input class="form-control" id="tot_trans_pt" type="text" name="tot_trans_pt" autocomplete="off" value="95">
                                <span class="error_flag" id="tot_tranpt_err"></span>
                            </div>
                            <div class="form-group">
                                <label for="comp_name">To Location Name</label>
                                <select class="form-control" id="to_loc_name" type="text" name="to_loc_name"  autocomplete="off">
                                  <option value="---">Select To Location Name</option>
                                  <!-- <option value="HBDOFF">Hydrabad Office</option>
                                  <option value="MUMOFF">Mumbai Office</option>
                                  <option value="BANGOFF">Banglore Office</option>
                                  <option value="PUNOFF">Pune Office</option> -->
                                </select>
                                <span class="error_flag" id="deptName_err"></span>
                            </div>
                            <div class="form-group">
                                <label for="email">Transfer Points</label>
                                <input class="form-control" id="trans_pt" type="text" name="trans_pt" autocomplete="off" value="">
                                <span class="error_flag" id="tranpt_err"></span>
                            </div>
                            <input type="hidden" name="text_cnt" id="text_cnt" value="1">
                            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>">
                            <div class="cmxform"></div>
                            </br><label class="error_flag" id="save_rs_err"></label>
                            </br><label class="success_flag" id="save_rs_succ"></label>
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
    <script src="<?php echo base_url(); ?>/assets/js/FormValidate.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/comp_reg.js"></script>
    <script type="text/javascript">
         function create_textFeild(){
            $("#save_rs_err").html('')
            var cnt =parseInt($("#text_cnt").val());
            var numItems = $('.all_remv').length
            if(numItems < 5 ){
                $('.cmxform').append('<div class="col-md-12 row remove_this_'+cnt+' all_remv"><div class="col-md-10"><div class="form-group"><input type="text" class="form-control" id="email_ids" name="email_ids[]"  placeholder="Enter email id" autocomplete="off"></div></div><div class="col-md-2 row"><a href="#" class="remove_this" style ="margin-top:5px;" onclick="remove_text('+cnt+')"><i class="fa fa-trash" aria-hidden="true"></i></a></div></div> ');
                $("#text_cnt").val(cnt+1);
            }else{
                $("#save_rs_err").html("Max 5 email ids are added");
            }
        }

        function remove_text(cnt){
            $("#save_rs_err").html('')
            jQuery(".remove_this_"+cnt).remove();
        }

        $('#from_loc_name').select2({
            ajax: {
              url: 'get_Location',
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

        $('#to_loc_name').select2({
            ajax: {
              url: 'get_Location',
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
