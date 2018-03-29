<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	private $img;

		function __CONSTRUCT()
		{
			 parent::__construct();
			$this->img=$this->model->select("indexad");

		}

	public function index()

	{

		
		if(isset($_GET['state']))
		{
			if($this->facebook->is_authenticated()){
				// print_r("expression");
				//  die();
				
				// Get user facebook profile details
				$userData = array();
				$userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');
	            // Preparing data for database insertion
	            $userData['oauth_provider'] = 'facebook';
	            $userData['oauth_uid'] = $userProfile['id'];
	            $userData['first_name'] = $userProfile['first_name'];
	            $userData['last_name'] = $userProfile['last_name'];
	            @$userData['email'] = $userProfile['email'];
	           $userData['gender'] = $userProfile['gender'];
	           $userData['locale'] = $userProfile['locale'];
	            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
	            $userData['picture_url'] = $userProfile['picture']['data']['url'];
				$this->session->set_userdata('valid_l', 'facebook');
				
	            $userID = $this->model->checkUser($userData);
	   		
				$id1=$userData['oauth_uid'];
				$ar=array('oauth_uid'=>$id1);
				$uid=$this->model->select_where('users',$ar);
				$a=$uid['0']->id;
				$this->session->set_userdata('userid',$a); 
				$b=$this->session->userdata('userid');
				// Check user data insert or update status
	            if(!empty($userID)){
	                $data['userData'] = $userData;
	                $this->session->set_userdata('userData',$userData);
	            } else {
	               $data['userData'] = array();
	            }
				$data['logoutUrl'] = $this->facebook->logout_url();
			}
		}

		if(!isset($_GET['state']))
		{
			if(isset($_GET['code'])){
				//authenticate user
				$this->google->getAuthenticate();
				//get user info from google
				$gpInfo = $this->google->getUserInfo();
	            //preparing data for database insertion
				$userData['oauth_provider'] = 'google';
				$userData['oauth_uid'] 		= $gpInfo['id'];
	            $userData['first_name'] 	= $gpInfo['given_name'];
	            $userData['last_name'] 		= $gpInfo['family_name'];
	            $userData['email'] 			= $gpInfo['email'];
				$userData['gender'] 		= !empty($gpInfo['gender'])?$gpInfo['gender']:'';
				$userData['locale'] 		= !empty($gpInfo['locale'])?$gpInfo['locale']:'';
	            $userData['profile_url'] 	= !empty($gpInfo['link'])?$gpInfo['link']:'';
	            $userData['picture_url'] 	= !empty($gpInfo['picture'])?$gpInfo['picture']:'';
				$this->session->set_userdata('valid_l', 'google');
				//insert or update user data to the database
	            $userID = $this->model->checkUser($userData);
				//store status & user info in session
				$this->session->set_userdata('loggedIn', true);
				$this->session->set_userdata('userData', $userData);
				$id1=$userData['oauth_uid'];
				$ar=array('oauth_uid'=>$id1);
				$uid=$this->model->select_where('users',$ar);
				$a=$uid['0']->id;

				$this->session->set_userdata('userid',$a); 
				$b=$this->session->userdata('userid');
			
				$this->profile();
			
			} 	
		}		
				// $this->session->set_userdata('userData', $userData);
				// $id1=$userData['oauth_uid'];
				// $ar=array('oauth_uid'=>$id1);
				// $uid=$this->model->select_where('users',$ar);
				// $a=$uid['0']->id;
				if($this->session->userdata('userid'))
				{	
					$uid1=$this->session->userdata('userid');
					$data2=array('id'=>$uid1);
					$all=$this->model->select_where('users',$data2);
					$stat=$all[0]->status;

					if($stat=='Block')
					{
						redirect('controller/userauto/sel/'.$uid1);
					}

			}		
		$vv['video']=$this->model->select("testim_videos");
		
		$vv['edu']=$this->model->select("user_edu");
		$vv['int']=$this->model->select("interest_into");
		$vv['select']=$this->model->select("indexblog");
		$vv['select1']=$this->model->select("indexcover");
		$vv['select2']=$this->model->select("indexad");
		// $this->output->clear_all_cache();
		$this->load->view('index',$vv);
		//$this->load->view('index');
	
}	
	public function user_edu()
	{
		$edu=$this->model->select("user_edu");
		//print_r($vv['edu']);
		
		
		foreach($edu as $st)
            {
              ?>
 			<option value="<?php echo $st->user_edu; ?>"><?php echo $st->user_edu; ?></option>
 			
 		<?php
 	}           
	}

	public function int_into()
	{
		$int=$this->model->select("interest_into");
		//print_r($vv['edu']);
		
		
		foreach($int as $ts)
            {
              ?>
 			<option value="<?php echo $ts->interest_into; ?>"><?php echo $ts->interest_into; ?></option>
 			
 		<?php
 	}           
	}

	public function chat()
	{

		if($this->input->post('chat'))
		{	
			$vv['select2']=$this->img;
			$this->load->view('chatform',$vv);
		}
	}

	public function profile(){
		//redirect to login page if user not logged in
		if(!$this->session->userdata('loggedIn')){
			redirect('controller/index');
		}
		
		//get user info from session
		$data['userData'] = $this->session->userdata('userData');
		
		//load user profile view
		//$this->load->view('profile',$data);
		// echo "string";
		// die();
		redirect('http://www.youreducare.com/');
	}

	public function logout(){
		//delete login status & user info from session
		$this->session->unset_userdata('loggedIn');
		$this->session->unset_userdata('userData');
		$this->session->unset_userdata('userData');
		$this->session->unset_userdata('uname');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('userid2');
		//unset($_SESSION['access_token']);
		$this->session->unset_userdata('access_token');
  		$this->google->revokeToken();
  		$this->facebook->destroy_session();
		
		redirect('http://www.youreducare.com/');
    }

	public function about_us()
	{
		$vv['select2']=$this->img;
		$this->load->view('about_us',$vv);
	}

	public function privacy_policy()
	{
		$vv['select2']=$this->img;
		$this->load->view('privacy_policy',$vv);
	}

	public function tos()
	{
		$vv['select2']=$this->img;
		$this->load->view('tos',$vv);
	}

	public function contemporary()
	{
		$vv['select2']=$this->img;

		$this->load->view('contemporary',$vv);
	}

	public function non_contemporary()
	{
		$vv['select2']=$this->img;
		$this->load->view('non_contemporary',$vv);
	}

	
	public function image_cons()

	{	
		
	
		$vv['cou']=$this->model->find1('image_review','iid');
		$vv['test']=$this->model->select_group("image","name");
		$vv['select']=$this->model->fetch('image');
	
		$vv['select2']=$this->img;
		$this->load->view('image_cons',$vv);

	}

	public function image_cons_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{	
	
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("iid"=>$id);
			$data1=array("iid"=>$id);
			$vv['car']=$this->model->select_where("image",$data);
				$tdata=array("users"=>"users.id=image_review.uid");
			$id=array('iid'=>$id);
		 	$vv['test']=$this->model->select_join4('image_review',$tdata,$id);
			//print_r($vv);
		 	$vv['select2']=$this->img;
			$this->load->view('image_cons_detail',$vv);

		}

	}

	public function corporate_skill()
	{

	
		$vv['cou']=$this->model->find1('corporate_review','corpid');
		$vv['test']=$this->model->select_group("corporate","name");
		// $vv['test']=$this->model->select("corporate");
		$vv['select']=$this->model->fetch('corporate');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('corporate_skill',$vv);
	}

	public function corporate_skill_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{	
		

			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("corpid"=>$id);
			$data1=array("corpid"=>$id);
			$vv['car']=$this->model->select_where("corporate",$data);
			$tdata=array("users"=>"users.id=corporate_review.uid");
			$id=array('corpid'=>$id);
		 	$vv['test']=$this->model->select_join4('corporate_review',$tdata,$id);

			//print_r($vv);
		 	$vv['select2']=$this->img;
			$this->load->view('corporate_skill_detail',$vv);

		}
	}

	public function jewellery_blog()
	{
		$tdata=array("users"=>"users.id=jewelleryblog.uid");
		 $vv['test']=$this->model->select_join3('jewelleryblog',$tdata);

		
		 $vv['select2']=$this->img;
		$this->load->view('jewellery_blog',$vv);
	}
	
	public function humanities_blog()
	{
		$tdata=array("users"=>"users.id=humanitiesblog.uid");
		 $vv['test']=$this->model->select_join3('humanitiesblog',$tdata);

		 $vv['select2']=$this->img;
		$this->load->view('humanities_blog',$vv);
	}

	public function law_blog()
	{
		$tdata=array("users"=>"users.id=lawblog.uid");
		 $vv['test']=$this->model->select_join3('lawblog',$tdata);

		$vv['select2']=$this->img;
		$this->load->view('law_blog',$vv);
	}

	public function data_ana_blog()
	{
		$tdata=array("users"=>"users.id=data_ana_blog.uid");
		 $vv['test']=$this->model->select_join3('data_ana_blog',$tdata);

		 $vv['select2']=$this->img;
		$this->load->view('data_ana_blog',$vv);
	}

	public function political_sci_blog()
	{		
		$tdata=array("users"=>"users.id=political_sci_blog.uid");
		$vv['test']=$this->model->select_join3('political_sci_blog',$tdata);
		$vv['select2']=$this->img;
		$this->load->view('political_sci_blog',$vv);
	}

	public function navy_blog()
	{		
		$tdata=array("users"=>"users.id=navyblog.uid");
		$vv['test']=$this->model->select_join3('navyblog',$tdata);
		$vv['select2']=$this->img;
		$this->load->view('navy_blog',$vv);
	}


	public function Artificial_blog()

	{	
		$tdata=array("users"=>"users.id=Artificialblog.uid");
		$vv['test']=$this->model->select_join3('Artificialblog',$tdata);
		$vv['select2']=$this->img;
		$this->load->view('Artificial_blog',$vv);
	}

	
	public function digital_market_blog()
	{
		$tdata=array("users"=>"users.id=digital_market_blog.uid");
		$vv['test']=$this->model->select_join3('digital_market_blog',$tdata);
		$vv['select2']=$this->img;
		$this->load->view('digital_market_blog',$vv);
	}

	public function engineering_blog()
	{	
		$tdata=array("users"=>"users.id=engineeringblog.uid");
		 $vv['test']=$this->model->select_join3('engineeringblog',$tdata);

			$vv['select2']=$this->img;
		$this->load->view('engineering_blog',$vv);
	}

	public function aero_blog()
	{
		
		$tdata=array("users"=>"users.id=aeroblog.uid");
		 $vv['test']=$this->model->select_join3('aeroblog',$tdata);

		 $vv['select2']=$this->img;
		$this->load->view('aero_blog',$vv);

	}

	public function cfa_blog()
	{	
		$tdata=array("users"=>"users.id=cfablog.uid");
		 $vv['test']=$this->model->select_join3('cfablog',$tdata);

		 $vv['select2']=$this->img;
		$this->load->view('cfa_blog',$vv);
	}

	public function dietician_blog()
	{
		$tdata=array("users"=>"users.id=dieticianblog.uid");
		 $vv['test']=$this->model->select_join3('dieticianblog',$tdata);

	
		 $vv['select2']=$this->img;
		$this->load->view('dietician_blog',$vv);
	}

	public function ethical_blog()
	{	

		$tdata=array("users"=>"users.id=ethicalblog.uid");
		 $vv['test']=$this->model->select_join3('ethicalblog',$tdata);

		
		 $vv['select2']=$this->img;
		$this->load->view('ethical_blog',$vv);
	}

	public function bio_tech_blog()
	{	
		$tdata=array("users"=>"users.id=bio_tech_blog.uid");
		 $vv['test']=$this->model->select_join3('bio_tech_blog',$tdata);

		 $vv['select2']=$this->img;
		$this->load->view('bio_tech_blog',$vv);
	}

	public function mass_media_blog()
	{
		$tdata=array("users"=>"users.id=mass_media_blog.uid");
		 $vv['test']=$this->model->select_join3('mass_media_blog',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('mass_media_blog',$vv);
	}

	public function mecha_blog()
	{	$tdata=array("users"=>"users.id=mechablog.uid");
		 $vv['test']=$this->model->select_join3('mechablog',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('mecha_blog',$vv);
	}

	public function nano_blog()
	{	
		$tdata=array("users"=>"users.id=nanoblog.uid");
		 $vv['test']=$this->model->select_join3('nanoblog',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('nano_blog',$vv);
	}

	public function architech_blog()
	{	
		$tdata=array("users"=>"users.id=architechblog.uid");
		 $vv['test']=$this->model->select_join3('architechblog',$tdata);

		
		 $vv['select2']=$this->img;
		$this->load->view('architech_blog',$vv);
	}

	public function Beautision_blog()
	{
		$tdata=array("users"=>"users.id=Beautisionblog.uid");
		 $vv['test']=$this->model->select_join3('Beautisionblog',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('Beautision_blog',$vv);
	}

	public function interior_des_blog()
	{
		$tdata=array("users"=>"users.id=interior_des_blog.uid");
		 $vv['test']=$this->model->select_join3('interior_des_blog',$tdata);

		
		 $vv['select2']=$this->img;
		$this->load->view('interior_des_blog',$vv);
	}

	public function pilot_profess_blog()
	{
		$tdata=array("users"=>"users.id=pilot_profess_blog.uid");
		 $vv['test']=$this->model->select_join3('pilot_profess_blog',$tdata);

			$vv['select2']=$this->img;
		$this->load->view('pilot_profess_blog',$vv);
	}

	public function event_blog()
	{
		$tdata=array("users"=>"users.id=eventblog.uid");
		 $vv['test']=$this->model->select_join3('eventblog',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('event_blog',$vv);
	}

	public function fashion_blog()
	{
		$tdata=array("users"=>"users.id=fashionblog.uid");
		 $vv['test']=$this->model->select_join3('fashionblog',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('fashion_blog',$vv);
	}

	public function food_tech_sci_blog()
	{
		$tdata=array("users"=>"users.id=food_tech_sci_blog.uid");
		 $vv['test']=$this->model->select_join3('food_tech_sci_blog',$tdata);


		$vv['select2']=$this->img;
		$this->load->view('food_tech_sci_blog',$vv);
	}

	public function neuroscience_blog()
	{	
		$tdata=array("users"=>"users.id=neuroscienceblog.uid");
		 $vv['test']=$this->model->select_join3('neuroscienceblog',$tdata);

		 $vv['select2']=$this->img;
		$this->load->view('neuroscience_blog',$vv);
	}

	public function physical_fitness_blog()
	{
		$tdata=array("users"=>"users.id=physical_fitness_blog.uid");
		 $vv['test']=$this->model->select_join3('physical_fitness_blog',$tdata);

		 $vv['select2']=$this->img;
		$this->load->view('physical_fitness_blog',$vv);
	}

	public function wine_blog()
	{	$tdata=array("users"=>"users.id=wineblog.uid");
		 $vv['test']=$this->model->select_join3('wineblog',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('wine_blog',$vv);
	}

	public function upsc_blog()
	{	$tdata=array("users"=>"users.id=upscblog.uid");
		 $vv['test']=$this->model->select_join3('upscblog',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('upsc_blog',$vv);
	}

	public function multimedia_blog()
	{	$tdata=array("users"=>"users.id=multimediablog.uid");
		 $vv['test']=$this->model->select_join3('multimediablog',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('multimedia_blog',$vv);
	}

	public function psychology_blog()
	{	$tdata=array("users"=>"users.id=pyschologyblog.uid");
		 $vv['test']=$this->model->select_join3('pyschologyblog',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('psychology_blog',$vv);
	}

	public function fellowships_blog()
	{
		$tdata=array("users"=>"users.id=fellowshipsblog.uid");
		 $vv['test']=$this->model->select_join3('fellowshipsblog',$tdata);

		 $vv['select2']=$this->img;
		$this->load->view('fellowships_blog',$vv);
	}

	public function Actuary_blog()
	{
		$tdata=array("users"=>"users.id=actuaryblog.uid");
		 $vv['test']=$this->model->select_join3('actuaryblog',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('Actuary_blog',$vv);
	}

	public function cs_blog()
	{
		$tdata=array("users"=>"users.id=csblog.uid");
		$vv['test']=$this->model->select_join3('csblog',$tdata);

		$vv['select2']=$this->img;
		$this->load->view('cs_blog',$vv);
	}

	public function ca_blog()
	{
		$tdata=array("users"=>"users.id=cablog.uid");
		$vv['test']=$this->model->select_join3('cablog',$tdata);

		$vv['select2']=$this->img;
		$this->load->view('ca_blog',$vv);
	}
	
	public function cinematography_blog()
	{
		$tdata=array("users"=>"users.id=cinematographyblog.uid");
		$vv['test']=$this->model->select_join3('cinematographyblog',$tdata);

		$vv['select2']=$this->img;
		$this->load->view('cinematography_blog',$vv);
	}

	public function cma_blog()
	{	

		$tdata=array("users"=>"users.id=cmablog.uid");
		$vv['test']=$this->model->select_join3('cmablog',$tdata);


		$vv['select2']=$this->img;
		$this->load->view('cma_blog',$vv);
	}

	public function viewblogs()
	{
		$vv['select2']=$this->img;
		$this->load->view('viewblogs',$vv);
	}

	public function userprofile()
	{

		
		$id=$this->uri->segment(3);
		$idd=array("uid"=>$id);
		$vv['hom']=$this->model->select_where('user_registrion',$idd);
			$vv['select2']=$this->img;
	$this->load->view('userprofile',$vv);
	}

	public function view_more()
	{
		// $edata=array("email"=>'salman@varunkhanna.in');
		// 		$inss = $this->model->select_where("users",$edata);
		// 		print_r($inss);
		// 		$a=$inss[0]->id;
		// 		echo "<br>";
		// 		print_r($a);
		// 		die();
		$vv['select2']=$this->img;
		$this->load->view('view_more',$vv);
	}


	public function user_reg()
	{		
			
			if($this->input->post('reg') && $this->input->post('teram'))
		 	{
		 	$fn=$this->input->post('funame');
		 	$fl=$this->input->post('luname');	
			$gn=$this->input->post('ugen');
		 	$e=$this->input->post('uemail');
			 $p=$this->input->post('upass');
			 $url="http://myedworld.varunkhanna.in/controller/userauto/sel/";
			 $edata=array("email"=>$e);
			 $inss=$this->model->select_where("users",$edata);
			 $abc = count($inss);
				if($abc==1)
				{
				$this->session->set_flashdata('allredy', 'Sorry this email id is already registered.');	
				redirect('controller/index'); 
				}
				else
			{
				$data = array("first_name"=>$fn,"last_name"=>$fl,"gender"=>$gn,"email"=>$e,"upass"=>$p);
				$ins = $this->model->insert_data('users',$data);
				$edata=array("email"=>$e);
				$inss = $this->model->select_where("users",$edata);
				$a=$inss[0]->id;	
				$from_email = "aditya@youreducare.com";
       			$to_email = "$e";
       			$link='Welcome to YourEducare.. Your registration is almost done. Please verify your email address by clicking on this - http://myedworld.varunkhanna.in/controller/userauto/sel/'.$a;
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($link);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/index'); 
				}
			}
			 }
			
			}
			 public function sociallogin()
			 {	
			 	if($this->uri->segment(3) == 'sel')
			 	{
			 		echo $id=$this->uri->segment(4);
					$e=str_replace("_","@",$id);
					$edata=array("email"=>$e);
			 		$inss=$this->model->select_where("users",$edata);
			 		$abc = count($inss);
					if($abc==1)
					{
					$this->session->set_flashdata('allredy', 'Sorry this email id is already registered.');	
					redirect('controller/index'); 
				}

					 $floginURL=$this->facebook->login_url();
			 		 redirect($floginURL);

			 	}
 				

			 
			 }



			 public function sociallogin2()
			 {	
			 	if($this->uri->segment(3) == 'sel')
			 	{
			 		echo $id=$this->uri->segment(4);
					$e=str_replace("_","@",$id);
					$edata=array("email"=>$e);
			 		$inss=$this->model->select_where("users",$edata);
			 		$abc = count($inss);
					if($abc==1)
					{
					$this->session->set_flashdata('allredy', 'Sorry this email id is already registered.');	
					redirect('controller/index'); 
				}

					 $loginURL = $this->google->loginURL(); 
			 		 redirect($loginURL);

			 	}
 				

			 
			 }

			public function newse()
			{
				$e=$this->input->post('email');
				$data = array('mail'=>$e);  

				$inss=$this->model->select_where("maillist",$data);
				$abc = count($inss);
			
			if($abc==1)
			{
				$this->session->set_flashdata('allredys', 'Sorry you are already subscribed .');	
				redirect('controller/index'); 
			}
			else
			{

				 if($this->input->post('action'))  
           		{  
           		$e=$this->input->post('email');
				$data = array('mail'=>$e);  
              	$this->model->insert_data('maillist',$data);  

              	$this->session->set_flashdata('sub', 'Thank you for subscribing to our newsletter');	
				redirect('controller/index'); 
                }  
            }
			}

			 public function userauto()
             {
                    if($this->uri->segment(3) == 'sel')
                  {
                     $id=$this->uri->segment(4);
                     $a="Active";
                    $data=array("id"=>$id);
                    $vv['hom']=$this->model->select_where('users',$data);
                    $vv['edu']=$this->model->selecta("user_edu");
                     $vv['int']=$this->model->select("interest_into");

                    
                    if($this->input->post('upd'))
                    {
                    $id=$this->uri->segment(4);
                    $data=array("id"=>$id);
                     $a="Active";
                    $fn=$this->input->post('funame');
                    $fl=$this->input->post('luname');   
                    $n=$this->input->post('uname');
                    $gn=$this->input->post('ugen');
                    $e=$this->input->post('uemail');
                    $p=$this->input->post('upass');
                    $d=$this->input->post('udob');
                    $c=$this->input->post('ucity');
                    $ue=$this->input->post('user_edu');
                    $ee=implode(',',$ue);
                    $sa=$this->input->post('ustudent');
                    $s=implode('',$sa);
                    $ui=$this->input->post('uinterted_into');
                    @$aa = implode(',',$ui);
                    $m=$this->input->post('umobile');
                    
                    if(!empty($ee) && !empty($aa))
                    {
                    $data2 = array("first_name"=>$fn,"last_name"=>$fl,"gender"=>$gn,"uname"=>$n,"upass"=>$p,"udob"=>$d,"ucity"=>$c,"uedu"=>$ee,"ustudent"=>$s,"uinterted_into"=>$aa,"email"=>$e,"umobile"=>$m,"status"=>$a);    
                    $this->model->update("users",$data2,$data);
                    $this->session->set_flashdata('thanks', 'Thanks for Update your profile');
                    $this->session->set_flashdata('thanks2', 'Profile Updated');
                    redirect("controller/index");
                    }
                    else
                    {
                        echo "<script>alert('Please File All Data....')</script>";
                    }                       
                }
                $vv['select2']=$this->img;
                 @$this->load->view('userauto',$vv);
                
                 }  
    }
		public function loged()
		{
			if($this->input->post('log_sub'))
			{
			$a="Active";
			$u=$this->input->post('uname');
			$p=$this->input->post('upass');
			$data = array("uname"=>$u,"upass"=>$p,"status"=>$a);

			$vv=$this->model->select_where('users',$data);

			if(count($vv)>0)
			{
	$sr=array("email"=>$u,"userid"=>$vv[0]->id,"uname"=>$vv[0]->uname,"picture_url"=>$vv[0]->picture_url,"first_name"=>$vv[0]->first_name,"last_name"=>$vv[0]->last_name,"umobile"=>$vv[0]->umobile);
				$this->session->set_userdata($sr); 
				redirect('controller/index'); 
				
			}
			else
			{

				$this->session->set_flashdata('logmsg', 'Your E-mail id or Password might be wrong or You have not complete your e-mail verification yet, if so then Please check Your E-mail to verify your Account.');
				redirect('controller/index'); 
			}
		}
	}
		
	public function list_institute()

	{

		$this->form_validation->set_rules('fname', 'First Name','required|min_length[5]|max_length[12]|alpha',

        array('required'=> 'Please provide First Name.','alpha'=> 'This is not valid First Name'));



		// $this->form_validation->set_rules('fname','first name','trim|required|min_length[5]|alpha');

		$this->form_validation->set_rules('lname','last name','trim|required|min_length[5]|alpha',array('required'=>'Please Provide Last Name','alpha'=>'This is not valid Last Name'));

		$this->form_validation->set_rules('phone','Phone Number','trim|required|numeric|min_length[10]|max_length[10]',array('required'=>'Please Provide Phone Number','numeric'=>'This is not valid Phone Number'));

		$this->form_validation->set_rules('pincode','Pin Code','trim|required|numeric|min_length[6]|max_length[6]');

		$this->form_validation->set_rules('email','Email','trim|required|valid_email',array('required'=>'Email address can not be empty','valid_email'=>'Please provide valid email address'));



		if($this->form_validation->run() == FALSE)

		{

			$vv['cat']=$this->model->select('categorie');
			$vv['select2']=$this->img;
			$this->load->view('list_institute',$vv);

		}

		else

		{

			if($this->input->post('enq'))

			{

				$fname=$this->input->post('fname');

				$lname=$this->input->post('lname');

				$cat=$this->input->post('cat');

				$phone=$this->input->post('phone');

				$pincode=$this->input->post('pincode');

				$email=$this->input->post('email');

				$ar=array('fname'=>$fname,'lname'=>$lname,'cid'=>$cat,'phone'=>$phone,'pincode'=>$pincode,'email'=>$email);

				$qq=$this->model->insert_data("enquiry",$ar);

				if($qq == true)

				{

					$this->session->set_flashdata('msg','data inserted successfuly');

				

					redirect("controller/list_institute");

				}

				

			}

		}

	}

	

	public function aerocomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("aeroblog",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/aero_blog");
           	}
	}

	public function actuarycomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("actuaryblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/Actuary_blog");
           	}
	}

	public function navycomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("navyblog",$ar);

               // $this->load->view('Controller/navy_blog');

              	redirect("Controller/navy_blog");
           	}
	}

	public function architechcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("architechblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/architech_blog");


	}
}


public function Artificialcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("Artificialblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/Artificial_blog");


	}
}

public function Beautisioncomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("Beautisionblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/Beautision_blog");


	}
}

