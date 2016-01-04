<?php

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 7-12-15
 * Time: 20:49
 */
use \Phalcon\Mvc\Model\Validator,
    \Phalcon\Security;

class Gebruiker extends BaseModel
{
    public function initialize()
    {
        $this->hasMany('id', 'afspraak', 'gebruiker_id');
    }

    public function validation()
    {
        $this->validate(new  Validator\PresenceOf([
            'field' => 'email',
            'message' => 'U heeft geen email ingevoerd'
        ]));
        $this->validate(new  Validator\PresenceOf([
            'field' => 'username',
            'message' => 'U heeft geen username ingevoerd'
        ]));
        $this->validate(new  Validator\PresenceOf([
            'field' => 'password',
            'message' => 'U heeft geen password ingevoerd'
        ]));
        $this->validate(new  Validator\PresenceOf([
            'field' => 'voornaam',
            'message' => 'U heeft geen voornaam ingevoerd'
        ]));
        $this->validate(new  Validator\PresenceOf([
            'field' => 'achternaam',
            'message' => 'U heeft geen achternaam ingevoerd'
        ]));
        $this->validate(new  Validator\PresenceOf([
            'field' => 'telefoonnummer',
            'message' => 'U heeft geen telefoonnummer ingevoerd'
        ]));
        $this->validate(new  Validator\Email([
            'field' => 'email',
            'message' => 'geen correcte emailadres'
        ]));
        $this->validate(new  Validator\Uniqueness([
            'field' => 'email',
            'message' => 'dit emailadres is al in gebruik'
        ]));
        $this->validate(new Validator\Numericality([
            'field' => 'telefoonnummer',
            'message' => 'dit is geen geldige telefoonnummer'
        ]));
        $this->validate(new Validator\Regex([
            'field' => 'voornaam',
            'pattern' => "/[a-z]+/",
            'message' => 'dit is geen geldige voornaam'
        ]));
        $this->validate(new Validator\Regex([
            'field' => 'achternaam',
            'pattern' => "/[a-z]+/",
            'message' => 'dit is geen geldige achternaam'
        ]));
        $this->validate(new  Validator\StringLength([
            'field' => 'password',
            'max' => '30',
            'min' => '4',
            'messageMaximum' => 'password mag niet langer zijn dan 30 karakters',
            'messageMinimum' => 'password mag niet korter zijn dan 4 karakters'
        ]));
        if ($this->validationHasFailed()) {
            return false;
        }
        $security = new Security();
        $this->password = $security->hash($this->password);
    }
}