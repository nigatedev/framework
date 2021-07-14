<?php
/*
 * This file is part of the Nigatedev PHP framework core Application
 * 
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */
 
namespace Nigatedev\Core;

use Nigatedev\Core\Request;
use Nigatedev\Core\Router;

/**
 * The Nigatedev PHP framework main core application class
 * 
 * @Author Abass Ben Cheik <abass@todaysdev.com>
 */
class Application {
  
  /**
   * @var Request $request
   */
  public Request $request;
  
  /**
   * @var Router $router
   */
  public Router $router;
  
  public function __construct()
  {
    $this->request = new Request();
    $this->router = new Router($this->request);
  }
  
  /**
   * @throws HTTP 404  Not Found \Exception if path doesn't match 
   * @return  Render views
   */
  public function run()
  {
    echo $this->router->pathResolver();
  }
}