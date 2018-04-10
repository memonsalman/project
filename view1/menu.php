<!DOCTYPE html>
<html lang="en">
    <head >
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="google-site-verification" content="_Z19q27LGbMh2TQCBySjudCz32Fikdp0ClU9gZDeipU" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
        <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/bootstrap/css/bootstrap-theme.min.css" >
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css">
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114019480-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114019480-1');
</script>
<style>
ul.demo {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
 .affix {
      top: 0;
      width: 100%;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
  .navbar-inverse {
    background-color: transparent !important;
    border-color: transparent !important;
}
 
 .navbar-inverse .navbar-nav>li>a {
     color: white !important; 
     font-size: 12.5px !important;
}

.navbar-inverse .navbar-nav>.open>a{
    background-color: transparent !important;

}


.navbar-inverse .navbar-nav .open .dropdown-menu .divider {
    background-color: white !important;

}
.navbar-inverse .navbar-nav .open .dropdown-menu>li>a{
    color: black !important;
}

/*.navbar li.dropdown:hover{box-shadow:inset 0 3px 9px rgba(0,0,0,.25)!important;}*/
.nav>li>a{    padding: 20px 10px;}

.navbar-inverse .navbar-nav>.open>a:{
    -webkit-box-shadow: none !important;
     box-shadow: none !important; 
}

.navbar-inverse .navbar-nav>.open>a: hover{
    -webkit-box-shadow: none !important;
     box-shadow: none !important; 
}

/*div ul li a:hover {background: #666 !important;}
div ul li a:active {background: #666 !important;}*/


.navbar-inverse .navbar-nav>.open>a{
    -webkit-box-shadow: none !important;
     box-shadow: none !important;
     /*border:none !important;*/
         background-image: none !important;
}


/*@media (max-width: 1024px) {
    .navbar-header {
        float: none;
    }
    .navbar-left,.navbar-right {
        float: none !important;
        text-align: left !important;
    }
    .ul{
        
        text-align: left !important;
    }

    
    .navbar-toggle {
        display: block;
    }
    .navbar-collapse {
        border-top: 1px solid transparent;
        box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
    }
    .navbar-fixed-top {
        top: 0;
        border-width: 0 0 1px;
    }
    .navbar-collapse.collapse {
        display: none!important;
    }
    .navbar-nav {
        float: none!important;
        margin-top: 7.5px;
    }
    .navbar-nav>li {
        float: none;
    }
    .navbar-nav>li>a {
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .collapse.in{
        display:block !important;
    }
}*/

@media screen and (max-width: 1024px) {
 .navbar-header {
    float: none;
 }
 .navbar-left,.navbar-right {
    float: none !important;
 }
 .navbar-toggle {
    display: block;
 }
 .navbar-fixed-top {
    top: 0;
    border-width: 0 0 1px;
 }
 .navbar-collapse.collapse {
    display: none!important;
 }
 .navbar-nav {
    float: none!important;
    margin-top: 7.5px;
 }
 .navbar-nav>li {
    float: none;
 }
 .navbar-nav>li>a {
    padding-top: 10px;
    padding-bottom: 10px;
 }
 .collapse.in{
    display:block !important;
 }
 .navbar-inverse .navbar-nav {
    padding-left: 10px;
    line-height: normal;
    text-align: center;
 }
 .navbar-inverse .navbar-nav>li {
    display: inline-block;
    margin-bottom: 0;
 }
 .navbar-inverse .navbar-nav > li {
    width: 100%;
    border-bottom: 1px solid #EDEDED;
    position: relative;
    margin: 8px 0 0 0;
    padding: 0 0 8px 0;
 }
 .navbar-inverse .navbar-nav > li  a {
    text-align: left;
 }
 .navbar-inverse .navbar-nav ul.sub-menu {
    display: none !important;
    position: relative;
    top: 0;
    box-shadow: none;
    width: 100%;
 }
 .navbar-inverse .navbar-nav li.this-open > ul {
    display: block !important;
 }
 .navbar-inverse .navbar-nav ul.sub-menu li {
    width: 100%;
    float: left;
 }
 .navbar-inverse .navbar-nav ul.sub-menu li a {
    width: 100%;
    float: left;
    padding: 8px 25px 8px 0;
    border-bottom: 1px solid #EDEDED;
 }
 .navbar-inverse .navbar-nav ul.sub-menu li:last-child a {
    border-bottom: none;
 }
 .navbar-inverse .navbar-nav ul.sub-menu ul.sub-menu {
    position: relative;
    left: 0;
    top: 0;
 }
 #main-nav {
    overflow: visible;
 }
 #main-nav, #main-nav.fixed {
    position: relative;
 }
 .navbar-collapse {
    max-height: 100%;
 }
 .navbar-inverse .navbar-nav ul.sub-menu li {
    padding-left: 20px;
 }
 .navbar-inverse .navbar-nav ul.sub-menu li {
    padding-bottom: 0;
    padding-top: 0;
 }
 .dropdownmenu {
    display: block;
    position: absolute;
    z-index: 9;
    right: 0;
    top: 5px;
    width: 25px;
    height: 25px;
    margin: 0;
    padding: 0;
    border-radius: 3px;
    background: url(images/menu-icon.png) center center no-repeat #e96656;
 }
 .navbar-inverse .navbar-nav ul.sub-menu li{
    margin-right: 0;
    padding-right: 0;
 }
 .navbar-inverse .navbar-nav > li > a:hover {
    color: #404040 !important;
 }
 .this-open > a {
    color: #e96656 !important;
 }
 ul.nav > li.current_page_item > a:before {
    content: "";
    left: 0px;
    width: 50px;
 }
 #site-navigation {
    width: 100%;
 }
 .navbar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
    float: left !important;
 }
 #main-nav {
    overflow: hidden !important;
 }
}
</style>

