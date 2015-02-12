<?php
//database connectivity class
class Database{
	private $DBNAME;
	private $HOST;
	private $pass;
	private $user;
	public $con;
	function __construct(){
		$this->DBNAME="";
		$this->HOST="";
		$this->pass="";
		$this->user="";
	}
	public function connect(){
		$con=mysqli_connect($this->HOST,$this->user,$this->pass,$this->DBNAME);
		if(mysqli_connect_errno()){
			echo "Failed";
		}
		else {
			$this->con=$con;
			return $this->con;
		}
	}
	public function close(){
		mysqli_close($this->con);
	}
	public function query($q){
		$f=mysqli_query($this->con,$q);
		if(!$f){
			return FALSE;
		}else{
		return $f;
		}
	}
}
class User{
	private $username;
	private $password;
	private $db;
	function __construct($username,$password,$db){
		$this->db=$db;
		$this->username=mysqli_real_escape_string($this->db->con,$username);
		$this->password=md5($password);
		
	}
	public function auth(){
		$q="SELECT user,pass FROM radmin where user='$this->username' AND pass='$this->password'";
		$res=$this->db->query($q);
		if(mysqli_num_rows($res)==1){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
	public function addUser(){
		$u=$this->username;
		$p=$this->password;
		$q="INSERT INTO radmin(user,pass) VALUES('$u','$p')";
		$res=$this->db->query($q);
		if($res){
			return TRUE;
		}
		else {
			echo "FAILED";
			return FALSE;
		}
	}
	public function login($redirect){
		$_SESSION['username']=$this->username;
		header("Location:'$redirect'");
	}
	public function logout($redirect){
		session_destroy();
		header("Location:'$redirect'");
	}
	
}
$d=new Database;
$d->connect();
//$u=new User('avi','tester',$d);
//$u->addUser(); 
?>