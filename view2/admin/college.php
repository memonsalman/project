

<!--

Author: W3layouts

Author URL: http://w3layouts.com

License: Creative Commons Attribution 3.0 Unported

License URL: http://creativecommons.org/licenses/by/3.0/

-->

<!DOCTYPE HTML>

<html>

<head>

<title>College Form</title>

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

 <div class="page-container">

   <!--/content-inner-->

	<div class="left-content">

	   <div class="inner-content">

		<!-- header-starts -->

			<div class="header-section">

						<!--menu-right-->

						<div class="top_menu">

						        <div class="main-search">

											<form>

											   <input type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}" class="text"/>

												<input type="submit" value=""/>

											</form>

									<div class="close"><img src="<?php echo base_url(); ?>assets2/images/cross.png" /></div>

								</div>

									<div class="srch"><button></button></div>

									<script type="text/javascript">

										 $('.main-search').hide();

										$('button').click(function (){

											$('.main-search').show();

											$('.main-search text').focus();

										}

										);

										$('.close').click(function(){

											$('.main-search').hide();

										});

									</script>

							<!--/profile_details-->

								<div class="profile_details_left">

									<ul class="nofitications-dropdown">

											<li class="dropdown note dra-down">

													   <div id="dd" class="wrapper-dropdown-3" tabindex="1">

																			<span>Italy</span>

																			<ul class="dropdown">

																				<li><a class="deutsch">France</a></li>

																				<li><a class="english"> Italy</a></li>

																				<li><a class="espana">Brazil</a></li>

																				<li><a class="russian">Usa</a></li>



																			</ul>

																		</div>

																		<script type="text/javascript">

			

																	function DropDown(el) {

																		this.dd = el;

																		this.placeholder = this.dd.children('span');

																		this.opts = this.dd.find('ul.dropdown > li');

																		this.val = '';

																		this.index = -1;

																		this.initEvents();

																	}

																	DropDown.prototype = {

																		initEvents : function() {

																			var obj = this;



																			obj.dd.on('click', function(event){

																				$(this).toggleClass('active');

																				return false;

																			});



																			obj.opts.on('click',function(){

																				var opt = $(this);

																				obj.val = opt.text();

																				obj.index = opt.index();

																				obj.placeholder.text(obj.val);

																			});

																		},

																		getValue : function() {

																			return this.val;

																		},

																		getIndex : function() {

																			return this.index;

																		}

																	}



																	$(function() {



																		var dd = new DropDown( $('#dd') );



																		$(document).click(function() {

																			// all dropdowns

																			$('.wrapper-dropdown-3').removeClass('active');

																		});



																	});



																</script>

										    </li>

									       <li class="dropdown note">

											<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope-o"></i> <span class="badge">3</span></a>



												

													<ul class="dropdown-menu two first">

														<li>

															<div class="notification_header">

																<h3>You have 3 new messages  </h3> 

															</div>

														</li>

														<li><a href="#">

														   <div class="user_img"><img src="<?php echo base_url(); ?>assets2/images/1.jpg" alt=""></div>

														   <div class="notification_desc">

															<p>Lorem ipsum dolor sit amet</p>

															<p><span>1 hour ago</span></p>

															</div>

														   <div class="clearfix"></div>	

														 </a></li>

														 <li class="odd"><a href="#">

															<div class="user_img"><img src="<?php echo base_url(); ?>assets2/images/in.jpg" alt=""></div>

														   <div class="notification_desc">

															<p>Lorem ipsum dolor sit amet </p>

															<p><span>1 hour ago</span></p>

															</div>

														  <div class="clearfix"></div>	

														 </a></li>

														<li><a href="#">

														   <div class="user_img"><img src="<?php echo base_url(); ?>assets2/images/in1.jpg" alt=""></div>

														   <div class="notification_desc">

															<p>Lorem ipsum dolor sit amet </p>

															<p><span>1 hour ago</span></p>

															</div>

														   <div class="clearfix"></div>	

														</a></li>

														<li>

															<div class="notification_bottom">

																<a href="#">See all messages</a>

															</div> 

														</li>

													</ul>

										</li>

										

							<li class="dropdown note">

								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o"></i> <span class="badge">5</span></a>



									<ul class="dropdown-menu two">

										<li>

											<div class="notification_header">

												<h3>You have 5 new notification</h3>

											</div>

										</li>

										<li><a href="#">

											<div class="user_img"><img src="<?php echo base_url(); ?>assets2/images/in.jpg" alt=""></div>

										   <div class="notification_desc">

											<p>Lorem ipsum dolor sit amet</p>

											<p><span>1 hour ago</span></p>

											</div>

										  <div class="clearfix"></div>	

										 </a></li>

										 <li class="odd"><a href="#">

											<div class="user_img"><img src="<?php echo base_url(); ?>assets2/images/in5.jpg" alt=""></div>

										   <div class="notification_desc">

											<p>Lorem ipsum dolor sit amet </p>

											<p><span>1 hour ago</span></p>

											</div>

										   <div class="clearfix"></div>	

										 </a></li>

										 <li><a href="#">

											<div class="user_img"><img src="<?php echo base_url(); ?>assets2/images/in8.jpg" alt=""></div>

										   <div class="notification_desc">

											<p>Lorem ipsum dolor sit amet </p>

											<p><span>1 hour ago</span></p>

											</div>

										   <div class="clearfix"></div>	

										 </a></li>

										 <li>

											<div class="notification_bottom">

												<a href="#">See all notification</a>

											</div> 

										</li>

									</ul>

							</li>	

						<li class="dropdown note">

								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i> <span class="badge blue1">9</span></a>

										<ul class="dropdown-menu two">

										<li>

											<div class="notification_header">

												<h3>You have 9 pending task</h3>

											</div>

										</li>

										<li><a href="#">

												<div class="task-info">

												<span class="task-desc">Database update</span><span class="percentage">40%</span>

												<div class="clearfix"></div>	

											   </div>

												<div class="progress progress-striped active">

												 <div class="bar yellow" style="width:40%;"></div>

											</div>

										</a></li>

										<li><a href="#">

											<div class="task-info">

												<span class="task-desc">Dashboard done</span><span class="percentage">90%</span>

											   <div class="clearfix"></div>	

											</div>

										   

											<div class="progress progress-striped active">

												 <div class="bar green" style="width:90%;"></div>

											</div>

										</a></li>

										<li><a href="#">

											<div class="task-info">

												<span class="task-desc">Mobile App</span><span class="percentage">33%</span>

												<div class="clearfix"></div>	

											</div>

										   <div class="progress progress-striped active">

												 <div class="bar red" style="width: 33%;"></div>

											</div>

										</a></li>

										<li><a href="#">

											<div class="task-info">

												<span class="task-desc">Issues fixed</span><span class="percentage">80%</span>

											   <div class="clearfix"></div>	

											</div>

											<div class="progress progress-striped active">

												 <div class="bar  blue" style="width: 80%;"></div>

											</div>

										</a></li>

										<li>

											<div class="notification_bottom">

												<a href="#">See all pending task</a>

											</div> 

										</li>

									</ul>

							</li>		   							   		

							<div class="clearfix"></div>	

								</ul>

							</div>

							<div class="clearfix"></div>	

							<!--//profile_details-->

						</div>

						<!--//menu-right-->

					<div class="clearfix"></div>

				</div>



						<!-- //header-ends -->

							<!--//outer-wp-->

								<div class="outter-wp">

											<!--/sub-heard-part-->

											 <div class="sub-heard-part">

													   <ol class="breadcrumb m-b-0">

															<li><a href="index.html">Home</a></li>

															<li class="active">Forms</li>

														</ol>

											</div>	

											<!--/sub-heard-part-->	

