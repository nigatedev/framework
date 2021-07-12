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
  
  public function get($path, $callback)
  {
     $this->routers['get'][$path] = $callback;
  }
  
  /**
   * @return HTTP Request header method and request path
   */
  public function pathResolver()
  {
    $path = $this->request->getPath();
    $method = $this->request->getMethod();
    
    $callback = $this->routers[$method][$path] ?? false;
    
    if (!$callback) {
      echo "Not Found";
      exit;
    }
      echo call_user_func($callback);
  }
}