<?php

class model extends CI_Model

{

	function __construct() {
		$this->tableName = 'users';
		$this->primaryKey = 'id';
	}
	public function checkUser($data = array()){
		$this->db->select($this->primaryKey);
		$this->db->from($this->tableName);
		$this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
		$query = $this->db->get();
		$check = $query->num_rows();
		
		if($check > 0){
			$result = $query->row_array();
			$data['modified'] = date("Y-m-d H:i:s");
			$update = $this->db->update($this->tableName,$data,array('id'=>$result['id']));
			$userID = $result['id'];
		}else{
			$data['created'] = date("Y-m-d H:i:s");
			$data['modified'] = date("Y-m-d H:i:s");
			$insert = $this->db->insert($this->tableName,$data);
			$userID = $this->db->insert_id();
		}

		return $userID?$userID:false;
    }
	
	public function select($tbl)

	{

		$qq=$this->db->get($tbl);
	
		return $ff=$qq->result();

	}

	public function selecta($tbl)

	{
		$this->db->from($tbl);
		$this->db->order_by("user_edu","asc");
		$query = $this->db->get(); 
		return $query->result();

	}

	public function select_group($tbl,$tag)
	{
		$qq=$this->db->group_by($tag)->get($tbl);

		return $ff=$qq->result();
	}

	public function insert_data($tbl,$data)

	{

		$qq=$this->db->insert($tbl,$data);

		return $qq;

	}

	public function select_where($tbl,$data)

	{
		//print_r($data);
		$qq=$this->db->get_where($tbl,$data);
		//print_r($ff=$qq->result());
		//die();
		return $ff=$qq->result();

	}


    /*  This function insert ratings
    with item id and user id. */

    /* This function delete ratings of new from all tables by $news_id and $user_id. */


    public function find1($tbl,$id)
    {
        $qq=$this->db->query("select $id, AVG(star)  as star from $tbl group by($id)");
     //   SELECT urid, avg( star ) AS star FROM `rating` WHERE PAGE = 'pre' GROUP BY (urid)
       // print_r($qq);
        return $ff=$qq->result();
    }

    public function find2($tbl,$id)
    {
        $qq=$this->db->query("select $id, AVG(star)  as star , count($id) as count from $tbl group by($id)");
     //   SELECT urid, avg( star ) AS star FROM `rating` WHERE PAGE = 'pre' GROUP BY (urid)
       // print_r($qq);
        return $ff=$qq->result();
    }

    public function fetch($tbl)
    {
        $query = $this->db->query("SELECT area FROM $tbl GROUP BY(area) ");

        $row = $query->result();
       return $row;
    }


	public function fetch2($tbl,$cat11)
    {
        $query = $this->db->query("SELECT area FROM $tbl WHERE categories='$cat11' GROUP BY(area)");

        $row = $query->result();
       return $row;
    }

    public function sgroup($tbl,$cat11)
    {
    	$query = $this->db->query("SELECT * FROM $tbl WHERE categories='$cat11' GROUP BY(name)");

        $row = $query->result();
     
       return $row;

    }


     public function ask($tbl,$a,$b)
    {
        
        $query = $this->db->query("UPDATE $tbl SET answer='$a' WHERE question='$b'");
		
    }


    public function delete_data($tbl,$data)
	{
		$qq=$this->db->delete($tbl,$data);
		return $qq;
	}

	public function update($tbl,$data2,$data)
	{
		$this->db->update($tbl,$data2,$data);
	}

	public function select_join1($tbl,$tdata,$id)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		foreach($tdata as $tk=>$tv)
		{
			$this->db->join($tk,$tv);	
		}
		 $this->db->where('qid',$id);
		$qq=$this->db->get();

		return $qq->result();
	}

	public function select_join2($tbl,$tdata,$id)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		foreach($tdata as $tk=>$tv)
		{
			$this->db->join($tk,$tv);	
		}
		 $this->db->where('name',$id);
		$qq=$this->db->get();

		return $qq->result();
	}

	public function select_join3($tbl,$tdata)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		foreach($tdata as $tk=>$tv)
		{
			$this->db->join($tk,$tv);	
		}
		 
		$qq=$this->db->get();
		
		return $qq->result();
	}

	public function select_join4($tbl,$tdata,$id)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		foreach($tdata as $tk=>$tv)
		{
			$this->db->join($tk,$tv);	
		}
		foreach ($id as $k => $v) {
			$this->db->where($k,$v);	
		}
		 
		$qq=$this->db->get();

		return $qq->result();
	}
	public function select_join22($tbl,$tdata,$id)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		foreach($tdata as $tk=>$tv)
		{
			$this->db->join($tk,$tv);	
		}
		 $this->db->where('title',$id);
		$qq=$this->db->get();

		return $qq->result();
	}
	

	public function get_autocomplete($tname,$cname,$search_data)
	{
				$this->db->select('*');
			   	$this->db->from($tname);
                $this->db->like($cname,$search_data);
                $qq=$this->db->get();
			  	return $qq->result();
	}

	public function maxuser()
	{	
		 $this->db->select("pre.name,pre.photo1,pre.subname,pre_review.star,pre.addr,pre.pdf,pre.area,COUNT(pre_review.uid),pre_review.pid");
		$this->db->from('pre');
		$this->db->join('pre_review','pre.pid=pre_review.pid');
		$this->db->group_by('pre_review.pid'); 
 		$query = $this->db->get();
  		return $query->result();		
	}

	public function maxrate()
	{
		$this->db->select("pre.name,pre.photo1,pre.subname,pre_review.star,pre.addr,pre.pdf,pre.area,MAX(pre_review.star),pre_review.pid");
		$this->db->from('pre');
		$this->db->join('pre_review','pre.pid=pre_review.pid');
		$this->db->group_by('pre_review.pid'); 
		$this->db->order_by("star", "DESC");
 		$query = $this->db->get();
  		return $query->result();			
	}		


}

?>