public function bio_tech_comment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("bio_tech_blog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/bio_tech_blog");


	}
}

public function cfablogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("cfablog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/cfa_blog");


	}
}

public function cmablogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("cmablog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/cma_blog");


	}
}

public function csblogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("csblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/cs_blog");


	}
}

public function cablogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("cablog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/ca_blog");


	}
}

public function cinematographyblogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("cinematographyblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/cinematography_blog");


	}
}


public function data_ana_comment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("data_ana_blog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/data_ana_blog");


	}
}

public function dieticiancomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("dieticianblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/dietician_blog");


	}
}

public function digital_market_comment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("digital_market_blog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/digital_market_blog");


	}
}

public function engineeringblogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("engineeringblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/engineering_blog");


	}
}

public function ethicalblogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("ethicalblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/ethical_blog");


	}
}

public function eventblogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("eventblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/event_blog");


	}
}

public function fashionblogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("fashion_blog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/fashion_blog");


	}
}


public function fellowshipscomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("fellowshipsblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/fellowships_blog");


	}
}

public function food_tech_sci_comment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("food_tech_sci_blog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/food_tech_sci_blog");


	}
}

public function humanitiescomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("humanitiesblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/humanities_blog");


	}
}
	public function interior_des_blogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("interior_des_blog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/interior_des_blog");


	}
}

	public function jewellery_blogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("jewelleryblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/jewellery_blog");


	}
}

