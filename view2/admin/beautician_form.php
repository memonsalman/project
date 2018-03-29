
<!DOCTYPE HTML>

<html>

    <head>

        <title>Beautician Form</title>

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

        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script type="text/javascript">

            tinymce.init({
                selector: 'textarea',
                plugins: 'link code'
            });

        </script>

        <!-- text editor for textarea end -->
        <style type="text/css">
            .mce-branding {
                display: none!important;
            }
            .mce-notification {
                display: none;
            }

        </style>


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
                                            <a href="<?php echo site_url("admin/beauticianupdate"); ?>"><button type="button" class="btn btn-info">List</button></a>
                                        </div>
                                    </div>

                                    <div class="grid-1">

                                        <div class="form-body">

                                            <form method="post" class="form-horizontal" action="<?php base_url("admin/beautician") ?>" enctype="multipart/form-data" >



                                                <div align="center" class="row">

                                                    <div class="col-lg-4">Selected Category</div>

                                                    <div class="col-lg-4">Education & Training / Beautician</div>

                                                    <div class="col-lg-4"><a href="<?php echo site_url("admin/home"); ?>">Choose Another Category</a></div>

                                                </div><br>

                                                <!-- <ul>
                                 
                                                <?php foreach ($upload_data as $item => $value): ?>
                                     
                                                                     <li><?php echo $item; ?>: <?php echo $value; ?></li>
                                     
                                                <?php endforeach; ?>
                                 
                                                                 </ul> -->

                                                <div align="" class="row form-group">

                                                    <div style="float: left;" class="col-lg-4">Name </div>

                                                    <div class="col-lg-4">

                                                        <input type="text" class="form-control" name="name" value="<?php echo set_value('name'); ?><?php echo @$ed[0]->name; ?>">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('name'); ?></span>

                                                    </div>

                                                </div>


                                                <!-- Sub-Name Start -->

                                                <div align="" class="row form-group">

                                                    <div style="float: left;" class="col-lg-4">Sub-Name </div>

                                                    <div class="col-lg-4">

                                                        <input type="text" class="form-control" name="subname" value="<?php echo set_value('subname'); ?><?php echo @$ed[0]->subname; ?>">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('subname'); ?></span>

                                                    </div>

                                                </div>

                                                <!-- Sub-Name End -->

                                                <!-- Area Start -->

                                                <div align="" class="row form-group">

                                                    <div style="float: left;" class="col-lg-4">Area </div>

                                                    <div class="col-lg-4">

                                                        <input type="text" class="form-control" name="area" value="<?php echo set_value('area'); ?><?php echo @$ed[0]->area; ?>">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('area'); ?></span>

                                                    </div>

                                                </div>

                                                <!-- Area End -->

                                                <!-- Certification Start -->

                                                <div align="" class="row form-group">

                                                    <div style="float: left;" class="col-lg-4">Certification </div>

                                                    <div class="col-lg-4">
                                                        <textarea class="form-control" name="certi" value="<?php echo set_value('certi'); ?>"><?php echo @$ed[0]->certi; ?></textarea>
                                <!-- <input type="text" class="form-control" name="certi" value="<?php echo set_value('certi'); ?>"> -->

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('certi'); ?></span>

                                                    </div>

                                                </div>

                                                <!-- Certification End -->


                                                <div align="" class="row form-group">

                                                    <div style="float: left;" class="col-lg-4">Photos for your ad 1</div>

                                                    <div class="col-lg-4">

                                                        <input type="file" name="photo1" accept="image/*">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo $this->session->flashdata('error_1'); ?></span>

                                                    </div>

                                                </div>



                                                <div align="" class="row form-group">

                                                    <div style="float: left;" class="col-lg-4">Photos for your ad 2</div>

                                                    <div class="col-lg-4">

                                                        <input type="file" name="photo2" accept="image/*">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo $this->session->flashdata('error_2'); ?></span>

                                                    </div>

                                                </div>



                                                <div align="" class="row form-group">

                                                    <div style="float: left;" class="col-lg-4">Photos for your ad 3</div>

                                                    <div class="col-lg-4">

                                                        <input type="file" name="photo3" accept="image/*">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo $this->session->flashdata('error_3'); ?></span>

                                                    </div>

                                                </div>



                                                <div align="" class="row form-group">

                                                    <div style="float: left;" class="col-lg-4">Photos for your ad 4</div>

                                                    <div class="col-lg-4">

                                                        <input type="file" name="photo4" accept="image/*">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo $this->session->flashdata('error_4'); ?></span>

                                                    </div>

                                                </div>



                                                <div align="" class="row form-group">

                                                    <div style="float: left;" class="col-lg-4">Photos for your ad 5</div>

                                                    <div class="col-lg-4">

                                                        <input type="file" name="photo5" accept="image/*">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo $this->session->flashdata('error_5'); ?></span>

                                                    </div>

                                                </div>



                                                <div align="" class="row form-group">

                                                    <div style="float: left;" class="col-lg-4">PDF for your ad</div>

                                                    <div class="col-lg-4">

                                                        <input type="file" name="pdf" >

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo $this->session->flashdata('error_6'); ?></span>

                                                    </div>

                                                </div>



                                                <!-- <div align="" class="row form-group">
                              
                                                  <div class="col-lg-4">Prospectus</div>
                              
                                                  <div class="col-lg-4">
                              
                                                       <input type="file" name="photo2" >
                              
                                                  </div>
                              
                                                  
                              
                                                </div> -->






                                                <!-- working day's Start -->

                                                <div align="" class="row form-group">

                                                    <div class="col-lg-4">Working Day's</div>

                                                    <div class="col-lg-4">

                                                        <input type="text" class="form-control" name="day"  value="<?php echo set_value('day'); ?><?php echo @$ed[0]->day; ?>">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('day'); ?></span>

                                                    </div>

                                                </div>

                                                <!-- working day's End -->




                                                <!-- working hour's Start -->

                                                <div align="" class="row form-group">

                                                    <div class="col-lg-4">Working Hours's</div>

                                                    <div class="col-lg-4">

                                                        <input type="text" class="form-control" name="hour"  value="<?php echo set_value('hour'); ?><?php echo @$ed[0]->hour; ?>">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('hour'); ?></span>

                                                    </div>

                                                </div>

                                                <!-- working hour's End -->

                                                <!-- closing day's Start -->

                                                <div align="" class="row form-group">

                                                    <div class="col-lg-4">Closing Day</div>

                                                    <div class="col-lg-4">

                                                        <input type="text" class="form-control" name="closing"  value="<?php echo set_value('closing'); ?><?php echo @$ed[0]->closing; ?>">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('closing'); ?></span>

                                                    </div>

                                                </div>

                                                <!-- closing day's End -->

                                                <div align="" class="row form-group">

                                                    <div class="col-lg-4">Fees</div>

                                                    <div class="col-lg-4">
                                                        <textarea class="form-control" name="fees" value="<?php echo set_value('fees'); ?>"><?php echo @$ed[0]->fees; ?></textarea>
                                 <!-- <input type="text" class="form-control" name="fees" value="<?php echo set_value('fees'); ?>"> -->

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('fees'); ?></span>

                                                    </div>

                                                </div>





                                                <div align="" class="row form-group">

                                                    <div class="col-lg-4">Address</div>

                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="addr" value="<?php echo set_value('addr'); ?><?php echo @$ed[0]->addr; ?>">
                                <!-- <input type="text" class="form-control" name="addr" value="<?php echo set_value('addr'); ?>"> -->

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('addr'); ?></span>

                                                    </div>

                                                </div>

                                                <!-- Longitude Start -->

                                                <div align="" class="row form-group">

                                                    <div class="col-lg-4">Longitude</div>

                                                    <div class="col-lg-4">

                                                        <input type="text" class="form-control" name="long" value="<?php echo set_value('long'); ?><?php echo @$ed[0]->long; ?>">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('long'); ?></span>

                                                    </div>

                                                </div>

                                                <!-- Longitude End -->


                                                <!-- Latitude Start -->

                                                <div align="" class="row form-group">

                                                    <div class="col-lg-4">Latitude</div>

                                                    <div class="col-lg-4">

                                                        <input type="text" class="form-control" name="lati" value="<?php echo set_value('lati'); ?><?php echo @$ed[0]->lati; ?>">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('lati'); ?></span>

                                                    </div>

                                                </div>

                                                <!-- Latitude End -->

                                                <div align="" class="row form-group">

                                                    <div class="col-lg-4">Email Id</div>

                                                    <div class="col-lg-4">

                                                        <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?><?php echo @$ed[0]->email; ?>">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('email'); ?></span>

                                                    </div>

                                                </div>





                                                <div align="" class="row form-group">

                                                    <div class="col-lg-4">Contact Number</div>

                                                    <div class="col-lg-4">
                                                        <textarea class="form-control" name="phone" value="<?php echo set_value('phone'); ?>"><?php echo @$ed[0]->phone; ?></textarea>
                                <!-- <input type="text" class="form-control" name="phone" maxlength="10" value="<?php echo set_value('phone'); ?>"> -->

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('phone'); ?></span>

                                                    </div>

                                                </div>

                                                <!-- FB Pagelink Start -->

                                                <div align="" class="row form-group">

                                                    <div class="col-lg-4">Fb Pagelink</div>

                                                    <div class="col-lg-4">

                                                        <input type="text" class="form-control" name="fb" value="<?php echo set_value('fb'); ?><?php echo @$ed[0]->fb; ?>">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('fb'); ?></span>

                                                    </div>

                                                </div>


                                                <!-- FB Pagelink End -->


                                                <div align="" class="row form-group">

                                                    <div class="col-lg-4">Website</div>

                                                    <div class="col-lg-4">

                                                        <input type="text" class="form-control" name="link" value="<?php echo set_value('link'); ?><?php echo @$ed[0]->link; ?>">

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('link'); ?></span>

                                                    </div>

                                                </div>





                                                <div align="" class="row form-group">

                                                    <div class="col-lg-4">Awards*</div>

                                                     <div class="col-lg-4">
