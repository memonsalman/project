<!DOCTYPE html>
<html lang="en">
    <head >
        <link rel="shortcut icon" type="image/x-icon" href="/assets/logo (1)_131594377264114942.ico" />
        <title>Home</title>
        <meta charset="utf-8">
        <meta name="google-site-verification" content="_Z19q27LGbMh2TQCBySjudCz32Fikdp0ClU9gZDeipU" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link  rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css">
         
    <link  rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/bootstrap-3.3.7.min.css">
             <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114019480-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114019480-1');
</script> 
        <script src="<?php echo base_url(); ?>/assets/js/jquery-1.12.4.min.js"></script>
       
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css"> -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("blog_assets/css/plugin.css"); ?>" >
              <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/theme-elements.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/index.css">
        <style type="text/css">
            @media screen and (max-width: 768px){
                .edtalkimg{
                    height: 210px!important;
                }
            }


            .modal-content{
                background: transparent;
                border: transparent;
                box-shadow: unset;
            }

            #homeVideo1 button.btn.btn-default{
                    background: black;
                    border-radius: 50%;
                    position: absolute;
                    right: 0;
                    z-index: 5;
                    color: white;
            }
        </style>


    </head>
    <body>
        <!--  <?php 
           var_dump($_SESSION);
         ?> -->
        <?php include 'header.php';?>
        <!-- Navbar -->
        <?php include 'menu.php';?>


        <?php if ($this->session->flashdata('success')) { ?>
  <h3 style="text-align: center;">
    <?php $a=$this->session->flashdata('success'); 

            echo "<script>alert('$a')</script>"; 
    ?>
  </h3>
<?php } ?>


<?php
    if(@$this->session->userdata['userid']) 
    {
     if ($this->session->flashdata('thanks2')) 
        { ?>
  <h3 style="text-align: center;">
    <?php $a=$this->session->flashdata('thanks2'); 
        echo "<script>alert('$a')</script>"; 
    ?>
  </h3>
    <?php 
    }
}
   else
    {

    if ($this->session->flashdata('thanks')) { ?>
  <h3 style="text-align: center;">
    <?php $a=$this->session->flashdata('thanks'); 
            echo "<script>alert('$a')</script>"; 
    ?>
  </h3>
<?php } 

}

  ?>
       


<?php if ($this->session->flashdata('logmsg')) { ?>
  <h3 style="color: red;">
    <?php $a=$this->session->flashdata('logmsg');

           echo "<script>alert('$a')</script>"; 

     ?>
  </h3>
<?php } ?>

<?php if ($this->session->flashdata('chd')) { ?>
  <h3 style="color: red;">
    <?php $a=$this->session->flashdata('chd'); 
            echo "<script>alert('$a')</script>"; 
    ?>
  </h3>
<?php } ?>