public function law_blogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("lawblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/law_blog");


	}
}

public function mass_media_blogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("mass_media_blog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/mass_media_blog");


	}
}

public function mecha_blogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("mechablog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/mecha_blog");


	}
}

public function nano_blogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("nanoblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/nano_blog");


	}
}
	public function neuroscience_blogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("neuroscienceblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/neuroscience_blog");


	}
}

	public function physical_fitness_blogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("physical_fitness_blog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/physical_fitness_blog");


	}
}

	public function pilot_profess_blogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("pilot_profess_blog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/pilot_profess_blog");


	}
}

	public function political_sci_blogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("political_sci_blog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/political_sci_blog");


	}
}

	public function wine_blogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("wineblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/wine_blog");


	}
}

	public function upsc_blogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("upscblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/upsc_blog");


	}
}

	public function multimedia_blogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("multimediablog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/multimedia_blog");


	}
}

	public function psychology_blogcomment(){

		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
                $message=$this->input->post('message');
                $time=date("M d.Y");
				
                $ar=array('comment'=>$message,'uid'=>$id,"date"=>$time);
             
				$qq=$this->model->insert_data("pyschologyblog",$ar);

               // $this->load->view('Controller/actuary_blog');

              	redirect("Controller/psychology_blog");


	}
}

	public function precomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$pid=$this->input->post('pid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'pid'=>$pid,"date"=>$time);
				$qq=$this->model->insert_data("pre_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/pre");
           	}
	}

	public function corporatecomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$corpid=$this->input->post('corpid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'corpid'=>$corpid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("corporate_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/corporate_skill");
           	}
	}


	public function imagecomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$iid=$this->input->post('iid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'iid'=>$iid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("image_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/image_cons");
           	}
	}

	public function competitioncomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$compid=$this->input->post('compid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'compid'=>$compid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("competition_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/compitition");
           	}
	}

		public function campcomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$campid=$this->input->post('campid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'campid'=>$campid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("camp_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/camp");
           	}
	}

	public function beauticiancomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$bid=$this->input->post('bid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'bid'=>$bid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("beautician_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/beautician");
           	}
	}

	public function cacomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$caid=$this->input->post('caid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'caid'=>$caid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("ca_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/ca");
           	}
	}

		public function cmacomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$cmaid=$this->input->post('cmaid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'cmaid'=>$cmaid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("cma_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/cma");
           	}
	}

			public function cfacomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$cfaid=$this->input->post('cfaid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'cfaid'=>$cfaid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("cfa_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/cfa");
           	}
	}

		public function cscomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$csid=$this->input->post('csid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'csid'=>$csid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("cs_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/cs");
           	}
	}

		public function dietitiancomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$did=$this->input->post('did');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'did'=>$did,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("dietitian_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/dietitian");
           	}
	}

		public function digitalmarketcomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$digid=$this->input->post('digid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'digid'=>$digid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("digitalmarket_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/digital_market");
           	}
	}

	public function engineeringcomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$eid=$this->input->post('eid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'eid'=>$eid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("engineering_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/engineering");
           	}
	}

	public function ethicalcomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$ethid=$this->input->post('ethid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'ethid'=>$ethid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("ethical_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/ethical");
           	}
	}

	public function eventcomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$eid=$this->input->post('eid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'eid'=>$eid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("event_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/events");
           	}
	}	

	public function fashioncomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$fid=$this->input->post('fid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'fid'=>$fid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("fashion_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/fashion");
           	}
	}

		public function interiorcomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$iid=$this->input->post('iid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'iid'=>$iid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("interior_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/interior");
           	}
	}

	public function jewellerycomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$jid=$this->input->post('jid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'jid'=>$jid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("jewellery_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/jewellery");
           	}
	}

		public function mbacomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$mid=$this->input->post('mid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'mid'=>$mid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("mba_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/mba");
           	}
	}

			public function medicalcomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$mid=$this->input->post('mid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'mid'=>$mid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("medical_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/medical");
           	}
	}

		public function multimediacomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$mmid=$this->input->post('mmid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'mmid'=>$mmid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("multimedia_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/multimedia");
           	}
	}

		public function upsccomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$upscid=$this->input->post('upscid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'upscid'=>$upscid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("upsc_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/upsc");
           	}
	}

	public function careercomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$cid=$this->input->post('cid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'cid'=>$cid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("career_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/career_coun");
           	}
	}


	public function schoolcomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$ssid=$this->input->post('ssid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'ssid'=>$ssid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("school_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/special");
           	}
	}


	public function k12comment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$kid=$this->input->post('kid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'kid'=>$kid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("k12_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/k12_cat");
           	}
	}


	public function coachingcomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$kid=$this->input->post('coid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'kid'=>$kid);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("k12_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/k12_cat");
           	}
	}
	
	public function workcomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$wid=$this->input->post('wid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'wid'=>$wid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("work_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/work");
           	}
	}

	public function seminarcomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$semid=$this->input->post('semid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'semid'=>$semid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("seminar_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/seminar");
           	}
	}

	public function co_currcomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$ccid=$this->input->post('ccid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'ccid'=>$ccid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("cocurr_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/co_curr_cat");
           	}
	}


	public function co_curr_ocomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$cocid=$this->input->post('cocid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'cocid'=>$cocid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("cocurr_o_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/co_curr_o_cat");
           	}
	}

	public function studycomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$sid=$this->input->post('sid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
				$time=date("M d.Y");
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'sid'=>$sid,"date"=>$time);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("study_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/study_cat");
           	}
	}


		public function homecomment(){
		// echo "in function";
		// die();
		if($this->input->post('submitComment'))
			{
              
              	$id=$this->session->userdata('userid');
              // 	 print_r($id);
              // die();
              	$hid=$this->input->post('hid');
              	$star=$this->input->post('rating');
                $message=$this->input->post('message');
				$year=$this->input->post('year');
                $ar=array('message'=>$message,'star'=>$star,'uid'=>$id,'year'=>$year,'hid'=>$hid);
             	//print_r($ar);
             	//die();
				$qq=$this->model->insert_data("home_review",$ar);

               // $this->load->view('Controller/aero_blog');

              	redirect("Controller/home_tutor_cat");
           	}
	}



	public function career_coun()


	{	
		
		$vv['cou']=$this->model->find2('career_review','cid');

		$vv['test']=$this->model->select_group("career","title");

		$vv['select']=$this->model->fetch('career');
		//print_r($vv['test']);
			$vv['select2']=$this->img;
		$this->load->view('career_coun',$vv);

	}



	public function career_coun_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{
			
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("cid"=>$id);
			$data1=array("cid"=>$id);
			$vv['car']=$this->model->select_where("career",$data);

			$tdata=array("users"=>"users.id=career_review.uid");
			$id=array('cid'=>$id);
		 	$vv['test']=$this->model->select_join4('career_review',$tdata,$id);

			//print_r($vv);
		 	$vv['select2']=$this->img;
			$this->load->view('career_coun_detail',$vv);

		}

		

	}

	public function coaching_center_cat()

	{

			$vv['select2']=$this->img;
		$this->load->view('coaching_center_cat',$vv);

	}

	public function coaching_center()

	{

		$cat=$this->uri->segment(3);
		$cat1=array('category'=>urldecode($cat));
		
		$vv['test']=$this->model->select_where("coaching",$cat1);

		$vv['cou']=$this->model->find1('rating','coaching');
		$vv['select2']=$this->img;
		$this->load->view('coaching_center',$vv);

	}

	


	public function coaching_center_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{

			$id=$this->uri->segment(4);

			$data=array("coid"=>$id);

			$vv['car']=$this->model->select_where("coaching",$data);

			//print_r($vv);
			$vv['select2']=$this->img;
			$this->load->view('coaching_center_detail',$vv);

		}

		

	}

	



	public function competitive()

	{

		$vv['test']=$this->model->select("competitive");

		//print_r($vv['test']);
		$vv['cou']=$this->model->find1('rating','competitive');
		$vv['select2']=$this->img;
		$this->load->view('competitive',$vv);

	}



	public function competitive_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{

			$id=$this->uri->segment(4);

			$data=array("ceid"=>$id);

			$vv['car']=$this->model->select_where("competitive",$data);

			//print_r($vv);
			$vv['select2']=$this->img;
			$this->load->view('competitive_detail',$vv);

		}

		

	}



	public function college()

	{

		$vv['test']=$this->model->select("college");

		//print_r($vv['test']);
		$vv['cou']=$this->model->find1('rating','college');
		$vv['select2']=$this->img;
		$this->load->view('college',$vv);

	}



	public function college_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{

			$id=$this->uri->segment(4);

			$data=array("clid"=>$id);

			$vv['car']=$this->model->select_where("college",$data);

			//print_r($vv);
			$vv['select2']=$this->img;
			$this->load->view('college_detail',$vv);

		}

		

	}

	public function co_curr_cat()

	{

		
		$vv['select2']=$this->img;
		$this->load->view('co_curr_cat',$vv);

	}


	public function co_curr()

	{	
		

		$cat=$this->uri->segment(3);
		$cat1=array('categories'=>urldecode($cat));
		//echo $cat;
		$cat11=implode('',$cat1);

		 // $vv['test']=$this->model->select_where("k12",$cat1);
		$vv['select']=$this->model->fetch2('cocurr',$cat11);


		//$vv['test2']=$this->model->select_group("cocurr","name");
		
		$vv['test']=$this->model->sgroup("cocurr",$cat11);
		
		//print_r($vv['test']);
		$vv['cou']=$this->model->find1('cocurr_review','ccid');
		$vv['select2']=$this->img;
		$this->load->view('co_curr',$vv);

	}





	public function co_curr_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{
			


			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("ccid"=>$id);
			$data1=array("ccid"=>$id);
			$vv['car']=$this->model->select_where("cocurr",$data);


			$tdata=array("users"=>"users.id=cocurr_review.uid");
			$id=array('ccid'=>$id);
		 	$vv['test']=$this->model->select_join4('cocurr_review',$tdata,$id);

			//print_r($vv);
		 	$vv['select2']=$this->img;
			$this->load->view('co_curr_detail',$vv);

		}

		

	}




	// For Other Age Group People Start

	public function co_curr_o_cat()

	{

		
		$vv['select2']=$this->img;
		$this->load->view('co_curr_o_cat',$vv);

	}


	public function co_curr_o()

	{		
		$cat=$this->uri->segment(3);
		$cat1=array('categories'=>urldecode($cat));
		$cat11=implode('',$cat1);
		$vv['select']=$this->model->fetch2('cocurr_o',$cat11);
		$vv['test']=$this->model->sgroup("cocurr_o",$cat11);
		$vv['cou']=$this->model->find1('cocurr_o_review','cocid');
		$vv['select2']=$this->img;
		$this->load->view('co_curr_o',$vv);
	}



	public function co_curr_o_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{	
			
			


			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("cocid"=>$id);
			$data1=array("cocid"=>$id);
			$vv['car']=$this->model->select_where("cocurr_o",$data);

			$tdata=array("users"=>"users.id=cocurr_o_review.uid");
			$id=array('cocid'=>$id);
		 	$vv['test']=$this->model->select_join4('cocurr_o_review',$tdata,$id);
			//print_r($vv);
		 	$vv['select2']=$this->img;
			$this->load->view('co_curr_o_detail',$vv);

		}

		

	}

	// For Other Age Group People End


	public function events()

	{	
		

		$vv['cou']=$this->model->find2('event_review','eid');
		$vv['test']=$this->model->select_group("event_f","name");
		
		// $vv['test']=$this->model->select("event_f");
		$vv['select']=$this->model->fetch('event_f');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('events',$vv);


	}



	public function events_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{	
			// Start
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("eid"=>$id);
			$data1=array("eid"=>$id);
			$vv['car']=$this->model->select_where("event_f",$data);
			$tdata=array("users"=>"users.id=event_review.uid");
			$id=array('eid'=>$id);
		 	$vv['test']=$this->model->select_join4('event_review',$tdata,$id);
			//print_r($vv);
			$vv['select2']=$this->img;
			$this->load->view('events_detail',$vv);
			
		}

		

	}



	public function jewellery()

	{	



		$vv['cou']=$this->model->find2('jewellery_review','jid');	
		$vv['test']=$this->model->select_group("jewellery","name");
		
		// $vv['test']=$this->model->select("jewellery");
		$vv['select']=$this->model->fetch('jewellery');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('jewellery',$vv);

	}



	public function jewellery_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{	
			
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("jid"=>$id);
			$data1=array("jid"=>$id);
			$tdata=array("users"=>"users.id=jewellery_review.uid");
			$id=array('jid'=>$id);
		 	$vv['test']=$this->model->select_join4('jewellery_review',$tdata,$id);

			$vv['car']=$this->model->select_where("jewellery",$data);
			$vv['select2']=$this->img;
			$this->load->view('jewellery_detail',$vv);

		}

		

	}



	public function fashion()

	{		
			$vv['cou']=$this->model->find2('fashion_review','fid');
			$vv['test']=$this->model->select_group("fashion","name");
		
		// $vv['test']=$this->model->select("fashion");
		$vv['select']=$this->model->fetch('fashion');
	
		$vv['select2']=$this->img;
		$this->load->view('fashion',$vv);

	}



	public function fashion_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{		
			
		
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("fid"=>$id);
			$data1=array("fid"=>$id);
			$vv['car']=$this->model->select_where("fashion",$data);
			$tdata=array("users"=>"users.id=fashion_review.uid");
			$id=array('fid'=>$id);
		 	$vv['test']=$this->model->select_join4('fashion_review',$tdata,$id);
		 	$vv['select2']=$this->img;
			$this->load->view('fashion_detail',$vv);

		}

		

	}





	public function study()

	 {	
		$vv['select']=$this->model->fetch('study_abroad');
		// print_r($vv);
		// die();
		$vv['test']=$this->model->select_group("study_abroad","title");
		$vv['cou']=$this->model->find2('study_review','sid');

		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('study',$vv);

	}



	public function study_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{	
			
			
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("sid"=>$id);
			$data1=array("kid"=>$id);
			$vv['car']=$this->model->select_where("study_abroad",$data);
			$tdata=array("users"=>"users.id=study_review.uid");
			$id=array('sid'=>$id);
		 	$vv['test']=$this->model->select_join4('study_review',$tdata,$id);
			//print_r($vv);
			//print_r($vv);
		 	$vv['select2']=$this->img;
			$this->load->view('study_detail',$vv);

		}

		

	}



	public function camp()

	{		
			
		$vv['select']=$this->model->fetch('camp');
		$vv['test']=$this->model->select_group("camp","camp");
		// $vv['test']=$this->model->select("camp");
		$vv['cou']=$this->model->find2('camp_review','campid');

		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('camp',$vv);

	}



	public function camp_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{	
			


			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("campid"=>$id);
			$data1=array("campid"=>$id);
			$vv['car']=$this->model->select_where("camp",$data);
			$tdata=array("users"=>"users.id=camp_review.uid");
			$id=array('campid'=>$id);
		 	$vv['test']=$this->model->select_join4('camp_review',$tdata,$id);
			//print_r($vv);
		 	$vv['select2']=$this->img;
			$this->load->view('camp_detail',$vv);

		}

		

	}



	public function compitition()

	{	
		
		$vv['cou']=$this->model->find2('competition_review','compid');
		$vv['test']=$this->model->select_group("competition","name");
		// $vv['test']=$this->model->select("competition");
		$vv['select']=$this->model->fetch('competition');
		// $vv['cou']=$this->model->find1('rating','competition');

		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('compitition',$vv);

	}



	public function compitition_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("compid"=>$id);
			$data1=array("compid"=>$id);
			$vv['car']=$this->model->select_where("competition",$data);
			$tdata=array("users"=>"users.id=competition_review.uid");
			$id=array('compid'=>$id);
		 	$vv['test']=$this->model->select_join4('competition_review',$tdata,$id);

			//print_r($vv);
		 	$vv['select2']=$this->img;
			$this->load->view('compitition_detail',$vv);

		}

		

	}

	public function home_tutor()

	{

	
		$cat=$this->uri->segment(3);
		$cat1=array('board'=>urldecode($cat));


		
		// echo $cat;
		// die();
		$vv['select']=$this->model->fetch('home');
		$vv['test']=$this->model->select_where("home",$cat1);
		$vv['cou']=$this->model->find2('home_review','hid');

		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('home_tutor',$vv);


	
	}


	public function home_tutor_cat()

	{
		$vv['select2']=$this->img;
		$this->load->view('home_tutor_cat',$vv);
		
	}


	public function home_tutor_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{


			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("hid"=>$id);
			$data1=array("hid"=>$id);
			$vv['car']=$this->model->select_where("home",$data);

			$tdata=array("users"=>"users.id=home_review.uid");
			$id=array('hid'=>$id);
		 	$vv['test']=$this->model->select_join4('home_review',$tdata,$id);
			//print_r($vv);
		 	$vv['select2']=$this->img;
			$this->load->view('home_tutor_detail',$vv);

		}

		

	}



	public function k_12()

	{

	
		$cat=$this->uri->segment(3);
		$cat1=array('board'=>urldecode($cat));
		//echo $cat;
		$vv['select']=$this->model->fetch('k12');
		 $vv['test']=$this->model->select_where("k12",$cat1);
		 // print_r($vv['test']);
		 // die();
		 $vv['cou']=$this->model->find2('k12_review','kid');
		 //$vv['test']=$this->model->select_group("k12","name");
		 // $vv['cou']=$this->model->find1('rating','k12');

		 $vv['select2']=$this->img;
		 $this->load->view('k_12',$vv);

	}


