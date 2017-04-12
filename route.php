<?php

/**
* Classe qui represente une route
*/
class Route
{
	
	private $path;
	private $callable;
	private $matches;

	/**
	 * Construct
	 * @param text $path 
	 * @param type $callable 
	 * @return bool
	 */
	function __construct($path, $callable)	{
		$this->path = trim($path, '/');
		$this->callable = $callable;
	}

	public function match($url){
		$url = trim($url, '/');
		$path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);

		$regex = "#^$path$#i";

		if (!preg_match($regex, $url, $matches)) {
			return FALSE;
		}
		array_shift($matches);
		$this->matches = $matches;
		return TRUE;
	}

	public function call(){
		return call_user_func_array($this->callable, $this->matches);
	}
}

