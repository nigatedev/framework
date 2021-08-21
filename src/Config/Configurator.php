<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 * (c) Abass Ben Cheik <abass@todaysdev.com>
 */
 
namespace Nigatedev\Config;

use Nigatedev\App;
use Nigatedev\Filesystem\Filesystem;
use Nigatedev\Database\Config as DBConfig;

/**
 * Global Configurator
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class Configurator
{
   
   /**
    * @var Filesystem
    */
    private Filesystem $filesystem;
    
    /**
     * @var string
     */
      const APP_MIN_VERSION = "7.3";
     
    /**
     * @var string
     */
      const CURRENT_VERSION = PHP_VERSION;
     
     /**
      * @var Config
      */
     private $dbConfig;
     
    /**
     * Constructor
     * 
     * @param string $ROOT
     */
    public function __construct($ROOT)
    {
        $this->filesystem = new Filesystem($ROOT);
    }
    
    /**
     * @var string
     */
    private $controllerDir;
     
    /**
     * @var string
     */
    private $viewsDir;
    /**
     * Set controllers directory
     *
     * @param string $controllerDir
     * @return void
     */
    public function setControllerDir(string $controllerDir): void
    {
        $this->controllerDir = (string)$this->filesystem->isDir(Filesystem::$ROOT.$controllerDir);
    }
     
    /**
     * Get controllers directory
     *
     * @return string
     */
    public function getControllerDir(): string
    {
        return $this->controllerDir ?? (string)$this->filesystem->isDir(Filesystem::$ROOT."/src/Controller");
    }
     
     
    /**
     * Set views directory
     *
     * @param string $viewsDir
     * @return void
     */
    public function setViewsDir(string $viewsDir): void
    {
        $this->viewsDir = (string)$this->filesystem->isDir(Filesystem::$ROOT.$viewsDir);
    }
     
    /**
     * Get views directory
     *
     * @return string
     */
    public function getViewsDir(): string
    {
        return $this->viewsDir ?? (string)$this->filesystem->isDir(Filesystem::$ROOT."/views");
    }
     
    /**
     * Get all configs
     *
     * @return mixed
     */
    public function configGlobals()
    {
        return [
          "db" => DBConfig::getConfig(),
             "controllerDir" => $this->getControllerDir(),
             "viewsDir" => $this->getViewsDir(),
      ];
    }
     
}
