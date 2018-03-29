<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rating extends CI_Controller {

	private $img;

		function __CONSTRUCT()
		{
			 parent::__construct();
			$this->img=$this->model->select("indexad");

		}
		

		public function rtest123()
		{
			if($this->input->post('id')=='1')
			{
				$add1=$this->model->maxrate();
				$cou=$this->model->find1('pre_review','pid');
				?>

<style type="text/css">
      



      .contact {

    list-style: none;

    margin: 0;

    padding: 0;

}


}
.title {
    color: black;
  }
.checked {
    color: orange;
}
#map-layer {
  
     width: 320px;
     height: 700px;
}




@media only screen and (max-width: 1199px) and (min-width: 992px) {

.col-sm-4.subc{margin-top:100px!important;}
button.btn.btn-defoult{margin-top: 10px;}
}



@media only screen and (max-width: 991px) and (min-width: 768px) {
  .col-sm-5.col-xs-6.precote,.col-sm-3.col-xs-6.prcoimga{width: 100%; text-align: center; }
  .col-sm-4.subc{ margin-top: 10px !important; text-align: center; width: 100%;}
  .col-sm-9.whitblo{width: 65%!important;}
  .col-sm-3.precont{width: 35%!important;}
  [data-tooltip]{
    display: none;
  }


}



@media screen and (max-width: 768px) {
 #map-layer { height: 350px; width: 100%;}
 .col-sm-4.subc{clear: both!important;}
.precote{
  text-align: center;

}
.prcoimga{
  text-align: center;
}
  .admission{
  margin-top: -144px;
}
  [data-tooltip]{
    display: none;
  }

.btn{
  text-align: center;
}
.btn{
  font-size: 16px;
}
  

}

@media screen and (max-width: 500px){

.precote{
  text-align: center;

}
  .admission{
  margin-top: -144px;
}
.btn{
  font-size: 16px!important;
}
}

@media screen and (max-width: 500px) {

 .col-sm-5.col-xs-6.precote,.col-sm-3.col-xs-6.prcoimga{text-align: center;  width: 100% !important;}
 .subc{text-align: center;}

}




/**
 * Tooltip Styles start
 */

/* Add this attribute to the element that needs a tooltip */
[data-tooltip] {
  position: relative;
  z-index: 2;
  cursor: pointer;
}

/* Hide the tooltip content by default */
[data-tooltip]:before,
[data-tooltip]:after {
  visibility: hidden;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=0);
  opacity: 0;
  pointer-events: none;
}

/* Position tooltip above the element */
[data-tooltip]:before {
  position: absolute;
  bottom: 150%;
  left: 50%;
  margin-bottom: 5px;
  margin-left: -195px;
  padding: 7px;
  width: 260px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  background-color: #edf4f4;
  /*background-color: hsla(0, 0%, 20%, 0.9);*/
  color: black;
  content: attr(data-tooltip);
  text-align: center;
  font-size: 14px;
  line-height: 1.8;
}

/* Triangle hack to make tooltip look like a speech bubble */
[data-tooltip]:after {
  position: absolute;
  bottom: 150%;
  left: 50%;
  margin-left: -5px;
  width: 0;
  border-top: 5px solid #000;
  border-top: 5px solid hsla(0, 0%, 20%, 0.9);
  border-right: 5px solid transparent;
  border-left: 5px solid transparent;
  content: " ";
  font-size: 0;
  line-height: 0;
}

