<?php

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 7-12-15
 * Time: 17:50
 */
class Behandeling  extends BaseModel
{

    public function initialize()
    {
        $this->hasMany('id','afspraak','behandeling_id');
    }
}