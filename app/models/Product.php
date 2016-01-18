<?php

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 1/18/16
 * Time: 2:37 PM
 */
class product extends BaseModel
{
    private $id;
    private $naam;
    private $beschrijving;
    private $img;

    public function getId()
    {
        return $this->id;
    }
    public function getNaam()
    {
        return $this->naam;
    }

    public function getBeschrijving()
    {
        return $this->beschrijving;
    }

    public function getImg()
    {
        return $this->img;
    }
    public function initialize()
    {

    }
}