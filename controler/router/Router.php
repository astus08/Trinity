<?php

include 'Route.php';

include 'RouterException.php';

/**
 * Class routeur pour des urls magnifiques.
 */
class Router
{
	private $url;
	private $routes = [];

	/**
	 * Constructeur
	 * @param string $url 
	 */
	function __construct($url){
		$this->url = $url;
	}

	/**
	 * recupère en GET l'url
	 * @param text $path 
	 * @param type $call 
	 */
	public function get($path, $callable){
		$route = new Route($path, $callable);
		$this->routes['GET'][] = $route;
	}

	/**
	 * recupère en POST l'url
	 * @param text $path 
	 * @param type $call 
	 */
	public function post($path, $callable){
		$route = new Route($path, $callable);
		$this->routes['POST'][] = $route;
	}

	/**
	 * Verifie si l'url entrée correspond à quelquechose
	 * @return type
	 */
	public function run(){
		if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
			throw new RouterException("REQUEST_METHOD does not exist");
		}

		foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
			if ($route->match($this->url)) {
				return $route->call();
			}
		}

		throw new RouterException("No matching route");
		
		
	}

}

?>