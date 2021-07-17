<?php
/*
 * This file is part of the Nigatedev PHP framework core Application
 * 
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */
 
namespace Nigatedev\Core;

use Nigatedev\Trunk;
use Nigatedev\Diyan\Diyan;
use Nigatedev\Core\Http\Request;
use Nigatedev\Core\Http\Response;
use Nigatedev\Core\Http\Router;
/**
 * The Nigatedev PHP framework main core application class
 * 
 * @Author Abass Ben Cheik <abass@todaysdev.com>
 */
class App extends Trunk
{
  
    /**
     * @var App instance
     */
    public static App $app;
  
    /**
     * @var Trunk instance
     */
    public Trunk $trunk;
  
    /**
     * @var Diyan instance
     */
    public Diyan $diyan;
  
    /**
     * @var App instance
     */
    public static $APP_ROOT;
  
    /**
     * @var Response instance
     */
    public Response $response;
  
    /**
     * @var Request instance
     */
    public Request $request;
  
    /**
     * @var Router instance
     */
    public Router $router;
  
  
    public function __construct($appRoot)
    {
        $this->trunk = new Trunk();
        $this->diyan = new Diyan();
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request);
        self::$app = $this;
        self::$APP_ROOT = $appRoot;
    }
  
    /**
     * @throws HTTP \Exception 404  Not Found 
     * 
     * @return render view
     */
    public function run()
    {
        echo $this->router->pathResolver();
    }
}