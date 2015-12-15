<?php
use Phalcon\Mvc\Model\Validator;
use Phalcon\Mvc\Model\Validator\PresenceOf;

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 25-11-15
 * Time: 13:27
 */
class Afspraak extends BaseModel
{
    public $begintijd;

    public function initialize()
    {
        $this->belongsTo('behandeling_id', 'Behandeling', 'id', ['alias' => 'behandeling', 'reusable' => true]);
        $this->belongsTo('gebruiker_id', 'Gebruiker', 'id', ['alias' => 'gebruiker', 'reusable' => true]);
    }

    public function getBegintijd()
    {
        return $this->begintijd;
    }
}