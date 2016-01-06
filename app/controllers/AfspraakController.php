<?php
use Phalcon\Tag,
    \Phalcon\Security;

class AfspraakController extends BaseController
{


    public function indexAction()
    {
        Tag::setTitle("maak afspraak");
        $this->view->afspraak = Afspraak::find();
        $this->view->gebruiker = Gebruiker::find();
        $this->view->behandeling = Behandeling::find();

        $user = $this->session->get('auth');
        $rol = ($user['rol']);
        if($rol != "user")
        {
            $this->response->redirect("account/index");
        }
    }

    public function toevoegenAction()
    {
        if ($this->request->isPost()) {
            // get value from input fields
            $begintijd = $this->request->getPost("begintijd");
            $datum = $this->request->getPost("datum");
            $behandeling = $this->request->getPost("behandeling_id");
            $medewerker = $this->request->getPost("gebruiker_id");
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
                $result = $afspraak->save();
                // check if there's any invalid input
                if (!$result)
                    if (!$result) {
                        $output = [];
                        foreach ($afspraak->getMessages() as $message) {
                            $output[] = $message;
                        }
                        $output = implode("<br><br>", $output);
                        $this->flash->error($output);
                        $this->response->redirect('afspraak/index');
                        return;
                    }
                $message = "uw afspraak is " .$datum . " " . $begintijd. " bij  " .$medewerker;
                $message = wordwrap($message, 70, "\r\n");
                mail($email, 'Capelli Haarmode kappers afspraak', $message);
                $this->response->redirect('afspraak/overzicht');
            }
        }
    }

    public function overzichtAction(){
        Tag::setTitle("Mijn afspraken");
        $user = $this->session->get('auth');
        $rol = ($user['rol']);
        $id = $user['id'];
        $afspraak = Afspraak::find(["klant_id = '" .$id. "'
        "]);
        if($rol != "user")
        {
            $this->response->redirect("account/index");
        }
        $this->view->setVar('afspraak', $afspraak);
    }
}