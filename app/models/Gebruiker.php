<?php

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 7-12-15
 * Time: 20:49
 */
class Gebruiker extends BaseModel
{
    public function initialize()
    {
        $this->hasMany('id','afspraak','gebruiker_id');
    }


}