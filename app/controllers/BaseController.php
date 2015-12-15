<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;

class BaseController extends controller
{
    public function initialize()
    {
        // CSS imports
        $this->assets
            ->collection('header')
            ->addCss('https://fonts.googleapis.com/css?family=Indie+Flower')
            ->addCss('css/datepicker.css')
            ->addCss('css/materialize.min.css')
            ->addCss('http://fonts.googleapis.com/icon?family=Material+Icons')
            ->addCss('css/style.css');
        // Javascripts imports
        $this->assets
            ->collection('footer')
            ->addJs('js/materialize.min.js')
            ->addJs('js/script.js')
            -> addJs('js/picker.js')
            -> addJs('js/picker.date.js')
            ->addJs('js/picker.time.js');
    }
}