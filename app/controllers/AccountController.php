<?php

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 15-12-15
 * Time: 15:48
 */
use Phalcon\Tag;

class AccountController extends BaseController
{
    public function indexAction()
    {
        Tag::setTitle("login");
    }

    public function loginAction()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    }
}