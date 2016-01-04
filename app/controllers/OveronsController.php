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
       // $overons = users::find();
        Tag::setTitle("over ons");
       // $this->view->setVar('overons',$overons);
    }

    public function videoAction()
    {
        //$permalink = $this->dispatcher->getParam('permalink');
        //$overons = users::findByPermalink($permalink);

        //$this->view->setVar('overons',$overons);

    }
}