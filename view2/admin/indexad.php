
<!DOCTYPE HTML>

<html>

    <head>

        <title>Index Ad</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 

              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <!-- Bootstrap Core CSS -->

        <link href="<?php echo base_url(); ?>assets2/css/bootstrap.min.css" rel='stylesheet' type='text/css' />

        <!-- Custom CSS -->

        <link href="<?php echo base_url(); ?>assets2/css/style.css" rel='stylesheet' type='text/css' />

        <!-- Graph CSS -->

        <link href="<?php echo base_url(); ?>assets2/css/font-awesome.css" rel="stylesheet"> 

        <!-- jQuery -->

        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>

        <!-- lined-icons -->

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets2/css/icon-font.min.css" type='text/css' />

        <!-- //lined-icons -->

        <script src="<?php echo base_url(); ?>assets2/js/jquery-1.10.2.min.js"></script>

        <!--clock init-->

        <script src="<?php echo base_url(); ?>assets2/js/css3clock.js"></script>

        <!--Easy Pie Chart-->

        <!--skycons-icons-->

        <script src="<?php echo base_url(); ?>assets2/js/skycons.js"></script>

        <!--//skycons-icons-->

        <!-- text editor for textarea start -->

		<!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	  	
	  	<script type="text/javascript">
	  			
	  			tinymce.init({
				  selector: 'textarea',
				  plugins: 'link code'
				});

	  	</script>

	  	<style type="text/css">
            .mce-branding {
                display: none!important;
            }
            .mce-notification {
                display: none;
            }

        </style> -->
	<!-- text editor for textarea end -->

        <script type="text/javascript">

            var expanded = false;



            function showCheckboxes() {

                var checkboxes = document.getElementById("checkboxes");

                if (!expanded) {

                    checkboxes.style.display = "block";

                    expanded = true;

                } else {

                    checkboxes.style.display = "none";

                    expanded = false;

                }

            }

        </script>

        <style type="text/css">

            .multiselect {

                width: 200px;

            }



            .selectBox {

                position: relative;

            }



            .selectBox select {

                width: 100%;

                font-weight: bold;

            }



            .overSelect {

                position: absolute;

                left: 0;

                right: 0;

                top: 0;

                bottom: 0;

            }



            #checkboxes {

                display: none;

                border: 1px #dadada solid;

            }



            #checkboxes label {

                display: block;

            }



            #checkboxes label:hover {

                background-color: #1e90ff;

            }

        </style>

    </head> 

    <body>	
    			<div class="container">

                    <!--/forms-->

                    <div class="forms-main">

                        <!--/set-2-->

                        <div class="set-1">

                            <div class="graph-2 general">

                               <div class="row">
                                    <h3 class="inner-tittle two">Post Free Ad  </h3>
                                    <div style="float: right;">
                                        <a href="<?php echo site_url("admin/indexadupdate"); ?>"><button type="button" class="btn btn-info">List</button></a>
                                    </div>
                                </div>

                                <div class="grid-1">

                                    <div class="form-body">

                                        <form class="form-horizontal" method="post" action="<?php base_url("admin/indexad") ?>" enctype="multipart/form-data">

                                            <div align="center" class="row">

                                                <div class="col-lg-4">Selected Category</div>

                                                <div class="col-lg-4">Education & Training / Index Ad</div>

                                                <div class="col-lg-4"><a href="<?php echo site_url("admin/home"); ?>">Choose Another Category</a></div>

                                            </div><br>

                                            <!--   <?php echo validation_errors(); ?> -->



                                            <div align="" class="row form-group">

                                                <div style="float: left;" class="col-lg-4">Title for your Ad*</div>

                                                <div class="col-lg-4">

                                                    <textarea type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>"></textarea>

                                                </div>

                                                <div class="col-lg-4">

                                                    <span style="color: red;"><?php echo form_error('title'); ?></span>

                                                </div>

                                            </div>

                                         

                                            <div align="" class="row form-group">

                                                <div style="float: left;" class="col-lg-4">Photo for your Ad for Header</div>

                                                <div class="col-lg-4">

                                                    <input type="file" name="image1" accept="image/*">

                                                </div>

                                            </div>

                                            <div align="" class="row form-group">

                                                <div style="float: left;" class="col-lg-4">Photo for your Ad for Body</div>

                                                <div class="col-lg-4">

                                                    <input type="file" name="image2" accept="image/*">

                                                </div>

                                            </div>


                                            <div align="" class="row form-group">

                                                <div class="col-lg-8" style="float: center">

                                                    <input type="submit" name="indexad">

                                                </div>



                                            </div>

                                        </form>

                                    </div>



                                </div>

                            </div>

                        </div>

                        <!--//set-2-->
</div>
                    </div>

                    <!--//outer-wp-->

                    <!--footer section start-->

                    <footer>

                        <p>&copy 2016 Augment . All Rights Reserved | Design by <a href="https://risingwings.in/" target="_blank"></a>RisingWings</p>

                    </footer>

                    <!--footer section end-->


        

            

        <script>

            var toggle = true;



            $(".sidebar-icon").click(function () {

                if (toggle)

                {

                    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");

                    $("#menu span").css({"position": "absolute"});

                } else

                {

                    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");

                    setTimeout(function () {

                        $("#menu span").css({"position": "relative"});

                    }, 400);

                }



                toggle = !toggle;

            });

        </script>

        <!--js -->

        <script src="<?php echo base_url(); ?>assets2/js/jquery.nicescroll.js"></script>

        <script src="<?php echo base_url(); ?>assets2/js/scripts.js"></script>



        <!-- Bootstrap Core JavaScript -->

        <script src="<?php echo base_url(); ?>assets2/js/bootstrap.min.js"></script>

    </body>

</html>