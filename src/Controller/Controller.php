<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */
   
namespace Nigatedev\Core\Controller;

use Nigatedev\Core\App;

/**
 * App core controller class
 *
 * @author Abass Ben Cheik <abass@todaysdev.com>
 */
class Controller
{
    
    /**
     * @param string $view
     * @param string[] $params
     *
     * @return mixed
     */
    public function render(string $view, array $params = [])
    {
        return App::$app->diyan->render($view, $params);
    }
}
