<?php


use \Phalcon\Tag;

class IndexController extends BaseController
{
    public function indexAction()
    {
        Tag::setTitle("Home");
    }

    public function startSessionAction()
    {
        $this->session->set('user', [
            'name' => 'ugur',
            'age' => 22,
            'soon' => 'soforth']);
        $this->session->set('name', 'ugur');
    }

    public function getSessionAction()
    {
        $user = $this->session->get('user');
        print_r($user);
        echo  $this->session->get('name');
    }

    public function removeSessionAction()
    {
        echo $this->session->remove('name');
    }

    public function destroySessionAction()
    {
        echo $this->session->destroy();
    }
}

