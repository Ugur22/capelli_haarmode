<?php

class AfspraakController extends BaseController
{
    public function indexAction()
    {
        $this->view->afspraak = Afspraak::find();
        $this->view->gebruiker = Gebruiker::find();
        $this->view->behandeling = Behandeling::find();
    }

    public function toevoegenAction()
    {
        $afspraak = new Afspraak();
        // store and check for erros
        $success = $afspraak->save($this->request->getPost(), array('
        id', 'begintijd', 'eindtijd', 'datum', 'behandeling_id', 'gebruiker_id'));
        if ($success) {
            echo "afspraak is gemaakt";
        } else {
            echo " fout bij het maken van een afspraak ";

            foreach ($afspraak->getMessages() as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }
        $this->view->enable();
        $this->response->redirect('afspraak/overzicht');
    }

    public function overzichtAction()
    {
        $afspraak = Afspraak::find();
        //$beginTime = strtotime('now');
        //$endTime = date("H:i", strtotime('+30 minutes', $beginTime));
        $this->view->setVar('afspraak', $afspraak);
        //$this->view->setVar("string", $afspraak->getBegintijd());
    }
}