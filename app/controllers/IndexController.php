<?php


use \Phalcon\Tag;

class IndexController extends BaseController
{
    public function indexAction()
    {
        Tag::setTitle("Home");
    }
}

