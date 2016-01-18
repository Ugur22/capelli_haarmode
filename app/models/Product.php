<?php

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 1/18/16
 * Time: 2:37 PM
 */
class product extends BaseModel
{
    public $id;
    public $naam;
    public $beschrijving;
    public $img;

    public function getId()
    {
        return $this->id;
    }
    public function getnaam()
    {
        return $this->naam;
    }

    public function getbeschrijving()
    {
        return $this->beschrijving;
    }

    public function getimg()
    {
        return $this->img;
    }
    public function initialize()
    {

    }
}