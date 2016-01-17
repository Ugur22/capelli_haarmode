<?php

/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 15-12-15
 * Time: 21:34
 */
use Phalcon\Tag;

class AdminController extends BaseController
{
    public function indexAction()
    {
        // set a tile page
        Tag::setTitle("admin pagina");
    }

    public function overzichtAction()
    {
        Tag::setTitle("overzicht afspraken");
        $user = $this->session->get('auth');
        $rol = ($user['rol']);
        // checks if role is admin so that only admins can access this page
        if ($rol != "admin") {
            $this->response->redirect("account/index");
        }
        // variable to display all appointments from the model afspraken
        $afspraak = Afspraak::find();
        // make variable accessible for the view
        $this->view->setVar('afspraak', $afspraak);
    }

    public function verwijderAction($id)
    {
        // find id of selected appointments
        $afspraak = Afspraak::find($id);
        // check if id exists
        if (!$afspraak) {
            echo "afspraak bestaat niet";
            die;
        }
        // delete appointment from the table
        $result = $afspraak->delete();
        $this->response->redirect('admin/overzicht');
        if (!$result) {
            print_r($afspraak->getMessages());
        }
    }

    public function detailAction($id)
    {
        // find id of selected appointment
        $afspraak = Afspraak::findById($id);
        // variable to display all users from the model Gebruiker
        $this->view->gebruiker = Gebruiker::find();
        // variable to display all Behandelingen from the model Behandeling
        $this->view->behandeling = Behandeling::find();
        // make variable accessible for the view
        $this->view->setVar('afspraak', $afspraak);
        $this->view->setVar('id', $id);
    }

    public function wijzigAction()
    {
        if ($this->request->isPost()) {
            // get the value form input fields
            $begintijd = $this->request->getPost("begintijd");
            $id = $this->request->getPost("id");
            $datum = $this->request->getPost("datum");
            $medewerker = $this->request->getPost("gebruiker_id");
            $behandeling = $this->request->getPost("behandeling_id");
            // check for duplicate appointments
            $checkafspraak = Afspraak::findFirst([
                "begintijd = :begintijd: AND datum = :datum: AND gebruiker_id = :gebruiker_id: AND id != :id:",
                "bind" => [
                    "begintijd" => $begintijd,
                    "datum" => $datum,
                    "gebruiker_id" => $medewerker,
                    "id" => $id
                ]
            ]);
            if ($checkafspraak) {
                // display message  appointment already taken
                $this->response->redirect('admin/detail/' . $id);
                $this->flash->error("deze combiniatie van datum, begintijd en medewerker is al bezet");
            } else {
                $afspraak = Afspraak::findFirstById($id);
                if (!$afspraak) {
                    echo "afspraak does not exist";
                    die;
                }
                // set input values equal to a row in the table
                $afspraak->datum = $datum;
                $afspraak->begintijd = $begintijd;
                $afspraak->behandeling_id = $behandeling;
                $afspraak->gebruiker_id = $medewerker;
                // update selected appointment
                $result = $afspraak->update();
                if (!$result) {
                    $output = [];
                    foreach ($afspraak->getMessages() as $message) {
                        $output[] = $message;
                    }
                    $output = implode("<br><br>", $output);
                    // display invalid input form user
                    $this->flash->error($output);
                    $this->response->redirect('admin/detail/' . $id);
                    return;
                }
                $this->response->redirect('admin/overzicht');
            }
        }
    }
}
