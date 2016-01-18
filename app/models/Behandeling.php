<?php

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 7-12-15
 * Time: 17:50
 */
class Behandeling  extends BaseModel
{
    private $id;
    private $behandeling;
    private $prijs;

    public function getId()
    {
        return $this->id;
    }

    public function getBehandeling()
    {
        return $this->behandeling;
    }

    public function getPrijs()
    {
        return $this->prijs;
    }
    public function initialize()
    {
        // asign behandeling id to a afspraak
        $this->hasMany('id','afspraak','behandeling_id');
    }
}