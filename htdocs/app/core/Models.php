<?php
namespace app\core;

class Models{
	protected static $_connection;

	public function __construct(){
		$username = 'root';
		$password = '';
		$server = 'localhost';
		$dbname = 'healing_rehab';

		try{
			self::$_connection = new \PDO("mysql:host=$server;dbname=$dbname", 
				$username, $password);
			self::$_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		}catch(\Exception $e){
			exit(0);
		}


	}

	protected function isValid(){
		$reflection = new \ReflectionObject($this);
		$classProperties = $reflection->getProperties();
		foreach($classProperties as $property){
			$propertyAttributes = $property->getAttributes();
			foreach($propertyAttributes as $attribute){
				$test = $attribute->newInstance();
				if(!$test->isValidData($property->getValue($this))){
					return false;
				}	
			}
		}
		return true;
	}

	public function __call($method, $arguments){
		if($this->isValid()){
			call_user_func_array([$this, $method ], $arguments);
		}
	}
}