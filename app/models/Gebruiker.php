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
        //assign gebruiker id to a afspraak
        $this->hasMany('id', 'afspraak', 'gebruiker_id');
    }

    public function validation()
    {
        // check for empty fields
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
        // check if field contains a correct format email
        $this->validate(new  Validator\Email([
            'field' => 'email',
            'message' => 'geen correcte emailadres',
            'allowEmpty' => true
        ]));
        // check if email is unique in the DB
        $this->validate(new  Validator\Uniqueness([
            'field' => 'email',
            'message' => 'dit emailadres is al in gebruik',
            'allowEmpty' => true
        ]));
        // check if username is unique in the DB
    	$this->validate(new  Validator\Uniqueness([
            'field' => 'username',
            'message' => 'deze username is al in gebruik',
            'allowEmpty' => true
        ]));
        // checks if phonenumber is of a numerical value
        $this->validate(new Validator\Numericality([
            'field' => 'telefoonnummer',
            'message' => 'dit is geen geldige telefoonnummer',
            'allowEmpty' => true

        ]));
        // checks if phonenumber has a StringLength of min 10 and max 10 numbers
        $this->validate(new  Validator\StringLength([
            'field' => 'telefoonnummer',
            'max' => '10',
            'min' => '10',
            'messageMaximum' => 'telefoonnummer mag niet langer zijn dan 10 karakters',
            'messageMinimum' => 'telefoonnummer mag niet korter zijn dan 10 karakters',
            'allowEmpty' => true
        ]));
        // checks if password has a StringLength of max 30 and min 4
        $this->validate(new  Validator\StringLength([
            'field' => 'password',
            'max' => '30',
            'min' => '4',
            'messageMaximum' => 'password mag niet langer zijn dan 30 karakters',
            'messageMinimum' => 'password mag niet korter zijn dan 4 karakters',
            'allowEmpty' => true
        ]));
        if ($this->validationHasFailed()) {
            return false;
        }
        $security = new Security();
        // hashes given password to bcrypt hash. This hash has 61 characters
        $this->password = $security->hash($this->password);
    }
}
