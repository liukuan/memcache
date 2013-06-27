<?php
class mcache extends Memcache
{
	public $def_host = 'localhost'; 
	public $def_port = '12000';
	public function __construct($host = null,$port = null){
		$host = isset($host)?$host:$this->def_host;
		$port = isset($port)?$port:$this->def_port;
		if(!$this->connect($host,$port)){
			return false;
		}
	}
	
	public function _get($name,$val=null){
		$this->Fkey = false;
		$name = isset($val['0'])?$name.'_'.$val['0']:$name;
		return $this->get($name);
	}
	
	public function _set($name,$val=null){
		$name = isset($val['1'])?$name.'_'.$val['1']:$name;
		if(isset($val['0']))$this->set($name,$val['0']);
		$this->Fkey = false;
		return $this;
	}
	
	public function _rep($name,$val=null){
		$name = isset($val['1'])?$name.'_'.$val['1']:$name;
		if(isset($val['0']))$this->replace($name,$val['0']);
		$this->Fkey = false;
		return $this;
	}
	
	public function _del($name,$val=null){
		$name = isset($val['0'])?$name.'_'.$val['0']:$name;
		$this->delete($name);
		$this->Fkey = false;
		return $this;
	}
	
	public function _inc($name,$val=null){
		if($this->increment($name)===false){
			$num = isset($val['0'])?$val['0']:1;
			$this->set($name,$num);
		}
		$this->Fkey = false;
		return $this->get($name);
	}
	
	public function _dec($name,$val=null){
		if($this->decrement($name)===false){
			$num = isset($val['0'])?$val['0']:0;
			$this->set($name,$num);
		}
		$this->Fkey = false;
		return $this->get($name);
	}
	
	public function _Error($name,$val){
		$this->Fkey = false;
		$Error = "Fatal error: ";
		$Error .= "Call to undefined method ";
		$Error .= __class__."::".$name."()\r\n";
		throw new Exception($Error);
	}
	
	public $Fkey = false;
	public function __call($name,$val=null){
		if($this->Fkey===false){
			$this->Fkey = $name;
			$uname = substr($name,3);
			$function = '_'.substr($name,0,3);
			return $this->$function($uname,$val);
		}else return $this->_Error($this->Fkey,$val);
	}
	
	public static $_instance;
	public static function getInstance()
	{
		if(null === self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
}
