<?php
/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 24-11-15
 * Time: 23:27
 */
$router = new \Phalcon\Mvc\Router();

$router->add('/video/{permalink}', array(
    'controller' => 'user',
    'action' => 'video',
));

$router->add('/overzicht}', array(
    'controller' => 'afspraak',
    'action' => 'overzicht',
));




return $router;
