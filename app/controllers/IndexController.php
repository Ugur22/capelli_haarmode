<?php


use \Phalcon\Tag;

class IndexController extends BaseController
{
    public function indexAction()
    {
        // set title page
        Tag::setTitle("Home");
        $behandeling = Behandeling::find();
        $product  = Product::find();
        $this->view->setVar('behandeling', $behandeling);
        $this->view->setVar('product', $product);
    }
}