<!--/forms-->

	<div class="forms-main">

	  <!--/set-2-->

		<div class="set-1">

			<div class="graph-2 general">

				<div class="row">
				<h3 class="inner-tittle two">Post Free Ad  </h3>
				<div style="float: right;">
					<a href="<?php echo site_url("admin/collegeupdate"); ?>"><button type="button" class="btn btn-info">List</button></a>
				</div>
				</div>

					<div class="grid-1">

						<div class="form-body">

							<form class="form-horizontal" method="post" action="<?php base_url("admin/college") ?>" enctype="multipart/form-data">

								<div align="center" class="row">

                    <div class="col-lg-4">Selected Category</div>

                    <div class="col-lg-4">Education & Training / College</div>

                    <div class="col-lg-4"><a href="<?php echo site_url("admin/home"); ?>">Choose Another Category</a></div>

                </div><br>

              <!--   <?php echo validation_errors(); ?> -->



                  <div align="" class="row form-group">

                    <div style="float: left;" class="col-lg-4">Title for your Ad*</div>

                    <div class="col-lg-4">

                        <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>">

                    </div>

                    <div class="col-lg-4">

                        <span style="color: red;"><?php echo form_error('title'); ?></span>

                    </div>

                  </div>



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



                  



                    <div align="" class="row form-group">

	                    <div class="col-lg-4">Courses Offered</div>

	                    <div class="col-lg-4">

	                        <div class="multiselect">

							    <div class="selectBox" onclick="showCheckboxes()">

							      <select name="college[]">

							       <!--  <option>Select an option</option> -->

							      </select>

							      <div class="overSelect"></div>

							    </div>

							    <div id="checkboxes">

							      <label for="one">

							        <input type="checkbox"  value="B.A" name="college[]" <?php if($this->input->post('offered')) { $ar=$this->input->post('college'); if( in_array('B.A',$ar)) { echo "checked"; } } ?> > B.A</label>

							      <label for="two">

							        <input type="checkbox"   value="B.Ed" name="college[]" <?php if($this->input->post('offered')) { $ar=$this->input->post('college'); if( in_array('B.Ed',$ar)) { echo "checked"; } } ?> > B.Ed</label>

							      <label for="three">

							      	<input type="checkbox"  value="B.C.A" name="college[]" <?php if($this->input->post('offered')) { $ar=$this->input->post('college'); if( in_array('B.C.A',$ar)) { echo "checked"; } } ?> > B.C.A</label>

							      <label for="three">

							      	<input type="checkbox"   value="B.B.A" name="college[]" <?php if($this->input->post('offered')) { $ar=$this->input->post('college'); if( in_array('B.B.A',$ar)) { echo "checked"; } } ?> > B.B.A</label>

							      <label for="three">

							      	<input type="checkbox"   value="B.Com" name="college[]" <?php if($this->input->post('offered')) { $ar=$this->input->post('college'); if( in_array('B.Com',$ar)) { echo "checked"; } } ?> > B.Com</label>  

							    </div>

							</div>

	                    </div>

	                    <div class="col-lg-4">

	                        <span style="color: red;"><?php echo form_error('college[]'); ?></span>

	                    </div>

                	</div>



                                   <!-- working day's Start -->

                  <div align="" class="row form-group">

                    <div class="col-lg-4">Working Day's</div>

                    <div class="col-lg-4">

                        <input type="text" class="form-control" name="day"  value="<?php echo set_value('day'); ?>">

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

                        <input type="text" class="form-control" name="hour"  value="<?php echo set_value('hour'); ?>">

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

                        <input type="text" class="form-control" name="closing"  value="<?php echo set_value('closing'); ?>">

                    </div>

                    <div class="col-lg-4">

                        <span style="color: red;"><?php echo form_error('closing'); ?></span>

                    </div>

                  </div>

                  <!-- closing day's End -->



                  <div align="" class="row form-group">

                    <div class="col-lg-4">Awards*</div>

                    <div class="col-lg-4">

                        <input type="text" class="form-control" name="awards[]" value="<?php echo set_value('awards'); ?>">

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
					$(function() {
				  $("#addMore").click(function(e) {
				    e.preventDefault();
				    $("#fieldList").append("<li>&nbsp;</li>");
				    $("#fieldList").append("<li><input type='text' name='awards[]' class='form-control'  /></li>");

				  });
				});

				</script>
                  </div>



                   <!-- <div align="" class="row form-group">

                    <div class="col-lg-4">Delivery Mode*</div>

                    <div class="col-lg-4">

                         <select class="form-control" id="sel1">

                            <option>1</option>

                            <option>2</option>

                            <option>3</option>

                            <option>4</option>

                          </select>

                    </div>

                    

                  </div> -->



                  <div align="" class="row form-group">

                    <div class="col-lg-4">Course Fees aproximatly</div>

                    <div class="col-lg-4">

                    	<textarea class="form-control" name="fees"  value="<?php echo set_value('fees'); ?>"></textarea>

                        <!-- <input type="text" class="form-control" name="fees" value="<?php echo set_value('fees'); ?>"> -->

                    </div>

                    <div class="col-lg-4">

	                        <span style="color: red;"><?php echo form_error('fees'); ?></span>

	                    </div>

                  </div>



                 



                   <div align="" class="row form-group">

                    <div class="col-lg-4">Institute Name</div>

                    <div class="col-lg-4">

                        <input type="text" class="form-control" name="iname" value="<?php echo set_value('iname'); ?>">

                    </div>

                    <div class="col-lg-4">

	                        <span style="color: red;"><?php echo form_error('iname'); ?></span>

	                    </div>

                  </div>

                  <div align="" class="row form-group">

                    <div class="col-lg-4">Institute Address</div>

                    <div class="col-lg-4">

                    	<textarea class="form-control" name="iadd"  value="<?php echo set_value('iadd'); ?>"></textarea>

                        <!-- <input type="text" class="form-control" name="iadd" value="<?php echo set_value('iadd'); ?>"> -->

                    </div>

                    <div class="col-lg-4">

	                        <span style="color: red;"><?php echo form_error('iadd'); ?></span>

	                    </div>

                  </div>



                  <div align="" class="row form-group">

                    <div class="col-lg-4">Institute Contact Number</div>

                    <div class="col-lg-4">

                    	<textarea class="form-control" name="phone"  value="<?php echo set_value('phone'); ?>"></textarea>
                    	

                        <!-- <input type="text" class="form-control" maxlength="10" name="phone" value="<?php echo set_value('phone'); ?>"> -->

                    </div>

                    <div class="col-lg-4">

	                        <span style="color: red;"><?php echo form_error('phone'); ?></span>

	                    </div>

                  </div>



                  <div align="" class="row form-group">

                    <div class="col-lg-4">Institute Email</div>

                    <div class="col-lg-4">

                        <input type="text" class="form-control" name="email" value="<?php echo set_value('email'); ?>">

                    </div>

                    <div class="col-lg-4">

	                        <span style="color: red;"><?php echo form_error('email'); ?></span>

	                    </div>

                  </div>

                  <!-- Fb pagelink start -->

                  <div align="" class="row form-group">

                    <div class="col-lg-4">Fb Pagelink</div>

                    <div class="col-lg-4">

                        <input type="text" class="form-control" name="fb" value="<?php echo set_value('fb'); ?>">

                    </div>

                    <div class="col-lg-4">

	                        <span style="color: red;"><?php echo form_error('fb'); ?></span>

	                    </div>

                  </div>


                  <!-- Fb pagelink end -->

                  <div align="" class="row form-group">

                    <div class="col-lg-4">Institute Website</div>

                    <div class="col-lg-4">

                        <input type="text" class="form-control" name="iweb" value="<?php echo set_value('iweb'); ?>">

                    </div>

                    <div class="col-lg-4">

	                        <span style="color: red;"><?php echo form_error('iweb'); ?></span>

	                    </div>

                  </div>



                  <div align="" class="row form-group">

                    <div class="col-lg-4">Your City*</div>

                    <div class="col-lg-4">

                        <input type="text" class="form-control" name="city" value="<?php echo set_value('city'); ?>">

                    </div>

                    <div class="col-lg-4">

	                        <span style="color: red;"><?php echo form_error('city'); ?></span>

	                </div>

                  </div>



                   <div align="" class="row form-group">

                    <div class="col-lg-4">Description*</div>

                    <div class="col-lg-4">

                       <textarea class="form-control" rows="5" id="comment" name="desc" ></textarea>

                    </div>

                    <div class="col-lg-4">

	                        <span style="color: red;"><?php echo form_error('desc'); ?></span>

	                </div>

                  </div>



                  <div align="" class="row form-group">

                    <div class="col-lg-8" style="float: center">

                       <input type="submit" name="offered">

                    </div>

                    

                  </div>

							</form>

						</div>



					</div>

				</div>

			</div>

			 <!--//set-2-->

	</div>

											<!--//outer-wp-->

									 <!--footer section start-->

										<footer>

										   <p>&copy 2016 Augment . All Rights Reserved | Design by <a href="https://risingwings.in/" target="_blank"></a>RisingWings</p>

										</footer>

									<!--footer section end-->

								</div>

							</div>

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

							</div>

							<script>

							var toggle = true;

										

							$(".sidebar-icon").click(function() {                

							  if (toggle)

							  {

								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");

								$("#menu span").css({"position":"absolute"});

							  }

							  else

							  {

								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");

								setTimeout(function() {

								  $("#menu span").css({"position":"relative"});

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