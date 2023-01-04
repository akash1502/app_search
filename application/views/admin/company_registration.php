

            <!-- Sidebar-->
            <?php #echo view("/theme/side_bar"); ?>
            <!-- Page content wrapper-->
            
                <!-- Top navigation-->
                <?php #echo view("/theme/top_navigation"); ?>
                <!-- Page content-->
                <div class=" container-fluid container">

                    <div class="form-box">
                        <center>
                            <img src="<?php echo base_url(); ?>assets/img/pngwing.com" style="width:50px;height:auto;" />
                        </center>
                        <h1>Company Registration</h1>
                        <form enctype="multipart/form-data" id="compReg_form">
                            <div class="form-group">
                                <label for="comp_name">Company Name</label>
                                <input class="form-control" id="comp_name" type="text" name="Name" placeholder="Enter company name" autocomplete="off" value="">
                                <span class="error_flag" id="compName_err"></span>
                            </div>
                            <div class="form-group">
                                <label for="comp_reg_doc">Upload company registered document</label>
                                <input type="file" class="form-control" name="comp_reg_doc" id="comp_reg_doc" >
                            </div>
                            <div class="form-group">
                                <label for="comp_gst_doc">Upload company GST document( Optional )</label>
                                <input type="file" class="form-control" name="company_gst_id" id ="comp_gst_doc">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" type="email" name="Email" autocomplete="off" value="" placeholder="Enter Company Email">
                                <span class="error_flag" id="email_err"></span>
                            </div>
                            <div class="form-group">
                                <label for="mob_no">Mobile Number</label>
                                <input class="form-control" id="mob_no" type="mob_no" name="mob_no" autocomplete="off" value="" placeholder="Enter Mobile Number">
                                <span class="error_flag" id="mob_err"></span>
                            </div>
                            <div class="form-group">
                                <label for="comp_website">Company Website ( Optional )</label>
                                <input class="form-control" id="comp_website" type="comp_website" name="comp_website" autocomplete="off" value="" placeholder="Enter Company Website">
                                <span class="error_flag" id="mob_err"></span>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-10">
                                   <div class="form-group all_remv">
                                        <label for="email_ids">Company domain name email ids( Max=5 )</label>
                                        <input type="text" class="form-control" id="email_ids" name="email_ids[]"  placeholder="Enter domain email id e.g @kundali.com" autocomplete="off" value="">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary" onclick="create_textFeild()" style="margin-top: 30px;">Add</button>
                                </div>
                                 <span class="error_flag" id="domEmail_err"></span>
                            </div>
                            <input type="hidden" name="text_cnt" id="text_cnt" value="1">
                            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>">
                            <div class="cmxform"></div>
                            </br><label class="error_flag" id="save_rs_err"></label>
                            </br><label class="success_flag" id="save_rs_succ"></label>
                            <input class="btn btn-primary" type="submit" value="Submit"  />
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
                $('.cmxform').append('<div class="col-md-12 row remove_this_'+cnt+' all_remv"><div class="col-md-10"><div class="form-group"><input type="text" class="form-control" id="email_ids" name="email_ids[]"  placeholder="Enter domain email id e.g @kundali.com" autocomplete="off"></div></div><div class="col-md-2 row"><a href="#" class="remove_this" style ="margin-top:5px;" onclick="remove_text('+cnt+')"><i class="fa fa-trash" aria-hidden="true"></i></a></div></div> ');
                $("#text_cnt").val(cnt+1);
            }else{
                $("#save_rs_err").html("Max 5 email ids are added");
            }
        }

        function remove_text(cnt){
            $("#save_rs_err").html('')
            jQuery(".remove_this_"+cnt).remove();
        }
    </script>
</html>
