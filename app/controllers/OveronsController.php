<?php

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 24-11-15
 * Time: 22:23
 */
use Phalcon\Tag;

class OveronsController extends BaseController
{
    public function indexAction()
    {
        Tag::setTitle("over ons");
    }
}