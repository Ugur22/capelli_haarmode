<?php

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 15-12-15
 * Time: 21:34
 */
use Phalcon\Tag;

class AdminController extends BaseController
{
    public function indexAction()
    {
        Tag::setTitle("admin pagina");
    }

    public function overzichtAction()
    {
        Tag::setTitle("overzicht afspraken");
        $afspraak = Afspraak::find();
        $this->view->setVar('afspraak', $afspraak);
    }
}