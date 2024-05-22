<?php

namespace Framework;

class Router
{
    protected $routes = [];

    function add(string $method, string $path, array $controller)
    {
        $path = $this->normalisePath($path);
        $this->routes[] = [
            "path" => $path,
            "method" => strtoupper($method),
            "controller" => $controller,
        ];
    }

    function normalisePath(string $path)
    {
        $path = trim($path, "/");
        $path = "/" . $path . "/";
        $path = preg_replace('#[/]{2,}#', '/', $path);

        return $path;
    }

    public function dispatch(string $path, string $method)
    {
        $path = $this->normalisePath($path);
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            if (
                !preg_match("#^{$route['path']}$#", $path) ||
                $route['method'] !== $method
            ) {
                continue;
            }

            [$class, $function] = $route['controller'];

            $controllerInstance = new $class;

            $controllerInstance->{$function}();
        }
    }
}