public function k12_cat()

	{
		$vv['select2']=$this->img;
		$this->load->view('k12_cat',$vv);
		
	}


	public function k_12_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{	

			
		
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("kid"=>$id);
			$data1=array("kid"=>$id);
			$vv['car']=$this->model->select_where("k12",$data);

			$tdata=array("users"=>"users.id=k12_review.uid");
			$id=array('kid'=>$id);
		 	$vv['test']=$this->model->select_join4('k12_review',$tdata,$id);
			//print_r($vv);
		 	$vv['select2']=$this->img;
			$this->load->view('k_12_detail',$vv);

		}

		

	}



	public function pre()

	{

		$vv['cou']=$this->model->find2('pre_review','pid');

		$vv['test']=$this->model->select_group("pre","name");
		
		$vv['select']=$this->model->fetch('pre');
		//print_r($this->img);
		$vv['select2']=$this->img;
		$this->load->view('pre',$vv);
	}



	public function pre_detail()

	{
			

		if(@$this->uri->segment(3) == 'sel')

		{
			
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("pid"=>$id);
			$data1=array("pid"=>$id);
			$vv['car']=$this->model->select_where("pre",$data);
			
			$tdata=array("users"=>"users.id=pre_review.uid");
			$id=array('pid'=>$id);
		 	$vv['test']=$this->model->select_join4('pre_review',$tdata,$id);
		 // 	print_r($vv['test']);
			// die();
			$vv['select2']=$this->img;
			$this->load->view('pre_detail',$vv);



		}

		 
	}


  public function beautician()

	{	
		
	
		$vv['cou']=$this->model->find2('beautician_review','bid');
		$vv['test']=$this->model->select_group("beautician","name");
		$vv['select']=$this->model->fetch('beautician');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('beautician',$vv);

	}


	public function beautician_detail()

	{
			

		if($this->uri->segment(3) == 'sel')

		{	
	

			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("bid"=>$id);
			$data1=array("bid"=>$id);
			$vv['car']=$this->model->select_where("beautician",$data);
			$tdata=array("users"=>"users.id=beautician_review.uid");
			$id=array('bid'=>$id);
		 	$vv['test']=$this->model->select_join4('beautician_review',$tdata,$id);

			//print_r($vv);
				


		 	$vv['select2']=$this->img;
			$this->load->view('beautician_detail',$vv);

		}

		 
	}

	public function ca()

	{	
		
		$vv['cou']=$this->model->find2('ca_review','caid');
		$vv['test']=$this->model->select_group("ca","name");
		$vv['select']=$this->model->fetch('ca');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('ca',$vv);

	}

	public function ca_detail()

	{
			

		if($this->uri->segment(3) == 'sel')

		{	
		
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("caid"=>$id);
			$data1=array("caid"=>$id);
			$vv['car']=$this->model->select_where("ca",$data);
			$tdata=array("users"=>"users.id=ca_review.uid");
			$id=array('caid'=>$id);
		 	$vv['test']=$this->model->select_join4('ca_review',$tdata,$id);

			$vv['select2']=$this->img;
			$this->load->view('ca_detail',$vv);

		}

		 
	}

	public function cfa()

	{	
		
	
		$vv['cou']=$this->model->find2('cfa_review','cfaid');
		$vv['test']=$this->model->select_group("cfa","name");
		$vv['select']=$this->model->fetch('cfa');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('cfa',$vv);

	}

	public function cfa_detail()

	{
			

		if($this->uri->segment(3) == 'sel')

		{	
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("cfaid"=>$id);
			$data1=array("cfaid"=>$id);
			$vv['car']=$this->model->select_where("cfa",$data);
			$tdata=array("users"=>"users.id=cfa_review.uid");
			$id=array('cfaid'=>$id);
		 	$vv['test']=$this->model->select_join4('cfa_review',$tdata,$id);
			//print_r($vv);
				


		 	$vv['select2']=$this->img;
			$this->load->view('cfa_detail',$vv);

		}

		 
	}

	public function cma()

	{	
		$vv['cou']=$this->model->find2('cma_review','cmaid');
		$vv['test']=$this->model->select_group("cma","name");
		$vv['select']=$this->model->fetch('cma');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('cma',$vv);

	}

	public function cma_detail()

	{
			

		if($this->uri->segment(3) == 'sel')

		{
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("cmaid"=>$id);
			$data1=array("cmaid"=>$id);
			$vv['car']=$this->model->select_where("cma",$data);
			$tdata=array("users"=>"users.id=cma_review.uid");
			$id=array('cmaid'=>$id);
		 	$vv['test']=$this->model->select_join4('cma_review',$tdata,$id);
			//print_r($vv);
				


		 	$vv['select2']=$this->img;
			$this->load->view('cma_detail',$vv);

		}

		 
	}

	public function cs()

	{	
		
	
		$vv['cou']=$this->model->find2('cs_review','csid');
		$vv['test']=$this->model->select_group("cs","name");
		// $vv['test']=$this->model->select("cs");
		$vv['select']=$this->model->fetch('cs');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('cs',$vv);

	}

	public function cs_detail()

	{
			

		if($this->uri->segment(3) == 'sel')

		{	
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("csid"=>$id);
			$data1=array("csid"=>$id);
			$vv['car']=$this->model->select_where("cs",$data);
			$tdata=array("users"=>"users.id=cs_review.uid");
			$id=array('csid'=>$id);
		 	$vv['test']=$this->model->select_join4('cs_review',$tdata,$id);
			//print_r($vv);
				


		 	$vv['select2']=$this->img;
			$this->load->view('cs_detail',$vv);

		}

		 
	}

	public function dietitian()

	{
		$vv['cou']=$this->model->find2('dietitian_review','did');
		$vv['test']=$this->model->select_group("dietitian","name");
		// $vv['test']=$this->model->select("dietitian");
		$vv['select']=$this->model->fetch('dietitian');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('dietitian',$vv);

	}

	public function dietitian_detail()

	{
			

		if($this->uri->segment(3) == 'sel')

		{	
			
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("did"=>$id);
			$data1=array("did"=>$id);
			$vv['car']=$this->model->select_where("dietitian",$data);
						$tdata=array("users"=>"users.id=dietitian_review.uid");
			$id=array('did'=>$id);
		 	$vv['test']=$this->model->select_join4('dietitian_review',$tdata,$id);

			$vv['select2']=$this->img;
			$this->load->view('dietitian_detail',$vv);

		}

		 
	}

	public function digital_market()

	{	
		$vv['cou']=$this->model->find2('digitalmarket_review','digid');
		$vv['test']=$this->model->select_group("digital_market","name");
		// $vv['test']=$this->model->select("digital_market");
		$vv['select']=$this->model->fetch('digital_market');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('digital_market',$vv);

	}

	public function digital_market_detail()

	{
			

		if($this->uri->segment(3) == 'sel')

		{	
			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("digid"=>$id);
			$data1=array("digid"=>$id);
			$vv['car']=$this->model->select_where("digital_market",$data);
			$tdata=array("users"=>"users.id=digitalmarket_review.uid");
			$id=array('digid'=>$id);
		 	$vv['test']=$this->model->select_join4('digitalmarket_review',$tdata,$id);
			$vv['select2']=$this->img;
			$this->load->view('digital_market_detail',$vv);

		}

		 
	}

	public function engineering()

	{	
		$vv['cou']=$this->model->find2('engineering_review','eid');
		$vv['test']=$this->model->select_group("engineering","name");
		// $vv['test']=$this->model->select("engineering");
		$vv['select']=$this->model->fetch('engineering');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('engineering',$vv);

	}

	public function engineering_detail()

	{
			

		if($this->uri->segment(3) == 'sel')

		{		
			

			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("eid"=>$id);
			$data1=array("eid"=>$id);
			$vv['car']=$this->model->select_where("engineering",$data);
			$tdata=array("users"=>"users.id=engineering_review.uid");
			$id=array('eid'=>$id);
		 	$vv['test']=$this->model->select_join4('engineering_review',$tdata,$id);
		 	$vv['select2']=$this->img;
			$this->load->view('engineering_detail',$vv);

		}

		 
	}

	public function ethical()

	{	
		
		$vv['cou']=$this->model->find2('ethical_review','ethid');
		$vv['test']=$this->model->select_group("ethical","name");
		// $vv['test']=$this->model->select("ethical");
		$vv['select']=$this->model->fetch('ethical');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('ethical',$vv);

	}

	public function ethical_detail()

	{
			

		if($this->uri->segment(3) == 'sel')

		{		
			
			
			
			
			
			
			

			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("ethid"=>$id);
			$data1=array("ethid"=>$id);
			$vv['car']=$this->model->select_where("ethical",$data);
			$tdata=array("users"=>"users.id=ethical_review.uid");
			$id=array('ethid'=>$id);
		 	$vv['test']=$this->model->select_join4('ethical_review',$tdata,$id);
			//print_r($vv);
				


		 	$vv['select2']=$this->img;
			$this->load->view('ethical_detail',$vv);

		}

		 
	}

	public function interior()

	{	

		// echo "innn";
		// die();
		// if($this->input->post('id'))
		// {
		// 	echo $this->post('id');
		// }
		 // $uid=$this->session->userdata['userid'];

		 // $vv['cou']=$this->model->find1('rating','interior');
		$vv['cou']=$this->model->find2('interior_review','iid');
		$vv['test']=$this->model->select_group("interior","name");
		// $vv['test']=$this->model->select("interior");
		$vv['select']=$this->model->fetch('interior');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('interior',$vv);

	}

	public function interior_detail()

	{
			

		if($this->uri->segment(3) == 'sel')

		{	
			
			
			
			
			

			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("iid"=>$id);
			$data1=array("iid"=>$id);
			$vv['car']=$this->model->select_where("interior",$data);
			$tdata=array("users"=>"users.id=interior_review.uid");
			$id=array('iid'=>$id);
		 	$vv['test']=$this->model->select_join4('interior_review',$tdata,$id);
			
			//print_r($vv);
				


		 	$vv['select2']=$this->img;
			$this->load->view('interior_detail',$vv);

		}

		 
	}

	public function mba()

	{	
		// echo "innn";
		// die();
		// if($this->input->post('id'))
		// {
		// 	echo $this->post('id');
		// }
		 // $uid=$this->session->userdata['userid'];

		 // $vv['cou']=$this->model->find1('rating','mba');
		$vv['cou']=$this->model->find2('mba_review','mid');
		$vv['test']=$this->model->select_group("mba","name");
		// $vv['test']=$this->model->select("mba");
		$vv['select']=$this->model->fetch('mba');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('mba',$vv);

	}

	public function mba_detail()

	{
			

		if($this->uri->segment(3) == 'sel')

		{				
			
			
			
			
			

			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("mid"=>$id);
			$data1=array("mid"=>$id);
			$vv['car']=$this->model->select_where("mba",$data);

			$tdata=array("users"=>"users.id=mba_review.uid");
			$id=array('mid'=>$id);
		 	$vv['test']=$this->model->select_join4('mba_review',$tdata,$id);
			
			//print_r($vv);
				


		 	$vv['select2']=$this->img;
			$this->load->view('mba_detail',$vv);

		}

		 
	}

	public function medical()

	{	
		
		// echo "innn";
		// die();
		// if($this->input->post('id'))
		// {
		// 	echo $this->post('id');
		// }
		 // $uid=$this->session->userdata['userid'];

		 // $vv['cou']=$this->model->find1('rating','medical');
		$vv['cou']=$this->model->find2('medical_review','mid');
		$vv['test']=$this->model->select_group("medical","name");
		// $vv['test']=$this->model->select("medical");
		$vv['select']=$this->model->fetch('medical');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('medical',$vv);

	}

	public function medical_detail()

	{
			

		if($this->uri->segment(3) == 'sel')

		{			
			
			
			
			

			
			
			

			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("mid"=>$id);
			$data1=array("mid"=>$id);
			$vv['car']=$this->model->select_where("medical",$data);
			$tdata=array("users"=>"users.id=medical_review.uid");
			$id=array('mid'=>$id);
		 	$vv['test']=$this->model->select_join4('medical_review',$tdata,$id);
			//print_r($vv);
				


		 	$vv['select2']=$this->img;
			$this->load->view('medical_detail',$vv);

		}

		 
	}

	public function multimedia()

	{	
		// echo "innn";
		// die();
		// if($this->input->post('id'))
		// {
		// 	echo $this->post('id');
		// }
		 // $uid=$this->session->userdata['userid'];

		 // $vv['cou']=$this->model->find1('rating','multimedia');
		$vv['cou']=$this->model->find2('multimedia_review','mmid');
		$vv['test']=$this->model->select_group("multimedia","name");
		// $vv['test']=$this->model->select("multimedia");
		$vv['select']=$this->model->fetch('multimedia');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('multimedia',$vv);

	}

	public function multimedia_detail()

	{
			

		if($this->uri->segment(3) == 'sel')

		{		
			
			
			
			
			
			

			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("mmid"=>$id);
			$data1=array("mmid"=>$id);
			$vv['car']=$this->model->select_where("multimedia",$data);
			$tdata=array("users"=>"users.id=multimedia_review.uid");
			$id=array('mmid'=>$id);
		 	$vv['test']=$this->model->select_join4('multimedia_review',$tdata,$id);
			
				//print_r($vv);
				


		 	$vv['select2']=$this->img;
			$this->load->view('multimedia_detail',$vv);

		}

		 
	}
	
	public function upsc()

	{	
		// echo "innn";
		// die();
		// if($this->input->post('id'))
		// {
		// 	echo $this->post('id');
		// }
		 // $uid=$this->session->userdata['userid'];

		 // $vv['cou']=$this->model->find1('rating','upsc');
			$vv['cou']=$this->model->find2('upsc_review','upscid');
		$vv['test']=$this->model->select_group("upsc","name");
		// $vv['test']=$this->model->select("upsc");
		$vv['select']=$this->model->fetch('upsc');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('upsc',$vv);

	}

	public function upsc_detail()

	{
			

		if($this->uri->segment(3) == 'sel')

		{	
			
			
			
			
			
			
			

			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("upscid"=>$id);
			$data1=array("upscid"=>$id);
			$vv['car']=$this->model->select_where("upsc",$data);
			$tdata=array("users"=>"users.id=upsc_review.uid");
			$id=array('upscid'=>$id);
		 	$vv['test']=$this->model->select_join4('upsc_review',$tdata,$id);
			//print_r($vv);
				


		 	$vv['select2']=$this->img;
			$this->load->view('upsc_detail',$vv);

		}

		 
	}

	public function special()

	{	
		$vv['cou']=$this->model->find2('school_review','ssid');
		$vv['test']=$this->model->select_group("school","name");
		$vv['select']=$this->model->fetch('school');
		// $this->load->view('pre',$vv);


		// $vv['test']=$this->model->select("school");

		// $vv['cou']=$this->model->find1('rating','special');
		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('special',$vv);

	}



	public function special_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{
		
			
				

		




			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("ssid"=>$id);
			$data1=array("ssid"=>$id);
			$vv['car']=$this->model->select_where("school",$data);

			$tdata=array("users"=>"users.id=school_review.uid");
			$id=array('ssid'=>$id);
		 	$vv['test']=$this->model->select_join4('school_review',$tdata,$id);
			//print_r($vv);
		 	$vv['select2']=$this->img;
			$this->load->view('special_detail',$vv);

		}

		

	}



	public function seminar()

	{	
		
		

		$vv['cou']=$this->model->find2('seminar_review','semid');
		$vv['test']=$this->model->select_group("seminar","name");
		// $vv['test']=$this->model->select("seminar");
		$vv['select']=$this->model->fetch('seminar');
		// $vv['cou']=$this->model->find1('rating','seminar');

		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('seminar',$vv);

	}



	public function seminar_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{		
			
		



			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("semid"=>$id);
			$data1=array("semid"=>$id);
			$vv['car']=$this->model->select_where("seminar",$data);
			$tdata=array("users"=>"users.id=seminar_review.uid");
			$id=array('semid'=>$id);
		 	$vv['test']=$this->model->select_join4('seminar_review',$tdata,$id);

			//print_r($vv);
		 	$vv['select2']=$this->img;
			$this->load->view('seminar_detail',$vv);

		}

		

	}



	public function work()

	{		
		


		$vv['cou']=$this->model->find2('work_review','wid');
		$vv['test']=$this->model->select_group("work","name");
		// $vv['test']=$this->model->select("work");
		// $vv['cou']=$this->model->find1('rating','work');

		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('work',$vv);

	}



	public function work_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{	
			
			
			
			
			




			$id=$this->uri->segment(4);
			$id1=@$this->session->userdata['userid'];
			$data=array("wid"=>$id);
			$data1=array("wid"=>$id);
			$vv['car']=$this->model->select_where("work",$data);

			$tdata=array("users"=>"users.id=work_review.uid");
			$id=array('wid'=>$id);
		 	$vv['test']=$this->model->select_join4('work_review',$tdata,$id);
			// $vv['cou']=$this->model->find1('rating','work');

			//print_r($vv);
		 	$vv['select2']=$this->img;
			$this->load->view('work_detail',$vv);

		}

		

	}



	public function extra()

	{

		$vv['test']=$this->model->select("extra");
		// $vv['cou']=$this->model->find1('rating','extra');

		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('extra',$vv);

	}



	public function extra_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{

			$id=$this->uri->segment(4);

			$data=array("eid"=>$id);

			$vv['car']=$this->model->select_where("extra",$data);

			//print_r($vv);
			$vv['select2']=$this->img;
			$this->load->view('extra_detail',$vv);

		}

		

	}



	public function vacancy()

	{

		$vv['test']=$this->model->select("vacancy");
		// $vv['cou']=$this->model->find1('rating','vacancy');

		//print_r($vv['test']);
		$vv['select2']=$this->img;
		$this->load->view('vacancy',$vv);

	}



	public function vacancy_detail()

	{

		if($this->uri->segment(3) == 'sel')

		{

			$id=$this->uri->segment(4);

			$data=array("vid"=>$id);

			$vv['car']=$this->model->select_where("vacancy",$data);

			//print_r($vv);
			$vv['select2']=$this->img;
			$this->load->view('vacancy_detail',$vv);

		}

		

	}

	public function rating()
	{
		// if($this->input->post('score'))
		// {
		// 	echo "innn";
		//  	die();
		// }
		 if(@$this->session->userdata['userid'])
		 {
		// if($this->input->post('rat'))
		// {
			//$s=$this->input->post('st');
			$p=$this->input->post('score');
			echo $p;
			$r=$this->input->post('p_id');
			echo $r;
			//die();
			$page=$this->input->post('page');
			$urid=$this->session->userdata['userid'];

			$data=array("star"=>$p,"page"=>$page,"id"=>$r,"uid"=>$urid);
			$data1=array("page"=>$page,"id"=>$r,"uid"=>$urid);
			$star=array('star'=>$p);
			if($this->model->select_where("rating",$data1))
			{
				$qq=$this->model->update('rating',$star,$data1);
			}
			else
			{
		 		$qq=$this->model->insert_data('rating',$data);
		 		 redirect('controller/'.$p);
		 	}
			
	 	//}
	 }
	 else
	 {
	 	$this->session->set_flashdata('error', 'Please login!!');
	 	redirect('controller/pre');

	}
	}


    public function askb2()
    {

		$id=$this->uri->segment(4);
    	$data=array("pid"=>$id);
		$vv['car']=$this->model->select_where("pre",$data);
		
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			

			$this->model->insert_data('ques',$data);
			  redirect('controller/pre');		
		}
		 $tdata=array("pre"=>"pre.pid=ques.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('ques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=ans.urid");
		 $vv['ed1']=$this->model->select_join3('ans',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('test2',$vv); 
	}

	
