<?php
class Validate{
	private $request;
	private $fields=array();
	function __construct($req,$prop){
		$this->request=$req;
		$this->fields=$prop;
	}
	public function display(){
		foreach ($this->request as $key => $value) {
			echo $key."=".$value;	
		}
	}
	public function check(){
		$name=$this->request["name"];
		$reg=$this->request["reg"];
		$email=$this->request["email"];
		$phno=$this->request["pno"];
		if($this->name($name) && $this->reg($reg) && $this->email($email) && $this->phone($phno) ){
			return true;
			}
		else 
			return False;
	}
	public function name($val){
		if(preg_match("/^[a-zA-Z\\s]+$/", $val)){
		return TRUE;
	}
		else {
			return False;
		}
	}
	private function reg($val){
		$len=strlen($val);
		if($len==9 && filter_var($val,FILTER_VALIDATE_INT)){
			return True;
		}
		else {
			return FALSE;
		}
	}
	private function email($val){
		if(filter_var($val,FILTER_VALIDATE_EMAIL)){
			return True;
		}
		else return False;
	}
	private function phone($val){
		$len=strlen($val);
		if($len==10 && preg_match("/^[0-9]+$/", $val)){
			return True;
		}else
			echo "wronh phone";
			echo $len;
			return False;
	}
	
}
?>