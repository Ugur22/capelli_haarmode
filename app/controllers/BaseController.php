<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;
use Phalcon\Tag;

class BaseController extends controller
{
    public function initialize()
    {
        Tag::prependTitle("Capelli Haarmode");
        // CSS imports
        $this->assets
            // create collection of CSS import
            ->collection('header')
            ->addCss('https://fonts.googleapis.com/css?family=EB+Garamond')
            ->addCss('css/datepicker.css')
            ->addCss('css/materialize.min.css')
            ->addCss('http://fonts.googleapis.com/icon?family=Material+Icons')
            ->addCss('css/style.css');
        // JS imports
        $this->assets
            // create collection of JS import
            ->collection('footer')
            ->addJs('js/materialize.min.js')
            ->addJs('js/script.js')
            -> addJs('js/picker.js')
            -> addJs('js/picker.date.js')
            ->addJs('js/picker.time.js');
    }
}