public function ques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('ques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=ans.urid");
		$vv['ed1']=$this->model->select_join1('ans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);
			print_r($data);
			die();
			$qq=$this->model->insert_data('ans',$data);
			redirect('controller/pre');
		}

		$vv['select2']=$this->img;
		$this->load->view('ques_edit',$vv);
	}
	
	public function kaskb2()
    {

		$id=$this->uri->segment(4);
    	$data=array("kid"=>$id);
		$vv['car']=$this->model->select_where("k12",$data);
		
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			

			$this->model->insert_data('kques',$data);
			  redirect('controller/k12_cat');		
		}
		 $tdata=array("k12"=>"k12.kid=kques.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('kques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=kans.urid");
		 $vv['ed1']=$this->model->select_join3('kans',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('ktest2',$vv); 
	}

	
public function kques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('kques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=kans.urid");
		$vv['ed1']=$this->model->select_join1('kans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('kans',$data);
			redirect('controller/k12_cat');
		}

		$vv['select2']=$this->img;	
		$this->load->view('kques_edit',$vv);
	}



	public function saskb2()
    {

		$id=$this->uri->segment(4);
    	$data=array("ssid"=>$id);
		$vv['car']=$this->model->select_where("school",$data);
		
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);


			

			$this->model->insert_data('sques',$data);
			  redirect('controller/special');		
		}
		 $tdata=array("school"=>"school.ssid=sques.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('sques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=sans.urid");
		 $vv['ed1']=$this->model->select_join3('sans',$tdata);
		 
		 
		 $vv['select2']=$this->img;
		$this->load->view('stest2',$vv); 
	}

	
