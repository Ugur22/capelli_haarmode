<?php
use Phalcon\Tag,
    \Phalcon\Security;

class AfspraakController extends BaseController
{


    public function indexAction()
    {
        // set title page
        Tag::setTitle("maak afspraak");
        // make rows from model accessible to the view
        $this->view->afspraak = Afspraak::find();
        $this->view->gebruiker = Gebruiker::find();
        $this->view->behandeling = Behandeling::find();

        $user = $this->session->get('auth');
        // check if role is user
        $rol = ($user['rol']);
        if($rol != "user")
        {
            $this->response->redirect("account/index");
        }
    }

    public function toevoegenAction()
    {
        // check if a post is committed
        if ($this->request->isPost()) {
            // get value from input fields
            $begintijd = $this->request->getPost("begintijd");
            $datum = $this->request->getPost("datum");
            $behandeling = $this->request->getPost("behandeling_id");
            $medewerker = $this->request->getPost("gebruiker_id");
            // check for duplicate row in the table
            $checkafspraak = Afspraak::findFirst([
                "begintijd = :begintijd: AND datum = :datum: AND gebruiker_id = :gebruiker_id:",
                "bind" => [
                    "begintijd" => $begintijd,
                    "datum" => $datum,
                    "gebruiker_id" => $medewerker
                ]
            ]);
            if ($checkafspraak) {
                $this->response->redirect('afspraak/index');
                $this->flash->error("deze combiniatie van datum, begintijd en medewerker is al bezet");
            } else {
                // store input values in model
                $endTime = strtotime($begintijd) + (30 * 60);
                $eindtijd = date("H:i", $endTime);
                $user = $this->session->get('auth');
                $email = $user['email'];
                $id = $user['id'];
                $voornaam = $user['voornaam'];
                $achternaam = $user['achternaam'];
                $tussenvoegsel = $user['tussenvoegsel'];
                $volledigenaam_spaces = $voornaam . " " . $tussenvoegsel . " " . $achternaam;
                // store values in a variable
                $afspraak = new Afspraak();
                $afspraak->begintijd = $begintijd;
                $afspraak->eindtijd = $eindtijd;
                $afspraak->datum = $datum;
                $afspraak->klant_id = $id;
                $afspraak->behandeling_id = $behandeling;
                $afspraak->gebruiker_id = $medewerker;
                $afspraak->klant = $volledigenaam_spaces;
                // create record in DB
                // create new row in table afspraken
                $result = $afspraak->save();
                // check if there's any invalid input
                if (!$result)
                    if (!$result) {
                        $output = [];
                        foreach ($afspraak->getMessages() as $message) {
                            $output[] = $message;
                        }
                        $output = implode("<br><br>", $output);
                        // display error invalid user input
                        $this->flash->error($output);
                        $this->response->redirect('afspraak/index');
                        return;
                    }
                // send verification mail with appointment details to user e-mail
                $message = "uw afspraak is " .$datum . " " . $begintijd. " bij  " .$medewerker;
                $message = wordwrap($message, 70, "\r\n");
                mail($email, 'Capelli Haarmode kappers afspraak', $message);
                $this->response->redirect('afspraak/overzicht');
            }
        }
    }

    public function overzichtAction(){
        Tag::setTitle("Mijn afspraken");
        // use session variable
        $user = $this->session->get('auth');
        $rol = ($user['rol']);
        $id = $user['id'];
        // display appointments where id equals session id from logged user
        $afspraak = Afspraak::find(["klant_id = '" .$id. "'
        "]);
        if($rol != "user")
        {
            $this->response->redirect("account/index");
        }
        $this->view->setVar('afspraak', $afspraak);
    }
}