/* Show tooltip content on hover */
[data-tooltip]:hover:before,
[data-tooltip]:hover:after {
  visibility: visible;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=100);
  opacity: 1;
}
  
  /*Tooltip style end*/
    </style>
		<div id="add">
		    <?php
		      foreach ($add1 as $k) {
		    ?>
				<div class="row" >

			        <div class="col-sm-3 col-xs-6 prcoimga">

			          <a href="<?php echo base_url("controller/pre_detail/sel/".$k->pid); ?>"><img  src="<?php echo $k->photo1; ?>" alt="Cinque Terre" width="170" height="150"></a>
			        </div>

			        <div class="col-sm-8 col-sm-8 precote" >

          <h3><a class="title" href="<?php echo base_url("controller/pre_detail/sel/".$k->pid) ?>"><?php echo $k->name; ?></a></h3>

          

                  <?php
                  foreach ($cou as $key) {
                    if($key->pid == $k->pid)
                    {
                      $a=round($key->star);
                    }
                  }


                  
                  ?>


<span class="fa fa-star <?php if(@$a>=1) { echo 'checked'; } ?>"></span>
<span class="fa fa-star <?php if(@$a>=2) { echo 'checked'; } ?>"></span>
<span class="fa fa-star <?php if(@$a>=3) { echo 'checked'; } ?>"></span>
<span class="fa fa-star <?php if(@$a>=4) { echo 'checked'; } ?>"></span>
<span class="fa fa-star <?php if(@$a>=5) { echo 'checked'; } ?>"></span>


   <!-- <select id="star-rating-1" name="st">
      <option value="">Select a rating</option>
      <option 
        <?php
          if($a=='5')
          {
            echo "selected";
          }
        ?>
       value="5">5</option>
      <option 
        <?php
          if($a=='4')
          {
            echo "selected";
          }
        ?>
       value="4">4</option>
      <option

        <?php
          if($a=='3')
          {
            echo "selected";
          }
        ?>


       value="3">3</option>
      <option

          <?php
          if($a=='2')
          {
            echo "selected";
          }
        ?>



       value="2">2</option>
      <option


        <?php
          if($a=='1')
          {
            echo "selected";
          }
        ?>


       value="1">1</option>

       </select> -->


       



                 
                                <p><i class="fa fa-map-marker"></i> <?php echo $k->addr; ?></p>
                              
                                

                                <div>
                                  <div class="row precote" align="right" style="margin-top: 26px;">

                                  	<!-- Mobile Information popup start -->
                                          <i class="fa fa-info-circle hidden-lg" data-toggle="modal" data-target="#myModal" style="padding-left: 164px;margin-top: -144px;margin-bottom: 14px;font-size: 18px;" aria-hidden="true"></i>
                                           <!-- Modal -->
                                              <div class="modal fade" id="myModal" role="dialog" style="margin-bottom: 20%;">
                                                <div class="modal-dialog modal-sm">
                                                  <div class="modal-content">
                                                    
                                                    <div class="modal-body">
                                                      <p>Click on this link and be the first to be Notified when their New Admission are opened.Thus, Now you don't need to remember any dates-leave it on us.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                        <!-- Mobile Information popup end -->
                                    
                                  
                                    <?php 
                                    if(@$this->session->userdata['userData']['email'])
                                    {

                                    ?>
                                    <a href="<?php echo $k->pdf; ?>" download>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <a style="text-decoration: none;"data-toggle="modal" data-target="#popUpWindow" data-target="#login-modal">
                                            <?php
                                            }

                                            ?>
                                          <br>
                                         
                                          <button  type="button" class="btn btn-defoult" style="background-color: #d6d6d6; color: black">Prospectus</button></a>
                                         
                                          <button onclick="location.href='<?php echo base_url("controller/askb2/sel/".$k->pid) ?>'" style="background-color: #ea4440; color: white;" type="button" class="btn btn-defoult">Ask Your Buddy</button>

                                          <button onclick="location.href='<?php echo base_url("controller/askb2/sel/".$k->pid) ?>'" style="background-color: #4683ea; color: white;" type="button" class="btn btn-defoult admission">New Admission</button><a  data-tooltip="Click on this link and be the first to be Notified when their New Admission are opened.Thus, Now you don't need to remember any dates-leave it on us."><i class="fa fa-info-circle" style="padding-left: 2px;" aria-hidden="true"></i></a>

                                        
                                </div>





                                <div class="modal fade" id="popUpWindow">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- header -->
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h3 class="modal-title">Login Form</h3>
                                            </div>
                                            <?php $loginURL = $this->google->loginURL(); ?>
                                            <a href="<?php echo @$loginURL; ?>"><img src="<?php echo base_url().'assets/images/glogin.png'; ?>" /></a>
                                        </div>
                                    </div>
                                </div> 
                           </div>
        </div>
			        
		      	</div>
		      	<hr style=" border: 1px solid #000000; ">
			<?php
			}
			?>
		</div>
		</div>
		<?php

			}
			else
			{
				$add1=$this->model->maxuser();
				$cou=$this->model->find1('pre_review','pid');
	?>
			<style type="text/css">
      



      .contact {

    list-style: none;

    margin: 0;

    padding: 0;

}


}
.title {
    color: black;
  }