<?php if ($this->session->flashdata('log')) { ?>
  <h3 style="color: green; text-align: center;">
    <?php $a=$this->session->flashdata('log'); 
            echo "<script>alert('$a')</script>"; 
    ?>
  </h3>
  <?php } ?>

  <?php if ($this->session->flashdata('allredy')) { ?>
  <h3 style="color: red; text-align: center;">
    <?php $a=$this->session->flashdata('allredy'); 
        echo "<script>alert('$a')</script>"; 
    ?>
  </h3>
  <?php } ?>

  <?php if ($this->session->flashdata('allredys')) { ?>
  <h3 style="color: red; text-align: center;">
    <?php $a=$this->session->flashdata('allredys'); 
        echo "<script>alert('$a')</script>"; 
    ?>
  </h3>
  <?php } ?>

  <?php if ($this->session->flashdata('sub')) { ?>
  <h3 style="color: red; text-align: center;">
    <?php $a=$this->session->flashdata('sub'); 
        echo "<script>alert('$a')</script>"; 
    ?>
  </h3>
  <?php } ?>

    
  <?php if ($this->session->flashdata('passwchagne')) { ?>
  <h3 style="color: red; text-align: center;">
    <?php $a=$this->session->flashdata('passwchagne'); 
        echo "<script>alert('$a')</script>"; 
    ?>
  </h3>
  <?php } ?>


        <div class="container">
            <div id="myCarousel" class="carousel slide visible-lg" data-ride="carousel">

                <!-- Wrapper for slides -->
                <div class="carousel-inner">


                    <?php 
                    $p=0;
                    foreach ($select1 as $v) {

                        if ($p==0) {?>

                           <div class="item active">
                                <img src="<?php echo $v->image; ?>">

                            </div>
                        <?php
                        }
                        else{?>

                        <div class="item">
                            <img src="<?php echo $v->image; ?>">
                            <div class="carousel-caption">

                            </div>
                        </div>
                        <?php
                        }
                        $p=1;
                    ?>
                 
                    <?php
                    }

                    ?>
    
    


                    <!-- <div class="item active">
                        <img src="<?php echo base_url(); ?>/assets/img/web_banner_4.jpg">

                    </div> -->
                    <!-- End Item -->

                    <!-- <div class="item">
                        <img src="<?php echo base_url(); ?>/assets/img/web_banner_1.jpg">
                        <div class="carousel-caption">

                        </div>
                    </div> --><!-- End Item -->

                    <!-- <div class="item">
                        <img src="<?php echo base_url(); ?>/assets/img/web_banner_3.jpg">
                        <div class="carousel-caption">

                        </div>
                    </div> --><!-- End Item -->

                    <!-- <div class="item">
                        <img src="<?php echo base_url(); ?>/assets/img/web_banner_2.jpg">
                        <div class="carousel-caption">
                        </div>
                    </div> --><!-- End Carousel Inner -->

                    <ul class="nav nav-pills nav-justified">

                    <?php 
                    $p=0;
                        //foreach ($select as $h) 
                    //print_r($select);

                    $k1=count($select1);
                    $k=$k1-1;
                    for($i=0;$i<=$k;$i++)
                        {
                    if ($p==0) {?>
                    
                        <li data-target="#myCarousel" style="color: #d6d6d6;" data-slide-to="<?php echo $i; ?>" class="active"><a style="font-size: 16px;height: 88px;" href="#"><?php echo $select1[$i]->title; ?></a></li>

                    
                    
                    <?php
                        }
                        else{?>

                        <li data-target="#myCarousel" style="color: #d6d6d6;" data-slide-to="<?php echo $i; ?>"><a style="font-size: 16px;height: 88px;" href="#"><?php echo $select1[$i]->title; ?></a></li>
                       
                    <?php
                        }
                        $p=1;
                    ?>
                 
                    <?php
                    }

                    ?>
                    </ul>


                    <!-- <ul  class=" nav nav-pills nav-justified">
                        <li data-target="#myCarousel" style="color: #d6d6d6;" data-slide-to="0" class="active"><a style="font-size: 16px;" href="#">Vision<small>&nbsp;&nbsp;&nbsp;&nbsp;</small></a></li>

                        <li data-target="#myCarousel" style="color: #d6d6d6;" data-slide-to="1"><a style="font-size: 16px;" href="#">Ease up Admission<small>Hassles</small></a></li>

                        <li data-target="#myCarousel" style="color: #d6d6d6;" data-slide-to="2"><a style="font-size: 16px;" href="#">Ask Your Buddy<small>&nbsp;&nbsp;&nbsp;&nbsp;</small></a></li>

                        <li data-target="#myCarousel" style="color: #d6d6d6;" data-slide-to="3"><a style="font-size: 16px;" href="#">Personalize according to your interest<small>&nbsp;&nbsp;&nbsp;&nbsp;</small> </a></li>
                    </ul> -->
                </div><!-- End Carousel -->
            </div>
            <!-- Slider Close -->
        </div>

        <!-- Categories Section -->
        <div class="container">
            <div class="row" >
                <div class="col-md-12">
                    <h4>All Categories</h4>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/pre'); ?>"><figure> <img src="<?php echo base_url('/assets/image/PRE-SCHOOL1.png'); ?>"></figure>
                                <h5 class="mb-sm">Pre-School</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/k12_cat'); ?>"><figure> <img src="<?php echo base_url('/assets/image/sachool k-12.png'); ?>"></figure>
                                <h5 class="mb-sm">K-12 School</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/special'); ?>"><figure> <img src="<?php echo base_url('/assets/image/school tution.png'); ?>"></figure>
                                <h5 class="mb-sm">School for Special Children</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/home_tutor_cat'); ?>"><figure> <img src="<?php echo base_url('/assets/image/home tutor.png'); ?>"></figure>
                                <h5 class="mb-sm">Home Tutor</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/contemporary'); ?>"><figure><img src="<?php echo base_url('/assets/image/contemporary.png'); ?>"></figure>
                                <h5 class="mb-sm">Contemporary Course</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/non_contemporary'); ?>"> <figure> <img src="<?php echo base_url('/assets/image/noncontemporary.png'); ?>"></figure>
                                <h5 class="mb-sm">Non-Contemporary Course</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/career_coun'); ?>"> <figure> <img src="<?php echo base_url('/assets/image/career counseling.png'); ?>"></figure>
                                <h5 class="mb-sm">Career Counseling</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/college'); ?>"><figure> <img src="<?php echo base_url('/assets/image/colleges.png'); ?>"></figure>
                                <h5 class="mb-sm">College</h5>
                            </a>
                        </div>
                    </div>
                </div> -->

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/study'); ?>"><figure> <img src="<?php echo base_url('/assets/image/syudy abroad.png'); ?>"></figure>
                                <h5 class="mb-sm">Study Abroad </h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" >

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/co_curr_cat'); ?>"><figure><img src="<?php echo base_url('/assets/image/colleges.png'); ?>"></figure>
                                <h5 class="mb-sm">Skill Building-For Kids </h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/co_curr_o_cat'); ?>"><figure> <img src="<?php echo base_url('/assets/image/book sharing.png'); ?>"></figure>
                                <h5 class="mb-sm">Skill Building-For Other Age Group</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/coaching_center_cat'); ?>"><figure> <img src="<?php echo base_url('/assets/image/school tution.png'); ?>"></figure>
                                <h5 class="mb-sm">Coaching Center</h5>
                            </a>
                        </div>

                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/image_cons'); ?>"><figure> <img src="<?php echo base_url('/assets/image/image counsultant.png'); ?>"></figure>
                                <h5 class="mb-sm">Image Consultants</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" >
                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/corporate_skill'); ?>"><figure> <img src="<?php echo base_url('/assets/image/corporate skill trainer.png'); ?>"></figure>
                                <h5 class="mb-sm">Corporate Skill </h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/work'); ?>"><figure> <img src="<?php echo base_url('/assets/image/work shop.png'); ?>"></figure>
                                <h5 class="mb-sm">WorkShop</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/seminar'); ?>"><figure> <img src="<?php echo base_url('/assets/image/seminar.png'); ?>"></figure>
                                <h5 class="mb-sm">Seminar</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/compitition'); ?>"><figure> <img src="<?php echo base_url('/assets/image/compitition.png'); ?>"></figure>
                                <h5 class="mb-sm">Competitions</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" >
                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/camp'); ?>"><figure><img src="<?php echo base_url('/assets/image/camps.png'); ?>"></figure>
                                <h5 class="mb-sm">Camps</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Vacancy thumb start -->
                <!-- <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/vacancy'); ?>"><figure> <img src="<?php echo base_url('/assets/image/vancy.png'); ?>"></figure>
                                <h5 class="mb-sm">Vacancy</h5>
                            </a>
                        </div>
                    </div>
                </div> -->
                <!-- Vacancy thumb end -->

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="#"><figure> <img src="<?php echo base_url('/assets/image/internships.png'); ?>"></figure>
                                <h5 class="mb-sm">Entrepreneurship Institute</h5>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="<?php echo base_url('controller/fellowships_blog'); ?>"><figure> <img src="<?php echo base_url('/assets/image/fellow ship.png'); ?>"></figure>
                                <h5 class="mb-sm">Fellowship</h5>
                            </a>
                        </div>
                    </div>
                </div>  

                <div class="col-md-3 col-xs-6">
                    <div class="hover13 column">
                        <div align="center">
                            <a href="#"><figure> <img src="<?php echo base_url('/assets/image/organization.png'); ?>"></figure>
                                <h5 class="mb-sm">Organization in Surat</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories Section Close-->

        <!-- Add -->
        <div class="row visible-lg" style="padding-top: 30px;">
            <div class="col-lg-2 col-sm-12"></div>
            <div style="text-align: center; padding-bottom: 10px;" class="col-lg-8">
                <figure> <img   src="<?php echo @$select2[0]->image2; ?>"></figure>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="" style="padding-top: 20px;">
            <div class="container">
                <div class="hidden-lg" style="padding-top: 10px;"></div>
                <div class="">
                    <div  style="border: 1px solid #ccc; ">   
                        <h4 style="padding-top: 10px; padding-left: 10px; text-align: center;font-family: 'Questrial Regular'; color: #ec407a;margin-bottom: 0;text-transform: uppercase;"><strong><a href="<?php echo base_url('controller/viewblogs'); ?>" target="_blank">Blogs</a></strong></h4>
                        <hr class="borderHr-latPost">

                        <?php 
                            foreach ($select as $h) {
                                ?>
                            <div class="row" style="padding: 10px;" >
                            
                            <div class="col-md-2 col-xs-12">
                            <div class="blogditails">
                                <a href="<?php echo $h->url; ?>" target="_blank"  style="padding-left: 5px;">
                                    <img src="<?php echo $h->image; ?>"  alt="" width="150" height="180" style="padding-bottom: 10px;">
                                </a>
                                </div>
                            </div>
                            <div  class="col-md-10 col-xs-12" >
                            <div style="background: #f4f4f4; box-shadow: 1px 2px 3px #ddd; ">
                                 
                                <div style="padding: 24px;">
                                <p><a href="<?php echo $h->url; ?>" target="_blank"><u> <?php echo $h->title; ?></u></a></p>
                               <?php echo $h->content; ?><a style="color: #f77462;float: right;" href="<?php echo $h->url; ?>" target="_blank"><strong>Read more</strong></a>
                                </div>
                                <!-- <p style="padding-left: 10px;"><a class="" href="#">Read more</a></p> -->
                              </div>
                            </div>


                        </div>
                            <hr>

                        <?php
                            }

                            ?> 

                            <!-- <div class="row" style="padding: 10px;" >
                            <a href="<?php echo base_url('controller/Artificial_blog'); ?>" target="_blank"></a> 
                            <div class="col-md-2 col-xs-12">
                                <div class="blogditails">
                                    <a href="<?php echo base_url('controller/Artificial_blog'); ?>" target="_blank"  style="padding-left: 5px;">
                                        <img src="<?php echo base_url('/blog_assets/images/AIB_5.jpg') ?>"  alt="" width="150" height="110" style="padding-bottom: 10px;">
                                    </a>
                                </div>
                            </div>
                            <div  class="col-md-10 col-xs-12" >
                                <div style="background: #f4f4f4; box-shadow: 1px 2px 3px #ddd; ">

                                    <div style="padding: 15px;">
                                        <p><a href="<?php echo base_url('controller/Artificial_blog'); ?>" target="_blank"><u> Artificial Intelligence</u></a></p>
                                        With the advent of technology, people are now able to transform their imagination into reality like never before. Alwin Toffler, after all, was right when he said the third wave in the world after ‘Agriculture’ and ‘Industrialization' would be ‘Technology'.....<a style="color: #f77462" href="<?php echo base_url('controller/Artificial_blog'); ?>" target="_blank"><strong>Read more</strong></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <hr> -->


                        <li style="padding: 10px; width: 100%; display: inline-block; text-align: center;">
                            <ul style="    background: #e6f4f8;color: #ec407a;box-shadow: none; padding-left: 0;list-style: none;">
                                <li style="display: inline-block; padding-right: 10px; padding-left: 10px;"><h4><a href="<?php echo base_url('controller/viewblogs'); ?>" target="_blank">VIEW MORE</a></h4></li>
                            </ul>
                        </li>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ed-Talk Start -->

        <div class="container" style="padding-top: 40px;">
            <div class="tabs" style="height: 300px">
                <div  style="border: 1px solid #ccc; height: 320px ">
                    <h4 style="padding-top: 10px; padding-left: 10px; text-align: center;font-family: 'Questrial Regular'; color: #ec407a;margin-bottom: 0;text-transform: uppercase;cursor: pointer;"><strong style="color: black !important;">Ed-Talk</strong></h4>
                    <hr style="padding-bottom: 10px;" class="borderHr-latPost">
                    <div class="owl-carousel owl-theme stage-margin" data-plugin-options="{'items': 1, 'margin': 10, 'loop': true, 'nav': true, 'dots': false, 'stagePadding': 40 }">
                        <div>
                            <img style="height: 250px;cursor: pointer;" onclick="changeVideo('JCY5BySbx6c')" alt="" data-vid="160024074" class="img-responsive img-rounded js-play edtalkimg" src="<?php echo base_url('assets/img/nbk-min.jpg') ?>">
                            <div  class="click_video">
                                <img style="height: 250px;cursor: pointer;" onclick="changeVideo('JCY5BySbx6c')" src="" alt="">
                            </div>

                        </div>

                    </div>
                </div> 
            </div>
        </div>  

        

     <div class="container">
        <div class="row">
                        <div class="col-md-12">
                            <hr class="tall">
                            <h4 style="padding-top: 10px; padding-left: 10px; text-align: center;font-family: 'Questrial Regular'; color: #ec407a;margin-bottom: 0;text-transform: uppercase;"><strong style="color: black !important;">TESTIMONIALS</strong></h4>
                                    <hr style="padding-bottom: 10px;" class="borderHr-latPost">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="tabs tabs-primary">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab1" data-toggle="tab"> Industry</a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab">Students</a>
                                    </li>
                                    <li>
                                        <a href="#tab3" data-toggle="tab">Parents</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab1" class="tab-pane active">
                                        <p>Industry</p>
                                        
                                            <!-- <div class="col-md-12">
                                              
                                                <div class="owl-carousel owl-theme stage-margin" data-plugin-options="{'items': 6, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
                                                                <div>
                                                                    <img style="cursor: pointer; " alt="" data-toggle="modal" data-target="#homeVideo" class="img-responsive img-rounded" src="<?php echo base_url('/uploads/testimonials/img/student.png') ?>">
                                                                </div>
                                                    
                                                </div>
                                                <div class="modal fade" id="homeVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <iframe src="https://drive.google.com/file/d/1viNA0BBAcVW-sr5oRpKQ8bTYewPIj5Hl/preview" width="640" height="480"></iframe>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div> -->
                                        
                                         <p>Coming Soon</p>
                                    </div>
                                    <div id="tab2" class="tab-pane">
                                        <p>Students</p>
                                        <div class="row">
                                            <div class="col-md-12">
                                              
                                                <div class="owl-carousel owl-theme stage-margin" data-plugin-options="{'items': 6, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
                                                                <div>
                                                                    <img style="cursor: pointer; " alt="" data-toggle="modal" data-target="#homeVideo" class="img-responsive img-rounded" src="<?php echo base_url('/uploads/testimonials/img/student.png') ?>">
                                                                </div>
                                                    
                                                </div>
                                                <div class="modal fade" id="homeVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal" >X</button>
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">

                                                                <iframe id="homeVideo" src="https://drive.google.com/file/d/1viNA0BBAcVW-sr5oRpKQ8bTYewPIj5Hl/preview" width="640" height="480"></iframe>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                       </div>
                                    </div>
                                    <div id="tab3" class="tab-pane">
                                        <p>Parents</p>
                                        <div class="row">
                                            <div class="col-md-12">
                                              
                                                <div class="owl-carousel owl-theme stage-margin" data-plugin-options="{'items': 6, 'margin': 10, 'loop': false, 'nav': true, 'dots': false, 'stagePadding': 40}">
                                                                <div>
                                                                    <img style="cursor: pointer; " alt="" data-toggle="modal" data-target="#homeVideo1" class="img-responsive img-rounded" src="<?php echo base_url('/uploads/testimonials/img/parent.png') ?>">
                                                                </div>
                                                    
                                                </div>
                                                <div class="modal fade" id="homeVideo1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal" >X</button>
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">

                                                                <iframe id="homeVideo" src="https://drive.google.com/file/d/1hxysuSnMA-aqSaE4qTZqWPP17a8TbTNa/preview" width="640" height="480"></iframe>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                

        <!-- Ed-Tallk End -->

        <!-- video player -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="margin-top: 100px;">
                <div class="modal-content">
                    <div class="modal-body">

                        <iframe id="iframeYoutube" width="100%" height="315"  src="https://www.youtube.com/embed/JCY5BySbx6c" frameborder="0" allowfullscreen></iframe> 

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- video player close -->

        <!-- Footer   -->
        <?php include 'footer.php';?>

        <!-- Video Player -->
        <script type="text/javascript">
            $(document).ready(function () {
                $("#myModal").on("hidden.bs.modal", function () {
                    $("#iframeYoutube").attr("src", "#");
                })
            })

            function changeVideo(vId) {
                var iframe = document.getElementById("iframeYoutube");
                iframe.src = "https://www.youtube.com/embed/" + vId;

                $("#myModal").modal("show");
            }

        </script> <!-- Video Player close -->

        <!-- <script src="<?php echo base_url(); ?>/assets/js/jquery/jquery.min.js"></script> -->
        <script src="<?php echo base_url(); ?>/assets/js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/theme.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/theme.init.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/index.js"></script>

    </body>
</html>