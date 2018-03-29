<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function log()
	{
		
		if(! $this->session->userdata('id')) 

	 		redirect('admin/index');
	}

	public function logout()
	{
		$ar=array('id','name');
		$this->session->unset_userdata($ar);
		redirect('admin/index');
	}
	public function index()
	{
		if($this->input->post('Login'))
		{
			$user=$this->input->post('a_user');
			$pass=$this->input->post('a_pass');
			$ar=array('a_user'=>$user,'a_pass'=>$pass);
			$qq=$this->model->select_where("a_login",$ar);
			if($qq == true)
			{
				$id=$qq[0]->a_rid;
				$name=$qq[0]->a_user;
				$ses=array('id'=>$id,'name'=>$name);
				$this->session->set_userdata($ses);
				redirect("admin/home");
			}
			else
			{
				$this->load->view('admin/login');
			}
		}
		else
		{
			$this->load->view('admin/login');
		}
	}

	public function home()
	{
		$this->log();
		$this->load->view('admin/home');
	}	
	
	public function career()
	{
    if($this->uri->segment(3))
    {
    $id=$this->uri->segment(3);
    $data=array("cid"=>$id);
    $vv['ed']=$this->model->select_where('career',$data);

    if($this->input->post('career'))
      {
                $title=$this->input->post('title');
                $area=$this->input->post('area');
        $subname=$this->input->post('subname');
                $stream=$this->input->post('Education_Stream');
                if(count($stream))
                {
                $stream1=implode(",", $stream) ;
              }
                // print_r($this->input->post('awards'));
                // die();
                $awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
                $fees=$this->input->post('fees');
                $iname=$this->input->post('iname'); 
                $iadd=$this->input->post('iadd');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $iweb=$this->input->post('iweb');
                $city=$this->input->post('city');
                $desc=$this->input->post('desc');
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');
                $test=$this->input->post('test');
                $outcome=$this->input->post('outcome');
                $fb=$this->input->post('fb');
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');
                $data2=array('title'=>$title,'area'=>$area,'subname'=>$subname,'stream'=>$stream1,'awards'=>$awards1,'fees'=>$fees,'iname'=>$iname,'iadd'=>$iadd,'email'=>$email,'phone'=>$phone,'iweb'=>$iweb,'city'=>$city,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'test'=>$test,'outcome'=>$outcome,'fb'=>$fb,'long'=>$long,'lati'=>$lati);
                $ar1=$this->photo_up("/uploads/Career_Counceling/","admin/career");
                $ar3=array_merge($data2,$ar1);
                $this->model->update("career",$ar3,$data);
                  redirect("admin/careerupdate");
}
}

		$this->log();
		if($this->form_validation->run('career') == FALSE)
		{
		//	echo "innnn";
		//	$error123=@$error;
      $vv['hom']=$this->model->select("career");
      
      
			$this->load->view('admin/career',$vv);
		}
		else
		{
			//echo "innnn";
			if($this->input->post('career'))
			{
                $title=$this->input->post('title');
                $area=$this->input->post('area');
				$subname=$this->input->post('subname');
                $stream=$this->input->post('Education_Stream');
                if(count($stream))
                {
                $stream1=implode(",", $stream) ;
            	}
                // print_r($this->input->post('awards'));
                // die();
                $awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
                $fees=$this->input->post('fees');
                $iname=$this->input->post('iname');	
                $iadd=$this->input->post('iadd');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $iweb=$this->input->post('iweb');
                $city=$this->input->post('city');
                $desc=$this->input->post('desc');
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');
                $test=$this->input->post('test');
                $outcome=$this->input->post('outcome');
                $fb=$this->input->post('fb');
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');
                $ar=array('title'=>$title,'area'=>$area,'subname'=>$subname,'stream'=>$stream1,'awards'=>$awards1,'fees'=>$fees,'iname'=>$iname,'iadd'=>$iadd,'email'=>$email,'phone'=>$phone,'iweb'=>$iweb,'city'=>$city,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'test'=>$test,'outcome'=>$outcome,'fb'=>$fb,'long'=>$long,'lati'=>$lati);
                $ar1=$this->photo_up("/uploads/Career_Counceling/","admin/career");
         		if(!empty($ar1))
         		{
                $ar3=array_merge($ar,$ar1);
				$qq=$this->model->insert_data("career",$ar3);
                $this->load->view('admin/career');
               redirect("admin/career");
           		}
			}				
		}
	}

	public function beautician()
	{
    if($this->uri->segment(3))
    {
    $id=$this->uri->segment(3);
    $data=array("bid"=>$id);
    $vv['ed']=$this->model->select_where('beautician',$data);

    if($this->input->post('beautician'))
      { 
        // echo "indididnidn";
                $name=$this->input->post('name');
                $certi=$this->input->post('certi');
                $area=$this->input->post('area');
                $subname=$this->input->post('subname');
               
                $fees=$this->input->post('fees');
                $awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
                $addr=$this->input->post('addr');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $link=$this->input->post('link');
                
                $desc1=$this->input->post('desc1');
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');
                
                
                $fb=$this->input->post('fb');
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');
                $data2=array('name'=>$name,'certi'=>$certi,'area'=>$area,'subname'=>$subname,'fees'=>$fees,'awards'=>$awards1,'addr'=>$addr,'email'=>$email,'phone'=>$phone,'link'=>$link,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'fb'=>$fb,'long'=>$long,'lati'=>$lati);
                $ar1=$this->photo_up("/uploads/beautician/","admin/beautician_form");
           
                $ar3=array_merge($data2,$ar1);
                $this->model->update("beautician",$ar3,$data);
                // $this->load->view('admin/beautician_form');
               redirect("admin/beauticianupdate");
              }
      } 





		$this->log();
		if($this->form_validation->run('beautician') == FALSE)
		{
			// echo "innnn";
			// $error123=@$error;
      $vv['hom']=$this->model->select("beautician");
			$this->load->view('admin/beautician_form',$vv);
		}
		else
		{
			// echo "innnn";
			// print_r($_POST);
			if($this->input->post('beautician'))
			{	
				// echo "indididnidn";
                $name=$this->input->post('name');
                $certi=$this->input->post('certi');
                $area=$this->input->post('area');
				$subname=$this->input->post('subname');
               
                $fees=$this->input->post('fees');
                $awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
                $addr=$this->input->post('addr');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $link=$this->input->post('link');
                
                $desc1=$this->input->post('desc1');
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');
                
                
                $fb=$this->input->post('fb');
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');
                $ar=array('name'=>$name,'certi'=>$certi,'area'=>$area,'subname'=>$subname,'fees'=>$fees,'awards'=>$awards1,'addr'=>$addr,'email'=>$email,'phone'=>$phone,'link'=>$link,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'fb'=>$fb,'long'=>$long,'lati'=>$lati);
                $ar1=$this->photo_up("/uploads/beautician/","admin/beautician_form");
         		if(!empty($ar1))
         		{
                $ar3=array_merge($ar,$ar1);
				$qq=$this->model->insert_data("beautician",$ar3);
                // $this->load->view('admin/beautician_form');
               redirect("admin/beautician");
           		}
			}				
		}
	}

	public function ca()
	{
    if($this->uri->segment(3))
    {
    $id=$this->uri->segment(3);
    $data=array("caid"=>$id);
    $vv['ed']=$this->model->select_where('ca',$data);

      if($this->input->post('ca'))
      {
        

                        $name=$this->input->post('name');
                        $category=$this->input->post('category');
                        $category1=implode(",", $category) ;
                        $subname=$this->input->post('subname');
                        $area=$this->input->post('area');
                        $result=$this->input->post('result');
                        $awards=$this->input->post('awards');
                        $awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
                        $addr=$this->input->post('addr');
                        $fb=$this->input->post('fb'); 
                        $link=$this->input->post('link');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc1=$this->input->post('desc1');
                        $day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                        $lati=$this->input->post('lati');
                        $data2=array('name'=>$name,'category'=>$category1,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                          $ar1=$this->photo_up("/uploads/ca/","admin/ca_form");
                     
                        $ar3=array_merge($data2,$ar1);
                        $this->model->update("ca",$ar3,$data);
                        redirect("admin/caupdate");
                      }
      }


		$this->log();
		if($this->form_validation->run('ca') == FALSE)
		{
       $vv['hom']=$this->model->select("ca");
			$this->load->view('admin/ca_form',$vv);
		}
		else
		{
			// echo "innnn";
			// print_r($_POST);

			if($this->input->post('ca'))
			{
				//echo "innnn";
				// $this->load->view('admin/career');


				        $name=$this->input->post('name');
                       $category=$this->input->post('category');
                       $category1=implode(",", $category) ;
                       $subname=$this->input->post('subname');
                       $area=$this->input->post('area');
                       $result=$this->input->post('result');
                       $awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
            			$addr=$this->input->post('addr');
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('link');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc1=$this->input->post('desc1');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                		$lati=$this->input->post('lati');
                        $ar=array('name'=>$name,'category'=>$category1,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
               			 $ar1=$this->photo_up("/uploads/ca/","admin/ca_form");
               			 if(!empty($ar1))
         				{	
       //   					echo "innnn";
							// print_r($_POST);
                        $ar3=array_merge($ar,$ar1);
               			$qq=$this->model->insert_data("ca",$ar3);
                        redirect("admin/ca");
                    	}
			}
		}
	}

	public function cfa()
	{
    if($this->uri->segment(3))
    {
    $id=$this->uri->segment(3);
    $data=array("cfaid"=>$id);
    $vv['ed']=$this->model->select_where('cfa',$data);     

      if($this->input->post('cfa'))
      {
        
                        $name=$this->input->post('name');
                        $category=$this->input->post('category');
                        $category1=implode(",", $category) ;
                        $subname=$this->input->post('subname');
                        $area=$this->input->post('area');
                        $result=$this->input->post('result');
                        $awards=$this->input->post('awards');
                        $awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
                        $addr=$this->input->post('addr');

                        $fb=$this->input->post('fb'); 
                        $link=$this->input->post('link');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      
                        $desc1=$this->input->post('desc1');
                        $day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                        $lati=$this->input->post('lati');
                        $data2=array('name'=>$name,'category'=>$category1,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                        $ar1=$this->photo_up("/uploads/cfa/","admin/cfa_form");
                    
                        $ar3=array_merge($data2,$ar1);
                        $this->model->update("cfa",$ar3,$data);
                        redirect("admin/cfa");
                      }
      }





		$this->log();
		if($this->form_validation->run('cfa') == FALSE)
		{
       $vv['hom']=$this->model->select("cfa");
			$this->load->view('admin/cfa_form',$vv);
		}
		else
		{
			// echo "innnn";
			// print_r($_POST);
			if($this->input->post('cfa'))
			{
				//echo "innnn";
				// $this->load->view('admin/career');


				        $name=$this->input->post('name');
                       $category=$this->input->post('category');
                       $category1=implode(",", $category) ;
                       $subname=$this->input->post('subname');
                       $area=$this->input->post('area');
                       $result=$this->input->post('result');
                        $awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
            			$addr=$this->input->post('addr');
                       
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('link');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc1=$this->input->post('desc1');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                		$lati=$this->input->post('lati');
                        $ar=array('name'=>$name,'category'=>$category1,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
               			 $ar1=$this->photo_up("/uploads/cfa/","admin/cfa_form");
               			 if(!empty($ar1))
         				{	
       //   					echo "innnn";
							// print_r($_POST);
                        $ar3=array_merge($ar,$ar1);
               			$qq=$this->model->insert_data("cfa",$ar3);
                        redirect("admin/cfa");
                    	}
			}
		}
	}

	public function cma()
	{
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("cmaid"=>$id);
            $vv['ed']=$this->model->select_where('cma',$data); 

            if($this->input->post('cma'))
                {
               
                    $name=$this->input->post('name');
                    $category=$this->input->post('category');
                    $category1=implode(",", $category) ;
                    $subname=$this->input->post('subname');
                    $area=$this->input->post('area');
                    $result=$this->input->post('result');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $fees=$this->input->post('fees');
                    $addr=$this->input->post('addr');
                    $fb=$this->input->post('fb');   
                    $link=$this->input->post('link');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    //  $cmmt=$this->input->post('cmmt');
                    $desc1=$this->input->post('desc1');
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                    $data2=array('name'=>$name,'category'=>$category1,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                    $ar1=$this->photo_up("/uploads/cma/","admin/cma_form");
                    
                    $ar3=array_merge($data2,$ar1);
      
                    $this->model->update("cma",$ar3,$data);
                    redirect("admin/cmaupdate");
                    }
            }

		$this->log();
		if($this->form_validation->run('cma') == FALSE)
		{
            $vv['hom']=$this->model->select("cma");
			$this->load->view('admin/cma_form',$vv);
		}
		else
		{
			
			if($this->input->post('cma'))
			{
				
				        $name=$this->input->post('name');
                       $category=$this->input->post('category');
                       $category1=implode(",", $category) ;
                       $subname=$this->input->post('subname');
                       $area=$this->input->post('area');
                       $result=$this->input->post('result');
                       $awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
            			$addr=$this->input->post('addr');
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('link');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc1=$this->input->post('desc1');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                		$lati=$this->input->post('lati');
                        $ar=array('name'=>$name,'category'=>$category1,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
               			 $ar1=$this->photo_up("/uploads/cma/","admin/cma_form");
               			 if(!empty($ar1))
         				{	
     					    
                        $ar3=array_merge($ar,$ar1);
       //                  echo "innnn";
							// print_r($_POST);
							// die();
               			$qq=$this->model->insert_data("cma",$ar3);
                        redirect("admin/cma");
                    	}
			}
		}
	}

	public function cs()
	{
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("csid"=>$id);
            $vv['ed']=$this->model->select_where('cs',$data);

            if($this->input->post('cs'))
                {
               
                    $name=$this->input->post('name');
                    $category=$this->input->post('category');
                    $category1=implode(",", $category) ;
                    $subname=$this->input->post('subname');
                    $area=$this->input->post('area');
                    $result=$this->input->post('result');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $fees=$this->input->post('fees');
                    $addr=$this->input->post('addr');
                    $fb=$this->input->post('fb');   
                    $link=$this->input->post('link');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    //  $cmmt=$this->input->post('cmmt');
                    $desc1=$this->input->post('desc1');
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                    $data2=array('name'=>$name,'category'=>$category1,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                    $ar1=$this->photo_up("/uploads/cs/","admin/cs_form");
                    
                    $ar3=array_merge($data2,$ar1);
                        
                    $this->model->update("cs",$ar3,$data);
                    redirect("admin/csupdate");
                }
            }



		$this->log();
		if($this->form_validation->run('cs') == FALSE)
		{
            $vv['hom']=$this->model->select("cs");
			$this->load->view('admin/cs_form',$vv);
		}
		else
		{
			
			if($this->input->post('cs'))
			    {
				
    		        $name=$this->input->post('name');
                    $category=$this->input->post('category');
                    $category1=implode(",", $category) ;
                    $subname=$this->input->post('subname');
                    $area=$this->input->post('area');
                    $result=$this->input->post('result');
                    $awards=$this->input->post('awards');
            		$awards1=implode(";", $awards) ;
                    $fees=$this->input->post('fees');
        			$addr=$this->input->post('addr');
                    $fb=$this->input->post('fb');	
                    $link=$this->input->post('link');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    //  $cmmt=$this->input->post('cmmt');
                    $desc1=$this->input->post('desc1');
               		$day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                    $long=$this->input->post('long');   
            		$lati=$this->input->post('lati');
                    $ar=array('name'=>$name,'category'=>$category1,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
               		$ar1=$this->photo_up("/uploads/cs/","admin/cs_form");
               		if(!empty($ar1))
         			{	
     					    
                    $ar3=array_merge($ar,$ar1);
       						
               		$qq=$this->model->insert_data("cs",$ar3);
                    redirect("admin/cs");
                    }
			}
		}
	}

	public function dietitian()
	{
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("did"=>$id);
            $vv['ed']=$this->model->select_where('dietitian',$data);

            if($this->input->post('dietitian'))
            {   
                
                $name=$this->input->post('name');
                $certi=$this->input->post('certi');
                $area=$this->input->post('area');
                $subname=$this->input->post('subname');
                $awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
                $fees=$this->input->post('fees');
                
                $addr=$this->input->post('addr');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $link=$this->input->post('link');
                
                $desc1=$this->input->post('desc1');
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');
                
                
                $fb=$this->input->post('fb');
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');
                $data2=array('name'=>$name,'certi'=>$certi,'area'=>$area,'subname'=>$subname,'awards'=>$awards1,'fees'=>$fees,'addr'=>$addr,'email'=>$email,'phone'=>$phone,'link'=>$link,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'fb'=>$fb,'long'=>$long,'lati'=>$lati);
                $ar1=$this->photo_up("/uploads/dietitian/","admin/dietitian_form");
                
                $ar3=array_merge($data2,$ar1);
      
                $qq=$this->model->update("dietitian",$ar3,$data);
               
               redirect("admin/dietitianupdate");
                }
            }           





		$this->log();
		if($this->form_validation->run('dietitian') == FALSE)
		{
			$vv['hom']=$this->model->select("dietitian");
			$this->load->view('admin/dietitian_form',$vv);
		}
		else
		{
			if($this->input->post('dietitian'))
			{	
				
                $name=$this->input->post('name');
                $certi=$this->input->post('certi');
                $area=$this->input->post('area');
				$subname=$this->input->post('subname');
               $awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
                $fees=$this->input->post('fees');
                
                $addr=$this->input->post('addr');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $link=$this->input->post('link');
                
                $desc1=$this->input->post('desc1');
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');
                
                
                $fb=$this->input->post('fb');
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');
                $ar=array('name'=>$name,'certi'=>$certi,'area'=>$area,'subname'=>$subname,'awards'=>$awards1,'fees'=>$fees,'addr'=>$addr,'email'=>$email,'phone'=>$phone,'link'=>$link,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'fb'=>$fb,'long'=>$long,'lati'=>$lati);
                $ar1=$this->photo_up("/uploads/dietitian/","admin/dietitian_form");
         		if(!empty($ar1))
         		{
                $ar3=array_merge($ar,$ar1);
       //          			echo "innnn";
							// print_r($_POST);
							// die();
				$qq=$this->model->insert_data("dietitian",$ar3);
                // $this->load->view('admin/beautician_form');
               redirect("admin/dietitian");
           		}
			}				
		}
	}

	public function digital_market()
	{
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("digid"=>$id);
            $vv['ed']=$this->model->select_where('digital_market',$data);

                if($this->input->post('digital_market'))
                {   
                    
                    $name=$this->input->post('name');
                    $certi=$this->input->post('certi');
                    $area=$this->input->post('area');
                    $subname=$this->input->post('subname');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $fees=$this->input->post('fees');
                    
                    $addr=$this->input->post('addr');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    $link=$this->input->post('link');
                    
                    $desc1=$this->input->post('desc1');
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                    
                    
                    $fb=$this->input->post('fb');
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                    $data2=array('name'=>$name,'certi'=>$certi,'area'=>$area,'subname'=>$subname,'awards'=>$awards1,'fees'=>$fees,'addr'=>$addr,'email'=>$email,'phone'=>$phone,'link'=>$link,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'fb'=>$fb,'long'=>$long,'lati'=>$lati);
                    $ar1=$this->photo_up("/uploads/digital_market/","admin/digital_market_form");
                    
                    $ar3=array_merge($data2,$ar1);
                                
                    $this->model->update("digital_market",$ar3,$data);
                    
                    redirect("admin/digital_marketupdate");
                }
            }





		$this->log();
		if($this->form_validation->run('digital_market') == FALSE)
		{
			$vv['hom']=$this->model->select("digital_market");
			$this->load->view('admin/digital_market_form',$vv);
		}
		else
		{
			
			if($this->input->post('digital_market'))
			{	
				
                $name=$this->input->post('name');
                $certi=$this->input->post('certi');
                $area=$this->input->post('area');
				$subname=$this->input->post('subname');
               	$awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
                $fees=$this->input->post('fees');
                
                $addr=$this->input->post('addr');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $link=$this->input->post('link');
                
                $desc1=$this->input->post('desc1');
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');
                
                
                $fb=$this->input->post('fb');
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');
                $ar=array('name'=>$name,'certi'=>$certi,'area'=>$area,'subname'=>$subname,'awards'=>$awards1,'fees'=>$fees,'addr'=>$addr,'email'=>$email,'phone'=>$phone,'link'=>$link,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'fb'=>$fb,'long'=>$long,'lati'=>$lati);
                $ar1=$this->photo_up("/uploads/digital_market/","admin/digital_market_form");
         		if(!empty($ar1))
         		{
                $ar3=array_merge($ar,$ar1);
      						// echo "innnn";
							// print_r($_POST);
							// die();
				$qq=$this->model->insert_data("digital_market",$ar3);
                // $this->load->view('admin/beautician_form');
               redirect("admin/digital_market");
           		}
			}				
		}
	}

	public function engineering()
	{  
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("eid"=>$id);
            $vv['ed']=$this->model->select_where('engineering',$data);

                if($this->input->post('engineering'))
                {
                
                    $name=$this->input->post('name');
                    $category=$this->input->post('category');
                    $category1=implode(",", $category) ;
                    $exam=$this->input->post('exam');
                    $subname=$this->input->post('subname');
                    $area=$this->input->post('area');
                    $result=$this->input->post('result');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $fees=$this->input->post('fees');
                    $addr=$this->input->post('addr');
                    $fb=$this->input->post('fb');   
                    $link=$this->input->post('link');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    //  $cmmt=$this->input->post('cmmt');
                    $desc1=$this->input->post('desc1');
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                    $data2=array('name'=>$name,'category'=>$category1,'exam'=>$exam,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                    $ar1=$this->photo_up("/uploads/engineering/","admin/engineering_form");
                      
                    $ar3=array_merge($data2,$ar1);
  
                    $this->model->update("engineering",$ar3,$data);
                    redirect("admin/engineeringupdate");
                }
        }


		$this->log();
		if($this->form_validation->run('engineering') == FALSE)
		{
            $vv['hom']=$this->model->select("engineering");
			$this->load->view('admin/engineering_form',$vv);
		}
		else
		{
			
			if($this->input->post('engineering'))
			{
				

				        $name=$this->input->post('name');
                       $category=$this->input->post('category');
                       $category1=implode(",", $category) ;
                       $exam=$this->input->post('exam');
                       $subname=$this->input->post('subname');
                       $area=$this->input->post('area');
                       $result=$this->input->post('result');
                        $awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
            			$addr=$this->input->post('addr');
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('link');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc1=$this->input->post('desc1');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                		$lati=$this->input->post('lati');
                        $ar=array('name'=>$name,'category'=>$category1,'exam'=>$exam,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
               			 $ar1=$this->photo_up("/uploads/engineering/","admin/engineering_form");
               			 if(!empty($ar1))
         				{	
     					    
                        $ar3=array_merge($ar,$ar1);
      
							// print_r($_POST);
							// die();
               			$qq=$this->model->insert_data("engineering",$ar3);
                        redirect("admin/engineering");
                    	}
			}
		}
	}

	public function testimonials(){
		
	
		$this->log();

		if($this->input->post('testimonials'))
			{
				// echo "innnn";
				// $this->load->view('admin/career');
				// die();

				        $title=$this->input->post('title');
                       	$category=$this->input->post('cat');

                       $ar=array('title'=>$title,'cat'=>$category);
                       // Image upload start
                        $path1="/uploads/testimonials/img/";
                       $file1=$this->check('image');
                       if($file1 == "" )
						{
							$config['upload_path']          = ".".$path1;
						    $config['allowed_types']        = 'jpg|png|jpeg';
						    $config['max_size']             = 300000;
						    @$this->load->library('upload', $config);
	
							if(! empty($_FILES['image']['name']))
							{
				            	$this->upload->do_upload('image');
				            	$data =$this->upload->data();
				            	$path=base_url("$path1".$data['raw_name'].$data['file_ext']);
				            	$ar['image']=$path;
				            	// echo $path;
				            	// die();
				            	// echo "<br>";
				            	//exit;
					        }
					    }
					    // Image upload end


					    //Video upload start
					 //    $target_dir="http://myedworld.varunkhanna.in/uploads/testimonials/video/";


					 //    print_r($_FILES);
					 //  //  die();
						// $target_file = $target_dir .$_FILES["video"]["name"];

						// if($_FILES["video"]["name"])
						// {
						// 	echo "string";
						// 	//die();
						// //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

						// // if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg")
						// // {
						// //     echo "File Format Not Suppoted";
						// // } 

						// // else
						// // {

						// //$video_path=$_FILES['video']['name'];

						

						// move_uploaded_file($_FILES["video"]["name"],$target_dir);

						// echo "uploaded ";

						// //}

						//  }


					    	// New1111
                       	$path2="/uploads/testimonials/video/";
                       if(isset($_FILES['video']['name']) && $_FILES['video']['name'] != '')
						{
							unset($config);
							$date = date("ymd");
							$path2="/uploads/testimonials/video/";
							$configVideo['upload_path']         = ".".$path2;
						    $configVideo['allowed_types']       = 'mp4|wmv|avi|flv|3gp';
						    $configVideo['max_size'] 			= '0';
						    $configVideo['overwrite'] 			= FALSE;
						    $configVideo['remove_spaces'] 		= TRUE;
						    $configVideo['max_filename'] 		= '255';
						    $configVideo['encrypt_name'] 		= FALSE;
						    $video_name = $date.$_FILES['video']['name'];
						    $configVideo['file_name'] 			= $video_name;

						    @$this->load->library('upload', $configVideo);
						    $this->upload->initialize($configVideo);
						   
						    if (!$this->upload->do_upload('video')) 
						    {
				                echo $this->upload->display_errors();
				            } 
				            else 
				            {
				                $videoDetails = $this->upload->data();
				                 $path3=base_url("$path2".$video_name);
						    $ar['video']=$path3;
				                echo "Successfully Uploaded";
				            }

	
							// if(! empty($_FILES['video']['name']))
							// {
				   //          	$this->upload->do_upload('video');
				   //          	$data =$this->upload->data();
				   //          	$path3=base_url("$path2".$data['raw_name'].$data['file_ext']);
				   //          	$ar['video']=$path3;
				   //          	// echo $path3;
				   //          	// echo "<br>";
				   //          	$vidd=$data['raw_name'].$data['file_ext'];
				   //          	move_uploaded_file($vidd, $path2);
				   //          	// echo $vidd;
				   //          	// echo "<br>";
				   //          	// echo $_FILES['video']['name'];
				   //          	// die();
				   //          	// echo "<br>";
				   //          	//exit;
					  //       }
					    }
					    // Video upload end



       //         			 $path2="/uploads/testimonials/video/";s
       //                   $this->load->library('upload', $config);
						 //   // var_dump($this->load->library('upload', $config));
					  //    //   $this->load->library('upload');
								
							// if(! empty($_FILES['video']['name']))
							// {
				   //          	$this->upload->do_upload('video');
				   //          	$data1 =$this->upload->data();
				   //          	$path3=base_url("$path2".$data1['raw_name'].$data1['file_ext']);
				   //          	$ar['video']=$path3;	
				   //          	// echo $path;
				   //          	// echo "<br>";
				   //          	//exit; 
					  //       }

      						
							// print_r($_POST);
							// die();
               			$qq=$this->model->insert_data("testim_videos",$ar);
                        redirect("admin/testimonials");
                    	
			}

			$this->load->view('admin/testimonials');

	}

	public function indexblog(){
    
  
    $this->log();

    if($this->input->post('indexblog'))
      {
        

                $title=$this->input->post('title');
                $content=$this->input->post('content');
                $url=$this->input->post('url');
                $ar=array('title'=>$title,'content'=>$content,'url'=>$url);
                       // Image upload start
                $path1="/uploads/indexblog/img/";
                $file1=$this->check('image');
                if($file1 == "" )
                {
                  $config['upload_path']          = ".".$path1;
                  $config['allowed_types']        = 'jpg|png|jpeg';
                  $config['max_size']             = 300000;
                  @$this->load->library('upload', $config);
  
                if(! empty($_FILES['image']['name']))
                {
                      $this->upload->do_upload('image');
                      $data =$this->upload->data();
                      $path=base_url("$path1".$data['raw_name'].$data['file_ext']);
                      $ar['image']=$path;
                      // echo $path;
                      // die();
                      // echo "<br>";
                      //exit;
                      
                }
                }
              // Image upload end
                  $qq=$this->model->insert_data("indexblog",$ar);
                  redirect("admin/indexblog");
                      
      }

      $this->load->view('admin/indexblog');

  }

  public function indexcover(){
    
  
    $this->log();

    if($this->input->post('indexcover'))
      {
        

                $title=$this->input->post('title');
                
               
                $ar=array('title'=>$title);
                       // Image upload start
                $path1="/uploads/indexcover/img/";
                $file1=$this->check('image');
                if($file1 == "" )
                {
                  $config['upload_path']          = ".".$path1;
                  $config['allowed_types']        = 'jpg|png|jpeg';
                  $config['max_size']             = 300000;
                  @$this->load->library('upload', $config);
  
                if(! empty($_FILES['image']['name']))
                {
                      $this->upload->do_upload('image');
                      $data =$this->upload->data();
                      $path=base_url("$path1".$data['raw_name'].$data['file_ext']);
                      $ar['image']=$path;
                      // echo $path;
                      // die();
                      // echo "<br>";
                      //exit;
                      
                }
                }
              // Image upload end
                  $qq=$this->model->insert_data("indexcover",$ar);
                  redirect("admin/indexcover");
                      
      }

      $this->load->view('admin/indexcover');

  }


    public function indexad(){
    
  
    $this->log();

    if($this->input->post('indexad'))
      {
        

                $title=$this->input->post('title');
               
                $ar=array('title'=>$title);
                       // Image upload start
                $path1="/uploads/indexad/img/";
                $file1=$this->check('image1');
                if($file1 == "" )
                {
                  $config['upload_path']          = ".".$path1;
                  $config['allowed_types']        = 'jpg|png|jpeg';
                  $config['max_size']             = 300000;
                  @$this->load->library('upload', $config);
  
                if(! empty($_FILES['image1']['name']))
                {
                      $this->upload->do_upload('image1');
                      $data =$this->upload->data();
                      $path=base_url("$path1".$data['raw_name'].$data['file_ext']);
                      $ar['image1']=$path;
                      // echo $path;
                      // die();
                      // echo "<br>";
                      //exit;
                      
                }
                }


                $path2="/uploads/indexad/img/";
                $file2=$this->check('image2');
                if($file2 == "" )
                {
                  $config['upload_path']          = ".".$path2;
                  $config['allowed_types']        = 'jpg|png|jpeg';
                  $config['max_size']             = 300000;
                  @$this->load->library('upload', $config);
  
                if(! empty($_FILES['image2']['name']))
                {
                      $this->upload->do_upload('image2');
                      $data =$this->upload->data();
                      $path3=base_url("$path2".$data['raw_name'].$data['file_ext']);
                      $ar['image2']=$path3;
                      // echo $path;
                      // die();
                      // echo "<br>";
                      //exit;
                      
                }
                }

              // Image upload end
                  $qq=$this->model->insert_data("indexad",$ar);
                  redirect("admin/indexad");
                      
      }

      $this->load->view('admin/indexad');

  }


	public function ethical()
	{
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("ethid"=>$id);
            $vv['ed']=$this->model->select_where('ethical',$data);

                if($this->input->post('ethical'))
                {   
                    
                    $name=$this->input->post('name');
                    $certi=$this->input->post('certi');
                    $area=$this->input->post('area');
                    $subname=$this->input->post('subname');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $fees=$this->input->post('fees');
                    $exam=$this->input->post('exam');
                    $addr=$this->input->post('addr');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    $link=$this->input->post('link');
                    
                    $desc1=$this->input->post('desc1');
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                    
                    
                    $fb=$this->input->post('fb');
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                    $data2=array('name'=>$name,'certi'=>$certi,'area'=>$area,'subname'=>$subname,'awards'=>$awards1,'fees'=>$fees,'exam'=>$exam,'addr'=>$addr,'email'=>$email,'phone'=>$phone,'link'=>$link,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'fb'=>$fb,'long'=>$long,'lati'=>$lati);
                    $ar1=$this->photo_up("/uploads/ethical/","admin/ethical_form");
                    
                    $ar3=array_merge($data2,$ar1);
           
                    $this->model->update("ethical",$ar3,$data);
                    
                    redirect("admin/ethicalupdate");
                }
            }   





		$this->log();
		if($this->form_validation->run('ethical') == FALSE)
		{
			$vv['hom']=$this->model->select("ethical");
			$this->load->view('admin/ethical_form',$vv);
		}
		else
		{
			
			if($this->input->post('ethical'))
			{	
				// echo "indididnidn";
                $name=$this->input->post('name');
                $certi=$this->input->post('certi');
                $area=$this->input->post('area');
				$subname=$this->input->post('subname');
               	$awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
                $fees=$this->input->post('fees');
                $exam=$this->input->post('exam');
                $addr=$this->input->post('addr');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $link=$this->input->post('link');
                
                $desc1=$this->input->post('desc1');
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');
                
                
                $fb=$this->input->post('fb');
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');
                $ar=array('name'=>$name,'certi'=>$certi,'area'=>$area,'subname'=>$subname,'awards'=>$awards1,'fees'=>$fees,'exam'=>$exam,'addr'=>$addr,'email'=>$email,'phone'=>$phone,'link'=>$link,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'fb'=>$fb,'long'=>$long,'lati'=>$lati);
                $ar1=$this->photo_up("/uploads/ethical/","admin/ethical_form");
         		if(!empty($ar1))
         		{
                $ar3=array_merge($ar,$ar1);
       //          			echo "innnn";
							// print_r($_POST);
							// die();
				$qq=$this->model->insert_data("ethical",$ar3);
                // $this->load->view('admin/beautician_form');
               redirect("admin/ethical");
           		}
			}				
		}
	}

	public function interior()
	{
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("iid"=>$id);
            $vv['ed']=$this->model->select_where('interior',$data);

                if($this->input->post('interior'))
                {   
                   
                    $name=$this->input->post('name');
                    $certi=$this->input->post('certi');
                    $area=$this->input->post('area');
                    $subname=$this->input->post('subname');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $fees=$this->input->post('fees');
                    
                    $addr=$this->input->post('addr');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    $link=$this->input->post('link');
                    
                    $desc1=$this->input->post('desc1');
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                    
                    
                    $fb=$this->input->post('fb');
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                    $data2=array('name'=>$name,'certi'=>$certi,'area'=>$area,'subname'=>$subname,'awards'=>$awards1,'fees'=>$fees,'addr'=>$addr,'email'=>$email,'phone'=>$phone,'link'=>$link,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'fb'=>$fb,'long'=>$long,'lati'=>$lati);
                    $ar1=$this->photo_up("/uploads/interior/","admin/interior_form");
                    
                    $ar3=array_merge($data2,$ar1);
          
                    $this->model->update("interior",$ar3,$data);
                   
                    redirect("admin/interiorupdate");
                    }
                }           


		$this->log();
		if($this->form_validation->run('interior') == FALSE)
		{
			$vv['hom']=$this->model->select("interior");
			$this->load->view('admin/interior_form',$vv);
		}
		else
		{
			
			if($this->input->post('interior'))
			{	
				
                $name=$this->input->post('name');
                $certi=$this->input->post('certi');
                $area=$this->input->post('area');
				$subname=$this->input->post('subname');
                $awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
                $fees=$this->input->post('fees');
                
                $addr=$this->input->post('addr');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $link=$this->input->post('link');
                
                $desc1=$this->input->post('desc1');
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');
                
                
                $fb=$this->input->post('fb');
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');
                $ar=array('name'=>$name,'certi'=>$certi,'area'=>$area,'subname'=>$subname,'awards'=>$awards1,'fees'=>$fees,'addr'=>$addr,'email'=>$email,'phone'=>$phone,'link'=>$link,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'fb'=>$fb,'long'=>$long,'lati'=>$lati);
                $ar1=$this->photo_up("/uploads/interior/","admin/interior_form");
         		if(!empty($ar1))
         		{
                $ar3=array_merge($ar,$ar1);
      
				$qq=$this->model->insert_data("interior",$ar3);
                
               redirect("admin/interior");
           		}
			}				
		}
	}

	public function mba()
	{  
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("mid"=>$id);
            $vv['ed']=$this->model->select_where('mba',$data);

                if($this->input->post('mba'))
                {
                
                    $name=$this->input->post('name');
                    $category=$this->input->post('category');
                    $category1=implode(",", $category) ;
                    $exam=$this->input->post('exam');
                    $subname=$this->input->post('subname');
                    $area=$this->input->post('area');
                    $result=$this->input->post('result');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $fees=$this->input->post('fees');
                    $addr=$this->input->post('addr');
                    $fb=$this->input->post('fb');   
                    $link=$this->input->post('link');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    //  $cmmt=$this->input->post('cmmt');
                    $desc1=$this->input->post('desc1');
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                    $data2=array('name'=>$name,'category'=>$category1,'exam'=>$exam,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                    $ar1=$this->photo_up("/uploads/mba/","admin/mba_form");
                      
                        
                    $ar3=array_merge($data2,$ar1);
  
                       
                    $this->model->update("mba",$ar3,$data);
                    redirect("admin/mbaupdate");
                    }
            }


		$this->log();
		if($this->form_validation->run('mba') == FALSE)
		{
            $vv['hom']=$this->model->select("mba");
			$this->load->view('admin/mba_form',$vv);
		}
		else
		{
			
			if($this->input->post('mba'))
			{
				

				        $name=$this->input->post('name');
                       $category=$this->input->post('category');
                       $category1=implode(",", $category) ;
                       $exam=$this->input->post('exam');
                       $subname=$this->input->post('subname');
                       $area=$this->input->post('area');
                       $result=$this->input->post('result');
                        $awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
            			$addr=$this->input->post('addr');
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('link');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc1=$this->input->post('desc1');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                		$lati=$this->input->post('lati');
                        $ar=array('name'=>$name,'category'=>$category1,'exam'=>$exam,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
               			 $ar1=$this->photo_up("/uploads/mba/","admin/mba_form");
               			 if(!empty($ar1))
         				{	
     					    
                        $ar3=array_merge($ar,$ar1);
      
							// print_r($_POST);
							// die();
               			$qq=$this->model->insert_data("mba",$ar3);
                        redirect("admin/mba");
                    	}
			}
		}
	}

	public function medical()
	{
        if($this->uri->segment(3))
    {
    $id=$this->uri->segment(3);
    $data=array("mid"=>$id);
    $vv['ed']=$this->model->select_where('medical',$data);

        if($this->input->post('medical'))
            {
                
                $name=$this->input->post('name');
                $category=$this->input->post('category');
                $category1=implode(",", $category) ;
                $exam=$this->input->post('exam');
                $subname=$this->input->post('subname');
                $area=$this->input->post('area');
                $result=$this->input->post('result');
                $awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
                $fees=$this->input->post('fees');
                $addr=$this->input->post('addr');
                $fb=$this->input->post('fb');   
                $link=$this->input->post('link');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                //  $cmmt=$this->input->post('cmmt');
                $desc1=$this->input->post('desc1');
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');
                $data2=array('name'=>$name,'category'=>$category1,'exam'=>$exam,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                $ar1=$this->photo_up("/uploads/medical/","admin/medical_form");
                   
                    
                $ar3=array_merge($data2,$ar1);

                    
                $this->model->update("medical",$ar3);
                redirect("admin/medicalupdate");
                }
            }


		$this->log();
		if($this->form_validation->run('medical') == FALSE)
		{
            $vv['hom']=$this->model->select("medical");
			$this->load->view('admin/medical_form',$vv);
		}
		else
		{
			
			if($this->input->post('medical'))
			{
				


				        $name=$this->input->post('name');
                       $category=$this->input->post('category');
                       $category1=implode(",", $category) ;
                       $exam=$this->input->post('exam');
                       $subname=$this->input->post('subname');
                       $area=$this->input->post('area');
                       $result=$this->input->post('result');
                        $awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
            			$addr=$this->input->post('addr');
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('link');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc1=$this->input->post('desc1');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                		$lati=$this->input->post('lati');
                        $ar=array('name'=>$name,'category'=>$category1,'exam'=>$exam,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
               			 $ar1=$this->photo_up("/uploads/medical/","admin/medical_form");
               			 if(!empty($ar1))
         				{	
     					    
                        $ar3=array_merge($ar,$ar1);
      
							// print_r($_POST);
							// die();
               			$qq=$this->model->insert_data("medical",$ar3);
                        redirect("admin/medical");
                    	}
			}
		}
	}

	public function multimedia()
	{  
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("mmid"=>$id);
            $vv['ed']=$this->model->select_where('multimedia',$data);

                if($this->input->post('multimedia'))
                {
       
                    $name=$this->input->post('name');
                    $subname=$this->input->post('subname');
                    $exam_training=$this->input->post('Exam_training');
                    $exam_training1=implode(",", $exam_training) ;
                    //  $result=$this->input->post('result');
                    $certi=$this->input->post('certi');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $fees=$this->input->post('fees');
                    $addr=$this->input->post('addr');
                    $fb=$this->input->post('fb');   
                    $link=$this->input->post('webl');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    //  $cmmt=$this->input->post('cmmt');
                    $desc=$this->input->post('desc');    
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing'); 
                    $long=$this->input->post('long');
                    $lati=$this->input->post('lati');
                    $area=$this->input->post('area');             
                    $data2=array('name'=>$name,'subname'=>$subname,'exam'=>$exam_training1,'certi'=>$certi,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati,'area'=>$area);                   
                    $ar1=$this->photo_up("/uploads/multimedia/","admin/multimedia_form");
                    
                    $ar3=array_merge($data2,$ar1);
  
                    $this->model->update("multimedia",$ar3,$data);
                    redirect("admin/multimediaupdate");
                }
        }


		$this->log();
		if($this->form_validation->run('multimedia')==FALSE)
		{
			$vv['hom']=$this->model->select("multimedia");
			$this->load->view('admin/multimedia_form',$vv);	
		}
		else
		{
		
			if($this->input->post('multimedia'))
			{
		
				        $name=$this->input->post('name');
				        $subname=$this->input->post('subname');
                       $exam_training=$this->input->post('Exam_training');
                       $exam_training1=implode(",", $exam_training) ;
                     //  $result=$this->input->post('result');
                       	$certi=$this->input->post('certi');
                        $awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
            			$addr=$this->input->post('addr');
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('webl');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc=$this->input->post('desc');    
                        $day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing'); 
                        $long=$this->input->post('long');
                        $lati=$this->input->post('lati');
                        $area=$this->input->post('area');             
                        $ar=array('name'=>$name,'subname'=>$subname,'exam'=>$exam_training1,'certi'=>$certi,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati,'area'=>$area);		              
                        $ar1=$this->photo_up("/uploads/multimedia/","admin/multimedia_form");
                        if(!empty($ar1))
         				{
                        $ar3=array_merge($ar,$ar1);
      //                   echo "innnn111111";
						// print_r($_POST);
						// die();
               			$qq=$this->model->insert_data("multimedia",$ar3);
                        redirect("admin/multimedia");
                    	}
			}
		}
	}

	public function upsc()
	{
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("upscid"=>$id);
            $vv['ed']=$this->model->select_where('upsc',$data);

                if($this->input->post('upsc'))
                {
               
                    $name=$this->input->post('name');
                    $category=$this->input->post('category');
                    $category1=implode(",", $category) ;
                    $subname=$this->input->post('subname');
                    $area=$this->input->post('area');
                    $result=$this->input->post('result');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $fees=$this->input->post('fees');
                    $addr=$this->input->post('addr');
                    $fb=$this->input->post('fb');   
                    $link=$this->input->post('link');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    //  $cmmt=$this->input->post('cmmt');
                    $desc1=$this->input->post('desc1');
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                    $data2=array('name'=>$name,'category'=>$category1,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                    $ar1=$this->photo_up("/uploads/upsc/","admin/upsc_form");
                       
                        
                    $ar3=array_merge($data2,$ar1);
   
                    $this->model->update("upsc",$ar3,$data);
                    redirect("admin/upscupdate");
                    }
            }




		$this->log();
		if($this->form_validation->run('upsc') == FALSE)
		{
            $vv['hom']=$this->model->select("upsc");
			$this->load->view('admin/upsc_form',$vv);
		}
		else
		{
			
			if($this->input->post('upsc'))
			{
				
				        $name=$this->input->post('name');
                       $category=$this->input->post('category');
                       $category1=implode(",", $category) ;
                       $subname=$this->input->post('subname');
                       $area=$this->input->post('area');
                       $result=$this->input->post('result');
                        $awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
            			$addr=$this->input->post('addr');
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('link');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc1=$this->input->post('desc1');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                		$lati=$this->input->post('lati');
                        $ar=array('name'=>$name,'category'=>$category1,'subname'=>$subname,'area'=>$area,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
               			 $ar1=$this->photo_up("/uploads/upsc/","admin/upsc_form");
               			 if(!empty($ar1))
         				{	
     					    
                        $ar3=array_merge($ar,$ar1);
       //                  echo "innnn";
							// print_r($_POST);
							// die();
               			$qq=$this->model->insert_data("upsc",$ar3);
                        redirect("admin/upsc");
                    	}
			}
		}
	}

	public function image_form()
	{
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("iid"=>$id);
            $vv['ed']=$this->model->select_where('image',$data);

                if($this->input->post('image'))
                {
                    $name=$this->input->post('name');
                    $area=$this->input->post('area');
                    $subname=$this->input->post('subname');
                    $service=$this->input->post('service');
                    $fees=$this->input->post('fees');
                    $phone=$this->input->post('phone'); 
                    $awards=$this->input->post('awards');

                    $awards1=implode(";", $awards);

                    $email=$this->input->post('email');
                    $addr=$this->input->post('addr');
                    $fb=$this->input->post('fb');
                    $web=$this->input->post('web');
                    
                    $statment=$this->input->post('statment');
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                 
                  
                    
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                    $data2=array('name'=>$name,'area'=>$area,'subname'=>$subname,'service'=>$service,'fees'=>$fees,'phone'=>$phone,'awards'=>$awards1,'email'=>$email,'addr'=>$addr,'fb'=>$fb,'web'=>$web,'statment'=>$statment,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                    
                    $ar1=$this->photo_up("/uploads/image_consultant/","admin/image_form");
                            
                    $ar3=array_merge($data2,$ar1);
                    $this->model->update("image",$ar3,$data);
                    redirect("admin/imageupdate");
                }
        }           



		$this->log();
		if($this->form_validation->run('image_consultant') == FALSE)
		{
		    $vv['hom']=$this->model->select("image");
			$this->load->view('admin/image_form',$vv);
		}
		else
		{
			
			if($this->input->post('image'))
			{
                $name=$this->input->post('name');
               	$area=$this->input->post('area');
				$subname=$this->input->post('subname');
                $service=$this->input->post('service');
                $fees=$this->input->post('fees');
                $phone=$this->input->post('phone');	
                $awards=$this->input->post('awards');

                $awards1=implode(";", $awards);

                $email=$this->input->post('email');
                $addr=$this->input->post('addr');
                $fb=$this->input->post('fb');
                $web=$this->input->post('web');
                
                $statment=$this->input->post('statment');
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');
             
              
                
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');
                $ar=array('name'=>$name,'area'=>$area,'subname'=>$subname,'service'=>$service,'fees'=>$fees,'phone'=>$phone,'awards'=>$awards1,'email'=>$email,'addr'=>$addr,'fb'=>$fb,'web'=>$web,'statment'=>$statment,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                
				$ar1=$this->photo_up("/uploads/image_consultant/","admin/image_form");
                        if(!empty($ar1))
         				{
                        $ar3=array_merge($ar,$ar1);
               			$qq=$this->model->insert_data("image",$ar3);
                        redirect("admin/image_form");
           				}
			}				
		}
	}


	public function corporate_form()
	{
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("corpid"=>$id);
            $vv['ed']=$this->model->select_where('corporate',$data);

                if($this->input->post('corporate'))
                {
                    $name=$this->input->post('name');
                    $area=$this->input->post('area');
                    $subname=$this->input->post('subname');
                    $service=$this->input->post('service');
                    $fees=$this->input->post('fees');
                    $phone=$this->input->post('phone'); 
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $email=$this->input->post('email');
                    $addr=$this->input->post('addr');
                    $fb=$this->input->post('fb');
                    $web=$this->input->post('web');
                    
                    $statment=$this->input->post('statment');
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                 
                  
                    
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                    $data2=array('name'=>$name,'area'=>$area,'subname'=>$subname,'service'=>$service,'fees'=>$fees,'phone'=>$phone,'awards'=>$awards1,'email'=>$email,'addr'=>$addr,'fb'=>$fb,'web'=>$web,'statment'=>$statment,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                    
                    $ar1=$this->photo_up("/uploads/corporate/","admin/corporate_form");
                            
                    $ar3=array_merge($data2,$ar1);
                    $this->model->update("corporate",$ar3,$data);
                    redirect("admin/corporateupdate");
                }
                
        }



		$this->log();
		if($this->form_validation->run('corporate_skill') == FALSE)
		{
		    $vv['hom']=$this->model->select("corporate");
			$this->load->view('admin/corporate_form',$vv);
		}
		else
		{
			
			if($this->input->post('corporate'))
			{
                $name=$this->input->post('name');
               	$area=$this->input->post('area');
				$subname=$this->input->post('subname');
                $service=$this->input->post('service');
                $fees=$this->input->post('fees');
                $phone=$this->input->post('phone');	
                $awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
                $email=$this->input->post('email');
                $addr=$this->input->post('addr');
                $fb=$this->input->post('fb');
                $web=$this->input->post('web');
                
                $statment=$this->input->post('statment');
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');
             
              
                
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');
                $ar=array('name'=>$name,'area'=>$area,'subname'=>$subname,'service'=>$service,'fees'=>$fees,'phone'=>$phone,'awards'=>$awards1,'email'=>$email,'addr'=>$addr,'fb'=>$fb,'web'=>$web,'statment'=>$statment,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                
				$ar1=$this->photo_up("/uploads/corporate/","admin/corporate_form");
                        if(!empty($ar1))
         				{
                        $ar3=array_merge($ar,$ar1);
               			$qq=$this->model->insert_data("corporate",$ar3);
                        redirect("admin/corporate_form");
           				}
           		
			}				
		}
	}	


	public function study_abroad()
	{
    if($this->uri->segment(3))
    {
    $id=$this->uri->segment(3);
    $data=array("sid"=>$id);
    $vv['ed']=$this->model->select_where('study_abroad',$data);

              if($this->input->post('study_abroad'))
                {
                        $title=$this->input->post('title');
                        $area=$this->input->post('area');
                        $subname=$this->input->post('subname');
                         $country=$this->input->post('country');
                        $country1=implode(",", $country) ;
                         $service=$this->input->post('service');
                        $service1=implode(",", $service) ;
                        $stream=$this->input->post('Education_Stream');
                        $stream1=implode(",", $stream) ;
                        $awards=$this->input->post('awards');
                        $awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
                        $iname=$this->input->post('iname'); 
                        $iadd=$this->input->post('iadd');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                        $iweb=$this->input->post('iweb');
                        $city=$this->input->post('city');
                        $desc=$this->input->post('desc');
                        $day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $exam=$this->input->post('exam');
                        $exam1=implode(",", $exam);
                        $fb=$this->input->post('fb');
                        $long=$this->input->post('long');   
                        $lati=$this->input->post('lati');
                        $data2=array('title'=>$title,'area'=>$area,'subname'=>$subname,'stream'=>$stream1,'awards'=>$awards1,'country'=>$country1,'service'=>$service1,'fees'=>$fees,'iname'=>$iname,'iadd'=>$iadd,'email'=>$email,'phone'=>$phone,'iweb'=>$iweb,'city'=>$city,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'examt'=>$exam1,'fb'=>$fb,'long'=>$long,'lati'=>$lati);
                        $ar1=$this->photo_up("/uploads/study_abroad/","admin/study_abroad");
                         $ar3=array_merge($data2,$ar1);

                        $this->model->update("study_abroad",$ar3,$data);
                        redirect("admin/studyabroadupdate");
                        }
}
		// print_r($_POST);
		// die();
		$this->log();
		if($this->form_validation->run('study_abroad') == FALSE)
		{ 
      $vv['hom']=$this->model->select("study_abroad");
      
			$this->load->view('admin/study_abroad',$vv);
		}
		else
		{
			if($this->input->post('study_abroad'))
			{
                        $title=$this->input->post('title');
                        $area=$this->input->post('area');
						            $subname=$this->input->post('subname');
                        $country=$this->input->post('country');
                        $country1=implode(",", $country) ;
                        $service=$this->input->post('service');
                        $service1=implode(",", $service) ;
                        $stream=$this->input->post('Education_Stream');
                        $stream1=implode(",", $stream) ;
                        $awards=$this->input->post('awards');
                		    $awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
                        $iname=$this->input->post('iname');	
                        $iadd=$this->input->post('iadd');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                        $iweb=$this->input->post('iweb');
                        $city=$this->input->post('city');
                        $desc=$this->input->post('desc');
                        $day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                         $exam=$this->input->post('exam');
                        $exam1=implode(",",$exam);
                        $fb=$this->input->post('fb');
                        $long=$this->input->post('long');   
                		    $lati=$this->input->post('lati');
                        $ar=array('title'=>$title,'area'=>$area,'subname'=>$subname,'stream'=>$stream1,'awards'=>$awards1,'country'=>$country1,'service'=>$service1,'fees'=>$fees,'iname'=>$iname,'iadd'=>$iadd,'email'=>$email,'phone'=>$phone,'iweb'=>$iweb,'city'=>$city,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'examt'=>$exam1,'fb'=>$fb,'long'=>$long,'lati'=>$lati);
                        $ar1=$this->photo_up("/uploads/study_abroad/","admin/study_abroad");
                        if(!empty($ar1))
         				{
         					// print_r($ar1);
         					// die();
                        $ar3=array_merge($ar,$ar1);
						$qq=$this->model->insert_data("study_abroad",$ar3);
                        //$this->load->view('admin/career', $data);
                      	redirect("admin/study_abroad");
                      }
               // }
			}
				
		}
	}





	public function competitive()
	{
		$this->log();
		if($this->form_validation->run('competitive') == FALSE)
		{
			//echo "innnn111111";
			$this->load->view('admin/competitive');
		}
		else
		{
			//echo "innnn";
			if($this->input->post('competitive'))
			{
				        $title=$this->input->post('title');
                        $training=$this->input->post('training');
                        $training1=implode(",", $training) ;
                      //  $duration=$this->input->post('duration');
                        $fees=$this->input->post('fees');
                        $iname=$this->input->post('iname');	
                        $iadd=$this->input->post('iadd');
                        $email=$this->input->post('email');
                        $awards=$this->input->post('awards');
                        $awards1=implode(";", $awards) ;
                        $phone=$this->input->post('phone');
                        $iweb=$this->input->post('iweb');
                        $city=$this->input->post('city');
                        $desc=$this->input->post('desc');
                        $day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $ar=array('title'=>$title,'training'=>$training1,'fees'=>$fees,'iname'=>$iname,'iadd'=>$iadd,'email'=>$email,'awards'=>$awards1,'phone'=>$phone,'iweb'=>$iweb,'city'=>$city,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing);
                        $ar1=$this->photo_up("/uploads/competitive/","admin/competitive");
                        if(!empty($ar1))
         				{
                        $ar3=array_merge($ar,$ar1);
               			$qq=$this->model->insert_data("competitive",$ar3);
                        redirect("admin/competitive");
                    	}
			}
		}

	}
	public function college()
	{
		$this->log();
		if($this->form_validation->run('abc') == FALSE)
		{
			//echo "innnn111111";
			//`echo validation_errors();

			$this->load->view('admin/college');
		}
		else
		{
		//	echo "innnn";
			if($this->input->post('offered'))
			{
				//echo "innnn";
				// $this->load->view('admin/career');


				        $title=$this->input->post('title');
                        $college=$this->input->post('college');
                        $college1=implode(",", $college) ;
                      //  $duration=$this->input->post('duration');
                        $fees=$this->input->post('fees');
                        $awards=$this->input->post('awards');
                        $awards1=implode(";", $awards) ;
                        $iname=$this->input->post('iname');	
                        $iadd=$this->input->post('iadd');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                        $iweb=$this->input->post('iweb');
                        $city=$this->input->post('city');
                        $desc=$this->input->post('desc');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $fb=$this->input->post('fb');
                        $ar=array('title'=>$title,'college'=>$college1 ,'fees'=>$fees,'awards'=>$awards1,'iname'=>$iname,'iadd'=>$iadd,'email'=>$email,'phone'=>$phone,'iweb'=>$iweb,'city'=>$city,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'fb'=>$fb);
                        $ar1=$this->photo_up("/uploads/college/","admin/college");
                        if(!empty($ar1))
         				{
                        $ar3=array_merge($ar,$ar1);
               			$qq=$this->model->insert_data("college",$ar3);
                        redirect("admin/college");
                    	}
			}
		}
	}
	
	public function events_form()
	{
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("eid"=>$id);
            $vv['ed']=$this->model->select_where('event_f',$data);

            if($this->input->post('event'))
                {
           
                    $name=$this->input->post('name');
                    $area=$this->input->post('area');
                    $subname=$this->input->post('subname');
                    $certi=$this->input->post('certi');
                    $fees=$this->input->post('fees');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $addr=$this->input->post('addr');
                    // $date=$this->input->post('date');
                    $fb=$this->input->post('fb');   
                    $link=$this->input->post('link');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    // $cmmt=$this->input->post('cmmt');
                    $desc1=$this->input->post('desc1');
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                    $closing=$this->input->post('closing');
                    $data2=array('name'=>$name,'area'=>$area,'subname'=>$subname,'certi'=>$certi,'fees'=>$fees,'awards'=>$awards1,'addr'=>$addr,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                    $ar1=$this->photo_up("/uploads/event/","admin/events_form");
                     
                    $ar3=array_merge($data2,$ar1);
                    $this->model->update("event_f",$ar3,$data);
                    redirect("admin/eventupdate");
                    }
            }



		$this->log();
		
		if($this->form_validation->run('def') == FALSE)
		{
			
            $vv['hom']=$this->model->select("event_f");
			$this->load->view('admin/events_form',$vv);
		}
		else
		{
		
			if($this->input->post('event'))
			{
			
				        $name=$this->input->post('name');
				        $area=$this->input->post('area');
				        $subname=$this->input->post('subname');
				        $certi=$this->input->post('certi');
				        $fees=$this->input->post('fees');
                        $awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;
                        $addr=$this->input->post('addr');
                        // $date=$this->input->post('date');
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('link');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                        // $cmmt=$this->input->post('cmmt');
                        $desc1=$this->input->post('desc1');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $long=$this->input->post('long');   
                		$lati=$this->input->post('lati');
                        $closing=$this->input->post('closing');
                        $ar=array('name'=>$name,'area'=>$area,'subname'=>$subname,'certi'=>$certi,'fees'=>$fees,'awards'=>$awards1,'addr'=>$addr,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'desc1'=>$desc1,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                         $ar1=$this->photo_up("/uploads/event/","admin/events_form");
                         if(!empty($ar1))
         				{
                        $ar3=array_merge($ar,$ar1);
               			$qq=$this->model->insert_data("event_f",$ar3);
                        redirect("admin/events_form");
                    	}
			}
		}
	}

	
	public function co_curriculars_form()
	{
      if($this->uri->segment(3))
      {
      $id=$this->uri->segment(3);
      $data=array("ccid"=>$id);
      $vv['ed']=$this->model->select_where('cocurr',$data);

      if($this->input->post('curriculars'))
      {
                        $name=$this->input->post('name');
                        $subname=$this->input->post('subname');
                        $area=$this->input->post('area');
            
                         $categories=$this->input->post('categories');
                         $categories1=implode(",", $categories) ;

                         $subcategories=$this->input->post('subcategories');
                         $subcategories1=implode(",", $subcategories) ;

                        $awards=$this->input->post('awards');
                        $awards1=implode(";", $awards) ;

                        $addr=$this->input->post('addr');
                        $fees=$this->input->post('fees');
            
                        $fb=$this->input->post('fb'); 
                        $yout=$this->input->post('yout');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc=$this->input->post('desc');
                        $day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                        $lati=$this->input->post('lati');
                        $data2=array('name'=>$name,'subname'=>$subname,'area'=>$area,'categories'=>$categories1,'subcategories'=>$subcategories1,'awards'=>$awards1,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'yout'=>$yout,'email'=>$email,'phone'=>$phone,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                         $ar1=$this->photo_up("/uploads/co-curr/","admin/co_curriculars_form");
                        
                        $ar3=array_merge($data2,$ar1);
                        // print_r($_POST);
                        // die(); 
                    $this->model->update("cocurr",$ar3,$data);
                        redirect("admin/cocurrupdate");
                      }
      }






		$this->log();
		//$this->load->view('admin/co_curriculars_form');
		if($this->form_validation->run('co-curr') == FALSE)
		{
      $vv['hom']=$this->model->select("cocurr");
			$this->load->view('admin/co_curriculars_form',$vv);
		}
		else
		{
		//	echo "innnn";
			if($this->input->post('curriculars'))
			{
				        $name=$this->input->post('name');
				        $subname=$this->input->post('subname');
				        $area=$this->input->post('area');
						
                       $categories=$this->input->post('categories');
                       $categories1=implode(",", $categories) ;

                       $subcategories=$this->input->post('subcategories');
                       $subcategories1=implode(",", $subcategories) ;

                       	$awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;

                        $addr=$this->input->post('addr');
                        $fees=$this->input->post('fees');
            
                        $fb=$this->input->post('fb');	
                        $yout=$this->input->post('yout');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc=$this->input->post('desc');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                		$lati=$this->input->post('lati');
                        $ar=array('name'=>$name,'subname'=>$subname,'area'=>$area,'categories'=>$categories1,'subcategories'=>$subcategories1,'awards'=>$awards1,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'yout'=>$yout,'email'=>$email,'phone'=>$phone,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                         $ar1=$this->photo_up("/uploads/co-curr/","admin/co_curriculars_form");
                         if(!empty($ar1))
         				{
                        $ar3=array_merge($ar,$ar1);
                        // print_r($_POST);
                        // die();	
               			$qq=$this->model->insert_data("cocurr",$ar3);
                        redirect("admin/co_curriculars_form");
                    	}
			}
		}
	}


	public function co_curriculars_other_form()
	{
		  if($this->uri->segment(3))
    {
    $id=$this->uri->segment(3);
    $data=array("cocid"=>$id);
    $vv['ed']=$this->model->select_where('cocurr_o',$data);

      if($this->input->post('curriculars1'))
      {
    
                        $name=$this->input->post('name');
                        $area=$this->input->post('area');
                        $subname=$this->input->post('subname');
                        $categories=$this->input->post('categories');
                        $categories1=implode(",", $categories) ;

                       $subcategories=$this->input->post('subcategories');
                       $subcategories1=implode(",", $subcategories) ;

                        $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                        $addr=$this->input->post('addr');
                        $fees=$this->input->post('fees');
            
                        $fb=$this->input->post('fb'); 
                        $yout=$this->input->post('yout');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc=$this->input->post('desc');
                      $day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                        $data2=array('name'=>$name,'subname'=>$subname,'area'=>$area,'categories'=>$categories1,'subcategories'=>$subcategories1,'awards'=>$awards1,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'yout'=>$yout,'email'=>$email,'phone'=>$phone,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                         $ar1=$this->photo_up("/uploads/co-curr-other/","admin/co_curriculars_other_form");
                         
                        $ar3=array_merge($data2,$data2);
                        // print_r($_POST);
                        // die();
                    $this->model->update("cocurr_o",$ar3,$data);
                        redirect("admin/cocurr_oupdate");
                      }
      }






		$this->log();
		//$this->load->view('admin/co_curriculars_form');
		if($this->form_validation->run('co-curr-other') == FALSE)
		{
      $vv['hom']=$this->model->select("cocurr_o");
			$this->load->view('admin/co_curriculars_other_form',$vv);
		}
		else
		{
		//	echo "innnn";
			if($this->input->post('curriculars1'))
			{
		// 		print_r($_POST);
		// die();
				        $name=$this->input->post('name');
				        $area=$this->input->post('area');
				        $subname=$this->input->post('subname');
                       $categories=$this->input->post('categories');
                       $categories1=implode(",", $categories) ;

                       $subcategories=$this->input->post('subcategories');
                       $subcategories1=implode(",", $subcategories) ;

                       	$awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;
                        $addr=$this->input->post('addr');
                        $fees=$this->input->post('fees');
            
                        $fb=$this->input->post('fb');	
                        $yout=$this->input->post('yout');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc=$this->input->post('desc');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                		$lati=$this->input->post('lati');
                        $ar=array('name'=>$name,'subname'=>$subname,'area'=>$area,'categories'=>$categories1,'subcategories'=>$subcategories1,'awards'=>$awards1,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'yout'=>$yout,'email'=>$email,'phone'=>$phone,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                         $ar1=$this->photo_up("/uploads/co-curr-other/","admin/co_curriculars_other_form");
                         if(!empty($ar1))
         				{
                        $ar3=array_merge($ar,$ar1);
                        // print_r($_POST);
                        // die();
               			$qq=$this->model->insert_data("cocurr_o",$ar3);
                        redirect("admin/co_curriculars_other_form");
                    	}
			}
		}
	}


	public function jewellery_designing_form()
	{
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("jid"=>$id);
            $vv['ed']=$this->model->select_where('jewellery',$data);

                if($this->input->post('jewellery_d'))
                {
                    $name=$this->input->post('name');
                    $certi=$this->input->post('certi');
                    $area=$this->input->post('area');
                    $subname=$this->input->post('subname');
                    $course=$this->input->post('course');
                    $course1=implode(",", $course) ;
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $fees=$this->input->post('fees');
                    $addr=$this->input->post('addr');
                    $fb=$this->input->post('fb');   
                    $link=$this->input->post('link');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    //  $cmmt=$this->input->post('cmmt');
                    $desc=$this->input->post('desc');
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                    $data2=array('name'=>$name,'certi'=>$certi,'area'=>$area,'subname'=>$subname,'course'=>$course1,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                    $ar1=$this->photo_up("/uploads/jewellery/","admin/jewellery_designing_form");
                    
                    $ar3=array_merge($data2,$ar1);
                        
                    $this->model->update("jewellery",$ar3,$data);
                    redirect("admin/jewelleryupdate");
                    }
            }




		$this->log();
		if($this->form_validation->run('jewellery') == FALSE)
		{
            $vv['hom']=$this->model->select("jewellery");
			$this->load->view('admin/jewellery_designing_form',$vv);
		}
		else
		{
		
			if($this->input->post('jewellery_d'))
			{
				        $name=$this->input->post('name');
				        $certi=$this->input->post('certi');
		                $area=$this->input->post('area');
						$subname=$this->input->post('subname');
                       $course=$this->input->post('course');
                       $course1=implode(",", $course) ;
                       $awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
            			$addr=$this->input->post('addr');
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('link');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc=$this->input->post('desc');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                		$lati=$this->input->post('lati');
                        $ar=array('name'=>$name,'certi'=>$certi,'area'=>$area,'subname'=>$subname,'course'=>$course1,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                         $ar1=$this->photo_up("/uploads/jewellery/","admin/jewellery_designing_form");
                         if(!empty($ar1))
         				{
                        $ar3=array_merge($ar,$ar1);
	                        // print_r($_POST);
	                        // die();
               			$qq=$this->model->insert_data("jewellery",$ar3);
                        redirect("admin/jewellery_designing_form");
                    	}
			}
		}
	}


    public function coaching_center_cate()

    {
        $this->log();
        $this->load->view('admin/coaching_center_cate');
        
        // $this->load->view('admin/coaching_centres_cate');

    }

	public function coaching_centres_form()
	{
		$this->log();
		if($this->form_validation->run('coaching') == FALSE)
		{
			$this->load->view('admin/coaching_centres_form');
		}
		else
		{
		//	echo "innnn";
			if($this->input->post('coaching_centres'))
			{
				//echo "innnn";
				// $this->load->view('admin/career');


				        $name=$this->input->post('name');
                       $category=$this->input->post('category');
                       $category1=implode(",", $category) ;
                       $result=$this->input->post('result');
                        $awards=$this->input->post('awards');
                        $awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
            			$addr=$this->input->post('addr');
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('webl');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc=$this->input->post('desc');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                		$lati=$this->input->post('lati');
                        $ar=array('name'=>$name,'category'=>$category1,'result'=>$result,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
               			 $ar1=$this->photo_up("/uploads/coaching/","admin/coaching_centres_form");
               			 if(!empty($ar1))
         				{
                        $ar3=array_merge($ar,$ar1);
               			$qq=$this->model->insert_data("coaching",$ar3);
                        redirect("admin/coaching_centres_form");
                    	}
			}
		}
	}

	
	public function fashion_designing_form()
	{
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("fid"=>$id);
            $vv['ed']=$this->model->select_where('fashion',$data);

                if($this->input->post('fashion_design'))
                {
       
                    $name=$this->input->post('name');
                    $subname=$this->input->post('subname');
                    $exam_training=$this->input->post('Exam_training');
                    $exam_training1=implode(",", $exam_training) ;
                    //  $result=$this->input->post('result');
                    $certi=$this->input->post('certi');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $fees=$this->input->post('fees');
                    $addr=$this->input->post('addr');
                    $fb=$this->input->post('fb');   
                    $link=$this->input->post('webl');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    //  $cmmt=$this->input->post('cmmt');
                    $desc=$this->input->post('desc');    
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing'); 
                    $long=$this->input->post('long');
                    $lati=$this->input->post('lati');
                    $area=$this->input->post('area');             
                    $data2=array('name'=>$name,'subname'=>$subname,'exam'=>$exam_training1,'certi'=>$certi,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati,'area'=>$area); 
                                
                    $ar1=$this->photo_up("/uploads/fashion/","admin/fashion_designing_form");
                    
                    $ar3=array_merge($data2,$ar1);
  
                    $this->model->update("fashion",$ar3,$data);
                    redirect("admin/fashionupdate");
                }
        }



		$this->log();
		if($this->form_validation->run('fashion')==FALSE)
		{
			$vv['hom']=$this->model->select("fashion");
			$this->load->view('admin/fashion_designing_form.php',$vv);	
		}
		else
		{
			
			if($this->input->post('fashion_design'))
			{
		
				        $name=$this->input->post('name');
				        $subname=$this->input->post('subname');
                       $exam_training=$this->input->post('Exam_training');
                       $exam_training1=implode(",", $exam_training) ;
                     //  $result=$this->input->post('result');
                       	$certi=$this->input->post('certi');
                        $awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
            			$addr=$this->input->post('addr');
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('webl');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc=$this->input->post('desc');    
                        $day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing'); 
                        $long=$this->input->post('long');
                        $lati=$this->input->post('lati');
                        $area=$this->input->post('area');             
                        $ar=array('name'=>$name,'subname'=>$subname,'exam'=>$exam_training1,'certi'=>$certi,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati,'area'=>$area);	
                        // print_r($ar);
                        // die();	              
                        $ar1=$this->photo_up("/uploads/fashion/","admin/fashion_designing_form");
                        if(!empty($ar1))
         				{
                        $ar3=array_merge($ar,$ar1);
      //                   echo "innnn111111";
						// print_r($_ar3);
						// die();
               			$qq=$this->model->insert_data("fashion",$ar3);
                        redirect("admin/fashion_designing_form");
                    	}
			}
		}
	}
	public function camps_form()
	{

        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("campid"=>$id);
            $vv['ed']=$this->model->select_where('camp',$data);

                if($this->input->post('camp_f'))
                {
            
                    $camp=$this->input->post('camp');
                    $camp1=implode(",", $camp) ;
                    $name=$this->input->post('name');
                    $area=$this->input->post('area');
                    $subname=$this->input->post('subname');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    //  $result=$this->input->post('result');
                    $datef=$this->input->post('datef');
                    $datet=$this->input->post('datet');
                    //   $fees=$this->input->post('fees');
                    $venue=$this->input->post('venue');
                    $fb=$this->input->post('fb');   
                    $link=$this->input->post('linkreg');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    $cmmt=$this->input->post('cmmt');
                    $desc=$this->input->post('desc');
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                    $activity=$this->input->post('activity');
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                    $data2=array('camp'=>$camp1,'name'=>$name,'area'=>$area,'subname'=>$subname,'awards'=>$awards1,'datef'=>$datef,'datet'=>$datet,'venue'=>$venue,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'cmmt'=>$cmmt,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'activity'=>$activity,'long'=>$long,'lati'=>$lati);
                    $ar1=$this->photo_up("/uploads/camp/","admin/camps_form");
                
                    
                    $ar3=array_merge($data2,$ar1);
                   
                    $this->model->update("camp",$ar3,$data);
                    redirect("admin/campupdate");
                    }
            }
		
		$this->log();
		if($this->form_validation->run('camps')==FALSE)
		{
            $vv['hom']=$this->model->select("camp");
			$this->load->view('admin/camps_form.php',$vv);	
		}
		else
		{
    
			if($this->input->post('camp_f'))
			{
			
                       $camp=$this->input->post('camp');
                       $camp1=implode(",", $camp) ;
                       $name=$this->input->post('name');
                       $area=$this->input->post('area');
						$subname=$this->input->post('subname');
						$awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;
                     //  $result=$this->input->post('result');
                        $datef=$this->input->post('datef');
                        $datet=$this->input->post('datet');
                     //   $fees=$this->input->post('fees');
            			$venue=$this->input->post('venue');
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('linkreg');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                        $cmmt=$this->input->post('cmmt');
                        $desc=$this->input->post('desc');
                        $day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                   		$activity=$this->input->post('activity');
                   		$long=$this->input->post('long');   
                		$lati=$this->input->post('lati');
                        $ar=array('camp'=>$camp1,'name'=>$name,'area'=>$area,'subname'=>$subname,'awards'=>$awards1,'datef'=>$datef,'datet'=>$datet,'venue'=>$venue,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'cmmt'=>$cmmt,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'activity'=>$activity,'long'=>$long,'lati'=>$lati);
                        $ar1=$this->photo_up("/uploads/camp/","admin/camps_form");
                    //    echo $ar1;
                        if(!empty($ar1))
                        {
                        $ar3=array_merge($ar,$ar1);
                       
               			$qq=$this->model->insert_data("camp",$ar3);
                        redirect("admin/camps_form");
                    	}
			}
		}
	}

	public function competition_form()
	{
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("compid"=>$id);
            $vv['ed']=$this->model->select_where('competition',$data);

                if($this->input->post('competition'))
                {
                    $name=$this->input->post('name');
                    $area=$this->input->post('area');
                    $subname=$this->input->post('subname');
                    $datet=$this->input->post('datet');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    //   $fees=$this->input->post('fees');
                    $venue=$this->input->post('venue');
                    $fb=$this->input->post('fb');   
                    $link=$this->input->post('linkreg');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    $cmmt=$this->input->post('cmmt');
                    $desc=$this->input->post('desc');
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');
                    $data2=array('name'=>$name,'area'=>$area,'subname'=>$subname,'datet'=>$datet,'awards'=>$awards1,'venue'=>$venue,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'cmmt'=>$cmmt,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                    $ar1=$this->photo_up("/uploads/competition/","admin/competition_form");
                    
                    $ar3=array_merge($data2,$ar1);
                    $this->model->update("competition",$ar3,$data);
                    redirect("admin/competitionupdate");
                    }
            }




		$this->log();
		if($this->form_validation->run('competition')==FALSE)
		{
            $vv['hom']=$this->model->select("competition");
			$this->load->view('admin/competition_form',$vv);	
		}
		else
		{
		
			if($this->input->post('competition'))
			{
				        $name=$this->input->post('name');
				        $area=$this->input->post('area');
						$subname=$this->input->post('subname');
                        $datet=$this->input->post('datet');
                        $awards=$this->input->post('awards');
                		$awards1=implode(";", $awards) ;
                     //   $fees=$this->input->post('fees');
            			$venue=$this->input->post('venue');
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('linkreg');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                        $cmmt=$this->input->post('cmmt');
                        $desc=$this->input->post('desc');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $long=$this->input->post('long');   
                		$lati=$this->input->post('lati');
                        $ar=array('name'=>$name,'area'=>$area,'subname'=>$subname,'datet'=>$datet,'awards'=>$awards1,'venue'=>$venue,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'cmmt'=>$cmmt,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                        $ar1=$this->photo_up("/uploads/competition/","admin/competition_form");
                        if(!empty($ar1))
                        {
                        $ar3=array_merge($ar,$ar1);
               			$qq=$this->model->insert_data("competition",$ar3);
                        redirect("admin/competition_form");
                    	}
			}
		}
	}

	public function home_tutors_form()
	{
    if($this->uri->segment(3))
    {
    $id=$this->uri->segment(3);
    $data=array("hid"=>$id);
    $vv['ed']=$this->model->select_where('home',$data);

    if($this->input->post('home_f'))
      {
                $name=$this->input->post('name');
                $area=$this->input->post('area');
            $subname=$this->input->post('subname');
            $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                $board=$this->input->post('board');
                        $board1=implode(",", $board) ;
                        $class=$this->input->post('class');
                        $fees=$this->input->post('fees');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                        $desc=$this->input->post('desc');
                      $day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $data2=array('name'=>$name,'area'=>$area,'subname'=>$subname,'awards'=>$awards1,'board'=>$board1,'class'=>$class,'fees'=>$fees,'email'=>$email,'phone'=>$phone,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing);
                         $ar1=$this->photo_up("/uploads/home/","admin/home_tutors_form");
                        $ar3=array_merge($data2,$ar1);
                    $this->model->update("home",$ar3,$data);
                        redirect("admin/hometutorupdate");
       
      }
}
		$this->log();
		if($this->form_validation->run('home')==FALSE)
		{
			//echo "innnn";
       $vv['hom']=$this->model->select("home");
			$this->load->view('admin/home_tutors_form',$vv);	
		}
		else
		{
		//	echo "innnn";
			if($this->input->post('home_f'))
			{
				        $name=$this->input->post('name');
				        $area=$this->input->post('area');
						$subname=$this->input->post('subname');
						$awards=$this->input->post('awards');
               			$awards1=implode(";", $awards) ;
				        $board=$this->input->post('board');
                        $board1=implode(",", $board) ;
                        $class=$this->input->post('class');
                        $fees=$this->input->post('fees');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                        $desc=$this->input->post('desc');
                   		$day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');
                        $ar=array('name'=>$name,'area'=>$area,'subname'=>$subname,'awards'=>$awards1,'board'=>$board1,'class'=>$class,'fees'=>$fees,'email'=>$email,'phone'=>$phone,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing);
                         $ar1=$this->photo_up("/uploads/home/","admin/home_tutors_form");
                         if(!empty($ar1))
         				{
                        $ar3=array_merge($ar,$ar1);
               			$qq=$this->model->insert_data("home",$ar3);
                        redirect("admin/home_tutors_form");
                    	}
			}
		}
	
}
	public function k_12_school_form()
  {
    if($this->uri->segment(3))
    {
    $id=$this->uri->segment(3);
    $data=array("kid"=>$id);
    $vv['ed']=$this->model->select_where('k12',$data);

    if($this->input->post('k_123'))
      {
      //  echo "innnn";
                $name=$this->input->post('name');
                $area=$this->input->post('area');
            $subname=$this->input->post('subname');
                       $board=$this->input->post('board');
                        $board1=implode(",", $board) ;
                        $awards=$this->input->post('awards');
                        $awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
                  $addr=$this->input->post('addr');
                        $fb=$this->input->post('fb'); 
                        $link=$this->input->post('webl');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc=$this->input->post('desc');     
                        $day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');    
                        $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');         
                       $data2=array('name'=>$name,'area'=>$area,'subname'=>$subname,'board'=>$board1,'awards'=>$awards1,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);                  
                        $ar1=$this->photo_up("/uploads/k12/","admin/k_12_school_form");
                        $ar3=array_merge($data2,$ar1);
                        $this->model->update("k12",$ar3,$data);
                        redirect("admin/k12update");
                      
      }
}
    $this->log();
    if($this->form_validation->run('k_12')==FALSE)
    {
      //echo "innnn";
      $vv['hom']=$this->model->select("k12");
      $this->load->view('admin/k_12_school_form',$vv);  
    }
    else
    {
    //  echo "innnn";
      if($this->input->post('k_123'))
      {
      //  echo "innnn";
                $name=$this->input->post('name');
                $area=$this->input->post('area');
            $subname=$this->input->post('subname');
                       $board=$this->input->post('board');
                        $board1=implode(",", $board) ;
                        $awards=$this->input->post('awards');
                        $awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
                  $addr=$this->input->post('addr');
                        $fb=$this->input->post('fb'); 
                        $link=$this->input->post('webl');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc=$this->input->post('desc');     
                        $day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');    
                        $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');         
                       $ar=array('name'=>$name,'area'=>$area,'subname'=>$subname,'board'=>$board1,'awards'=>$awards1,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);                  
                        $ar1=$this->photo_up("/uploads/k12/","admin/k_12_school_form");
                        if(!empty($ar1))
                {
                        $ar3=array_merge($ar,$ar1);
                    $qq=$this->model->insert_data("k12",$ar3);
                        redirect("admin/k_12_school_form");
                      }
      }
    }
  
  }

	public function pre_school_form()
  {
    if($this->uri->segment(3))
    {
    $id=$this->uri->segment(3);
    $data=array("pid"=>$id);
    $vv['ed']=$this->model->select_where('pre',$data);

                if($this->input->post('pre_s'))
                {
                $name=$this->input->post('name');
                $area=$this->input->post('area');
                $subname=$this->input->post('subname');
                $activity=$this->input->post('activity');
                $activity1=implode(",",$activity) ;
                $awards=$this->input->post('awards');
                $awards1=implode(";",$awards) ;
                $reason=$this->input->post('reason');
                $modes=$this->input->post('modes');
                $modes1=implode(",",$modes) ;
                $devlopment=$this->input->post('devlopment');
                $ratio=$this->input->post('ratio');
                $fees=$this->input->post('fees');
                $addr=$this->input->post('addr');
                $fb=$this->input->post('fb'); 
                $link=$this->input->post('webl');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $desc=$this->input->post('desc');
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');  
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');      
                $data2=array('name'=>$name,'area'=>$area,'subname'=>$subname,'activity'=>$activity1,'awards'=>$awards1,'reason'=>$reason,'modes'=>$modes1,'devlopment'=>$devlopment,'ratio'=>$ratio,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);   
                $ar1=$this->photo_up("/uploads/pre_s/","admin/pre_school_form");
                  $ar3=array_merge($data2,$ar1);
                   $this->model->update("pre",$ar3,$data);
                  redirect("admin/preupdate");
                
}
}
    // $idd=array("qid"=>$id);
    // $vv['ed']=$this->model->select_where('ques',$idd);

        // print_r($_POST);
    // die();
    $this->log();
    if($this->form_validation->run('pre_school')==FALSE)
    {
      // echo "string";
      // die();
      $vv['hom']=$this->model->select("pre");
      $this->load->view('admin/pre_school_form.php',$vv); 
    }
    else
    {
      if($this->input->post('pre_s'))
      {
                $name=$this->input->post('name');
                $area=$this->input->post('area');
                $subname=$this->input->post('subname');
                $activity=$this->input->post('activity');
                $activity1=implode(",",$activity) ;
                $awards=$this->input->post('awards');
                $awards1=implode(";",$awards) ;
                $reason=$this->input->post('reason');
                $modes=$this->input->post('modes');
                $modes1=implode(",",$modes) ;
                $devlopment=$this->input->post('devlopment');
                $ratio=$this->input->post('ratio');
                $fees=$this->input->post('fees');
                $addr=$this->input->post('addr');
                $fb=$this->input->post('fb'); 
                $link=$this->input->post('webl');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $desc=$this->input->post('desc');
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');  
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');      
                $ar=array('name'=>$name,'area'=>$area,'subname'=>$subname,'activity'=>$activity1,'awards'=>$awards1,'reason'=>$reason,'modes'=>$modes1,'devlopment'=>$devlopment,'ratio'=>$ratio,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);   
              //     print_r($ar);
                // die();              
                $ar1=$this->photo_up("/uploads/pre_s/","admin/pre_school_form");
                if(!empty($ar1))
            {
              
                $ar3=array_merge($ar,$ar1);
            //     print_r($ar3);
              // die();
            $qq=$this->model->insert_data("pre",$ar3);
                redirect("admin/pre_school_form");
              }
      }
    }   
      


  }

	public function school_for_special_children_form()
	{
    if($this->uri->segment(3))
    {
    $id=$this->uri->segment(3);
    $data=array("ssid"=>$id);
    $vv['ed']=$this->model->select_where('school',$data);

            if($this->input->post('school_f'))
            {
                $name=$this->input->post('name');
                $area=$this->input->post('area');
                $subname=$this->input->post('subname');
                $doc=$this->input->post('doc');
                $awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
                $fees=$this->input->post('fees');
                $addr=$this->input->post('addr');
                $fb=$this->input->post('fb'); 
                $link=$this->input->post('webl');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $desc=$this->input->post('desc'); 
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing'); 
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');                
                $data2=array('name'=>$name,'area'=>$area,'subname'=>$subname,'doc'=>$doc,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);
                $ar1=$this->photo_up("/uploads/school/","admin/school_for_special_children_form");
               
                $ar3=array_merge($data2,$ar1);
                $this->model->update("school",$ar3,$data);
                redirect("admin/schoolupdate");
              
            }
    }


		$this->log();
		if($this->form_validation->run('school_special')==FALSE)
		{
      $vv['hom']=$this->model->select("school");
			$this->load->view('admin/school_for_special_children_form.php',$vv);	
		}
		else
		{
			if($this->input->post('school_f'))
			{
		        $name=$this->input->post('name');
		        $area=$this->input->post('area');
				$subname=$this->input->post('subname');
		        $doc=$this->input->post('doc');
                $awards=$this->input->post('awards');
               	$awards1=implode(";", $awards) ;
                $fees=$this->input->post('fees');
    			$addr=$this->input->post('addr');
                $fb=$this->input->post('fb');	
                $link=$this->input->post('webl');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $desc=$this->input->post('desc'); 
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing'); 
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');                
                $ar=array('name'=>$name,'area'=>$area,'subname'=>$subname,'doc'=>$doc,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);		              
                $ar1=$this->photo_up("/uploads/school/","admin/school_for_special_children_form");
                if(!empty($ar1))
         		{
                $ar3=array_merge($ar,$ar1);
       			$qq=$this->model->insert_data("school",$ar3);
                redirect("admin/school_for_special_children_form");
            	}
			}
		}
	}

	public function seminar_form()
	{  
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("semid"=>$id);
            $vv['ed']=$this->model->select_where('seminar',$data);

                if($this->input->post('semi'))
                {
                    $name=$this->input->post('name');
                    $speaker=$this->input->post('speaker');
                    $area=$this->input->post('area');
                    $subname=$this->input->post('subname');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $venue=$this->input->post('venue');
                    $date=$this->input->post('date');
                    $cmmt=$this->input->post('cmmt');
                    $fb=$this->input->post('fb');   
                    $link=$this->input->post('linkreg');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    $desc=$this->input->post('desc');  
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');                
                    $data2=array('name'=>$name,'speaker'=>$speaker,'area'=>$area,'subname'=>$subname,'awards'=>$awards1,'venue'=>$venue,'date1'=>$date,'cmmt'=>$cmmt,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);                      
                    $ar1=$this->photo_up("/uploads/seminar/","admin/seminar_form");
                   
                    $ar3=array_merge($data2,$ar1);
                    $this->model->update("seminar",$ar3,$data);
                    redirect("admin/seminarupdate");
                }
        }



		$this->log();
		if($this->form_validation->run('seminar')==FALSE)
		{
            $vv['hom']=$this->model->select("seminar");
			$this->load->view('admin/seminar_form.php',$vv);	
		}
		else
		{
			if($this->input->post('semi'))
			{
		        $name=$this->input->post('name');
		        $speaker=$this->input->post('speaker');
		        $area=$this->input->post('area');
				$subname=$this->input->post('subname');
				$awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
		        $venue=$this->input->post('venue');
                $date=$this->input->post('date');
    			$cmmt=$this->input->post('cmmt');
                $fb=$this->input->post('fb');	
                $link=$this->input->post('linkreg');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $desc=$this->input->post('desc');  
           		$day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');                
                $ar=array('name'=>$name,'speaker'=>$speaker,'area'=>$area,'subname'=>$subname,'awards'=>$awards1,'venue'=>$venue,'date1'=>$date,'cmmt'=>$cmmt,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);		              
                $ar1=$this->photo_up("/uploads/seminar/","admin/seminar_form");
                if(!empty($ar1))
         		{
                $ar3=array_merge($ar,$ar1);
       			$qq=$this->model->insert_data("seminar",$ar3);
                redirect("admin/seminar_form");
            	}
			}
		}
	}

	public function workshops_form()
	{
        if($this->uri->segment(3))
        {
            $id=$this->uri->segment(3);
            $data=array("wid"=>$id);
            $vv['ed']=$this->model->select_where('work',$data);

                if($this->input->post('work'))
                {
                    $name=$this->input->post('name');
                    $artist=$this->input->post('artist');
                    $area=$this->input->post('area');
                    $awards=$this->input->post('awards');
                    $awards1=implode(";", $awards) ;
                    $subname=$this->input->post('subname');
                    $venue=$this->input->post('venue');
                    $date=$this->input->post('date');
                    $cmmt=$this->input->post('cmmt');
                    $fb=$this->input->post('fb');   
                    $link=$this->input->post('linkreg');
                    $email=$this->input->post('email');
                    $phone=$this->input->post('phone');
                    $desc=$this->input->post('desc');         
                    $day=$this->input->post('day');
                    $hour=$this->input->post('hour');
                    $closing=$this->input->post('closing');
                    $long=$this->input->post('long');   
                    $lati=$this->input->post('lati');         
                    $data2=array('name'=>$name,'artist'=>$artist,'area'=>$area,'awards'=>$awards1,'subname'=>$subname,'venue'=>$venue,'date1'=>$date,'cmmt'=>$cmmt,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);                    
                    $ar1=$this->photo_up("/uploads/work/","admin/workshops_form");
                    
                    $ar3=array_merge($data2,$ar1);
                    $this->model->update("work",$ar3,$data);
                    redirect("admin/workshopsupdate");
                }
        }


		$this->log();
		if($this->form_validation->run('workshops')==FALSE)
		{
            $vv['hom']=$this->model->select("work");
			$this->load->view('admin/workshops_form.php',$vv);	
		}
		else
		{
			if($this->input->post('work'))
			{
		        $name=$this->input->post('name');
		        $artist=$this->input->post('artist');
		        $area=$this->input->post('area');
		        $awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
				$subname=$this->input->post('subname');
		        $venue=$this->input->post('venue');
                $date=$this->input->post('date');
    			$cmmt=$this->input->post('cmmt');
                $fb=$this->input->post('fb');	
                $link=$this->input->post('linkreg');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $desc=$this->input->post('desc');         
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');
                $long=$this->input->post('long');   
                $lati=$this->input->post('lati');         
                $ar=array('name'=>$name,'artist'=>$artist,'area'=>$area,'awards'=>$awards1,'subname'=>$subname,'venue'=>$venue,'date1'=>$date,'cmmt'=>$cmmt,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing,'long'=>$long,'lati'=>$lati);		              
                $ar1=$this->photo_up("/uploads/work/","admin/workshops_form");
                if(!empty($ar1))
         		{
                $ar3=array_merge($ar,$ar1);
       			$qq=$this->model->insert_data("work",$ar3);
                redirect("admin/workshops_form");
            	}
			}
		}
	}


		public function extras_form()
	{
		$this->log();
		if($this->form_validation->run('extra')==FALSE)
		{
			$this->load->view('admin/extras_form.php');	
		}
		else
		{
			//echo "innnn";
			if($this->input->post('extra'))
			{
				//echo "innnn";
				        $name=$this->input->post('name');
                        $field=$this->input->post('field');
                        $field1=implode(",", $field) ;
                        $certification=$this->input->post('certification');
                        $certification1=implode(",", $certification) ;
                        $awards=$this->input->post('awards');
                $awards1=implode(";", $awards) ;
                        $fees=$this->input->post('fees');
            			$addr=$this->input->post('addr');
                        $fb=$this->input->post('fb');	
                        $link=$this->input->post('webl');
                        $email=$this->input->post('email');
                        $phone=$this->input->post('phone');
                      //  $cmmt=$this->input->post('cmmt');
                        $desc=$this->input->post('desc');  
                        $day=$this->input->post('day');
                        $hour=$this->input->post('hour');
                        $closing=$this->input->post('closing');                
                        $ar=array('name'=>$name,'field'=>$field1,'certification'=>$certification1,'addr'=>$addr,'fees'=>$fees,'fb'=>$fb,'link'=>$link,'email'=>$email,'phone'=>$phone,'awards'=>$awards1,'desc1'=>$desc,'day'=>$day,'hour'=>$hour,'closing'=>$closing);		              
                        $ar1=$this->photo_up("/uploads/extra/","admin/extras_form");
                    //    print_r($ar1);
                        if(!empty($ar1))
                        {
                        $ar3=array_merge($ar,$ar1);
               			$qq=$this->model->insert_data("extra",$ar3);
                        redirect("admin/extras_form");
                        }
			}
		}
	}

	public function vacancy_form()
	{
		$this->log();
		if($this->form_validation->run('vacancy')==FALSE)
		{
			$this->load->view('admin/vacancy_form.php');	
		}
		else
		{
			if($this->input->post('vacancy_f'))
			{
		        $name=$this->input->post('name');
		        $qualifi=$this->input->post('qualifi');
		        $nop=$this->input->post('nop');
                $ctc=$this->input->post('ctc');
    			$pop=$this->input->post('pop');
                $email=$this->input->post('email');
                $phone=$this->input->post('phone');
                $commu=$this->input->post('commu');               
                $day=$this->input->post('day');
                $hour=$this->input->post('hour');
                $closing=$this->input->post('closing');   
                $ar=array('name'=>$name,'qualifi'=>$qualifi,'nop'=>$nop,'ctc'=>$ctc,'pop'=>$pop,'email'=>$email,'phone'=>$phone,'commu'=>$commu,'day'=>$day,'hour'=>$hour,'closing'=>$closing);		              
                $ar1=$this->photo_up("/uploads/vacancy/","admin/vacancy_form");
                if(!empty($ar1))
         		{
                $ar3=array_merge($ar,$ar1);
       			$qq=$this->model->insert_data("vacancy",$ar3);
                redirect("admin/vacancy_form");
            	}
			}
		}
	}

	private function photo_up($path1,$redir)
	{
		$file1=$this->check('photo1');
		$file2=$this->check('photo2');
		$file3=$this->check('photo3');
		$file4=$this->check('photo4');
		$file5=$this->check('photo5');
		$file6=$this->check('pdf');
		if($file1 == "" && $file2 == "" && $file3 == "" && $file4 == "" && $file5 == "" && $file6 == "")
		{
			$config['upload_path']          = ".".$path1;
		    $config['allowed_types']        = 'pdf|jpg|png|jpeg';
		    $config['max_size']             = 300000;
		    $this->load->library('upload', $config);
		   // var_dump($this->load->library('upload', $config));
	     //   $this->load->library('upload');
				$ar=array('test'=>"test");
			if(! empty($_FILES['photo1']['name']))
			{
            	$this->upload->do_upload('photo1');
            	$data =$this->upload->data();
            	$path=base_url("$path1".$data['raw_name'].$data['file_ext']);
            	$ar['photo1']=$path;
            	echo $path;
            	echo "<br>";
            	//exit;
	        }
	        if(! empty($_FILES['photo2']['name']))
			{
        	    $this->upload->do_upload('photo2');
                $data1=$this->upload->data();
                $path2=base_url("$path1".$data1['raw_name'].$data1['file_ext']);
            	$ar['photo2']=$path2;
            	echo $path2;
            	echo "<br>";
	       	}

	       	if(! empty($_FILES['photo3']['name']))
			{
	       		$this->upload->do_upload('photo3');
                $data2=$this->upload->data();
                $path3=base_url("$path1".$data2['raw_name'].$data2['file_ext']);
            	$ar['photo3']=$path3;
            	echo $path3;
            	echo "<br>";
	       	}

	       	if(! empty($_FILES['photo4']['name']))
			{
	       		$this->upload->do_upload('photo4');
                $data3=$this->upload->data();
                $path4=base_url("$path1".$data3['raw_name'].$data3['file_ext']);
            	$ar['photo4']=$path4;
            	echo $path4;
            	echo "<br>";
	       	}

	       	if(! empty($_FILES['photo5']['name']))
			{
	       		$this->upload->do_upload('photo5');
                $data4=$this->upload->data();
                $path5=base_url("$path1".$data4['raw_name'].$data4['file_ext']);
            	$ar['photo5']=$path5;
            	echo $path5;
            	echo "<br>";
	       	}

	       	if(! empty($_FILES['pdf']['name']))
			{
	       		$this->upload->do_upload('pdf');
                $data5=$this->upload->data();
                $path6=base_url("$path1".$data5['raw_name'].$data5['file_ext']);
            	$ar['pdf']=$path6;
            	echo $path6;
            	//exit;
	       	}
			unset($ar['test']);
			return $ar;
		}
		else
		{
			if($file1 != "")	
			{
				$this->session->set_flashdata('error_1',$file1);
			}
			if($file2 != "")	
			{
				$this->session->set_flashdata('error_2',$file2);
			}
			if($file3 != "")	
			{
				$this->session->set_flashdata('error_3',$file3);
			}
			if($file4 != "")	
			{
				$this->session->set_flashdata('error_4',$file4);
			}
			if($file5 != "")	
			{
				$this->session->set_flashdata('error_5',$file5);
			}
			if($file6 != "")	
			{
				$this->session->set_flashdata('error_6',$file6);
			}
			
			//echo "okkk";
			$this->load->view($redir);
			//$error="error";
			//$this->load->view('camps_form',$error);
		//	redirect("$redir");
			// $ur=base_url('admin/camp_form.php');
			// echo $ur;
			// header("location:".$ur);
			//exit;
		}		
	}
  




	private function check($pt)
	{
		$tes=$_FILES[$pt]['name'];
		//echo $pt;
		// var_dump(empty($tes));
		// echo "<br>";
		
		if(!empty($tes))
		{
			if( $_FILES[$pt]['size'] > '3000000' )
			{
				$allerror="file size must be less then 1 MB";
				return $allerror;
			}
			elseif($_FILES[$pt]['type'] != 'image/png')
			{
				if($_FILES[$pt]['type'] != 'image/jpg')
				{
					if($_FILES[$pt]['type'] != 'image/jpeg')
					{
						if($_FILES[$pt]['type'] != 'application/pdf')
						{
							$allerror="file type must be in jpg,jpeg,png,pdf format ";
							return $allerror;
						}
					}
				}
			}
		}
	}

	function do_upload()
{
  $url = "..uploads/images";
  $image=basename($_FILES['uphotoes']['name']);
  $image=str_replace(' ','|',$image);
  $type = explode(".",$image);
  $type = $type[count($type)-1];
  if (in_array($type,array('jpg','jpeg','png','gif','wmv','mp4','avi','flv')))
  {
    $tmppath="uploads/images/".uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
    if(is_uploaded_file($_FILES["uphotoes"]["tmp_name"]))
    {
      move_uploaded_file($_FILES['uphotoes']['tmp_name'],$tmppath);
      return $tmppath; // returns the url of uploaded image.
    }
  }
  else
  {
    redirect(base_url() . '/controller/user_reg');// redirect to show file type not support message
  }
}




	public function user_reg()
	{
		$this->load->view('user_login');	
		 	
		 	if($this->input->post('reg'))
			{
                $n=$this->input->post('uname');
                $p=$this->input->post('upass');
				$c=$this->input->post('ucity');
                $pos=$this->input->post('uposstion');
                $sn=$this->input->post('usname');
                
                $e=$this->input->post('uemail');
                $m=$this->input->post('umobile');
                $pic=$this->do_upload();
                $hd=$this->input->post('uheadline');
                $sr=$this->input->post('usummery');
                $url="http://www.youreducare.com/admin/new_reg";
                $data=array('uname'=>$n,'upass'=>$p,'ucity'=>$c,'uposstion'=>$pos,'uschool_name'=>$sn,'uemail'=>$e,'umobile'=>$m,"uphotoes"=>$pic,'uheadline'=>$hd,'usummery'=>$sr);
                $qq=$this->model->insert_data("user_registrion",$data);
               	
               	$to = "support@youreducare.com,support@youreducare.com";
				$subject = "Confirmation Mail";
				$message  .= "<h5>Hi Team</h5>";
				$message  .= " " . strip_tags($n) . " is request to login as new user please confrim it if he/she is eligible <a href=".htmlentities($url).">Confirm</a>";
				// $message = 'Hi thanks for logine';
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <support@youreducare.com>' . "\r\n";
				$headers .= 'Cc: support@youreducare.com' . "\r\n";
				mail($to,$subject,$message,$headers);


				redirect('admin/loged');
               	}
	
}

public function listofuser()
{
     // $this->load->model("excel_export_model");
  $data["employee_data"] = $this->model->select('users');
  $this->load->view("new_reg2", $data);
    
}

function action()
 {
  // $this->load->model("excel_export_model");
  $this->load->library("excel");
  $object = new PHPExcel();

  $object->setActiveSheetIndex(0);

  $table_columns = array("First Name", "Last Name", "Email", "Gender", "User Name","Birth Date","City","Eduction","Current into","Interted into","Mobile","Status");

  $column = 0;

  foreach($table_columns as $field)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
   $column++;
  }

  $employee_data = $this->model->select('users');

  $excel_row = 2;

  foreach($employee_data as $row)
  {
   $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->first_name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->last_name);
   $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->email);
   $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->gender);
   $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->uname);
   $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->udob);
   $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->ucity);
   $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->uedu);
   $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->ustudent);
   $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->uinterted_into);
   $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->umobile);
   $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->status);
   $excel_row++;    
  }

  $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
  header('Content-Type: application/vnd.ms-excel');
  header('Content-Disposition: attachment;filename="User Data.xls"');
  $object_writer->save('php://output');
 }



public function loged()
{
	$this->load->view('user_login');	
		{
			if($this->input->post('log_sub'))
		{
			$u=$this->input->post('uname');
			$p=$this->input->post('upass');
			

			$data = array("uname"=>$u,"upass"=>$p,"status"=>'Active');

			$vv2=$this->model->select_where('user_registrion',$data);

			
			if(count($vv2)>0)
			{
				$sr2=array("uname"=>$u,"userid2"=>$vv2[0]->uid,"uphotoes"=>$vv2[0]->uphotoes,"uposstion"=>$vv2[0]->uposstion,"ucity"=>$vv2[0]->ucity,"uemail"=>$vv2[0]->uemail,"umobile"=>$vv2[0]->umobile,"uheadline"=>$vv2[0]->uheadline,"usummery"=>$vv2[0]->usummery,"uschool_name"=>$vv2[0]->usummery);
				

				

				$this->session->set_userdata($sr2); 


				redirect('controller/index'); 

				
			}
			else
			{

	$this->session->set_flashdata('error', 'Your Username or Password might be wrong or you are not eligible <a href="mailto:abc@gmial.com">please contact to YourEducare team</a>');

				redirect('admin/loged'); 
			}
		}
	}


}

public function new_reg()
{

	$vv['hom']=$this->model->select('user_registrion');
    $vv['select2']=$this->img;
	$this->load->view('new_reg',$vv);
}

public function mydetial(){

	@$urid=$this->session->userdata['userid2'];
	$data = array("uid"=>$urid);
	
	$vv['hom']=$this->model->select_where('user_registrion',$data);

		$this->load->view('mydetial',$vv);

		if($this->input->post('update'))
			{
                $n=$this->input->post('uname');
                $p=$this->input->post('upass');
				$c=$this->input->post('ucity');
                $pos=$this->input->post('uposstion');
                $sn=$this->input->post('usname');
                $e=$this->input->post('uemail');
                $m=$this->input->post('umobile');
                $pic=$this->do_upload();
                $hd=$this->input->post('uheadline');
                $sr=$this->input->post('usummery');
                $data2=array('uname'=>$n,'upass'=>$p,'ucity'=>$c,'uposstion'=>$pos,'uschool_name'=>$sn,'uemail'=>$e,'umobile'=>$m,"uphotoes"=>$pic,'uheadline'=>$hd,'usummery'=>$sr);

               	$this->model->update("user_registrion",$data2,$data);
				// redirect('admin/logout');
               	}
	}

public function sts()
{

	$id=$this->uri->segment(3);
	$data= array("uid"=>$id);
	$vv=$this->model->select_where('user_registrion',$data);
	$a=$vv['0']->status;
	
	if($a=="Block")
	{
		$data= array("uid"=>$id);
		$data2=array("status"=>'Active');
		$this->model->update("user_registrion",$data2,$data);
		redirect('admin/new_reg');
	}
	else if($a=="Active")
	{	

		$data= array("uid"=>$id);
		$data2=array("status"=>'Block');
		$this->model->update("user_registrion",$data2,$data);
		redirect('admin/new_reg');

	}
}

public function del()
{
		$id=$this->uri->segment(3);
		$data=array("uid"=>$id);
		$qq=$this->model->delete_data('user_registrion',$data);
		redirect('admin/new_reg');
}

public function preupdate()
  {

    $vv['test']=$this->model->select_group("pre","name");
    $vv['hom']=$this->model->select("pre");
    $vv['select']=$this->model->fetch('pre');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/preupdate',$vv);
  }

public function predelet()
{
		$id=$this->uri->segment(3);
		$data=array("pid"=>$id);
		$qq=$this->model->delete_data('pre',$data);
		redirect('admin/preupdate');
}

public function careerupdate()
  {

    $vv['test']=$this->model->select_group("career","title");
    $vv['hom']=$this->model->select("career");
    $vv['select']=$this->model->fetch('career');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/careerupdate',$vv);
  }

public function careerdelet()
{
    $id=$this->uri->segment(3);
    $data=array("cid"=>$id);
    $qq=$this->model->delete_data('career',$data);
    redirect('admin/careerupdate');
}

public function coachingupdate()
  {

    $vv['test']=$this->model->select_group("coaching","name");
    $vv['hom']=$this->model->select("coaching");
    $vv['select']=$this->model->fetch('coaching');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/coachingupdate',$vv);
  }

  public function coachingdelet()
{
    $id=$this->uri->segment(3);
    $data=array("coid"=>$id);
    $qq=$this->model->delete_data('coaching',$data);
    redirect('admin/coachingupdate');
}

public function collegeupdate()
  {

    $vv['test']=$this->model->select_group("college","title");
    $vv['hom']=$this->model->select("college");
    $vv['select']=$this->model->fetch('college');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/collegeupdate',$vv);
  }

  public function collegedelet()
{
    $id=$this->uri->segment(3);
    $data=array("clid"=>$id);
    $qq=$this->model->delete_data('college',$data);
    redirect('admin/collegeupdate');
}

public function cocurrupdate()
  {

    $vv['test']=$this->model->select_group("cocurr","name");
    $vv['hom']=$this->model->select("cocurr");
    $vv['select']=$this->model->fetch('cocurr');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/cocurrupdate',$vv);
  }

  public function cocurrdelet()
{
    $id=$this->uri->segment(3);
    $data=array("ccid"=>$id);
    $qq=$this->model->delete_data('cocurr',$data);
    redirect('admin/cocurrupdate');
}
public function eventupdate()
  {

    $vv['test']=$this->model->select_group("event_f","name");
    $vv['hom']=$this->model->select("event_f");
    $vv['select']=$this->model->fetch('event_f');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/eventupdate',$vv);
  }

  public function eventdelet()
{
    $id=$this->uri->segment(3);
    $data=array("eid"=>$id);
    $qq=$this->model->delete_data('event_f',$data);
    redirect('admin/eventupdate');
}

public function jewelleryupdate()
  {

    $vv['test']=$this->model->select_group("jewellery","name");
    $vv['hom']=$this->model->select("jewellery");
    $vv['select']=$this->model->fetch('jewellery');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/jewelleryupdate',$vv);
  }

  public function jewellerydelet()
{
    $id=$this->uri->segment(3);
    $data=array("jid"=>$id);
    $qq=$this->model->delete_data('jewellery',$data);
    redirect('admin/jewelleryupdate');
}

public function fashionupdate()
  {

    $vv['test']=$this->model->select_group("fashion","name");
    $vv['hom']=$this->model->select("fashion");
    $vv['select']=$this->model->fetch('fashion');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/fashionupdate',$vv);
  }

  public function fashiondelet()
{
    $id=$this->uri->segment(3);
    $data=array("fid"=>$id);
    $qq=$this->model->delete_data('fashion',$data);
    redirect('admin/fashionupdate');
}

public function studyabroadupdate()
  {

    $vv['test']=$this->model->select_group("study_abroad","title");
    $vv['hom']=$this->model->select("study_abroad");
    $vv['select']=$this->model->fetch('study_abroad');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/studyabroadupdate',$vv);
  }

  public function studyabroaddelet()
{
    $id=$this->uri->segment(3);
    $data=array("sid"=>$id);
    $qq=$this->model->delete_data('study_abroad',$data);
    redirect('admin/studyabroadupdate');
}

public function campupdate()
  {

    $vv['test']=$this->model->select_group("camp","camp");
    $vv['hom']=$this->model->select("camp");
    $vv['select']=$this->model->fetch('camp');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/campupdate',$vv);
  }

  public function campdelet()
{
    $id=$this->uri->segment(3);
    $data=array("campid"=>$id);
    $qq=$this->model->delete_data('camp',$data);
    redirect('admin/campupdate');
}

public function competitionupdate()
  {

    $vv['test']=$this->model->select_group("competition","name");
    $vv['hom']=$this->model->select("competition");
    $vv['select']=$this->model->fetch('competition');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/competitionupdate',$vv);
  }

  public function competitiondelet()
{
    $id=$this->uri->segment(3);
    $data=array("compid"=>$id);
    $qq=$this->model->delete_data('competition',$data);
    redirect('admin/competitionupdate');
}

public function hometutorupdate()
  {

    $vv['test']=$this->model->select_group("home","name");
    $vv['hom']=$this->model->select("home");
    $vv['select']=$this->model->fetch('home');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/hometutorupdate',$vv);
  }

  public function hometutordelet()
{
    $id=$this->uri->segment(3);
    $data=array("hid"=>$id);
    $qq=$this->model->delete_data('home',$data);
    redirect('admin/hometutorupdate');
}

public function k12update()
  {

    $vv['test']=$this->model->select_group("k12","name");
    $vv['hom']=$this->model->select("k12");
    $vv['select']=$this->model->fetch('k12');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/k12update',$vv);
  }

  public function k12delet()
{
    $id=$this->uri->segment(3);
    $data=array("kid"=>$id);
    $qq=$this->model->delete_data('k12',$data);
    redirect('admin/k12update');
}

public function schoolupdate()
  {

    $vv['test']=$this->model->select_group("school","name");
    $vv['hom']=$this->model->select("school");
    $vv['select']=$this->model->fetch('school');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/schoolupdate',$vv);
  }

  public function schooldelet()
{
    $id=$this->uri->segment(3);
    $data=array("ssid"=>$id);
    $qq=$this->model->delete_data('school',$data);
    redirect('admin/schoolupdate');
}

public function seminarupdate()
  {

    $vv['test']=$this->model->select_group("seminar","name");
    $vv['hom']=$this->model->select("seminar");
    $vv['select']=$this->model->fetch('seminar');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/seminarupdate',$vv);
  }

  public function seminardelet()
{
    $id=$this->uri->segment(3);
    $data=array("semid"=>$id);
    $qq=$this->model->delete_data('seminar',$data);
    redirect('admin/seminarupdate');
}

public function workshopsupdate()
  {

    $vv['test']=$this->model->select_group("work","name");
    $vv['hom']=$this->model->select("work");
    $vv['select']=$this->model->fetch('work');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/workshopsupdate',$vv);
  }

  public function workshopsdelet()
{
    $id=$this->uri->segment(3);
    $data=array("wid"=>$id);
    $qq=$this->model->delete_data('work',$data);
    redirect('admin/workshopsupdate');
}

public function imageupdate()
  {

    $vv['test']=$this->model->select_group("image","name");
    $vv['hom']=$this->model->select("image");
    $vv['select']=$this->model->fetch('image');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/imageupdate',$vv);
  }

  public function imagedelet()
{
    $id=$this->uri->segment(3);
    $data=array("iid"=>$id);
    $qq=$this->model->delete_data('image',$data);
    redirect('admin/imageupdate');
}

public function corporateupdate()
  {

    $vv['test']=$this->model->select_group("corporate","name");
    $vv['hom']=$this->model->select("corporate");
    $vv['select']=$this->model->fetch('corporate');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/corporateupdate',$vv);
  }

  public function corporatedelet()
{
    $id=$this->uri->segment(3);
    $data=array("corpid"=>$id);
    $qq=$this->model->delete_data('corporate',$data);
    redirect('admin/corporateupdate');
}

public function cocurr_oupdate()
  {

    $vv['test']=$this->model->select_group("cocurr_o","name");
    $vv['hom']=$this->model->select("cocurr_o");
    $vv['select']=$this->model->fetch('cocurr_o');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/cocurr_oupdate',$vv);
  }

  public function cocurr_odelet()
{
    $id=$this->uri->segment(3);
    $data=array("cocid"=>$id);
    $qq=$this->model->delete_data('cocurr_o',$data);
    redirect('admin/cocurr_oupdate');
}

public function beauticianupdate()
  {

    $vv['test']=$this->model->select_group("beautician","name");
    $vv['hom']=$this->model->select("beautician");
    $vv['select']=$this->model->fetch('beautician');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/beauticianupdate',$vv);
  }

  public function beauticiandelet()
{
    $id=$this->uri->segment(3);
    $data=array("bid"=>$id);
    $qq=$this->model->delete_data('beautician',$data);
    redirect('admin/beauticianupdate');
}

public function caupdate()
  {

    $vv['test']=$this->model->select_group("ca","name");
    $vv['hom']=$this->model->select("ca");
    $vv['select']=$this->model->fetch('ca');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/caupdate',$vv);
  }

  public function cadelet()
{
    $id=$this->uri->segment(3);
    $data=array("caid"=>$id);
    $qq=$this->model->delete_data('ca',$data);
    redirect('admin/caupdate');
}

public function cfaupdate()
  {

    $vv['test']=$this->model->select_group("cfa","name");
    $vv['hom']=$this->model->select("cfa");
    $vv['select']=$this->model->fetch('cfa');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/cfaupdate',$vv);
  }

  public function cfadelet()
{
    $id=$this->uri->segment(3);
    $data=array("cfaid"=>$id);
    $qq=$this->model->delete_data('cfa',$data);
    redirect('admin/cfaupdate');
}

public function cmaupdate()
  {

    $vv['test']=$this->model->select_group("cma","name");
    $vv['hom']=$this->model->select("cma");
    $vv['select']=$this->model->fetch('cma');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/cmaupdate',$vv);
  }

  public function cmadelet()
{
    $id=$this->uri->segment(3);
    $data=array("cmaid"=>$id);
    $qq=$this->model->delete_data('cma',$data);
    redirect('admin/cmaupdate');
}

public function csupdate()
  {

    $vv['test']=$this->model->select_group("cs","name");
    $vv['hom']=$this->model->select("cs");
    $vv['select']=$this->model->fetch('cs');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/csupdate',$vv);
  }

  public function csdelet()
{
    $id=$this->uri->segment(3);
    $data=array("csid"=>$id);
    $qq=$this->model->delete_data('cs',$data);
    redirect('admin/csupdate');
}

public function dietitianupdate()
  {

    $vv['test']=$this->model->select_group("dietitian","name");
    $vv['hom']=$this->model->select("dietitian");
    $vv['select']=$this->model->fetch('dietitian');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/dietitianupdate',$vv);
  }

  public function dietitiandelet()
{
    $id=$this->uri->segment(3);
    $data=array("did"=>$id);
    $qq=$this->model->delete_data('dietitian',$data);
    redirect('admin/dietitianupdate');
}

public function digital_marketupdate()
  {

    $vv['test']=$this->model->select_group("digital_market","name");
    $vv['hom']=$this->model->select("digital_market");
    $vv['select']=$this->model->fetch('digital_market');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/digital_marketupdate',$vv);
  }

  public function digital_marketdelet()
{
    $id=$this->uri->segment(3);
    $data=array("digid"=>$id);
    $qq=$this->model->delete_data('digital_market',$data);
    redirect('admin/digital_marketupdate');
}

public function engineeringupdate()
  {

    $vv['test']=$this->model->select_group("engineering","name");
    $vv['hom']=$this->model->select("engineering");
    $vv['select']=$this->model->fetch('engineering');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/engineeringupdate',$vv);
  }

  public function engineeringdelet()
{
    $id=$this->uri->segment(3);
    $data=array("eid"=>$id);
    $qq=$this->model->delete_data('engineering',$data);
    redirect('admin/engineeringupdate');
}

public function ethicalupdate()
  {

    $vv['test']=$this->model->select_group("ethical","name");
    $vv['hom']=$this->model->select("ethical");
    $vv['select']=$this->model->fetch('ethical');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/ethicalupdate',$vv);
  }

  public function ethicaldelet()
{
    $id=$this->uri->segment(3);
    $data=array("ethid"=>$id);
    $qq=$this->model->delete_data('ethical',$data);
    redirect('admin/ethicalupdate');
}

public function interiorupdate()
  {

    $vv['test']=$this->model->select_group("interior","name");
    $vv['hom']=$this->model->select("interior");
    $vv['select']=$this->model->fetch('interior');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/interiorupdate',$vv);
  }

  public function interiordelet()
{
    $id=$this->uri->segment(3);
    $data=array("iid"=>$id);
    $qq=$this->model->delete_data('interior',$data);
    redirect('admin/interiorupdate');
}

public function mbaupdate()
  {

    $vv['test']=$this->model->select_group("mba","name");
    $vv['hom']=$this->model->select("mba");
    $vv['select']=$this->model->fetch('mba');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/mbaupdate',$vv);
  }

  public function mbadelet()
{
    $id=$this->uri->segment(3);
    $data=array("mid"=>$id);
    $qq=$this->model->delete_data('mba',$data);
    redirect('admin/mbaupdate');
}

public function medicalupdate()
  {

    $vv['test']=$this->model->select_group("medical","name");
    $vv['hom']=$this->model->select("medical");
    $vv['select']=$this->model->fetch('medical');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/medicalupdate',$vv);
  }

  public function medicaldelet()
{
    $id=$this->uri->segment(3);
    $data=array("mid"=>$id);
    $qq=$this->model->delete_data('medical',$data);
    redirect('admin/medicalupdate');
}

public function multimediaupdate()
  {

    $vv['test']=$this->model->select_group("multimedia","name");
    $vv['hom']=$this->model->select("multimedia");
    $vv['select']=$this->model->fetch('multimedia');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/multimediaupdate',$vv);
  }

  public function multimediadelet()
{
    $id=$this->uri->segment(3);
    $data=array("mmid"=>$id);
    $qq=$this->model->delete_data('multimedia',$data);
    redirect('admin/multimediaupdate');
}

public function upscupdate()
  {

    $vv['test']=$this->model->select_group("upsc","name");
    $vv['hom']=$this->model->select("upsc");
    $vv['select']=$this->model->fetch('upsc');

    // $this->load->view('preupdate',$vv);
    $this->load->view('admin/upscupdate',$vv);
  }

  public function upscdelet()
{
    $id=$this->uri->segment(3);
    $data=array("upscid"=>$id);
    $qq=$this->model->delete_data('upsc',$data);
    redirect('admin/upscupdate');
}
    
public function indexblogupdate()
  {


    $vv['hom']=$this->model->select("indexblog");
 

    
    $this->load->view('admin/indexblogupdate',$vv);
  }

public function indexblogdelet()
{
    $id=$this->uri->segment(3);
    $data=array("id"=>$id);
    $qq=$this->model->delete_data('indexblog',$data);
    redirect('admin/indexblogupdate');
}

public function indexcoverupdate()
  {


    $vv['hom']=$this->model->select("indexcover");
 

    
    $this->load->view('admin/indexcoverupdate',$vv);
  }

public function indexcoverdelet()
{
    $id=$this->uri->segment(3);
    $data=array("id"=>$id);
    $qq=$this->model->delete_data('indexcover',$data);
    redirect('admin/indexcoverupdate');
}

public function indexadupdate()
  {


    $vv['hom']=$this->model->select("indexad");
 

    
    $this->load->view('admin/indexadupdate',$vv);
  }

public function indexaddelet()
{
    $id=$this->uri->segment(3);
    $data=array("id"=>$id);
    $qq=$this->model->delete_data('indexad',$data);
    redirect('admin/indexadupdate');
}

public function listofint()
{
    $tdata=array("categorie"=>"categorie.cid=enquiry.cid");
    $vv['employee_data']=$this->model->select_join3('enquiry',$tdata);
    $this->load->view("admin/listofint",$vv);
}
    

}