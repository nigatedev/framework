<?php
/*
 * This file is part of the Nigatedev PHP framework core Application
 * 
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */
 
namespace Nigatedev\Core\Http;

use Nigatedev\Diyan\Diyan;

/**
 * Routing generator classe
 * 
 * @Author Abass Ben Cheik <abass@todaysdev.com>
 */
class Router
{
   /**
    * @var Request
    */
    private Request $request;
    
   /**
    * @var Diyan
    */
    private Diyan $diyan;

    public function __construct(Request $request)
    {
        $this->request = new Request();
        $this->diyan = new Diyan();
    }

    protected array $routes = [];

    public function get($path, $callback)
    {
        $this->routes["get"][$path] = $callback;

    }
    
   /**
    * @return HTTP Request header method and request path
    */
    public function pathResolver () 
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();

        $callback = $this->routes[$method][$path] ?? false;
        
        if ($callback === false) {
          return "<h1>404 Not Found</h1>";
        }
        elseif(is_string($callback)) {
            return $this->diyan->render($callback);
        }

        return call_user_func($callback);

    }


}