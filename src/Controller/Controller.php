<?php
/*
 * This file is part of the Nigatedev PHP framework package
 *
 *  (c) Abass Ben Cheik <abass@todaysdev.com>
 */
 
namespace Nigatedev\Core\Controller;

use Nigatedev\Core\App;

/**
 * App core controller
 *
 * @Author Abass Ben Cheik <abass@todaysdev.com>
 */
class Controller
{
    
    /**
     * @param $view Diyan template engine view render
     *
     * @return view template
     */
    public function render($view, $params = [])
    {
        return App::$app->diyan->render($view, $params);
    }
}
