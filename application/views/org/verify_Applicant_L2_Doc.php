
                <!-- Page content-->
<?php
//echo "<pre>"; print_r($orgApplicantData);; echo "<pre>";

if(isset($orgApplicantData) && !empty($orgApplicantData)){
    $Doc1_File_name =$orgApplicantData['Doc1_File_name'];
    $Doc1_File_path =$orgApplicantData['Doc1_File_path'];
    
    $Doc2_File_name =$orgApplicantData['Doc2_File_name'];
    $Doc2_File_path =$orgApplicantData['Doc2_File_path'];
}

?>
<div class=" container-fluid ">
    <h1>Organization -<label style="color:green;"><?php echo $orgApplicantData['Org_Name']; ?></label></h1>
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>">
    <hr style="margin-top: 50px;margin-bottom: 25px;">
    <div class="row col-md-12">
        <div class="col-md-8">
            <!-- <img src="<?php echo base_url(); ?>/assets/img/test_img.png" class="doc_img" /> -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div id="news-slider" class="owl-carousel">
                            <?php if(isset($Doc1_File_name) && !empty($Doc1_File_name)){
                                $file_1_path = base_url()."".$Doc1_File_path."".$Doc1_File_name; ?>
                                <div class="post-slide">
                                    <div class="post-img main">
                                        <img src="<?php echo $file_1_path; ?>" id="map" alt="">
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if(isset($Doc2_File_name) && !empty($Doc2_File_name)){
                                $file_2_path = base_url()."".$Doc2_File_path."".$Doc2_File_name; ?>
                                <div class="post-slide">
                                  <div class="post-img">
                                    <img src="<?php echo $file_2_path; ?>" alt="">
                                  </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->

            <div id="navbar">
    <button type="button" onclick="zoomin()"> Zoom In</button>
    <button type="button" onclick="zoomout()"> Zoom Out</button>
  </div>
        </div>
        <div class="col-md-4">
            <h4>Organization Details</h4>
            <form enctype="multipart/form-data" id="saveVerifyDocuments" >
                <div class="form-group">
                    <label for="comp_id">Organization Registration Id</label>
                    <input class="form-control" id="org_regId" type="text" name="org_regId" placeholder="Enter Organization Registration Id" autocomplete="off" value="">
                    <span class="error_flag" id="org_regId_err"></span>
                </div>
                <input class="form-control" id="Appln_ID" type="hidden" name="Appln_ID" autocomplete="off" value="<?php echo $orgApplicantData['Appln_ID']; ?>">
                <div class="form-group">
                    <label for="comp_id">Pan Number</label>
                    <input class="form-control" id="pan_no" type="text" name="pan_no" placeholder="Enter Pan no" autocomplete="off" value="">
                    <span class="error_flag" id="pan_no_err"></span>
                </div>
                <div class="form-group">
                    <label for="floatingTextarea2">GST Number</label>
                    <input class="form-control" id="GST_no" type="text" name="GST_no" placeholder="Enter GST Number" autocomplete="off" value="">
                </div>

                <div class="form-group">
                    <label for="floatingTextarea2">Address line 1</label>
                    <input class="form-control" id="add_1"  type="text" name="add_1" placeholder="Enter Address line 1" autocomplete="off" value="">
                    <span class="error_flag" id="add_1_err"></span>
                </div>

                <div class="form-group">
                    <label for="floatingTextarea2">Address line 2</label>
                    <input class="form-control" id="add_2" type="text" name="add_2" placeholder="Enter Address line 2" autocomplete="off" value="">
                </div>

                <div class="form-group">
                    <label for="floatingTextarea2">Address line 3</label>
                    <input class="form-control" id="add_3" type="text" name="add_3" placeholder="Enter Address line 3" autocomplete="off" value="">
                </div>


                <div class="form-group">
                    <label for="floatingTextarea2">Area</label>
                    <input class="form-control" id="area" type="text" name="area" placeholder="Enter Area" autocomplete="off" value="">
                    <span class="error_flag" id="area_err"></span>
                </div>

                <div class="form-group">
                    <label for="floatingTextarea2">City</label>
                    <input class="form-control" id="city" type="text" name="city" placeholder="Enter City" autocomplete="off" value="">
                    <span class="error_flag" id="city_err"></span>
                </div>
                <div class="form-group">
                    <label for="floatingTextarea2">Country</label>
                    <input class="form-control" id="country" type="text" name="country" placeholder="Enter Country" autocomplete="off" value="">
                    <span class="error_flag" id="country_err"></span>
                </div>

                <label class="error_flag" id="save_rs_err"></label>
                <label class="success_flag" id="save_rs_succ"></label>
                <div class="form-actions col-md-12" >
                    <div class="row" style="float:right;">
                        <div class="col-md-offset">
                            <a href="#" id="back" class="btn btn-default">Back</a>
                            <a href="javascript:void(0)"><button type="button" class="btn btn-primary">Reset</button></a>
                            <button type="submit" id="submit_btn" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-12">
    <label class="error_flag" id="save_rs_err">
      <?php if (isset($errorMsg) && !empty($errorMsg)) {echo $errorMsg;}?>
    </label>
    <label class="success_flag" id="save_rs_succ"></label>
  </div>
</div>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/owl.carousel.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/owl-custom.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/owl.theme.default.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/salider.css'); ?>">
<script src="<?php echo base_url('assets/js/owl.carousel.js'); ?>"></script>
<script src="<?php echo base_url(); ?>/assets/js/app_helper.js"></script>
<script  type="module"  src="<?php echo base_url('/assets/js/org/verify_docs.js'); ?>"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/asvd/dragscroll/master/dragscroll.js"></script>

<script type="text/javascript">
    $(document).ready(function(e){

        $("#news-slider").owlCarousel({
            items: 1,
            singleItem: true,
            nav: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        });

        $("#bodyTog").addClass("sb-sidenav-toggled");
    })


    function zoomin() {
      var myImg = document.getElementById("map");
      var currWidth = myImg.clientWidth;
      if (currWidth == 2500) return false;
      else {
        myImg.style.width = (currWidth + 100) + "px";
      }
    }

    function zoomout() {
      var myImg = document.getElementById("map");
      var currWidth = myImg.clientWidth;
      if (currWidth == 100) return false;
      else {
        myImg.style.width = (currWidth - 100) + "px";
      }
    }

</script>

<style type="text/css">
    *body {
  margin: 0;
}

#navbar {
  overflow: hidden;
  background-color: #099;
  position: fixed;
  top: 0;
  width: 100%;
  padding-top: 3px;
  padding-bottom: 3px;
  padding-left: 20px;
}

#navbar a {
  float: left;
  display: block;
  color: #666;
  text-align: center;
  padding-right: 20px;
  text-decoration: none;
  font-size: 17px;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
  background-color: #4CAF50;
  color: white;
}

.main {
  padding: 16px;
  margin-top: 30px;
  width: 100%;
  height: 100vh;
  overflow: auto;
  cursor: grab;
  cursor: -o-grab;
  cursor: -moz-grab;
  cursor: -webkit-grab;
}

.main img {
  height: auto;
  width: 100%;
}

.button {
  width: 300px;
  height: 60px;
}
</style>