<script type="text/javascript">
  /*
    Dropdown with Multiple checkbox select with jQuery - May 27, 2013
    (c) 2013 @ElmahdiMahmoud
    license: https://www.opensource.org/licenses/mit-license.php
*/

$(".dropdown1 dt a").on('click', function() {
  $(".dropdown1 dd ul").slideToggle('fast');
});

$(".dropdown1 dd ul li a").on('click', function() {
  $(".dropdown1 dd ul").hide();
});

function getSelectedValue(id) {
  return $("#" + id).find("dt a span.value").php();
}

$(document).bind('click', function(e) {
  var $clicked = $(e.target);
  if (!$clicked.parents().hasClass("dropdown1")) $(".dropdown1 dd ul").hide();
});

$('.mutliSelect input[type="checkbox"]').on('click', function() {

  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
    title = $(this).val() + ",";

  if ($(this).is(':checked')) {
    var html = '<span title="' + title + '">' + title + '</span>';
    $('.multiSel').append(html);
    $(".hida").hide();
  } else {
    $('span[title="' + title + '"]').remove();
    var ret = $(".hida");
    $('.dropdown1 dt a').append(ret);

  }
});
</script>

    </head>
    <body>
        

        <!-- Navbar -->
        <div id="navbar"> 
        
            <nav  class="navbar navbar-inverse navbar-static-top"  data-spy="affix" data-offset-top="197" role="navigation">
                <div class="navbar-header" style="background-color: #555555 !important; border-color: transparent !important;">
                    <button style="background-color: #555555 !important; border-color: transparent !important;" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a style="color: white;" class="hidden-lg navbar-brand" href="<?php echo base_url(); ?>">Your Educare</a>
                </div>

                <div class="collapse navbar-collapse" id="navbar-collapse-1" style="background-color: #555555 !important; border-color: transparent !important;">
                	<div class="container">
                    <ul style="margin-bottom: 0px;margin-top: 0px; text-align: left;"  class="nav navbar-nav">

                        <li class="dropdown" >
                            <a href="#" class="dropdown-toggle" style="letter-spacing: 1px; 
    font-family: inherit;" data-toggle="dropdown">SCHOOLING<b class="caret"></b></a> 

                            <ul class="dropdown-menu">

                                <li><a href="<?php echo base_url('controller/k12_cat'); ?>">K-12 School</a></li>


                                </li>
                                <li class="divider"></li>
                               
                        		<li><a href="<?php echo base_url('controller/pre'); ?>">Pre-School</a>
                        

                        <li class="divider"></li>   
                      
                      
                        <li><a href="<?php echo base_url('controller/special'); ?>">School for Special Children</a></li>

                        <li class="divider"></li>
                        
                        <li><a href="<?php echo base_url('controller/home_tutor_cat'); ?>">Home Tutor</a></li>



                    </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="letter-spacing: 1px;font-family: inherit; ">HIGHER EDUCATION<b class="caret"></b></a> 

                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('controller/contemporary'); ?>">Contemporary Courses</a></li>

                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('controller/non_contemporary'); ?>">Non Contemporary Courses</a></li>
                            
                           
                            <li class="divider"></li>

                            <li><a href="<?php echo base_url("controller/career_coun"); ?>">Career Counselling</a></li>
                            

                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('controller/study'); ?>">Study Abroad Counsultants</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('controller/fellowships_blog'); ?>">Fellowship Programmes</a></li>
                            
                        </ul>      
                    </li>


                    </li>


                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="letter-spacing: 1px; 
    font-family: inherit; ">SKILL BUILDING ACTIVITIES<b class="caret"></b></a> 

                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('controller/co_curr_cat'); ?>">Kids</a></li>
                           
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('controller/co_curr_o_cat'); ?>">Other Age Groups</a></li>
                            
                                                              
                        </ul>
                    </li>
                   
                     <li class="dropdown">
                        <a href="<?php echo base_url('controller/coaching_center_cat'); ?>"  style="letter-spacing: 1px; 
    font-family: inherit;">COACHING CENTRES</a> 
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="letter-spacing: 1px; 
    font-family: inherit; ">COLLEGE TO CORPORATES<b class="caret"></b></a> 

                        <ul class="dropdown-menu" >
                            <li><a href="<?php echo base_url('controller/image_cons'); ?>">Image Consultants</a></li>
                            
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url('controller/corporate_skill'); ?>">Corporate Skill Trainer</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Entrepreneurship Institute</a></li>
                                     
                        </ul>
                    </li>

                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" style="letter-spacing: 1px; 
    font-family: inherit; ">EVENTS<b class="caret"></b></a>
                        <ul class="dropdown-menu">

                            
                         
                            <li><a href="<?php echo base_url('controller/work'); ?>">Workshops</a></li>

                            <li class="divider"></li>

                            <li><a href="<?php echo base_url('controller/seminar'); ?>">Seminars</a></li>

                            <li class="divider"></li>

                            <li><a href="<?php echo base_url('controller/compitition'); ?>">Competition</a></li>

                            <li class="divider"></li>

                            <li><a href="<?php echo base_url('controller/camp'); ?>">Camps</a></li>
                           
                        </ul>
                    </li>
                    

                   
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="letter-spacing: 1px; 
    font-family: inherit;">OTHER UTILITIES<b class="caret"></b></a> 

                        <ul class="dropdown-menu" >
                            <!-- <li><a href="#">Books Sharing Corner</a></li> -->
                           
                            <!-- <li class="divider"></li> -->
                            <li><a href="#">Organisations in Surat</a></li>
                            
                                        
                        </ul>
                    </li>
                    </div>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        
        </div>

       
</body>
</html>