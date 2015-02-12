<?php
include_once "database.php";
class Model{
	private $tables;
	private $db;
	private $attrib=array();
	function __construct($db){
		$this->db=$db;
	}
	public function tables($t){
		$this->tables=$t;
		return $this;
	}
	public function attr($att){
		$this->attrib=$att;
		return $this;
	}
	public function getLastID(){
		$t=$this->tables[0];
		$query = "SELECT id FROM ".$t." ORDER BY id DESC LIMIT 1";
		$res=$this->db->query($query);
		if($res){
			$row=mysqli_fetch_array($res);
			return $row["id"];
			}
		else{
			return FALSE;
			}
		}
        public function getDelAndName($email){
                $t=$this->tables[0];
                $email= strtolower($email);
                $query = "Select name, del From $t where email ='$email' ";
                $res=$this->db->query($query);
                if($res && mysqli_num_rows($res)==1){
                $row=mysqli_fetch_array($res);
                 return $row;
               }
               else{
                 return FALSE;
                 }
              }
	public function insert($val){
		//INSERT INTO radmin(user,pass) VALUES('avi','f5d1278e8109edd94e1e4197e04873b9')
		$str="";
		$col="";
		$t="";
		if(sizeof($this->tables)>1){
			return FALSE;
		}else{
			$t=$this->tables[0];
		}
		
 	foreach ($val as $key=>$value) {
		 if(gettype($value) !="string"){
		 	$str.=strval($value).",";
		 }
		 else if (gettype($value)=="string"){
		 	$str.="'".$value."',";
		 }
	 }
	$str=substr($str,0, strlen($str)-1);
	$str= "(".$str.")";
	foreach ($this->attrib as $key => $value) {
		$col.=$value.",";
	}
	$col=substr($col, 0,strlen($col)-1);
	$col="(".$col.")";
	$query="INSERT INTO ".$t.$col." VALUES".$str;
	$res=$this->db->query($query);
	if($res){
		return True;
	}
	else{
		return FALSE;
	}
	} 
}
$c=new Model($d);
?>