<?php
/*
 * This file is part of the Nigatedev PHP framework core Application
 *
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Core\Router;

use Nigatedev\Core\App;
use Nigatedev\Core\Http\Request;
use Nigatedev\Core\Http\Response;
use Nigatedev\Diyan\Diyan;
use Nigatedev\Core\Debugger\Debugger;
/**
 * Route generator
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class Router extends Debugger
{
    /**
     * @var Request
     */
    private Request $request;

    /**
     * @var Response instance
     */
    private Response $response;

    /**
     * @var Diyan instance
     */
    public Diyan $diyan;
    
    /**
     * @var array[] $routes
     */
    protected $routes = [];

    public function __construct(Request $request)
    {
        $this->response = new Response();
        $this->request = new $request;
        $this->diyan = new Diyan();
    }

    /**
     * @param string $path
     * @param string $callback
     *
     * @return void
     */
    public function get(string $path, string $callback): void
    {
        $this->routes["get"][$path] = $callback;
    }
    
    /**
     * @return void
     */
    public function load(string $callback)
    {
        $callback = require_once($callback);
      
        foreach ($callback as $key => $value) {
            $this->routes["get"][$key] = $value;
        }
    }

    /**
     * @throw CoreAppException
     *
     * @return mixed
     */
    public function pathResolver()
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();

        $callback = $this->routes[$method][$path] ?? false;


        if (is_string($callback)) {
            return $this->diyan->render($callback);
        }

        if ($path === "/") {
            $home = isset($this->routes[$method]["/"]) ?? false;
            if (!$home) {
                $this->response->setStatusCode(404);
                if ($this->getDebugMode()) {
                    $this->diyan->setBody($this->diyan->getHomeNotFound());
                } else {
                    $this->diyan->setBody($this->diyan->getNotFound());
                }
                return $this->diyan->render(null, []);
            }
        }

        if ($callback === false) {
            $this->response->setStatusCode(404);
            $this->diyan->setBody($this->diyan->getNotFound());
            return $this->diyan->render(null, []);
        }

        if (is_array($callback)) {
            if (!class_exists($callback[0])) {
                $this->response->setStatusCode(404);
                $this->diyan->setBody($this->diyan->getNotFound());
                return $this->diyan->render(null, []);
            } else {
                $callback[0] = new $callback[0];
            }
        }
        echo call_user_func($callback);
    }
}
