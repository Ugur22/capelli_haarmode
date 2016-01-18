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
    public $id;
    public $klant;
    public $begintijd;
    public $eindtijd;
    public $datum;
    public $gebruiker_id;
    public $klant_id;
    public $behandeling_id;


    public function getId()
    {
        return $this->id;
    }

    public function getklant()
    {
        return $this->klant;
    }

    public function getbegintijd()
    {
        return $this->begintijd;
    }

    public function geteindtijd()
    {
        return $this->eindtijd;
    }

    public function getdatum()
    {
        return $this->datum;
    }

    public function getgebruikers_id()
    {
        return $this->gebruiker_id;
    }

    public function getklant_id()
    {
        return $this->klant_id;
    }

    public function getbehandeling()
    {
        return $this->behandeling_id;
    }


    public function initialize()
    {
        // assign behandeling table to afspraak table through a foreign key
        $this->belongsTo('behandeling_id', 'Behandeling', 'id', ['alias' => 'behandeling', 'reusable' => true]);
        // assign } table to afspraak table through a foreign key
        $this->belongsTo('gebruiker_id', 'Gebruiker', 'id', ['alias' => 'gebruiker', 'reusable' => true]);
    }

    public function validation()
    {
        // checks if fields in afspraken page has an empty value
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