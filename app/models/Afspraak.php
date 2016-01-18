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
    private $id;
    private $klant;
    private $begintijd;
    private $eindtijd;
    private $datum;
    private $gebruiker_id;
    private $klant_id;
    private $behandeling_id;


    public function getId()
    {
        return $this->id;
    }

    public function getKlant()
    {
        return $this->klant;
    }

    public function getBegintijd()
    {
        return $this->begintijd;
    }

    public function getEindtijd()
    {
        return $this->eindtijd;
    }

    public function getDatum()
    {
        return $this->datum;
    }

    public function getGebruiker_id()
    {
        return $this->gebruiker_id;
    }

    public function getKlant_id()
    {
        return $this->klant_id;
    }

    public function getBehandeling()
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