.checked {
    color: orange;
}
#map-layer {
  
     width: 320px;
     height: 700px;
}




@media only screen and (max-width: 1199px) and (min-width: 992px) {

.col-sm-4.subc{margin-top:100px!important;}
button.btn.btn-defoult{margin-top: 10px;}
}



@media only screen and (max-width: 991px) and (min-width: 768px) {
  .col-sm-5.col-xs-6.precote,.col-sm-3.col-xs-6.prcoimga{width: 100%; text-align: center; }
  .col-sm-4.subc{ margin-top: 10px !important; text-align: center; width: 100%;}
  .col-sm-9.whitblo{width: 65%!important;}
  .col-sm-3.precont{width: 35%!important;}
  [data-tooltip]{
    display: none;
  }


}



@media screen and (max-width: 768px) {
 #map-layer { height: 350px; width: 100%;}
 .col-sm-4.subc{clear: both!important;}
.precote{
  text-align: center;

}
.prcoimga{
  text-align: center;
}
  .admission{
  margin-top: -144px;
}
  [data-tooltip]{
    display: none;
  }

.btn{
  text-align: center;
}
.btn{
  font-size: 16px;
}
  

}

@media screen and (max-width: 500px){

.precote{
  text-align: center;

}
  .admission{
  margin-top: -144px;
}
.btn{
  font-size: 16px!important;
}
}

@media screen and (max-width: 500px) {

 .col-sm-5.col-xs-6.precote,.col-sm-3.col-xs-6.prcoimga{text-align: center;  width: 100% !important;}
 .subc{text-align: center;}

}




/**
 * Tooltip Styles start
 */

/* Add this attribute to the element that needs a tooltip */
[data-tooltip] {
  position: relative;
  z-index: 2;
  cursor: pointer;
}

/* Hide the tooltip content by default */
[data-tooltip]:before,
[data-tooltip]:after {
  visibility: hidden;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=0);
  opacity: 0;
  pointer-events: none;
}

/* Position tooltip above the element */
[data-tooltip]:before {
  position: absolute;
  bottom: 150%;
  left: 50%;
  margin-bottom: 5px;
  margin-left: -195px;
  padding: 7px;
  width: 260px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  background-color: #edf4f4;
  /*background-color: hsla(0, 0%, 20%, 0.9);*/
  color: black;
  content: attr(data-tooltip);
  text-align: center;
  font-size: 14px;
  line-height: 1.8;
}

/* Triangle hack to make tooltip look like a speech bubble */
[data-tooltip]:after {
  position: absolute;
  bottom: 150%;
  left: 50%;
  margin-left: -5px;
  width: 0;
  border-top: 5px solid #000;
  border-top: 5px solid hsla(0, 0%, 20%, 0.9);
  border-right: 5px solid transparent;
  border-left: 5px solid transparent;
  content: " ";
  font-size: 0;
  line-height: 0;
}

