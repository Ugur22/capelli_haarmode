<?php

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 7-12-15
 * Time: 17:50
 */
class Behandeling  extends BaseModel
{
    public $id;
    public $behandeling;
    public $prijs;

    public function getId()
    {
        return $this->id;
    }

    public function getbehandeling()
    {
        return $this->behandeling;
    }

    public function getprijs()
    {
        return $this->prijs;
    }
    public function initialize()
    {
        // asign behandeling id to a afspraak
        $this->hasMany('id','afspraak','behandeling_id');
    }
}