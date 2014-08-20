<?php
namespace framework\http;

/**
 * An object representing a get request
 * 
 * @author Kaleb Woldeargay<contactkaleb@gmail.com>
 *
 */
class Request
{
	private $collected = array();
	
	private $sealed = false;
	
	public function __set($key, $value)
	{
		if (!$this->sealed && !isset($this->collected[$key])) {
			$this->collected[$key] = $value;
		}
	}
	
	public function __get($key)
	{
		if (!$this->sealed) {
			return $this->collected[$key];
		}
		throw new \Exception('Trying to access sealed method');
	}
	
	public function getParam($key)
	{
		if (isset($this->collected[$key])) {
			return $this->collected[$key];
		}
		
		return null;
	}
	
	public function sealRequest()
	{
		if (!$this->sealed) {
			$this->sealed = true;
		}
	}
}