/* Show tooltip content on hover */
[data-tooltip]:hover:before,
[data-tooltip]:hover:after {
  visibility: visible;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=100);
  opacity: 1;
}
  
  /*Tooltip style end*/
    </style>
		<div id="add">
		    <?php
		      foreach ($add1 as $k) {
		    ?>
				<div class="row" >

			        <div class="col-sm-3 col-xs-6 prcoimga">

			          <a href="<?php echo base_url("controller/pre_detail/sel/".$k->pid); ?>"><img  src="<?php echo $k->photo1; ?>" alt="Cinque Terre" width="170" height="150"></a>
			        </div>

			        <div class="col-sm-8 col-sm-8 precote" >

          <h3><a class="title" href="<?php echo base_url("controller/pre_detail/sel/".$k->pid) ?>"><?php echo $k->name; ?></a></h3>

          

                  <?php
                  foreach ($cou as $key) {
                    if($key->pid == $k->pid)
                    {
                      $a=round($key->star);
                    }
                  }


                  
                  ?>


<span class="fa fa-star <?php if(@$a>=1) { echo 'checked'; } ?>"></span>
<span class="fa fa-star <?php if(@$a>=2) { echo 'checked'; } ?>"></span>
<span class="fa fa-star <?php if(@$a>=3) { echo 'checked'; } ?>"></span>
<span class="fa fa-star <?php if(@$a>=4) { echo 'checked'; } ?>"></span>
<span class="fa fa-star <?php if(@$a>=5) { echo 'checked'; } ?>"></span>


   <!-- <select id="star-rating-1" name="st">
      <option value="">Select a rating</option>
      <option 
        <?php
          if($a=='5')
          {
            echo "selected";
          }
        ?>
       value="5">5</option>
      <option 
        <?php
          if($a=='4')
          {
            echo "selected";
          }
        ?>
       value="4">4</option>
      <option

        <?php
          if($a=='3')
          {
            echo "selected";
          }
        ?>


       value="3">3</option>
      <option

          <?php
          if($a=='2')
          {
            echo "selected";
          }
        ?>



       value="2">2</option>
      <option


        <?php
          if($a=='1')
          {
            echo "selected";
          }
        ?>


       value="1">1</option>

       </select> -->


       



                 
                                <p><i class="fa fa-map-marker"></i> <?php echo $k->addr; ?></p>
                              
                                

                                <div>
                                  <div class="row precote" align="right" style="margin-top: 26px;">

                                  	<!-- Mobile Information popup start -->
                                          <i class="fa fa-info-circle hidden-lg" data-toggle="modal" data-target="#myModal" style="padding-left: 164px;margin-top: -144px;margin-bottom: 14px;font-size: 18px;" aria-hidden="true"></i>
                                           <!-- Modal -->
                                              <div class="modal fade" id="myModal" role="dialog" style="margin-bottom: 20%;">
                                                <div class="modal-dialog modal-sm">
                                                  <div class="modal-content">
                                                    
                                                    <div class="modal-body">
                                                      <p>Click on this link and be the first to be Notified when their New Admission are opened.Thus, Now you don't need to remember any dates-leave it on us.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                        <!-- Mobile Information popup end -->
                                    
                                  
                                    <?php 
                                    if(@$this->session->userdata['userData']['email'])
                                    {

                                    ?>
                                    <a href="<?php echo $k->pdf; ?>" download>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <a style="text-decoration: none;"data-toggle="modal" data-target="#popUpWindow" data-target="#login-modal">
                                            <?php
                                            }

                                            ?>
                                          <br>
                                         
                                          <button  type="button" class="btn btn-defoult" style="background-color: #d6d6d6; color: black">Prospectus</button></a>
                                         
                                          <button onclick="location.href='<?php echo base_url("controller/askb2/sel/".$k->pid) ?>'" style="background-color: #ea4440; color: white;" type="button" class="btn btn-defoult">Ask Your Buddy</button>

                                          <button onclick="location.href='<?php echo base_url("controller/askb2/sel/".$k->pid) ?>'" style="background-color: #4683ea; color: white;" type="button" class="btn btn-defoult admission">New Admission</button><a  data-tooltip="Click on this link and be the first to be Notified when their New Admission are opened.Thus, Now you don't need to remember any dates-leave it on us."><i class="fa fa-info-circle" style="padding-left: 2px;" aria-hidden="true"></i></a>

                                        
                                </div>





                                <div class="modal fade" id="popUpWindow">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- header -->
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h3 class="modal-title">Login Form</h3>
                                            </div>
                                            <?php $loginURL = $this->google->loginURL(); ?>
                                            <a href="<?php echo @$loginURL; ?>"><img src="<?php echo base_url().'assets/images/glogin.png'; ?>" /></a>
                                        </div>
                                    </div>
                                </div> 
                           </div>
        </div>
			        
		      	</div>
		      	<hr style=" border: 1px solid #000000; ">
			<?php
			}
			?>
		</div>
		</div>
		<?php
			}
			

		}


    public function acorate()
    {
    // $cat1=array('categories'=>$cat);
    // print_r($cat1);
    
   $add=$this->input->post('id');
   $cate=$this->input->post('cate');


    $add2=array('area'=>$add,"categories"=>$cate);
    $cou=$this->model->find1('cocurr_o_review','cocid');
    $test=$this->model->select_where("cocurr",$add2);
    ?>
   
 <div id="add">
                        <?php
                         if ($test) {
                        foreach ($test as $k) {
                        ?>
                        <div class="row">
                            <div class="col-sm-3 col-xs-6 prcoimga">
                                <a href="<?php echo base_url("controller/co_curr_detail/sel/".$k->ccid); ?>"><img  src="<?php echo $k->photo1; ?>" class="img-circle1" alt="Cinque Terre" width="170" height="150"></a>
                            </div>
                            <div class="col-sm-8 col-xs-6 precote">
                                <h3><a  href="<?php echo base_url("controller/co_curr_detail/sel/".$k->ccid) ?>"><?php echo $k->name; ?></a></h3>
                                <p><a href=""><?php echo $k->categories; ?></a></p>
                                 <?php
                  foreach ($cou as $key) {
                    if($key->ccid == $k->ccid)
                    {
                      $a=round($key->star);
                     // echo "innn";
                     break;
                    }
                    else
                    {
                      $a="NULL";
                    }
                  }
                  ?>
<?php
// echo $a;
  if(@$a != 'NULL')
  {
?>
<span class="fa fa-star <?php if(@$a>=1) { echo 'checked'; } ?>"></span>
<span class="fa fa-star <?php if(@$a>=2) { echo 'checked'; } ?>"></span>
<span class="fa fa-star <?php if(@$a>=3) { echo 'checked'; } ?>"></span>
<span class="fa fa-star <?php if(@$a>=4) { echo 'checked'; } ?>"></span>
<span class="fa fa-star <?php if(@$a>=5) { echo 'checked'; } ?>"></span>
 <?php
if (@$key->count) {
 

 echo  "(".@$key->count.")";
 }
 else
 {
  echo "(0)";
 }
 }
 else
 { 
 ?>
 <span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<span class="fa fa-star "></span>
<?php 
}
 ?>
                                <!-- <p><a href="">310 East 14th Street, New York, NY 10003 Within 0.5 mile</a></p> -->
                                <div>
                                    <i class="fa fa-map-marker">&nbsp;<?php echo $k->addr; ?></i>
                                </div>
                            </div>
                             <!-- <div class="col-sm-4 subc" style="margin-top: 145px;">
                                <div>
                                    <?php 
                                    if(@$this->session->userdata['userData']['email'])
                                    {
                                    ?>
                                    <a href="<?php echo $k->pdf; ?>" download>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                        <a style="text-decoration: none;"data-toggle="modal" data-target="#popUpWindow" data-target="#login-modal">
                                            <?php
                                            }

                                            ?>
                                           <button  type="button" class="btn btn-defoult" style="background-color: #d6d6d6; color: black">Prospectus</button></a>
                                        <button style="background-color: #4683ea; color: white;" type="button" class="btn btn-defoult">Ask Your Buddy</button>
                                </div>

                                <div class="modal fade" id="popUpWindow">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                           
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h3 class="modal-title">Login Form</h3>
                                            </div>
                                            <?php $loginURL = $this->google->loginURL(); ?>
                                            <a href="<?php echo @$loginURL; ?>"><img src="<?php echo base_url().'assets/images/glogin.png'; ?>" /></a>
                                        </div>
                                    </div>
                                </div> 
                            </div> -->
                        </div>
                        <hr style=" border: 1px solid #000000; ">

                         <?php
                        }
                      }
                      else
                      {
                        ?>
                        <p><i><i class="fa fa-frown-o" style="font-size: 20px;" aria-hidden="true"></i>&nbsp;&nbsp;We are Sorry for the inconvenience. We are Working on this.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have A Great Day...</i></p>
                        <?php
                      }
                        ?>
                    </div>
                    </div>
<?php

}


