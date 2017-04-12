<?php

/**
* Classe qui represente une route
*/
class Route
{
	
	private $path;
	private $callable;
	private $matches = [];
	private $params = [];

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
		$path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->path);

		$regex = "#^$path$#i";

		if (!preg_match($regex, $url, $matches)) {
			return FALSE;
		}
		array_shift($matches);
		$this->matches = $matches;
		return TRUE;
	}

	private function paramMatch($match){
		if (isset($this->params[$match[1]])) {
			return '('.$this->params[$match[1]].')';		
		}

		return '([^/]+)';
	}

	public function call(){

		var_dump($this->matches);
		return call_user_func_array($this->callable, $this->matches);
	}

	public function with($param, $regex){
		$this->params[$param] = $regex;
		return $this;
	}

}

