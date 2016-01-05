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
        Tag::setTitle("admin pagina");
    }

    public function overzichtAction()
    {
        Tag::setTitle("overzicht afspraken");
        $user = $this->session->get('auth');
        $rol = ($user['rol']);
        if($rol != "admin")
        {
            $this->response->redirect("account/index");
        }
        $afspraak = Afspraak::find();
        $this->view->setVar('afspraak', $afspraak);
        $loginnaam = ($user['voornaam']);
        $this->view->setVar("loginnaam", $loginnaam);
    }

    public function verwijderAction($id)
    {
        $afspraak = Afspraak::find($id);
        if (!$afspraak) {
            echo "afspraak bestaat niet";
            die;
        }
        $result = $afspraak->delete();
        $this->response->redirect('admin/overzicht');
        if (!$result) {
            print_r($afspraak->getMessages());
        }
    }

    public function detailAction($id)
    {
        $afspraak = Afspraak::findById($id);
        $this->view->gebruiker = Gebruiker::find();
        $this->view->behandeling = Behandeling::find();
        $this->view->setVar('afspraak', $afspraak);
        $this->view->setVar('id', $id);
    }

    public function wijzigAction()
    {
        if ($this->request->isPost()) {
            $begintijd = $this->request->getPost("begintijd");
            $id = $this->request->getPost("id");
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
                $this->response->redirect('admin/detail?detail=' . $id);
                $this->flash->error("deze combiniatie van datum, begintijd en medewerker is al bezet");
            } else {
                $afspraak = Afspraak::findFirstById($id);
                if (!$afspraak) {
                    echo "user does not exist";
                    die;
                }
                $afspraak->datum = $datum;
                $afspraak->begintijd = $begintijd;
                $afspraak->behandeling_id = $behandeling;
                $afspraak->gebruiker_id = $medewerker;
                $result = $afspraak->update();
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
                $this->response->redirect('admin/overzicht');
            }
        }
    }
}