public function acoorate()
{

  $add=$this->input->post('id');
   $cate=$this->input->post('cate');


    $add2=array('area'=>$add,"categories"=>$cate);
    $cou=$this->model->find1('cocurr_o_review','cocid');
    $test=$this->model->select_where("cocurr_o",$add2);
?>   

  <div id="add">
                        <?php
                        if ($test) {
                        foreach ($test as $k) {

                        ?>
                        <div class="row">
                            <div class="col-sm-3 col-xs-6 prcoimga">
                                <a href="<?php echo base_url("controller/co_curr_o_detail/sel/".$k->cocid); ?>"><img  src="<?php echo $k->photo1; ?>" class="img-circle1" alt="Cinque Terre" width="150" height="150"></a>
                            </div>
                            <div class="col-sm-5 col-xs-6 precote">
                                <h3><a  href="<?php echo base_url("controller/co_curr_o_detail/sel/".$k->cocid) ?>"><?php echo $k->name; ?></a></h3>
                                <p><a href=""><?php echo $k->categories; ?></a></p>
                                <?php
                                foreach ($cou as $key) {
                                if($key->cocid == $k->cocid)
                                {
                                $a=round($key->star);
                                // echo "innn";
                                break;
                                }
                                else
                                {
                                $a="NULL";
                                }
                                }
                                ?>
                                <?php
                                if(@$a != 'NULL')
                                {
                                ?>
                                <span class="fa fa-star <?php if(@$a>=1) { echo 'checked'; } ?>"></span>
                                <span class="fa fa-star <?php if(@$a>=2) { echo 'checked'; } ?>"></span>
                                <span class="fa fa-star <?php if(@$a>=3) { echo 'checked'; } ?>"></span>
                                <span class="fa fa-star <?php if(@$a>=4) { echo 'checked'; } ?>"></span>
                                <span class="fa fa-star <?php if(@$a>=5) { echo 'checked'; } ?>"></span>
                                 <?php
                                    if (@$key->count) {
                                     

                                     echo  "(".@$key->count.")";
                                     }
                                     else
                                     {
                                      echo "(0)";
                                     }
                                     }
                                     else
                                     { 
                                     ?>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <span class="fa fa-star "></span>
                                <?php 
                                }
                                ?>
                                
                                <div>
                                <p><i class="fa fa-map-marker"></i>&nbsp;<?php echo $k->addr; ?></p>
                                </div>
                            </div>
                            
                        </div>
                        <hr style=" border: 1px solid #000000; ">
                        <?php
                        }
                        }
                        else
                        {
                        ?>
                        <p><i><i class="fa fa-frown-o" style="font-size: 20px;" aria-hidden="true"></i>&nbsp;&nbsp;We are Sorry for the inconvenience. We are Working on this.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Have A Great Day...</i></p>
                        <?php
                        }
                        ?>
                    </div>
                    
<?php
   
}

}

?>