<?php
/*
 * This file is part of the Nigatedev PHP framework core Application
 *
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */
 
namespace Nigatedev;

use Nigatedev\Diyan\Diyan;
use Nigatedev\Http\Request;
use Nigatedev\Http\Response;
use Nigatedev\Router\Router;
use Nigatedev\Debugger\Debugger;
use Nigatedev\Config\Configurator;
use Nigatedev\Database\DB;
use Nigatedev\Exception\AppException;

/**
 * The Nigatedev PHP framework main core application class
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class App
{
  
    /**
     * @var App instance
     */
    public static App $app;
  
  
    /**
     * @var string $APP_ROOT
     */
    public static $APP_ROOT;
  
    /**
     * @var Diyan instance
     */
    public Diyan $diyan;
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
  
    /**
     * @var Debugger instance
     */
    public Debugger $debugger;
  
  
    /**
     * @var DB instance
     */
    public DB $db;
  
    /**
     * App constructor
     *
     * @param string $appRoot
     * @param array[] $configs
     */
    public function __construct(string $appRoot, array $configs)
    {
        self::$app = $this;
        self::$APP_ROOT = $appRoot;
        $this->request = new Request();
        $this->response = new Response();
        $this->debugger = new Debugger();
        $this->router = new Router($this->request);
        $this->diyan = new Diyan();
        $this->db = new DB($configs["db"]);
    }
    
    /**
     * @throw AppException
     *
     * @return void
     */
    public function run(): void
    {
        if (version_compare(Configurator::CURRENT_VERSION, Configurator::APP_MIN_VERSION, "<")) {
            throw new AppException(printf("Fatal: Your are using PHP version %s which is not enough to run Nigatedev app... minimum is %s", Configurator::CURRENT_VERSION, Configurator::APP_MIN_VERSION));
        }
        echo $this->router->pathResolver();
    }
}
