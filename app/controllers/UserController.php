<?php

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 24-11-15
 * Time: 22:23
 */
class UserController extends BaseController
{
    public function indexAction()
    {
       // $user = users::find();

<<<<<<< HEAD
        //$this->view->setVar('user',$user);
=======
       // $this->view->setVar('user',$user);
>>>>>>> c241f81af481f719015c2e4eea6a16cd129e0f8b
    }

    public function videoAction()
    {
        //$permalink = $this->dispatcher->getParam('permalink');
<<<<<<< HEAD
       // $user = users::findByPermalink($permalink);

       // $this->view->setVar('user',$user);
=======
        //$user = users::findByPermalink($permalink);

        //$this->view->setVar('user',$user);
>>>>>>> c241f81af481f719015c2e4eea6a16cd129e0f8b

    }
}
