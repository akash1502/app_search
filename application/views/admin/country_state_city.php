
        <div class=" container-fluid container">
            
            <div class="form-box">
                <center>
                    <img src="<?php echo base_url(); ?>/assets/img/pngwing.com" style="width:50px;height:auto;" />
                </center>
                
                <div class="frmDronpDown">
                    <div class="row">
                        <label>Country:</label><br />
                        <select name="country" id="country-list" class="demoInputBox" onChange="getState(this.value);">
                            <option value disabled selected>Select Country</option>
                                <?php
                                foreach ($countryResult as $country) { ?>
                                    <option value="<?php echo $country["id"]; ?>"><?php echo $country["country_name"]; ?></option>
                                <?php
                                } ?>
                        </select>
                    </div>
                    <div class="row">
                        <label>State:</label><br /> 
                        <select name="state" id="state-list" class="demoInputBox" onChange="getCity(this.value);">
                            <option value="">Select State</option>
                        </select>
                    </div>
                    <div class="row">
                        <label>City:</label><br />
                        <select name="city" id="city-list" class="demoInputBox">
                            <option>Select City</option>
                        </select>
                    </div>
                </div>
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
        function getState(val) {
            $.ajax({
                type: "POST",
                url: "./ajax/get-state-ep.php",
                data:'country_id='+val,
                beforeSend: function() {
                    $("#state-list").addClass("loader");
                },
                success: function(data){
                    $("#state-list").html(data);
                    $('#city-list').find('option[value]').remove();
                    $("#state-list").removeClass("loader");
                }
            });
        }
    </script>
</html>
