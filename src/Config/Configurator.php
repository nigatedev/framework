<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */
 
namespace Nigatedev\Config;

use Nigatedev\Filesystem\Filesystem;
use Nigatedev\App;

/**
 * Global Configurator
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
 class Configurator {
   
   /**
    * @var Filesystem $fileSystem;
    */
    private Filesystem $filesystem;
    
   public function __construct($ROOT)
   {
     $this->filesystem = new Filesystem($ROOT);
   }
   /**
    * @var static self array[] $configs
    */
    protected array $configs = [];
    
    /**
     * @var string $controllerDir
     */
     private $controllerDir;
     
    /**
     * @var string $viewsDir
     */
     private $viewsDir;
     
    /**
     * Get all configs
     * 
     */
     public function globals()
     {
         $this->configs = [
              "db" => [
                  "dsn"      => $_ENV["DSN"] ?? "",
                  "user"     => $_ENV["DB_USER"] ?? "",
                  "password" => $_ENV["DB_PASSWORD"] ?? ""
              ],
              "controllerDir" => $this->getControllerDir(),
              "viewsDir" => $this->getViewsDir(),
        ];
      return $this->configs;
     }
     
     /**
      * Set controllers directory
      * 
      * @param string $controllerDir
      * @return void
      */
     public function setControllerDir(string $controllerDir): void
     {
       $this->controllerDir = $this->filesystem->isDir(Filesystem::$ROOT.$controllerDir);
     }
     
     /**
      * Get controllers directory
      * 
      * @return string
      */
     public function getControllerDir(): string
     {
       return $this->controllerDir ?? $this->filesystem->isDir(Filesystem::$ROOT."/src/Controller");
     }
     
     
     /**
      * Set views directory
      * 
      * @param string $viewsDir
      * @return void
      */
     public function setViewsDir(string $viewsDir): void
     {
       $this->viewsDir = $this->filesystem->isDir(Filesystem::$ROOT.$viewsDir);
     }
     
     /**
      * Get views directory
      * 
      * @return string
      */
     public function getViewsDir(): string
     {
       return $this->viewsDir ?? $this->filesystem->isDir(Filesystem::$ROOT."/views");
     }
     
 }