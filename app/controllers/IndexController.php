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
        $this->session->set('overons', [
            'name' => 'ugur',
            'age' => 22,
            'soon' => 'soforth']);
        $this->session->set('name', 'ugur');
    }

    public function generatePasswordAction($password)
    {
        echo $this->security->hash($password);
    }

    public function getSessionAction()
    {
        $user = $this->session->get('overons');
        print_r($user);
        echo $this->session->get('name');
    }

    public function removeSessionAction()
    {
        echo $this->session->remove('name');
    }

    public function destroySessionAction()
    {
        echo $this->session->destroy();
    }

    public function signoutAction()
    {
        echo $this->session->destroy();
        $this->response->redirect('index');
    }
}

