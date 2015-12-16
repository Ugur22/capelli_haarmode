<?php

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 24-11-15
 * Time: 22:23
 */
use Phalcon\Tag;

class UserController extends BaseController
{
    public function indexAction()
    {
       // $user = users::find();
        Tag::setTitle("over ons");
       // $this->view->setVar('user',$user);
    }

    public function videoAction()
    {
        //$permalink = $this->dispatcher->getParam('permalink');
        //$user = users::findByPermalink($permalink);

        //$this->view->setVar('user',$user);

    }
}