<?php
/*
 * This file is part of the Nigatedev PHP framework core Application
 * 
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */
 
namespace Nigatedev\Core;


/**
 * Routing generator classe
 * 
 * @Author Abass Ben Cheik <abass@todaysdev.com>
 */
class Router {
  
  /**
   * @var Request $request
   */
  public Request $request;
  
  public function __construct(Request $request)
  {
    $this->request = new Request();
  }
  
  protected array $routers = [];
  
  public function get($path, $callable)
  {
     $this->routers['get'][$path] = $callable;
  }
  
  /**
   * @return HTTP Request header method and request path
   */
  public function pathResolver()
  {
    $path = $this->request->getPath();
    $method = $this->request->getMethod();
    
    $callable = $this->routers[$method][$path] ?? false;
    
    if ($callable === false) {
      echo "Not Found";
      exit;
    }
      echo call_user_func($callable);
  }
}