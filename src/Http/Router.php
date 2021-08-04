<?php
/*
 * This file is part of the Nigatedev PHP framework core Application
 *
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */

namespace Nigatedev\Core\Http;

use Nigatedev\Diyan\Diyan;
use Nigatedev\Core\App;
use Nigatedev\Core\Debugger\Debugger;

/**
 * Route generator
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class Router extends Debugger
{
    /**
     * @var Request instance
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

    public function __construct(Request $request)
    {
        $this->response = new Response();
        $this->request = new Request();
        $this->diyan = new Diyan();
    }

    protected array $routes = [];

    public function get($path, $callback)
    {
        $this->routes["get"][$path] = $callback;
    }
    public function load($callback)
    {
        $callback = require_once($callback);
      
        foreach ($callback as $key => $value) {
            $this->routes["get"][$key] = $value;
        }
    }

    /**
     * @throws HTTP \Exception 404  Not Found
     *
     * @return HTTP Request header method and  uri
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