<?php
@$h = $ed[0]->awards;
@$hh = explode(";", $h);
foreach ($hh as $k) {
    ?>
                                                        <input type="text" class="form-control" name="awards[]" value="<?php echo set_value('awards'); ?><?php echo $k ?>">
    <?php
}
?>



                                                </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('awards'); ?></span>

                                                    </div>

                                                </div>


                                                <div align="" class="row form-group">

                                                    <div class="col-lg-4"><button id="addMore">Add more Awards</button></div>

                                                    <div class="col-lg-4">

                                                        <ul style="list-style: none;" id="fieldList">
                                                            <li>
                                                                <input name="awards[]" type="text" class="form-control"  />
                                                            </li>

                                                        </ul>

                                                    </div>
                                                    <script type="text/javascript">
                                                        $(function () {
                                                            $("#addMore").click(function (e) {
                                                                e.preventDefault();
                                                                $("#fieldList").append("<li>&nbsp;</li>");
                                                                $("#fieldList").append("<li><input type='text' name='awards[]' class='form-control'  /></li>");

                                                            });
                                                        });

                                                    </script>
                                                </div>





                                                <div align="" class="row form-group">

                                                    <div class="col-lg-4">PROFESSIONAL STATEMENT</div>

                                                    <div class="col-lg-4">

                                                        <textarea class="form-control" rows="5" id="comment" name="desc1" value="<?php echo set_value('desc1'); ?>"><?php echo @$ed[0]->desc1; ?></textarea>

                                                    </div>

                                                    <div class="col-lg-4">

                                                        <span style="color: red;"><?php echo form_error('desc1'); ?></span>

                                                    </div>

                                                </div>



                                                <div align="" class="row form-group">

                                                    <div class="col-lg-8" style="float: center">

                                                        <input type="submit" name="beautician">

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

               

                <!--//content-inner-->

                <!--/sidebar-menu-->

                <div class="sidebar-menu" hidden="true">

                    <header class="logo">

                        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>Augment</h1></span> 

                                                <!--<img id="logo" src="" alt="Logo"/>--> 

                        </a> 

                    </header>

                    <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>

                    <!--/down-->

                    <div class="down">	

                        <a href="index.html"><img src="<?php echo base_url(); ?>assets2/images/admin.jpg"></a>

                        <a href="index.html"><span class=" name-caret">Jasmin Leo</span></a>

                        <p>System Administrator in Company</p>

                        <ul>

                            <li><a class="tooltips" href="index.html"><span>Profile</span><i class="lnr lnr-user"></i></a></li>

                            <li><a class="tooltips" href="index.html"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>

                            <li><a class="tooltips" href="index.html"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>

                        </ul>

                    </div>

                    <!--//down-->

                    <div class="menu">

                        <ul id="menu" >

                            <li><a href="index.html"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>

                            <li id="menu-academico" ><a href="#"><i class="fa fa-table"></i> <span> Tabs &amp; Panels</span> <span class="fa fa-angle-right" style="float: right"></span></a>

                                <ul id="menu-academico-sub" >

                                    <li id="menu-academico-avaliacoes" ><a href="tabs.html"> Tabs &amp; Panels</a></li>

                                    <li id="menu-academico-boletim" ><a href="widget.html">Widgets</a></li>

                                    <li id="menu-academico-avaliacoes" ><a href="calender.html">Calendar</a></li>



                                </ul>

                            </li>

                            <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i> <span>Ui Elements</span> <span class="fa fa-angle-right" style="float: right"></span></a>

                                <ul id="menu-academico-sub" >

                                    <li id="menu-academico-avaliacoes" ><a href="forms.html">Forms</a></li>

                                    <li id="menu-academico-boletim" ><a href="validation.html">Validation Forms</a></li>

                                    <li id="menu-academico-boletim" ><a href="table.html">Tables</a></li>

                                    <li id="menu-academico-boletim" ><a href="Buttons.html">Buttons</a></li>

                                </ul>

                            </li>

                            <li><a href="typography.html"><i class="lnr lnr-pencil"></i> <span>Typography</span></a></li>

                            <li id="menu-academico" ><a href="#"><i class="lnr lnr-book"></i> <span>Pages</span> <span class="fa fa-angle-right" style="float: right"></span></a>

                                <ul id="menu-academico-sub" >

                                    <li id="menu-academico-avaliacoes" ><a href="Login.html">Login</a></li>

                                    <li id="menu-academico-boletim" ><a href="register.html">Register</a></li>

                                    <li id="menu-academico-boletim" ><a href="404.html">404</a></li>

                                    <li id="menu-academico-boletim" ><a href="sign.html">Sign up</a></li>

                                    <li id="menu-academico-boletim" ><a href="profile.html">Profile</a></li>

                                </ul>

                            </li>

                            <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Mail Box</span><span class="fa fa-angle-right" style="float: right"></span></a>

                                <ul>

                                    <li><a href="inbox.html"><i class="fa fa-inbox"></i> Inbox</a></li>

                                    <li><a href="inbox.html"><i class="fa fa-pencil-square-o"></i> Compose Mail</a></li>

                                    <li><a href="editor.html"><span class="lnr lnr-highlight"></span> Editors Page</a></li>



                                </ul>

                            </li>

                            <li id="menu-academico" ><a href="#"><i class="lnr lnr-layers"></i> <span>Components</span> <span class="fa fa-angle-right" style="float: right"></span></a>

                                <ul id="menu-academico-sub" >

                                    <li id="menu-academico-avaliacoes" ><a href="grids.html">Grids</a></li>

                                    <li id="menu-academico-boletim" ><a href="media.html">Media Objects</a></li>



                                </ul>

                            </li>

                            <li><a href="chart.html"><i class="lnr lnr-chart-bars"></i> <span>Charts</span> <span class="fa fa-angle-right" style="float: right"></span></a>

                                <ul>

                                    <li><a href="map.html"><i class="lnr lnr-map"></i> Maps</a></li>

                                    <li><a href="graph.html"><i class="lnr lnr-apartment"></i> Graph Visualization</a></li>

                                </ul>

                            </li>

                            <li id="menu-comunicacao" ><a href="#"><i class="fa fa-smile-o"></i> <span>More</span><span class="fa fa-angle-double-right" style="float: right"></span></a>

                                <ul id="menu-comunicacao-sub" >

                                    <li id="menu-mensagens" style="width:120px" ><a href="project.html">Projects <i class="fa fa-angle-right" style="float: right; margin-right: -8px; margin-top: 2px;"></i></a>

                                        <ul id="menu-mensagens-sub" >

                                            <li id="menu-mensagens-enviadas" style="width:130px" ><a href="ribbon.html">Ribbons</a></li>

                                            <li id="menu-mensagens-recebidas"  style="width:130px"><a href="blank.html">Blank</a></li>

                                        </ul>

                                    </li>

                                    <li id="menu-arquivos" ><a href="500.html">500</a></li>

                                </ul>

                            </li>

                        </ul>

                    </div>

                </div>

                <div class="clearfix"></div>		


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