public function sques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('sques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=sans.urid");
		$vv['ed1']=$this->model->select_join1('sans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('sans',$data);
			redirect('controller/special');
		}

		$vv['select2']=$this->img;
		$this->load->view('sques_edit',$vv);
	}

	public function haskb2()
    {

		$id=$this->uri->segment(4);
    	$data=array("bid"=>$id);
		$vv['car']=$this->model->select_where("beautician",$data);
		
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			

			$this->model->insert_data('hques',$data);
			  redirect('controller/beautician');		
		}
		 $tdata=array("beautician"=>"beautician.bid=hques.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('hques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=hans.urid");
		 $vv['ed1']=$this->model->select_join3('hans',$tdata);
		 
		 	$vv['select2']=$this->img;
		 
		$this->load->view('htest2',$vv); 
	}

	
public function hques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('hques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=hans.urid");
		$vv['ed1']=$this->model->select_join1('hans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('hans',$data);
			redirect('controller/beautician');
		}

			$vv['select2']=$this->img;
		$this->load->view('hques_edit',$vv);
	}


	public function caskb2()
    {

		$id=$this->uri->segment(4);
    	$data=array("cid"=>$id);
		$vv['car']=$this->model->select_where("career",$data);
		
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			

			$this->model->insert_data('cques',$data);
			  redirect('controller/career_coun');		
		}
		 $tdata=array("career"=>"career.cid=cques.sname");
		 @$id=$vv['car'][0]->title;
		 $vv['hom']=$this->model->select_join22('cques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=cans.urid");
		 $vv['ed1']=$this->model->select_join3('cans',$tdata);
		 

		 $vv['select2']=$this->img;
		$this->load->view('ctest2',$vv); 
	}

	
public function cques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('cques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=cans.urid");
		$vv['ed1']=$this->model->select_join1('cans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('cans',$data);
			redirect('controller/career_coun');
		}

		$vv['select2']=$this->img;
		$this->load->view('cques_edit',$vv);
	}


	public function ssaskb2()
    {

		$id=$this->uri->segment(4);
    	$data=array("sid"=>$id);
		$vv['car']=$this->model->select_where("study_abroad",$data);
		
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);


			$this->model->insert_data('ssques',$data);
			  redirect('controller/study_cat');		
		}
		 $tdata=array("study_abroad"=>"study_abroad.sid=ssques.sname");
		 @$id=$vv['car'][0]->title;
		 $vv['hom']=$this->model->select_join22('ssques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=ssans.urid");
		 $vv['ed1']=$this->model->select_join3('ssans',$tdata);
		 

		 $vv['select2']=$this->img;
		$this->load->view('sstest2',$vv); 
	}

	
public function ssques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('ssques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=ssans.urid");
		$vv['ed1']=$this->model->select_join1('ssans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('ssans',$data);
			redirect('controller/study_cat');
		}

		$vv['select2']=$this->img;
		$this->load->view('ssques_edit',$vv);
	}

	public function caaskb2()
    {

		$id=$this->uri->segment(4);
    	$data=array("caid"=>$id);
		$vv['car']=$this->model->select_where("ca",$data);
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			$this->model->insert_data('caques',$data);
			  redirect('controller/ca');		
		}
		 $tdata=array("ca"=>"ca.caid=caques.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('caques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=caans.urid");
		 $vv['ed1']=$this->model->select_join3('caans',$tdata);
		 
		 $vv['select2']=$this->img;
		 
		$this->load->view('catest2',$vv); 
	}

	
public function caques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('caques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=caans.urid");
		$vv['ed1']=$this->model->select_join1('caans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('caans',$data);
			redirect('controller/ca');
		}

		$vv['select2']=$this->img;
		$this->load->view('caques_edit',$vv);
	}


	public function cfaaskb2()
    {

		$id=$this->uri->segment(4);
    	$data=array("cfaid"=>$id);
		$vv['car']=$this->model->select_where("cfa",$data);
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			$this->model->insert_data('cfaques',$data);
			  redirect('controller/cfa');		
		}
		 $tdata=array("cfa"=>"cfa.cfaid=cfaques.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('cfaques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=cfaans.urid");
		 $vv['ed1']=$this->model->select_join3('cfaans',$tdata);
		 
		 
		 $vv['select2']=$this->img;
		$this->load->view('cfatest2',$vv); 
	}

	
public function cfaques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('cfaques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=cfaans.urid");
		$vv['ed1']=$this->model->select_join1('cfaans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('cfaans',$data);
			redirect('controller/cfa');
		}

		$vv['select2']=$this->img;
		$this->load->view('cfaques_edit',$vv);
	}


	public function cmaaskb2()
    {

		$id=$this->uri->segment(4);
    	$data=array("cmaid"=>$id);
		$vv['car']=$this->model->select_where("cma",$data);
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			$this->model->insert_data('cmaques',$data);
			  redirect('controller/cma');		
		}
		 $tdata=array("cma"=>"cma.cmaid=cmaques.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('cmaques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=cmaans.urid");
		 $vv['ed1']=$this->model->select_join3('cmaans',$tdata);
		 
		 
		 $vv['select2']=$this->img;
		$this->load->view('cmatest2',$vv); 
	}

	
public function cmaques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('cmaques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=cmaans.urid");
		$vv['ed1']=$this->model->select_join1('cmaans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('cmaans',$data);
			redirect('controller/cma');
		}

		$vv['select2']=$this->img;
		$this->load->view('cmaques_edit',$vv);
	}

	public function csaskb2()
    {

		$id=$this->uri->segment(4);
    	$data=array("csid"=>$id);
		$vv['car']=$this->model->select_where("cs",$data);
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			$this->model->insert_data('csques',$data);
			  redirect('controller/cs');		
		}
		 $tdata=array("cs"=>"cs.csid=csques.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('csques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=csans.urid");
		 $vv['ed1']=$this->model->select_join3('csans',$tdata);
		 
		 
		 $vv['select2']=$this->img;
		$this->load->view('cstest2',$vv); 
	}

	
public function csques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('csques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=csans.urid");
		$vv['ed1']=$this->model->select_join1('csans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('csans',$data);
			redirect('controller/cs');
		}

		$vv['select2']=$this->img;
		$this->load->view('csques_edit',$vv);
	}

	public function coraskb2()
    {

		$id=$this->uri->segment(4);
    	$data=array("corpid"=>$id);
		$vv['car']=$this->model->select_where("corporate",$data);
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			$this->model->insert_data('corques',$data);
			  redirect('controller/corporate_skill');		
		}
		 $tdata=array("corporate"=>"corporate.corpid=corques.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('corques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=corans.urid");
		 $vv['ed1']=$this->model->select_join3('corans',$tdata);
		 
		 
		 	$vv['select2']=$this->img;
		$this->load->view('cortest2',$vv); 
	}

	
public function corques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('corques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=corans.urid");
		$vv['ed1']=$this->model->select_join1('corans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('corans',$data);
			redirect('controller/corporate_skill');
		}

$vv['select2']=$this->img;
		$this->load->view('corques_edit',$vv);
	}



	public function dieaskb2()
    {
    	$id=$this->uri->segment(4);
    	$data=array("did"=>$id);
		$vv['car']=$this->model->select_where("dietitian",$data);
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			$this->model->insert_data('dieques',$data);
			  redirect('controller/dietitian');		
		}
		 $tdata=array("dietitian"=>"dietitian.did=dieques.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('dieques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=dieans.urid");
		 $vv['ed1']=$this->model->select_join3('dieans',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('dietest2',$vv); 
	}

	
public function dieques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('dieques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=dieans.urid");
		$vv['ed1']=$this->model->select_join1('dieans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('dieans',$data);
			redirect('controller/dietitian');
		}
		$vv['select2']=$this->img;
		$this->load->view('dieques_edit',$vv);
	}

	public function dmaskb2()
    {
    	$id=$this->uri->segment(4);
    	$data=array("digid"=>$id);
		$vv['car']=$this->model->select_where("digital_market",$data);
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			$this->model->insert_data('dmques',$data);
			  redirect('controller/digital_market');		
		}
		 $tdata=array("digital_market"=>"digital_market.digid=dmques.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('dmques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=dmans.urid");
		 $vv['ed1']=$this->model->select_join3('dmans',$tdata);
		 $vv['select2']=$this->img;	
		$this->load->view('dmtest2',$vv); 
	}

	
public function dmques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('dmques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=dmans.urid");
		$vv['ed1']=$this->model->select_join1('dmans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('dmans',$data);
			redirect('controller/digital_market');	
		}	
		$vv['select2']=$this->img;
		$this->load->view('dmques_edit',$vv);
	}


	public function easkb2()
    {
    	$id=$this->uri->segment(4);
    	$data=array("eid"=>$id);
		$vv['car']=$this->model->select_where("engineering",$data);
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			$this->model->insert_data('eques',$data);
			  redirect('controller/engineering');		
		}
		 $tdata=array("engineering"=>"engineering.eid=eques.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('eques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=eans.urid");
		 $vv['ed1']=$this->model->select_join3('eans',$tdata);
		 
		 $vv['select2']=$this->img;
		$this->load->view('etest2',$vv); 
	}

	
public function eques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('eques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=eans.urid");
		$vv['ed1']=$this->model->select_join1('eans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('eans',$data);
			redirect('controller/engineering');	
		}	
			
		$vv['select2']=$this->img;
		$this->load->view('eques_edit',$vv);
	}


	public function ehaskb2()
    {
    	$id=$this->uri->segment(4);
    	$data=array("ethid"=>$id);
		$vv['car']=$this->model->select_where("ethical",$data);
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			$this->model->insert_data('ehques',$data);
			  redirect('controller/ethical');		
		}
		 $tdata=array("ethical"=>"ethical.ethid=ethical.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('ehques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=ehans.urid");
		 $vv['ed1']=$this->model->select_join3('ehans',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('ehtest2',$vv); 
	}

	
