<?php

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 15-12-15
 * Time: 15:31
 */
use Phalcon\Tag;

class ContactController extends BaseController
{
    public function indexAction()
    {
        Tag::setTitle("contact");
    }

}