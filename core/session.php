<?php 
namespace App\Core;
class Session
{	
	public $ses_type;
	function __construct($ses_type){
		session_start();
		$this->ses_type = $ses_type;
	}
	public function is_logged_in(){
		return isset($_SESSION[$this->ses_type]) ? true : false;
	}

	public function login($new_id){
		$_SESSION[$this->ses_type] = $new_id;
	}
	
	public function logout(){
		unset($_SESSION[$this->ses_type]);
	}

	public function set_msg($var_name,$value){
		if (isset($_SESSION[$var_name])) $_SESSION[$var_name].="<br>{$value}";
		else{
			$_SESSION[$var_name]=$value;
		}
	}
	public function unset_msg($var_name){
		unset($_SESSION[$var_name]);
	}
	public function get_msg($var_name){
		return ($_SESSION[$var_name]);
	}
}

?>