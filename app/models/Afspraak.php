<?php
use \Phalcon\Mvc\Model\Validator,
    \Phalcon\Security;

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 25-11-15
 * Time: 13:27
 */
class Afspraak extends BaseModel
{
    public function initialize()
    {
        $this->belongsTo('behandeling_id', 'Behandeling', 'id', ['alias' => 'behandeling', 'reusable' => true]);
        $this->belongsTo('gebruiker_id', 'Gebruiker', 'id', ['alias' => 'gebruiker', 'reusable' => true]);
    }

    public function validation()
    {
        $this->validate(new  Validator\PresenceOf([
            'field' => 'behandeling_id',
            'message' => 'U heeft geen behandeling gekozen'
        ]));
        $this->validate(new  Validator\PresenceOf([
            'field' => 'gebruiker_id',
            'message' => 'U heeft geen medewerker gekozen'
        ]));
        $this->validate(new  Validator\PresenceOf([
            'field' => 'datum',
            'message' => 'U heeft geen datum gekozen'
        ]));
        $this->validate(new  Validator\PresenceOf([
            'field' => 'begintijd',
            'message' => 'U heeft geen begintijd gekozen'
        ]));
        if ($this->validationHasFailed()) {
            return false;
        }
    }
}