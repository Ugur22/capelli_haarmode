<?php


use \Phalcon\Tag;

class IndexController extends BaseController
{
    public function indexAction()
    {
        // set title page
        Tag::setTitle("Home");
    }
}

