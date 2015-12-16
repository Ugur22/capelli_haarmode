<?php


use Phalcon\Tag;

class AfspraakController extends BaseController
{
    public function indexAction()
    {
        Tag::setTitle("maak afspraak");
        $this->view->afspraak = Afspraak::find();
        $this->view->gebruiker = Gebruiker::find();
        $this->view->behandeling = Behandeling::find();
    }

    public function toevoegenAction()
    {
        if ($this->request->isPost()) {
            // get value from input fields
            $begintijd = $this->request->getPost("begintijd");
            $datum = $this->request->getPost("datum");
            $behandeling = $this->request->getPost("behandeling_id");
            $medewerker = $this->request->getPost("gebruiker_id");
            $endTime =  strtotime($begintijd)+ (30*60);
            $eindtijd = date("H:i",$endTime );
            // store values in a variable
            $afspraak = new Afspraak();
            $afspraak->begintijd = $begintijd;
            $afspraak->eindtijd =  $eindtijd;
            $afspraak->datum = $datum;
            $afspraak->behandeling_id = $behandeling;
            $afspraak->gebruiker_id = $medewerker;
            // create record in DB
            $result = $afspraak->save();
            // check if there's any invalid input
            if(!$result)
            {
                $output = [];
                foreach($afspraak->getMessages() as $message)
                {
                    $output[] = $message;
                }
                $output = implode('<br /> <br />', $output);
                $this->flash->error($output);
            }else {
                $this->response->redirect('admin/overzicht');
            }
            $this->view->enable();
        }

    }
}