public function ehques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('ehques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=ehans.urid");
		$vv['ed1']=$this->model->select_join1('ehans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('ehans',$data);
			redirect('controller/ethical');	
		}
			$vv['select2']=$this->img;
		$this->load->view('ehques_edit',$vv);
	}


	public function emaskb2()
    {
    	$id=$this->uri->segment(4);
    	$data=array("eid"=>$id);
		$vv['car']=$this->model->select_where("event_f",$data);
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			$this->model->insert_data('emques',$data);
			  redirect('controller/events');		
		}
		 $tdata=array("event_f"=>"event_f.eid=event_f.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('emques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=emans.urid");
		 $vv['ed1']=$this->model->select_join3('emans',$tdata);

		 $vv['select2']=$this->img;
		$this->load->view('emtest2',$vv); 
	}

	
public function emques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('emques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=emans.urid");
		$vv['ed1']=$this->model->select_join1('emans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('emans',$data);
			redirect('controller/events');	
		}
		$vv['select2']=$this->img;
		$this->load->view('emques_edit',$vv);
	}


	public function faskb2()
    {
    	$id=$this->uri->segment(4);
    	$data=array("fid"=>$id);
		$vv['car']=$this->model->select_where("fashion",$data);
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			$this->model->insert_data('fques',$data);
			  redirect('controller/fashion');		
		}
		 $tdata=array("fashion"=>"fashion.fid=fashion.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('fques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=fans.urid");
		 $vv['ed1']=$this->model->select_join3('fans',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('ftest2',$vv); 
	}

	
	public function fques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('fques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=fans.urid");
		$vv['ed1']=$this->model->select_join1('fans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('fans',$data);
			redirect('controller/fashion');	
		}
		$vv['select2']=$this->img;
		$this->load->view('fques_edit',$vv);
	}


	public function idaskb2()
    {
    	$id=$this->uri->segment(4);
    	$data=array("iid"=>$id);
		$vv['car']=$this->model->select_where("interior",$data);
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			$this->model->insert_data('idques',$data);
			  redirect('controller/interior');		
		}
		 $tdata=array("interior"=>"interior.iid=interior.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('idques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=idans.urid");
		 $vv['ed1']=$this->model->select_join3('idans',$tdata);
		 $vv['select2']=$this->img;
		$this->load->view('idtest2',$vv); 
	}

	
	public function idques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('idques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=idans.urid");
		$vv['ed1']=$this->model->select_join1('idans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('idans',$data);
			redirect('controller/interior');	
		}
		$vv['select2']=$this->img;
		$this->load->view('idques_edit',$vv);
	}

	public function upscaskb2()
    {
    	$id=$this->uri->segment(4);
    	$data=array("upscid"=>$id);
		$vv['car']=$this->model->select_where("upsc",$data);
		if($this->input->post('ask'))
		{
			$q=$this->input->post('ques');
			$urid=$this->session->userdata['userid'];
			$sid=$this->input->post('sname');

			$data = array('ques'=>$q,"uid"=>$urid,"sname"=>$sid);
			$this->model->insert_data('upscques',$data);
			  redirect('controller/upsc');		
		}
		 $tdata=array("upsc"=>"upsc.upscid=upsc.sname");
		 @$id=$vv['car'][0]->name;
		 $vv['hom']=$this->model->select_join2('upscques',$tdata,$id);
		 
		$tdata=array("user_registrion"=>"user_registrion.uid=upscans.urid");
		 $vv['ed1']=$this->model->select_join3('upscans',$tdata);
		 
		 $vv['select2']=$this->img;	
		$this->load->view('upsctest2',$vv); 
	}

	
	public function upscques_edit()
	{
		$id=$this->uri->segment(3);
		$idd=array("qid"=>$id);
		$vv['ed']=$this->model->select_where('upscques',$idd);
		$tdata=array("user_registrion"=>"user_registrion.uid=upscans.urid");
		$vv['ed1']=$this->model->select_join1('upscans',$tdata,$id);
		
		if($this->input->post('sub'))
		 {
		 	$id=$this->input->post('id');
			$q=$this->input->post('ans');
			$urid=$this->session->userdata['userid2'];
			$time=date("M d.Y");
			$data=array("ans"=>$q,"qid"=>$id,"urid"=>$urid,"anserdtime"=>$time);

			$qq=$this->model->insert_data('upscans',$data);
			redirect('controller/upsc');	
		}
		$vv['select2']=$this->img;
		$this->load->view('upscques_edit',$vv);
	}

	public function mulaskb2()
    {

		 $vv['select2']=$this->img;
		$this->load->view('multest2',$vv); 
	}

	
	public function mulques_edit()
	{
		
		$vv['select2']=$this->img;
		$this->load->view('mulques_edit',$vv);
	}

	public function medaskb2()
    {

		 $vv['select2']=$this->img;
		$this->load->view('medtest2',$vv); 
	}

	
	public function medques_edit()
	{
		
		$vv['select2']=$this->img;
		$this->load->view('medques_edit',$vv);
	}


	public function mbaaskb2()
    {

		 
		$this->load->view('mbatest2'); 
	}

	
	public function mbaques_edit()
	{
		

		$this->load->view('mbaques_edit');
	}

	public function jdaskb2()
    {

		 
		$this->load->view('jdtest2'); 
	}

	
	public function jdques_edit()
	{
		

		$this->load->view('jdques_edit');
	}

	public function newadmi()
	{
				
		if($this->uri->segment(3) == 'sel')
		{
			
			$id=$this->uri->segment(4);
     		$data=array("pid"=>$id);
     		$vv=$this->model->select_where("pre",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';



				 $from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/pre'); 
				}

		}
			redirect('controller/pre'); 

		}
	

	public function newadmik12()
	{

		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("kid"=>$id);
     		$vv=$this->model->select_where("k12",$data);	
     
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';



				 $from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/k12_cat'); 
				}

		
}
			redirect('controller/k12_cat'); 

	}	

	public function newadmispe()
	{
		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("ssid"=>$id);
     		$vv=$this->model->select_where("school",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/special'); 
				}
}
			redirect('controller/special'); 

	}	

	public function newadmibe()
	{
		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("bid"=>$id);
     		$vv=$this->model->select_where("beautician",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/beautician'); 
				}
}
			redirect('controller/beautician'); 

	}	

	public function newadmica()
	{
		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("caid"=>$id);
     		$vv=$this->model->select_where("ca",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/ca'); 
				}
}
			redirect('controller/ca'); 

	}	



	public function newadmicfa()
	{
		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("cfaid"=>$id);
     		$vv=$this->model->select_where("cfa",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/cfa'); 
				}
}
			redirect('controller/cfa'); 

	}


	public function newadmicma()
	{
		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("cmaid"=>$id);
     		$vv=$this->model->select_where("cma",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/cma'); 
				}
}
			redirect('controller/cma'); 

	}	

	public function newadmics()
	{
		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("csid"=>$id);
     		$vv=$this->model->select_where("cs",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/cs'); 
				}
}
			redirect('controller/cs'); 

	}	


	public function newadmidietitian()
	{
		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("did"=>$id);
     		$vv=$this->model->select_where("dietitian",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/dietitian'); 
				}
}
			redirect('controller/dietitian'); 

	}


	public function newadmidm()
	{
		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("digid"=>$id);
     		$vv=$this->model->select_where("digital_market",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/digital_market'); 
				}
}
			redirect('controller/digital_market'); 

	}	

	public function newadmie()
	{
		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("eid"=>$id);
     		$vv=$this->model->select_where("engineering",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/engineering'); 
				}
}
			redirect('controller/engineering'); 

	}

	public function newadmieh()
	{
		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("ethid"=>$id);
     		$vv=$this->model->select_where("ethical",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/ethical'); 
				}
}
			redirect('controller/ethical'); 

	}	


	public function newadmiem()
	{
		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("eid"=>$id);
     		$vv=$this->model->select_where("event_f",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/events'); 
				}
}
			redirect('controller/events'); 

	}	


	public function newadmif()
	{
		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("eid"=>$id);
     		$vv=$this->model->select_where("event_f",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/events'); 
				}
}
			redirect('controller/events'); 

	}


	public function newadmidi()
	{
		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("iid"=>$id);
     		$vv=$this->model->select_where("interior",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/interior'); 
				}
}
			redirect('controller/interior'); 

	}	

	public function newadmiupsc()
	{
		if($this->uri->segment(3) == 'sel')
		{
			$id=$this->uri->segment(4);
     		$data=array("upscid"=>$id);
     		$vv=$this->model->select_where("upsc",$data);	
     		$sname =$vv[0]->name;
     		$semail=$vv[0]->email;
     		$sara=$vv[0]->area;
     		$a=$this->session->userdata['userid'];
     		$b=$this->session->userdata['first_name'];
     		$c=$this->session->userdata['last_name'];
     		$d=$this->session->userdata['email'];
     		$e=$this->session->userdata['umobile'];
			$data=array("first_name"=>$b,"last_name"=>$c,"email"=>$d,"umobile"=>$e,"schoolname"=>$sname,"area"=>$sara);
			$this->model->insert_data("listofadmi",$data);

$email_body = 'Hi,

'.$b.' '.$c.', '.$e.' and '.$d.', they have placed a request to know when your admissions are open, so please contact them before new sessions admissions

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$semail";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('Confirmation Mail');
        		$this->email->message($email_body);		
        		if($this->email->send())
        		{
				$this->session->set_flashdata('log', 'Thank you for Registration.Please verify your account now');	
				redirect('controller/upsc'); 
				}
}
			redirect('controller/upsc'); 

	}	


	public function mydetial()
    {

    //  @$urid=$this->session->userdata['userid'];
    $urid=$this->input->post('uid');
     $data = array("id"=>$urid);

    $vv['hom']=$this->model->select_where('users',$data);
    $vv['edu']=$this->model->select("user_edu");
    $vv['int']=$this->model->select("interest_into");
    $vv['select2']=$this->img;
    $this->load->view('mydetial2',$vv);

    if($this->input->post('upd'))
    {       
            $a="Active";
            $fn=$this->input->post('funame');
            $fl=$this->input->post('luname');   
            $n=$this->input->post('uname');
            $gn=$this->input->post('ugen');
            $em=$this->input->post('uemail');
            $p=$this->input->post('upass');
            $d=$this->input->post('udob');
            $c=$this->input->post('ucity');
            $e=$this->input->post('user_edu');
            $ee=implode(',',$e);
             $sa=$this->input->post('ustudent');
             $s=implode('',$sa);
             $ui=$this->input->post('uinterted_into');
               $aa = implode(',',$ui);
             $m=$this->input->post('umobile');
             if(!empty($s) && !empty($aa))
             {
            $data2 = array("first_name"=>$fn,"last_name"=>$fl,"gender"=>$gn,"uname"=>$n,"upass"=>$p,"udob"=>$d,"ucity"=>$c,"uedu"=>$ee,"ustudent"=>$s,"uinterted_into"=>$aa,"email"=>$em,"umobile"=>$m,"status"=>$a);
                
            $this->model->update("users",$data2,$data);
        $this->session->set_flashdata('thanks', 'Thanks for Update your profile');
        $this->session->set_flashdata('thanks2', 'profile updated');
        //redirect("controller/index");
        }

             else
             {
                echo "<script>alert('Please File All Data....')</script>";

             
             }
    }
}

	 public function autocomplete()
        {
	        $search_data = $this->input->post('search_data');
		
				$result = $this->model->get_autocomplete('pre','name',$search_data);
				$result2 = $this->model->get_autocomplete('k12','name',$search_data);
				$result3 = $this->model->get_autocomplete('school','name',$search_data);
				$result4 = $this->model->get_autocomplete('home','name',$search_data);
				$result5 = $this->model->get_autocomplete('career','title',$search_data);
				$result6 = $this->model->get_autocomplete('study_abroad','title',$search_data);
				$result7 = $this->model->get_autocomplete('image','name',$search_data);
				$result8 = $this->model->get_autocomplete('corporate','name',$search_data);
				$result9 = $this->model->get_autocomplete('work','name',$search_data);
				$result10 = $this->model->get_autocomplete('seminar','name',$search_data);
				$result11 = $this->model->get_autocomplete('competition','name',$search_data);
				$result12 = $this->model->get_autocomplete('camp','camp',$search_data);
				$result13 = $this->model->get_autocomplete('cocurr','name',$search_data);
				$result14 = $this->model->get_autocomplete('cocurr_o','name',$search_data);
				 $result15 = $this->model->get_autocomplete('beautician','name',$search_data);
				 $result16 = $this->model->get_autocomplete('ca','name',$search_data);
				 $result17 = $this->model->get_autocomplete('cfa','name',$search_data);
				 $result18 = $this->model->get_autocomplete('cma','name',$search_data);
				 $result19 = $this->model->get_autocomplete('cs','name',$search_data);
				 $result20 = $this->model->get_autocomplete('dietitian','name',$search_data);
				 $result21 = $this->model->get_autocomplete('digital_market','name',$search_data);
				 $result22 = $this->model->get_autocomplete('engineering','name',$search_data);
				 $result23 = $this->model->get_autocomplete('ethical','name',$search_data);
				 $result24 = $this->model->get_autocomplete('event_f','name',$search_data);
				 $result25 = $this->model->get_autocomplete('fashion','name',$search_data);
				 $result26 = $this->model->get_autocomplete('interior','name',$search_data);
				 $result27 = $this->model->get_autocomplete('jewellery','name',$search_data);
				 $result28 = $this->model->get_autocomplete('mba','name',$search_data);
				 $result29 = $this->model->get_autocomplete('medical','name',$search_data);
				 $result30 = $this->model->get_autocomplete('multimedia','name',$search_data);
				 $result31 = $this->model->get_autocomplete('upsc','name',$search_data);
				 $result32 = $this->model->get_autocomplete('listofblog','bname',$search_data);

				 if (!empty($result))
                 {
                     foreach ($result as $row):
                         echo "<li><a href='http://youreducare.com/controller/pre'>" . $row->name . "</a></li>";
                     endforeach;
                 }

                 elseif(!empty($result2))
                 {
                 	foreach ($result2 as $row):
                         echo "<li><a href='http://youreducare.com/controller/k12_cat'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result3))
                 {
                 	foreach ($result3 as $row):
                         echo "<li><a href='http://youreducare.com/controller/special'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result4))
                 {
                 	foreach ($result4 as $row):
                         echo "<li><a href='http://youreducare.com/controller/home_tutor_cat'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result5))
                 {
                 	foreach ($result5 as $row):
                         echo "<li><a href='http://youreducare.com/controller/career_coun'>" . $row->title . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result6))
                 {
                 	foreach ($result6 as $row):
                         echo "<li><a href='http://youreducare.com/controller/study_cat'>" . $row->title . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result7))
                 {
                 	foreach ($result7 as $row):
                         echo "<li><a href='http://youreducare.com/controller/image_cons'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result8))
                 {
                 	foreach ($result8 as $row):
                         echo "<li><a href='http://youreducare.com/controller/corporate_skill'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result9))
                 {
                 	foreach ($result9 as $row):
                         echo "<li><a href='http://youreducare.com/controller/work'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result10))
                 {
                 	foreach ($result10 as $row):
                         echo "<li><a href='http://youreducare.com/controller/seminar'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result11))
                 {
                 	foreach ($result11 as $row):
                         echo "<li><a href='http://youreducare.com/controller/compitition'>" . $row->name . "</a></li>";
                      endforeach;	
                 }

                  elseif(!empty($result12))
                  {
                  	foreach ($result12 as $row):
                          echo "<li><a href='http://youreducare.com/controller/camp'>" . $row->camp . "</a></li>";
                      endforeach;	
                  }

                  elseif(!empty($result13))
                  {
                  	foreach ($result13 as $row):
                          echo "<li><a href='http://youreducare.com/controller/co_curr_cat'>" . $row->name . "</a></li>";
                     endforeach;	
                  }

                  elseif(!empty($result14))
                  {
                 	foreach ($result14 as $row):
                         echo "<li><a href='http://youreducare.com/controller/co_curr_o_cat'>" . $row->name . "</a></li>";
                     endforeach;	
                  }

                 elseif(!empty($result15))
                 {
                 	foreach ($result15 as $row):
                         echo "<li><a href='http://youreducare.com/controller/beautician'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result16))
                 {
                 	foreach ($result16 as $row):
                         echo "<li><a href='http://youreducare.com/controller/ca'>" . $row->name . "</a></li>";
                     endforeach;	
                 }


                 elseif(!empty($result17))
                 {
                 	foreach ($result17 as $row):
                         echo "<li><a href='http://youreducare.com/controller/cfa'>" . $row->name . "</a></li>";
                     endforeach;	
                 }


                 elseif(!empty($result18))
                 {
                 	foreach ($result18 as $row):
                         echo "<li><a href='http://youreducare.com/controller/cma'>" . $row->name . "</a></li>";
                     endforeach;	
                 }


                 elseif(!empty($result19))
                 {
                 	foreach ($result19 as $row):
                         echo "<li><a href='http://youreducare.com/controller/cs'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result20))
                 {
                 	foreach ($result20 as $row):
                         echo "<li><a href='http://youreducare.com/controller/dietitian'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result21))
                 {
                 	foreach ($result21 as $row):
                         echo "<li><a href='http://youreducare.com/controller/digital_market'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result22))
                 {
                 	foreach ($result22 as $row):
                         echo "<li><a href='http://youreducare.com/controller/engineering'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result23))
                 {
                 	foreach ($result23 as $row):
                         echo "<li><a href='http://youreducare.com/controller/ethical'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result24))
                 {
                 	foreach ($result24 as $row):
                         echo "<li><a href='http://youreducare.com/controller/events'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result25))
                 {
                 	foreach ($result25 as $row):
                         echo "<li><a href='http://youreducare.com/controller/fashion'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result26))
                 {
                 	foreach ($result26 as $row):
                         echo "<li><a href='http://youreducare.com/controller/interior'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result27))
                 {
                 	foreach ($result27 as $row):
                         echo "<li><a href='http://youreducare.com/controller/jewellery'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result28))
                 {
                 	foreach ($result28 as $row):
                         echo "<li><a href='http://youreducare.com/controller/mba'>" . $row->name . "</a></li>";
                     endforeach;	
                 }


                 elseif(!empty($result29))
                 {
                 	foreach ($result29 as $row):
                         echo "<li><a href='http://youreducare.com/controller/medical'>" . $row->name . "</a></li>";
                     endforeach;	
                 }


                 elseif(!empty($result30))
                 {
                 	foreach ($result30 as $row):
                         echo "<li><a href='http://youreducare.com/controller/multimedia'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result31))
                 {
                 	foreach ($result31 as $row):
                         echo "<li><a href='http://youreducare.com/controller/upsc'>" . $row->name . "</a></li>";
                     endforeach;	
                 }

                 elseif(!empty($result32))
                 {
                          foreach ($result32 as $row):                    
                            
                          echo "<li><a href='http://youreducare.com/controller/$row->bname'>" . $row->bname . "</a></li>";
                      endforeach;    
                 }

                 else
                 {
                     echo "<li> <em> Not found ... </em> </li>";
                 }

        }

        
      public function forget()
        {
        	if($this->input->post('sendotp'))
        	{
        	$otp=mt_rand(10000,99999);	
        	$e=$this->input->post('mobile');
        	if(!empty($e))
        	{
			$data=array("email"=>$e);

			$vv=$this->model->select_where("users",$data);
			@$n=$vv[0]->uname;
			
			$sr=array("otp"=>$otp,"email"=>$e);
			$this->session->set_userdata($sr); 
			$email_body = 'Hi, '.$n.' your OTP is '.$otp.' 

Regards
Your Educare.';
				$from_email = "support@youreducare.com";
       			 $to_email = "$e";
       			 $cc_email = "aditya@youreducare.com";
       			 $this->load->library('email');
       			 $this->email->from($from_email, 'YourEducare');
        		$this->email->to($to_email);
        		$this->email->cc($cc_email);
        		$this->email->Bcc('memonsalman865@gmail.com');
				$this->email->subject('OTP Mail');
        		$this->email->message($email_body);		
        		$this->email->send();
        	}
        	else
        {
        	echo "<script>alert('Please Enter your Email id')</script>";

        }
        }

        	$vv['select2']=$this->img;
        	$this->load->view('forgotp',$vv);

        }
        

        public function forgotpv()
        {
        	if($this->input->post('verifiy'))
        	{
        		$a=$this->input->post('otp');
        		$b=@$this->session->userdata['otp'];
        		if(!empty($a))
        		{
        			if($a==$b)
        		{
        			$this->session->unset_userdata('otp');
        			redirect('controller/changepassaagword');
        		}
        		else
        		{	
        			$this->session->set_flashdata('otpw', 'Please Enter Correct OTP');	
        			$vv['select2']=$this->img;	
        			$this->load->view('forgotp',$vv);	
        		}

        		}
        		else
        			{
        				echo "<script>alert('Please Enter your OTP')</script>";	
        				
        			}
        		
        		
        	}
        	$vv['select2']=$this->img;
        		$this->load->view('forgotp',$vv);
        	
        }

        public function changepassaagword()
        {
        	$e=@$this->session->userdata['email'];
        	$data=array("email"=>$e);
        	$vv['hom']=$this->model->select_where("users",$data);
        	$vv['select2']=$this->img;
        	 $this->load->view('changepassaagword',$vv);

        	 if($this->input->post('sub'))
        	 {
        	 $e=@$this->session->userdata['email'];
        	 $p=$this->input->post('pwd');
        	 $data=array("email"=>$e);
        	 $data2=array("upass"=>$p);
        	 $this->model->update("users",$data2,$data);
			 $this->session->unset_userdata('email');
        	 
        	 $this->session->set_flashdata('passwchagne', 'Your password successfuly changed please login again');
        	 redirect("controller/index");
        	 }

        	
        }



        public function list_institute2()
        {
        	$this->load->view('list_institute2');
        }

	public function test123()
	{
		$add=$this->input->post('id');
		$add2=array('area'=>$add);
		$cou=$this->model->find1('pre_review','pid');
		$add1=$this->model->select_where("pre",$add2);
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



	public function test45()
	{
		$add=$this->input->post('id');
		$add2=array('area'=>$add);
		$add1=$this->model->select_where("k12",$add2);
		?>
		<div id="add">
		    <?php
		      foreach ($add1 as $k) {
		    ?>

		      <div class="row">

                            <div class="col-sm-3 col-xs-6 prcoimga">

                                <a href="<?php echo base_url("controller/k_12_detail/sel/".$k->kid); ?>"><img src="<?php echo $k->photo1; ?>" alt="Cinque Terre" width="150" height="150"></a>

                            </div>

                            <div class="col-sm-5 col-xs-6 precote">

                                <h3><a class="title" href="<?php echo base_url("controller/k_12_detail/sel/".$k->kid) ?>"><?php echo $k->name; ?></a></h3>
<!-- 
                                <?php

                  $a=(round($cou['0']->star));
                  
                  
                  ?>

                                <select id="star-rating-1" name="st">
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


                <!--                 <span class="fa fa-star checked" style="font-size: 20px;"></span>
                                <span class="fa fa-star checked" style="font-size: 20px;"></span>
                                <span class="fa fa-star checked" style="font-size: 20px;"></span>
                                <span class="fa fa-star" style="font-size: 20px;"></span>
                                <span class="fa fa-star" style="font-size: 20px;"></span> -->

                                <p><a href=""><?php echo $k->board; ?></a></p>
                                <p><i class="fa fa-map-marker"></i> <?php echo $k->addr; ?></p>
                            </div>

                            <div class="col-sm-4 subc" style="margin-top: 145px;">

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
                        <hr style=" border: 1px solid #000000; " >

		<?php
		}
		?>
		    </div>

		    </div>
	<?php
	}


	public function test67()
	{
		$add=$this->input->post('id');
		$add2=array('area'=>$add);
		$add1=$this->model->select_where("home",$add2);
		?>
		<div id="add">
		    <?php
		      foreach ($add1 as $k) {
		    ?>

		      <div class="row">

                            <div class="col-sm-3 col-xs-5">

                                <a href="<?php echo base_url("controller/home_tutor_detail/sel/".$k->hid); ?>"><img  src="<?php echo $k->photo1; ?>"  alt="Cinque Terre" width="150" height="150"></a>

                            </div>

                            <div class="col-sm-5 col-xs-7">

                                <h3><a class="title" href="<?php echo base_url("controller/home_tutor_detail/sel/".$k->hid) ?>"><?php echo $k->name; ?></a></h3>

                                    <p><a href="STUDY_ABROAD_details.html"><?php echo $k->board; ?></a></p>

                                            
                                             <!--  <?php

                  $a=(round($cou['0']->star));
                  
                  
                  ?>

                                <select id="star-rating-1" name="st">
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
       </select>
 -->


                                <!-- <span class="fa fa-star checked" style="font-size: 20px;"></span>
                                <span class="fa fa-star checked" style="font-size: 20px;"></span>
                                <span class="fa fa-star checked" style="font-size: 20px;"></span>
                                <span class="fa fa-star" style="font-size: 20px;"></span>
                                <span class="fa fa-star" style="font-size: 20px;"></span>
                                <p>"This is the best collage and<br> atmosphere is awesome"</p>
                                <p><i class="fa fa-map-marker"></i> <?php echo $k->class; ?></p> -->

                             <!--   <p>
                                <i class="fa fa-phone" aria-hidden="true"></i>: <a href="#"><?php echo $k->phone; ?></a> 
                                |<br class="hidden-lg"> <i class="fa fa-envelope-o" aria-hidden="true"></i>: <a href="mailto:mail@example.com"><?php echo $k->email; ?></a>

                                </p> -->
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

		    </div>
	<?php
	}


}
?>

