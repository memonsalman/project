
<!-- <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script> -->
<script src="<?php echo base_url('assets/bvalidator-1.0.4-dist/jquery-3.2.1.min.js'); ?>"></script> 
<script src="<?php echo base_url('assets/bvalidator-1.0.4-dist/jquery.bvalidator.min.js'); ?>"></script>
<link href="<?php echo base_url('assets/bvalidator-1.0.4-dist/themes/gray/gray.css')?>" rel="stylesheet" />
<!-- <link href="<?php echo base_url('assets/css/jquery-ui.css')?>" rel="stylesheet"> -->
<script src="<?php echo base_url('assets/bvalidator-1.0.4-dist/themes/presenters/default.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bvalidator-1.0.4-dist/themes/gray/gray.js')?>"></script>

    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.23/themes/base/jquery-ui.css">
<!-- <script src="http://code.jquery.com/jquery-1.8.2.js"></script> -->
<script src="http://code.jquery.com/ui/1.8.23/jquery-ui.js"></script>
<link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">

<style type="text/css">
.pradio{text-align: left; font-size:14px;margin-left: 43px;}
    table.addmore select {width: 100% !important;} 
    .modal-header .close {margin-top: -2px;color: green; background: white;}
    .btn-google-plus{color:#fff;background-color:#dd4b39;border-color:rgba(0,0,0,0.2)}.btn-google-plus:hover,.btn-google-plus:focus,.btn-google-plus:active,.btn-google-plus.active,.open .dropdown-toggle.btn-google-plus{color:#fff;background-color:#ca3523;border-color:rgba(0,0,0,0.2)}
    .btn-google-plus:active,.btn-google-plus.active,.open .dropdown-toggle.btn-google-plus{background-image:none}
    .btn-google-plus.disabled,.btn-google-plus[disabled],fieldset[disabled] .btn-google-plus,.btn-google-plus.disabled:hover,.btn-google-plus[disabled]:hover,fieldset[disabled] .btn-google-plus:hover,.btn-google-plus.disabled:focus,.btn-google-plus[disabled]:focus,fieldset[disabled] .btn-google-plus:focus,.btn-google-plus.disabled:active,.btn-google-plus[disabled]:active,fieldset[disabled] .btn-google-plus:active,.btn-google-plus.disabled.active,.btn-google-plus[disabled].active,fieldset[disabled] .btn-google-plus.active{background-color:#dd4b39;border-color:rgba(0,0,0,0.2)}
    .modal-header td, th{padding:5px!important;}

    .modal-header input[type="Submit"]{background-color: #F77462!important; border-color: #F77462!important; color: white!important;padding: 10px!important; font-weight: bold!important;}
    .modal-header #Button1{background-color: #F77462!important; border-color: #F77462!important; color: white!important;padding: 10px!important; font-weight: bold!important;box-sizing: border-box; cursor: pointer;}
    .modal-header #Button1:hover{color: black!important;}
    .modal-header input:hover{color: black!important;}
    select, .u-form-group input[type="text"], .u-form-group input[type="date"], .u-form-group input[type="email"], .u-form-group input[type="password"]{width: 85%!important;}
    table.addmore .u-form-group input[type="submit"], .u-form-group button{width: 100% !important;}
    .addmore {margin: 0 0 0 40px;}

    @media only screen and (max-width: 1200px) {
        a.regurl{  color: white;     margin-right: -24px; border-radius: 5px;}
        div#ui-datepicker-div{top:50px!important;}
        .dropdown dt a{    margin-left: 20px!important; width: 85%!important;}
        .dropdown dd ul{    margin-left: 20px!important;width: 85%!important}
        .dropdown1 a{    margin-left: 20px!important; width: 85%!important;}
        .dropdown1 ul{margin-left: 20px!important;width: 85%!important}
        .pradio{text-align: left; font-size:14px;margin-left: 25px;}
    }

    .login-box{ position:relative; margin: 10px auto; width: 500px;height: 380px;background-color: #fff; padding: 10px; border-radius: 3px; -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.33);-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.33);
                box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.33);}

    .lb-header{position:relative;color: #00415d; margin: 5px 5px 10px 5px; padding-bottom:10px; border-bottom: 1px solid #eee; text-align:center;  height:28px;}
    .lb-header a{margin: 0 25px;  padding: 0 20px;text-decoration: none; color: black; font-weight: bold; font-size: 15px; -webkit-transition: all 0.1s linear; -moz-transition: all 0.1s linear;  transition: all 0.1s linear;}
    .lb-header .active{color: #029f5b; font-size: 16px;}
    .social-login{ position:relative; float: left; width: 100%; height:auto; padding: 10px 0 15px 0;  border-bottom: 1px solid #eee;}
    .social-login a{ position:relative; float: left; width:calc(40% - 8px); text-decoration: none;color: #fff; border: 1px solid rgba(0,0,0,0.05);padding: 12px;border-radius: 2px;font-size: 12px;text-transform: uppercase;margin: 0 3%; text-align:center;}
    .social-login a:hover{color: white; transform: scale(1.1); text-decoration: none;}

    .social-login a i{position: relative;float: left;width: 20px; top: 2px;}
    .social-login a:first-child{background-color: #49639F;}
    .social-login a:last-child{background-color: #DF4A32;}
    .email-login,.email-signup{position:relative;float: left; width: 100%; height:auto;margin-top: 20px;text-align:center;}
    .u-form-group{width:100%;  margin-bottom: 10px;}
    select,.u-form-group input[type="text"],.u-form-group input[type="date"],.u-form-group input[type="email"],.u-form-group input[type="password"]{width: calc(50% - 22px); height:45px; outline: none;border: 1px solid #ddd;padding: 0 10px;border-radius: 2px;color: #333;font-size:1.6rem; -webkit-transition:all 0.1s linear;}
     .u-form-group input:focus{border-color: #358efb;}
    .u-form-group input[type="submit"],.u-form-group button{width:50%;background-color: #1CB94E; border: none;outline: none;color: #fff;font-size: 14px;font-weight: normal;padding: 8px 8px;border-radius: 2px;text-transform: uppercase;}
    .forgot-password{width:50%;text-align: left; text-decoration: underline;color: #888;font-size: 1.25rem;}

    .dropdown1 ul{width: 210!important;}
    @media only screen and (max-width: 768px){
        select, .u-form-group input[type="text"], .u-form-group input[type="date"], .u-form-group input[type="email"], .u-form-group input[type="password"]{width: 100%; font-weight: 900;}
    } 

    @media only screen and (max-width: 360px){
        .lb-header a{margin: 0!important;}
        .social-login a{    width: calc(40% - -10px)!important;}
        .u-form-group.radi{font-size: 17px!important;}
    }

    @media only screen and (max-width: 768px){
        .fa-arrow-right{
            display: none!important;}
    }

    

    #txtDate
    {
        background-image: url(http://i988.photobucket.com/albums/af3/mudassarkhan/calender.png);
        background-repeat: no-repeat;
        padding-left: 25px;
    }
    #autoSuggestionsList > li {
                background: none repeat scroll 0 0 #F3F3F3;
                border-bottom: 1px solid #E3E3E3;
                list-style: none outside none;
                padding: 3px 15px 3px 15px;
                text-align: left;
            }

            #autoSuggestionsList > li a { color: #F77462; }

            .auto_list {
                border: 1px solid #E3E3E3;
                border-radius: 5px 5px 5px 5px;
                position: absolute;
                z-index: 99999;
                background-color: #F77462;
                top: 35px;
                width: 100%;
            }
a.uname{font-size: 30px;background: #F77462; padding:2px 9px; border-radius: 50%;color: white; position: relative;top: -3px; left: 47px;}


i.glyphicon.glyphicon-eye-open{color: black!important;}
span.showbuton{ position: absolute; top: 16px;  right: 44px;}
.u-form-group.passwordaa{    position: relative;}
button.reveal{background-color: transparent!important;}

</style>



<div class="row visible-lg">
	<!-- <?php print_r($select2); ?> -->
    <div class="col-lg-2 col-sm-12"></div>
    <div style="text-align: center; padding-bottom: 10px;" class="col-lg-8">
        <img src="<?php echo @$select2[0]->image1; ?>" style="width: 100%; height: 100px;" >
    </div>
    <div class="col-lg-2"></div>

</div>


<div class="container">
    <div class="row" style="/*padding-bottom: 10px;*/">
        <div align="" class="col-lg-3" >
            <div class="row">
                <div class="col-xs-7" style="margin-left: -85px; ">

                    <!-- Logo desktop start -->
                    <a href="<?php echo base_url('controller/index') ?>" class="logo visible-lg"><i class="q-education-logo-m visible-lg"></i><span style="margin-left: 40px;"><img style=" width: 275px; height: 52px;padding-bottom: 10px;padding-left: 42px !important;" src="<?php echo base_url('assets/img/logocolornewcopy.png'); ?>  "></span></a>
                    <!-- Logo desktop end -->

                    <!-- logo mobile start -->
                    <a  href="<?php echo base_url('controller/index') ?>" class="logo hidden-lg"><i class="q-education-logo-m "></i><span style="margin-left: 30px;"><img style=" width: 200px; height: 44px;padding-bottom: 10px;padding-left: 54px !important;" src="<?php echo base_url('assets/img/logocolornewcopy.png'); ?>  "></span></a>
                    <!-- Logo mobile end -->

                </div>
                <div class="col-sm-3 col-xs-3 visible-sm visible-xs"><form method="post" action="<?php echo base_url("controller/logout");  ?>">

                    

                                    
                                    
                                    
                                    <?php if(@$this->session->userdata['userData']['first_name']) 
                                { ?> 
                                <a href="<?php echo base_url("controller/userauto/sel/".$this->session->userdata['userid'])?>"><img src="<?php echo @$this->session->userdata['userData']['picture_url']; ?>" height="40px" width="40px" style="border-radius: 50px;margin-top: -15px;margin-left: 40px;"> </a>

                                <i style="font-size: 15px;" class="fa fa-arrow-right" aria-hidden="true"></i>

                                <a onclick="window.open('https://mail.google.com/mail/u/0/?logout&hl=en')"; style="margin-left: 40px;" onclick="FB.logout()"; href="<?php echo base_url('controller/logout');  ?>"  >  Logout</a>  
                                <?php 

                                } 

                                elseif(@$this->session->userdata['userid'] OR @$this->session->userdata['userid2'])
                                {
                                if(@$this->session->userdata['userid']) 
                                {
                                ?>
                                <a href="<?php echo base_url("controller/userauto/sel/".$this->session->userdata['userid'])?>" class="uname"><?php @$a=$this->session->userdata['uname']; echo substr($a,0,1); ?></a>

                                <i style="font-size: 15px;" class="fa fa-arrow-right" aria-hidden="true"></i>
                                <a href="<?php echo base_url('controller/logout');  ?>"  style="margin-left: 45px;">  Logout</a>

                                <?php
                                }
                                elseif(@$this->session->userdata['userid2']) 
                                {
                                ?>  
                                <a href="<?php echo base_url("controller/userauto/sel/".$this->session->userdata['userid'])?>" class="uname"><?php $a=$this->session->userdata['uname']; echo substr($a,0,1); ?></a>

                                <i style="font-size: 15px;" class="fa fa-arrow-right" aria-hidden="true"></i>
                                <a href="<?php echo base_url('controller/logout');  ?>">Logout</a>

                                <?php
                                }

                                } 

                                else{
                                ?>
                                <a class="regurl" style=" text-decoration: none; cursor: pointer;font-size: 23px;" data-toggle="modal" data-target="#popUpWindow" data-target="#login-modal"> <i class="fa fa-user-circle" style="color: #f77462;font-size: 23px;margin-left: 50px;" aria-hidden="true"></i><?php }   ?> </a>
                            
                            



                       
                    </form>
                  </div>
                <div class="col-sm-2 col-xs-2 visible-sm visible-xs"><span  class="hidden-lg"><a  href="<?php echo base_url('controller/list_institute') ?>"><button class="button button1" style="width: 115px;height: 35px;font-size: 11px !important;">List Your Institute</button></a></span></div>

            </div>
        </div>

        <div class="col-lg-5 visible-lg" style="padding-bottom: 10px;/*margin-top: 35px;*/">
            <div  class="input-group" style="text-align: center;">

                <input type="hidden" name="search_param" value="all" id="search_param">         
                <!-- <input type="text" class="form-control" name="x" placeholder="Search term..."> -->
                <div class="something">
                    <input name="search_data" placeholder="Search term..." class="form-control" id="search_data" type="text" onkeyup="ajaxSearch();">
                    <div id="suggestions">
                        <div id="autoSuggestionsList">
                        </div>
                    </div>
                </div>
<script type="text/javascript">
            function ajaxSearch()
            {
                var input_data = $('#search_data').val();

                if (input_data.length === 0)
                {
                    $('#suggestions').hide();
                }
                else
                {

                    var post_data = {
                        'search_data': input_data,
                        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                    };

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>Controller/autocomplete/",
                        data: post_data,
                        success: function (data) {
                            // return success
                            if (data.length > 0) {
                                $('#suggestions').show();
                                $('#autoSuggestionsList').addClass('auto_list');
                                $('#autoSuggestionsList').html(data);
                            }
                        }
                    });

                }
            }
        </script>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
        <!-- Desktop view start -->
        <div style="" class="col-lg-4">
            <div class="row">
                <div  class="col-md-7 visible-lg" style="/*margin-top: 35px;*/">
                    <form method="post" action="<?php echo base_url('controller/logout'); ?>">

                        <!-- <div class="col-xs-5" style="float: right;">
                          <span  class="hidden-lg"><a  href="<?php echo base_url('controller/list_institute') ?>"><button class="button button1" style="width: 138px;height: 40px;">List Your Institute</button></a></span>
                        </div> -->

                        <p style="font-size: 20px; margin-top: 1px;" aria-hidden="true">
                                <?php if(@$this->session->userdata['userData']['first_name']) 
                                { ?> 
                                <a href="<?php echo base_url("controller/userauto/sel/".$this->session->userdata['userid'])?>"><img src="<?php echo @$this->session->userdata['userData']['picture_url']; ?>" height="40px" width="40px" style="border-radius: 50px;"> <?php echo @$this->session->userdata['userData']['first_name']; ?></a>

                                <i style="font-size: 15px;" class="fa fa-arrow-right" aria-hidden="true"></i>

                                <a onclick="window.open('https://mail.google.com/mail/u/0/?logout&hl=en')"; onclick="FB.logout()"; href="<?php echo base_url('controller/logout');  ?>"  >  Logout</a>  
                                <?php 

                                } 
                                elseif(@$this->session->userdata['userid'] OR @$this->session->userdata['userid2'])
                                {
                                if(@$this->session->userdata['userid']) 
                                {
                                ?>
                                <a href="<?php echo base_url("controller/userauto/sel/".$this->session->userdata['userid'])?>"><?php echo @$this->session->userdata['uname']; ?></a>

                                <i style="font-size: 15px;" class="fa fa-arrow-right" aria-hidden="true"></i>
                                <a href="<?php echo base_url('controller/logout');  ?>"  >  Logout</a>

                                <?php
                                }
                                elseif(@$this->session->userdata['userid2']) 
                                {
                                ?>  
                                <a href="<?php echo base_url("admin/mydetial")?>"><?php echo $this->session->userdata['uname']; ?></a>

                                <i style="font-size: 15px;" class="fa fa-arrow-right" aria-hidden="true"></i>
                                <a href="<?php echo base_url('controller/logout');  ?>"  >  Logout</a>

                                <?php
                                }

                                } 

                                else{
                                ?>
                                <a class="regurl" style=" text-decoration: none; cursor: pointer;font-size: 23px;" data-toggle="modal" data-target="#popUpWindow" data-target="#login-modal"> <i class="fa fa-user-circle" style="color: #f77462;font-size: 23px;padding-top: 9px;" aria-hidden="true"></i>Login/Register<?php }   ?> </a></p>
                        </p>
                    </form>
                </div> 
                <div class="col-lg-4 visible-lg" style="/*margin-top: 35px;*/"><a  href="<?php echo base_url('controller/list_institute') ?>"><button style="width: 138px;height: 40px;font-size: 14px;" class="button button1">List Your Institute</button></a>
                </div>
            </div>
        </div>  
        
        <!-- Desktop view end -->
        <div class="col-lg-5 hidden-lg" style="padding-bottom: 10px;/*margin-top: 35px;*/">
            <div  class="input-group" style="text-align: center;">
                <input type="hidden" name="search_param" value="all" id="search_param">         
                <input type="text" class="form-control" name="x" placeholder="Search term...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- header close- -->

<!-- login popup start -->

<?php 

$msg2=$this->session->flashdata('msg');

if($msg2 != "")

{

echo "<script type='text/javascript'>alert('$msg2');</script>";

}

?>

<div class="modal fade" id="popUpWindow">
    <div class="modal-dialog">
        <div class="modal-content" align="center">
            <!-- header -->
            <div class="modal-header">
                <span type="button" class="close btn btn-default" data-dismiss="modal" style="margin-top: -10px; ">&times;</span>
                 </div>
                <div class="modal-header">
                    <div class="lb-header">
                        <a href="#" class="active" id="login-box-link">Login</a>
                        <a href="#" id="signup-box-link">Sign Up</a>
                    </div>
                        
                        <div class="social-login">
                        <?php $floginURL=$this->facebook->login_url(); ?>
                        <!-- <a href="<?php echo $floginURL; ?>"><i class="fa fa-facebook fa-lg"></i>facebook</a> -->
                        <a href="#"   onclick="myFunction()" ><i class="fa fa-facebook fa-lg"></i>facebook</a>
                        
<script>
function myFunction() {
    
    var person = prompt("Please enter your name:");
     
     var res = person.replace("@", "_");
    if (res == null || res == "") {
       alert("User cancelled the prompt.");
    } else {
        window.location = "controller/sociallogin/sel/" + res;


    }
     //document.getElementById("demo").innerHTML = txt;
}
</script>


                         
                        <a href="#" onclick="myFunction2()"><i class="fa fa-google-plus fa-lg"></i>Google</a>
                        <?php $loginURL = $this->google->loginURL();  ?>



                    </div>

                    <script>
function myFunction2() {
    
    var person = prompt("Please enter your name:");
     
     var res = person.replace("@", "_");
    if (res == null || res == "") {
       alert("User cancelled the prompt.");
    } else {
        window.location = "controller/sociallogin2/sel/" + res;


    }
     
}
</script>



                    <form class="email-login" method="post" data-bvalidator-validate action="<?php echo site_url('controller/loged'); ?>" >
                        
                        <div class="u-form-group">
                            <input type="text" placeholder="User Name *" data-bvalidator="required" name="uname" />
                        </div>
                         <div class="u-form-group passwordaa">
                            <input type="password" name="upass" class="pwd" placeholder="Password *" id="myInput" data-bvalidator="required"/>
                            
                            
                            <span class="showbuton">
            <button class= "reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
          </span>   
          <script type="text/javascript">
            $(".reveal").on('click',function() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
          </script>
      </div>
          
                        
                        <div class="u-form-group">
                            <input type="submit" name="log_sub" value="Login" style="background-color: #ff533b!important;">
                        </div>
                        <div class="u-form-group">
                            <a href="<?php echo base_url("controller/forget")?>" class="forgot-password">Forgot password?</a>
                        </div>
                    </form>

                    <form class="email-signup" method="post" id="regform" data-bvalidator-validate action="<?php echo site_url('controller/user_reg'); ?>" >
                        
                           <div class="u-form-group">
                            <input type="text" placeholder="First Name *" data-bvalidator="required" name="funame" />
                        </div>
                        

                           <div class="u-form-group">
                            <input type="text" placeholder="Last Name *" data-bvalidator="required" name="luname" />
                        </div> 

                           <div class="u-form-group">
                            <select name="ugen" data-bvalidator="required">
                                <option>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>     

                            <div class="u-form-group">
                          <input type="email" placeholder="Email *" data-bvalidator="required" name="uemail"/>
                      </div>
                      

                        <!-- <div class="u-form-group">
                            <input type="text" placeholder="User Name *" data-bvalidator="required" name="uname" />
                        </div> -->
                                   <div class="u-form-group passwordaa">
                            <input type="password" name="upass" class="pwd2" placeholder="Password *" id="myInput2" data-bvalidator="required"/>
                            
                            
                            <span class="showbuton">
            <button class= "reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
          </span>   
          <script type="text/javascript">
            $(".reveal").on('click',function() {
    var $pwd = $(".pwd2");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
          </script>
      </div>
                        

                        <div class="u-form-group passwordaa">
    <input type="password" name="upass" class="pwd3" placeholder="Confirm Password *" id="" data-bvalidator-msg-equal="Please type same password" data-bvalidator="equal[myInput2],required"/>
                            
                            <span class="showbuton">
            <button class= "reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
          </span>   
          <script type="text/javascript">
            $(".reveal").on('click',function() {
    var $pwd = $(".pwd3");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
});
          </script>

                            </div>
                            
                        
       <!-- 
 <div class="u-form-group">
        <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
     <input type="text" placeholder="Birth Date dd/mm/yyyy" data-bvalidator="date[dd.mm.yyyy],required" name="udob">
      </div>

        <div class="u-form-group">
        <select name="ucity" data-bvalidator="required">
      <option value="">Select Your City *</option>
      <option value="Agra">Agra</option>
      <option value="Ahmedabad">Ahmedabad</option>
      <option value="Anand">Anand</option>
      <option value="Bangalore">Bangalore</option>
      <option value="Bharuch">Bharuch</option>
      <option value="Bhavnagar">Bhavnagar</option>
      <option value="Chandigarh">Chandigarh</option>
      <option value="Valsad">Chennai</option>
      <option value="Delhi">Delhi</option>
      <option value="Gandhidham">Gandhidham</option>
      <option value="Gandhinagar">Gandhinagar</option>
      <option value="Gwalior">Gwalior</option>
      <option value="Hyderabad">Hyderabad</option>
      <option value="Jaipur">Jaipur</option>
      <option value="Jamnagar">Jamnagar</option>
      <option value="Jodhpur">Jodhpur</option>
      <option value="Junagadh">Junagadh</option>
      <option value="Kanpur">Kanpur</option>
      <option value="Kolkata">Kolkata</option>
      <option value="Kollam">Kollam</option>
      <option value="Kota">Kota</option>
      <option value="Lucknow">Lucknow</option>
      <option value="Mehsana">Mehsana</option>
      <option value="Morbi">Morbi</option>
      <option value="Mumbai">Mumbai</option>
      <option value="Nadiad">Nadiad</option>
      <option value="Nagpur">Nagpur</option>
      <option value="Navsari">Navsari</option>
      <option value="Pune">Pune</option>
      <option value="Raipur">Raipur</option>
      <option value="Rajkot">Rajkot</option>
      <option value="Ranchi">Ranchi</option>
      <option value="Surat">Surat</option>
      <option value="Vadodara">Vadodara</option>
      <option value="Valsad">Valsad</option>
      <option value="Vapi">Vapi</option>
      <option value="Veraval">Veraval</option>
      <option value="Valsad">Vijaywada</option>
      </select>
      </div>
 -->

                        <!-- <p  style="text-align: left; padding-left: 50px; margin-bottom: -5px;">Studies</p> -->
           <!--              <div class="u-form-group">
                            <dl class="dropdown"> 
                                <dt>
                                    <a href="#">
                                        <span class="hida1" style="color: #333; font-size: 1.6rem">Education</span>       
                                        <p class="multiSel"></p>  
                                    </a>
                                </dt>
                                <dd>
                                    <div class="mutliSelect">
                                        <ul style="position: relative; text-align: left;">
                                            <?php 
                                            foreach ($edu as $k) {

                                            ?>

                                            <li><input type="checkbox"  value="<?php echo $k->user_edu; ?>" name="user_edu[]" data-bvalidator="required" ><?php echo $k->user_edu; ?></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </dd>
                            </dl>
                        </div> -->
                        <!-- </div> -->

                      <!--   <p style="text-align: left; padding-left: 30px; margin-bottom: -5px;">Presently Into</p>
                        <div class="u-form-group pradio" style="">
                            <input class="" type="radio" name="ustudent[]" value="Student">Student
                            <input class="" type="radio" name="ustudent[]" value="Business">Business
                            <input class="" type="radio" name="ustudent[]" value="" onClick="javascript:return yourfunction(3)"> Profession
                            <input class="" type="radio" name="ustudent[]" value="startup">Startup
                        </div>

                        <div id = "three" style = "display:none">
                            PROFESSIONS
                            <select name="ustudent[]">
                                <option value="">Select Your Profssion</option>
                                <option value="PROFESSIONS - ACCOUNTANT">ACCOUNTANT</option>
                                <option value="PROFESSIONS- ACTOR">ACTOR</option>
                                <option value="PROFESSIONS - ACTUARY">ACTUARY</option>
                                <option value="PROFESSIONS - AGRONOMIST">AGRONOMIST</option>
                                <option value="PROFESSIONS - AIR TRAFFIC CONTROLLER">AIR TRAFFIC CONTROLLER</option>
                                <option value="PROFESSIONS - ARCHITECT">ARCHITECT</option>
                                <option value="PROFESSIONS - ARTIST">ARTIST</option>
                                <option value="PROFESSIONS - ASTRONOMER">ASTRONOMER</option>
                                <option value="PROFESSIONS - ATHLETE">ATHLETE</option>
                                <option value="PROFESSIONS - AUTHOR">AUTHOR</option>
                                <option value="PROFESSIONS - BANKER">BANKER</option>
                                <option value="PROFESSIONS - BEAUTICIAN">BEAUTICIAN</option>
                                <option value="PROFESSIONS - BROKER">BROKER</option>
                                <option value="PROFESSIONS - CAREER COUNSELLOR">CAREER COUNSELLOR</option>
                                <option value="PROFESSIONS - CHARTERED ACCOUNTANT">CHARTERED ACCOUNTANT</option>
                                <option value="PROFESSIONS - CHARTERED FINANCIAL ANALYST">CHARTERED FINANCIAL ANALYST</option>
                                <option value="PROFESSIONS - CHEF">CHEF</option>
                                <option value="PROFESSIONS - CHOREOGRAPHER">CHOREOGRAPHER</option>
                                <option value="PROFESSIONS - COMPANY SECRETARY">COMPANY SECRETARY</option>
                                <option value="PROFESSIONS - CONTENT WRITER">CONTENT WRITER</option>
                                <option value="PROFESSIONS - CORPORATE SKILLS TRAINER">CORPORATE SKILLS TRAINER</option>
                                <option value="PROFESSIONS - DANCER">DANCER</option>
                                <option value="PROFESSIONS - DENTIST">DENTIST</option>
                                <option value="PROFESSIONS - DIETICIAN">DIETICIAN</option>
                                <option value="PROFESSIONS - DOCTOR">DOCTOR</option>
                                <option value="PROFESSIONS - EDITOR">EDITOR</option>
                                <option value="PROFESSIONS - ENGINEER">ENGINEER</option>
                                <option value="PROFESSIONS - FASHION DESIGNER">FASHION DESIGNER</option>
                                <option value="PROFESSIONS - FILMMAKER">FILMMAKER</option>
                                <option value="PROFESSIONS - FLIGHT ATTENDANT">FLIGHT ATTENDANT</option>
                                <option value="PROFESSIONS - FREELANCE WRITER AND BLOGGER">FREELANCE WRITER AND BLOGGER</option>
                                <option value="PROFESSIONS - GRAPHIC DESIGNER">GRAPHIC DESIGNER</option>
                                <option value="PROFESSIONS - HOME TUTOR">HOME TUTOR</option>
                                <option value="PROFESSIONS - IMAGE CONSULTANT">IMAGE CONSULTANT</option>
                                <option value="PROFESSIONS - INTERIOR DESIGNER">INTERIOR DESIGNER</option>
                                <option value="PROFESSIONS - INVESTMENT BANKER">INVESTMENT BANKER</option>
                                <option value="PROFESSIONS - JEWELLERY DESIGNER">JEWELLERY DESIGNER</option>
                                <option value="PROFESSIONS - LAWYER">LAWYER</option>
                                <option value="PROFESSIONS - MUSICIAN">MUSICIAN</option>
                                <option value="PROFESSIONS - NAVY OFFICER">NAVY OFFICER</option>
                                <option value="PROFESSIONS - NURSE">NURSE</option>
                                <option value="PROFESSIONS - NUTRITIONIST">NUTRITIONIST</option>
                                <option value="PROFESSIONS - PAINTER">PAINTER</option>
                                <option value="PROFESSIONS - PILOT">PILOT</option>
                                <option value="PROFESSIONS - POLICE OFFICER">POLICE OFFICER</option>
                                <option value="PROFESSIONS - PROFESSOR">PROFESSOR</option>
                                <option value="PROFESSIONS - PSYCHOLOGIST">PSYCHOLOGIST</option>
                                <option value="PROFESSIONS - RECEPTIONIST">RECEPTIONIST</option>
                                <option value="PROFESSIONS - SALESPERSON">SALESPERSON</option>
                                <option value="PROFESSIONS - SINGER">SINGER</option>
                                <option value="PROFESSIONS - SOLDIER">SOLDIER</option>
                                <option value="PROFESSIONS - SURGEON">SURGEON</option>
                                <option value="PROFESSIONS - TEACHER">TEACHER</option>
                                <option value="PROFESSIONS - THERAPIST">THERAPIST</option>
                                <option value="PROFESSIONS - WEB DEVELOPER">WEB DEVELOPER</option>
                                <option value="PROFESSIONS - OTHER">OTHER</option>
                            </select>
                        </div>
                        <br>

                        <div id = "two" style = "display:none">
                        </div>      
                        <div id = "four" style = "display:none">
                        </div>      
                        <div id = "five" style = "display:none">
                        </div>       -->

                        <!-- <p  style="text-align: left; padding-left: 50px; margin-bottom: -5px">Hobby</p> -->
                       <!--  <div class="u-form-group">
                            <dl class="dropdown1"> 

                                <dt1>
                                    <a href="#1">
                                        <span class="hida1" style="color: #333; font-size: 1.6rem">Interested into</span>    
                                        <p class="multiSel1"></p>  
                                    </a>
                                </dt1>

                                <dd1>
                                    <div class="mutliSelect1">
                                        <ul style="position: relative; text-align: left;">
                                            <?php 
                                            foreach ($int as $ki) {

                                            ?>

                                            <li><input type="checkbox"  value="<?php echo $ki->interest_into; ?>" name="uinterted_into[]" data-bvalidator="required" ><?php echo $ki->interest_into; ?></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </dd1>
                            </dl>
                        </div> -->
                



                  <!--     <div class="u-form-group">
                          <input type="text" placeholder="Mobile Nubmer *" name="umobile" data-bvalidator="required"/>
                      </div> -->

                      <div class="u-form-group">
                          <input type="checkbox" placeholder="" value="teram" name="teram" data-bvalidator="required"/> I have read all <a href="http://youreducare.com/controller/tos" target="_blank" style="color: red;">Terms and Conditions</a> and I Agree.
                      </div>

                      <div class="u-form-group">
                          <input type="submit" name="reg" value="Sign Up">
                      </div>
                      </form>
                    </div>
            </div>


        </div>
        <br>
    </div>
</div>

<!-- Close login popup start -->



<!--    <style type="text/css">
  #Div2 {
   display: none;
 }
 }
 </style> -->

<!-- <script>
function switchVisible() {
            if (document.getElementById('Div1')) {

                if (document.getElementById('Div1').style.display == 'none') {
                    document.getElementById('Div1').style.display = 'block';
                    document.getElementById('Div2').style.display = 'none';
                }
                else {
                    document.getElementById('Div1').style.display = 'none';
                    document.getElementById('Div2').style.display = 'block';
                }
            }
}
</script> -->


<script type="text/javascript">
                            $(document).ready(function () {
                                $('form').bValidator();
                            });
</script>

<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->

<script type="text/javascript">
    $(function () {

        $('#submit').click(function () {

            //get input data as a array
            var post_data = {
                'message': $("#message").val(),
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            };

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>YOUR_CONTROLLER/insertByajax",
                data: post_data,
                success: function (message) {
                    // return success message to the id='result' position
                    $("#result").html(message);
                }
            });

        });

    });
</script>
 <script type="text/javascript">
                 
$(document).ready(function(){
    $("span").click(function(){
        $("#ratecoll").toggle(500);
    });
});
</script>

<script type="text/javascript">

    function yourfunction(radioid)
    {
        if (radioid == 1)
        {
            document.getElementById('one').style.display = 'block';
            document.getElementById('two').style.display = 'none';
            document.getElementById('three').style.display = 'none';
            document.getElementById('four').style.display = 'none';
            document.getElementById('five').style.display = 'none';
        } else if (radioid == 2)
        {
            document.getElementById('five').style.display = 'none';
            document.getElementById('four').style.display = 'none';
            document.getElementById('three').style.display = 'none';
            document.getElementById('two').style.display = 'none';
            document.getElementById('one').style.display = 'none';
        } else if (radioid == 3)
        {

            document.getElementById('five').style.display = 'none';
            document.getElementById('four').style.display = 'none';
            document.getElementById('three').style.display = '';
            document.getElementById('two').style.display = 'none';
            document.getElementById('one').style.display = 'none';
        } else if (radioid == 4)
        {

            document.getElementById('five').style.display = 'none';
            document.getElementById('four').style.display = 'none';
            document.getElementById('three').style.display = 'none';
            document.getElementById('two').style.display = 'none';
            document.getElementById('one').style.display = 'none';
        } else if (radioid == 5)
        {

            document.getElementById('five').style.display = 'none';
            document.getElementById('four').style.display = 'none';
            document.getElementById('three').style.display = 'none';
            document.getElementById('two').style.display = 'none';
            document.getElementById('one').style.display = 'none';
        }
    }

</script>


<script type="text/javascript">
    $(".email-signup").hide();
    $("#signup-box-link").click(function () {
        $(".email-login").fadeOut(100);
        $(".email-signup").delay(100).fadeIn(100);
        $("#login-box-link").removeClass("active");
        $("#signup-box-link").addClass("active");
    });
    $("#login-box-link").click(function () {
        $(".email-login").delay(100).fadeIn(100);
        ;
        $(".email-signup").fadeOut(100);
        $("#login-box-link").addClass("active");
        $("#signup-box-link").removeClass("active");
    });
</script>


<script>


    $(".dropdown dt a").on('click', function () {
        $(".dropdown dd ul").slideToggle('fast');
    });

    $(".dropdown dd ul li a").on('click', function () {
        $(".dropdown dd ul").hide();
    });

    function getSelectedValue(id) {
        return $("#" + id).find("dt a span.value").html();
    }

    $(document).bind('click', function (e) {
        var $clicked = $(e.target);
        if (!$clicked.parents().hasClass("dropdown"))
            $(".dropdown dd ul").hide();
    });

    $('.mutliSelect input[type="checkbox"]').on('click', function () {

        var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
                title = $(this).val() + ",";

        if ($(this).is(':checked')) {
            var html = '<span title="' + title + '"></span>';
            $('.multiSel').append(html);
            $(".hida").hide();
        } else {
            $('span[title="' + title + '"]').remove();
            var ret = $(".hida");
            $('.dropdown dt a').append(ret);

        }
    });
</script>

<script>


   
$(".dropdown1 dt1 a").on('click', function() {
  $(".dropdown1 dd1 ul").slideToggle('fast');
});

$(".dropdown1 dd1 ul li a").on('click', function() {
  $(".dropdown1 dd1 ul").hide();
});

function getSelectedValue(id) {
  return $("#1" + id).find("dt1 a span.value").html();
}

$(document).bind('click', function(e1) {
  var $clicked = $(e1.target);
  if (!$clicked.parents().hasClass("dropdown1")) $(".dropdown1 dd1 ul").hide();
});

$('.mutliSelect1 input[type="checkbox"]').on('click', function() {

  var title = $(this).closest('.mutliSelect1').find('input[type="checkbox"]').val(),
    title = $(this).val() + ",";

  if ($(this).is(':checked')) {
    var html = '<span title="' + title + '">' + title + '</span>';
    $('.multiSel1').append(html);
    $(".hida1").hide();
  } else {
    $('span[title="' + title + '"]').remove();
    var ret = $(".hida1");
    $('.dropdown1 dt1 a').append(ret);

  }
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.close').click(function(){
            $('#popUpWindow').hide();
        });
    });
</script>
<script src="<?=base_url()?>assets/js/jquery-ui.js"></script>
