
                <!-- Page content-->
                <div class=" container-fluid ">
                    <h1>Organization Details</h1>
                    <div class="row">
                        <div class="table-responsive col-md-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr style="background:#e1e4e7;">
                                        <th style="text-align:center">Organization Name</th>
                                        <th style="text-align:center">Email Id</th>
                                        <th style="text-align:center">Mobile Number</th>
                                        <th style="text-align:center">Website</th>
                                    </tr>
                                </tbody>
                                <tr>
                                    <td style="text-align:center">Infosys</td>
                                    <td style="text-align:center">hr@infosys.in</td>
                                    <td style="text-align:center">9876543210</td>
                                    <td style="text-align:center"><a href="https://www.infosys.com/" target="_blank">https://www.infosys.com</a></td>

                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr style="margin-top: 15px;margin-bottom: 25px;">
                    <div class="row col-md-12">
                        <div class="col-md-8">
                            <!-- <img src="<?php echo base_url(); ?>/assets/img/test_img.png" class="doc_img" /> -->
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="news-slider" class="owl-carousel">
                                            <div class="post-slide">
                                                <div class="post-img">
                                                    <img src="<?php echo base_url(); ?>/assets/img/test_img35.jpg" alt="">
                                                    <!-- <img src="https://images.unsplash.com/photo-1596265371388-43edbaadab94?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=301&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=501" alt="" -->

                                                </div>
                                            </div>

                                            <div class="post-slide">
                                              <div class="post-img">
                                                <img src="https://images.unsplash.com/photo-1533227268428-f9ed0900fb3b?crop=entropy&cs=tinysrgb&fit=crop&fm=jpg&h=303&ixid=eyJhcHBfaWQiOjF9&ixlib=rb-1.2.1&q=80&w=503" alt="">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--  -->

                        </div>
                        <div class="col-md-4">
                            <h4>Organization Details</h4>
                            <form>
                                <div class="form-group">
                                    <label for="comp_id">Organization Registration Id</label>
                                    <input class="form-control" id="comp_id" type="text" name="Name" placeholder="Enter organization id" autocomplete="off" value="">
                                </div>
                                <div class="form-group">
                                    <label for="comp_id">Pan Number</label>
                                    <input class="form-control" id="comp_id" type="text" name="pan_no" placeholder="Enter Pan no" autocomplete="off" value="">
                                </div>
                                <div class="form-group">
                                    <label for="floatingTextarea2">GST Number</label>
                                    <input class="form-control" id="comp_id" type="text" name="Name" placeholder="Enter GST Number" autocomplete="off" value="">
                                </div>

                                <div class="form-group">
                                    <label for="floatingTextarea2">Address line 1</label>
                                    <input class="form-control" id="comp_id" type="text" name="Name" placeholder="Enter Address line 1" autocomplete="off" value="">
                                </div>

                                <div class="form-group">
                                    <label for="floatingTextarea2">Address line 2</label>
                                    <input class="form-control" id="comp_id" type="text" name="Name" placeholder="Enter Address line 2" autocomplete="off" value="">
                                </div>

                                <div class="form-group">
                                    <label for="floatingTextarea2">Address line 3</label>
                                    <input class="form-control" id="comp_id" type="text" name="Name" placeholder="Enter Address line 3" autocomplete="off" value="">
                                </div>


                                <div class="form-group">
                                    <label for="floatingTextarea2">Area</label>
                                    <input class="form-control" id="comp_id" type="text" name="Name" placeholder="Enter Area" autocomplete="off" value="">
                                </div>

                                <div class="form-group">
                                    <label for="floatingTextarea2">City</label>
                                    <input class="form-control" id="comp_id" type="text" name="Name" placeholder="Enter City" autocomplete="off" value="">
                                </div>
                                <div class="form-group">
                                    <label for="floatingTextarea2">Country</label>
                                    <input class="form-control" id="comp_id" type="text" name="Name" placeholder="Enter Country" autocomplete="off" value="">
                                </div>

                                <div class="form-group">
                                    <label for="floatingTextarea2">Country Mobile No Code</label>
                                    <input class="form-control" id="comp_id" type="text" name="Name" placeholder="e.g India( +91 )" autocomplete="off" value="">
                                </div>

                                <div class="form-actions col-md-12" >
                                    <div class="row" style="float:right;">
                                        <div class="col-md-offset">
                                            <a href="#" id="back" class="btn btn-default">Back</a>
                                            <a href="<?php echo base_url(); ?>"><button type="button" class="btn btn-primary">Reset</button></a>
                                            <button type="submit" id="submit_btn" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/owl-custom.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/owl.theme.default.min.css'); ?>">
    <script src="<?php echo base_url('assets/js/owl.carousel.js'); ?>"></script>
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


    </script>
    <style type="text/css">
        .form-group{
            margin-top: 5px;
            margin-bottom: 10px;
        }

        @media only screen and (min-width: 768px) {
            .doc_img {
                width:98%;
                height:900px;
            }
        }
        @media only screen and (min-width: 200px) and (max-width: 767px)  {
            .doc_img {
                width:98%;
                height:900px;
            }
        }

        .owl-carousel .owl-prev {
            right: unset !important;
        }

        /*.owl-item.active {
            width: 900.653px !important;
        }*/
        .owl-carousel .owl-stage {
            padding-left: 0 !important;
        }

        #news-slider{
            margin-top: 80px;
        }
        .post-slide{
            background: #fff;
            margin: 20px 15px 20px;
            border-radius: 15px;
            padding-top: 1px;
            box-shadow: 0px 14px 22px -9px #bbcbd8;
        }
        .post-slide .post-img{
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            margin: -12px 15px 8px 15px;
            margin-left: -10px;
        }
        .post-slide .post-img img{
            width: 100%;
            height: auto;
            transform: scale(1,1);
            transition:transform 0.2s linear;
        }
        .post-slide:hover .post-img img{
            transform: scale(1.1,1.1);
        }
        .post-slide .over-layer{
            width:100%;
            height:100%;
            position: absolute;
            top:0;
            left:0;
            opacity:0;
            background: linear-gradient(-45deg, rgba(6,190,244,0.75) 0%, rgba(45,112,253,0.6) 100%);
            transition:all 0.50s linear;
        }
        .post-slide:hover .over-layer{
            opacity:1;
            text-decoration:none;
        }
        .post-slide .over-layer i{
            position: relative;
            top:45%;
            text-align:center;
            display: block;
            color:#fff;
            font-size:25px;
        }

        .owl-controls .owl-buttons{
            text-align:center;
            margin-top:20px;
        }
        .owl-controls .owl-buttons .owl-prev{
            background: #fff;
            position: absolute;
            top:-13%;
            left:15px;
            padding: 0 18px 0 15px;
            border-radius: 50px;
            box-shadow: 3px 14px 25px -10px #92b4d0;
            transition: background 0.5s ease 0s;
        }
        .owl-controls .owl-buttons .owl-next{
            background: #fff;
            position: absolute;
            top:-13%;
            right: 15px;
            padding: 0 15px 0 18px;
            border-radius: 50px;
            box-shadow: -3px 14px 25px -10px #92b4d0;
            transition: background 0.5s ease 0s;
        }
        .owl-controls .owl-buttons .owl-prev:after,
        .owl-controls .owl-buttons .owl-next:after{
            content:"\f104";
            font-family: FontAwesome;
            color: #333;
            font-size:30px;
        }
        .owl-controls .owl-buttons .owl-next:after{
            content:"\f105";
        }
        @media only screen and (max-width:1280px) {
            .post-slide .post-content{
                padding: 0px 15px 25px 15px;
            }
        }
    </style>
</html>
