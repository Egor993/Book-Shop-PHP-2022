<?php

namespace App\Components;

class Router
{
	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = require($routesPath);
	}

	private function getURI(): string
	{
		if (!empty($_SERVER['REQUEST_URI'])) {
		return trim($_SERVER['REQUEST_URI'], '/');
		}
	}

	public function run(): void
	{
		$uri = $this->getURI();

		foreach ($this->routes as $uriPattern => $path) {

			if(preg_match("~$uriPattern~", $uri)) {
				// Получаем внутренний путь из внешнего согласно правилу.
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

				$segments = explode('/', $internalRoute);

				$controllerName = array_shift($segments).'Controller';
				$controllerName = ucfirst($controllerName);

				$controllerFile = ROOT . '/controllers/' .$controllerName. '.php';

				if (file_exists($controllerFile)) {
					require_once($controllerFile);
				}

				break;
			}
		}
	}
}