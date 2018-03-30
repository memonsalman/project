<?php 
//use PHPPOT\Examples;



define("API_KEY","AIzaSyAILdUdFkXYGsRmlryY7FmSCzIJr9ynEtg");

?>
<!DOCTYPE html>

<html lang="en">

<head>

  <title>Pre School</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

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
    /*width="320";
     height="700";*/
     width: 320px;
     height: 700px;

     /*frameborder="0"*/
   /* margin: 20px 0px;
    max-width: 600px;
    min-height: 400;*/
}
  </style>

</head>

<body style="background-color: #edf4f4;">

 <?php include 'header.php';?>

 <?php include 'menu.php';?>



<div class="container">

               <div class="row ">
                    <div class="col-md-6 col-xs-6">
                      <h4><strong> My Ed World</strong></h4>
                    </div>
                    <div class="col-md-6 col-xs-6">
                      <h4 style="float: right;"><strong> Sign In/Join</strong></h4>
                    </div>
                  </div> 

                <div class="row ">
                   <div class="col-sm-7 col-xs-4">
                   <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter Name" id="usr">
                    </div>
                     
                   </div>
                    <div class="col-sm-2 col-xs-4">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter Zip code or City" id="usr">
                    </div>
                     
                   </div>
                    <div class="col-sm-3 col-xs-4">
                     <div class="form-group">
                      <input type="text" class="form-control" id="usr">
                    </div>
                   </div>
                </div>

 </div>


<div class="container">

<section style="padding: 2px 20px; ">

    

  <div class="row">



    <div class="col-sm-9" style="background-color: white;">

    <h3 style="padding-top: 10px;">Pre-School</h3>

    <hr style="margin-top: 10px;">

    <?php

      foreach ($test as $k) {

        

    ?>

       <div class="row">

        <div class="col-sm-3 col-xs-6">

          <a href="<?php echo base_url("controller/pre_detail/sel/".$k->pid); ?>"><img  src="<?php echo $k->photo1; ?>" alt="Cinque Terre" width="150" height="150"></a>

        </div>

        <div class="col-sm-5 col-xs-6">

          <h3><a class="title" href="<?php echo base_url("controller/pre_detail/sel/".$k->pid) ?>"><?php echo $k->name; ?></a></h3>


         <!--  <p><a href="STUDY_ABROAD_details.html"><?php echo $k->board; ?></a></p> -->

          <!-- <p><a href="">310 East 14th Street, New York, NY 10003 Within 0.5 mile</a></p> -->

                                <span class="fa fa-star checked" style="font-size: 20px;"></span>
                                <span class="fa fa-star checked" style="font-size: 20px;"></span>
                                <span class="fa fa-star checked" style="font-size: 20px;"></span>
                                <span class="fa fa-star" style="font-size: 20px;"></span>
                                <span class="fa fa-star" style="font-size: 20px;"></span>
                                <p><i class="fa fa-map-marker"></i> <?php echo $k->addr; ?></p>
                                
        </div>

         <div class="col-sm-4 " style="margin-top: 145px;">
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
                                        <!-- <form method="post" action="chat">
                                       <input type="submit" name="chat">
                                      </form> -->
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



      <hr style=" border: 1px solid #000000; ">

<?php

}

?>

      

    </div>

    

    <div class="col-sm-3">
                        <div id="map-layer"></div>
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.2759783927127!2d72.8171293148646!3d21.181192987932977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e444f8d9519%3A0xd3cc1c07a39a92af!2sRising+Wings+-+SEO+Company+in+Surat+%7C+Website+Development+%7C+Digital+Marketing+Company!5e0!3m2!1sen!2sin!4v1510128339905" width="320" height="700" frameborder="0" style="border:0" allowfullscreen></iframe> -->

                    </div>

    

  </div>

  

</section>

</div>

  <script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&callback=initMap"
        async defer></script>
    
    <script type="text/javascript">
    var map;
    var geocoder;       

    function initMap() {
        var mapLayer = document.getElementById("map-layer");
        var centerCoordinates = new google.maps.LatLng(22.4013324, 72.0750651);
        var defaultOptions = { center: centerCoordinates, zoom: 7 }

        map = new google.maps.Map(mapLayer, defaultOptions);
        geocoder = new google.maps.Geocoder();
        
        <?php 
        //print_r($test);
            if(!empty($test)) 
            {
                 foreach ($test as $k) 
                {   
         ?>  
            geocoder.geocode( { 'address': 'rising wings' }, function(LocationResult, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = <?php echo $k->long; ?>;
                    var longitude = <?php echo $k->lati; ?>;
                } 
                        new google.maps.Marker({
                        position: new google.maps.LatLng(latitude, longitude),
                        map: map,
                        title: 'test'
                    });
            });
        <?php
                }
            }
        ?>      
    }
    </script>
  
<?php include 'footer.php';?>

</body>

</html>

