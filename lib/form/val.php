<?php

class val 
{
	public function __construct()
	{
		
	}
	
	public function minlength($data, $arg=array())
	{
		if (strlen($data) < $arg['length']) {
			return "Pole ".$arg['field'].' niem może być krótsze niż '. $arg['length']. " znaków";
		}
	}
	
	public function maxlength($data, $arg=array())
	{
		if (strlen($data) > $arg['length']) {
			return "Pole ". $arg['field'] . "Miusi mieć maksymalnie  ". $arg['length'] . " znaków";
		}
	}
	
	public function alphanumeric($data, $arg=array())
	{
	
		if(!preg_match("/^[a-z0-9]([0-9a-z_-\s])+$/i", $data)){
			return "Pole " .$arg['field']. " może przyjmować tylko cyfry i litery";
		}
	}
	
	public function digit($data, $arg)
	{
		if (ctype_digit($data) == false) {
			return "Pole ". $arg['field']. "może przyjmować tylko cyfry";
		}
	}
	
	
	
	public function __call($name, $arguments) 
	{
		throw new Exception("$name does not exist inside of: " . __CLASS__);
	}
	
}