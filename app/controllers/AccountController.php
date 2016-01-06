<?php
use Phalcon\Tag,
    \Phalcon\Security;

class AccountController extends BaseController
{
    public function indexAction()
    {
        Tag::setTitle("login");
    }

    public function registerSession($gebruiker)
    {
        $this->session->set(
            'auth',
            array(
                'id' => $gebruiker->id,
                'voornaam' => $gebruiker->voornaam,
                'tussenvoegsel' => $gebruiker->tussenvoegsel,
                'achternaam' => $gebruiker->achternaam,
                'email' => $gebruiker->email,
                'rol' => $gebruiker->rol
            )
        );
    }

    public function getSessionAction()
    {
        $user = $this->session->get('auth');
        print_r($user);
    }

    public function loginAction()
    {
        if ($this->request->isPost()) {
            // check for CSRF security
            if ($this->security->checkToken() == false) {
                $this->flash->error("invalid CSRF token ");
                $this->response->redirect('account/index');
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $gebruiker = Gebruiker::findFirst([
                    "(email = :email: OR username = :email:) AND password = :password:",
                    "bind" => [
                        "email" => $email,
                        "password" => ($password)
                    ]
                ]);
                if ($gebruiker) {
                    //if ($this->security->checkHash($password, $gebruiker->password)) {
                    $this->registerSession($gebruiker);
                    $user = $this->session->get('auth');
                    $rol = ($user['rol']);
                    if ($rol == "user") {
                        $this->response->redirect('afspraak/index');
                    } else if ($rol == "admin") {
                        $this->response->redirect('admin/overzicht');
                    }
                    //$this->flash->success('welcome' . " " . $gebruiker->voornaam);
                    //}
                    //Forward to the afspraken controller if the user is valid
                } else {
                    $this->flash->error("De ingevoerde gegevens zijn niet correct");
                    $this->response->redirect('account/index');
                }
            }
        }
    }

    public
    function signoutAction()
    {
        echo $this->session->destroy();
        $this->response->redirect('index/index');
    }

    public
    function registerAction()
    {
        Tag::setTitle("registreer");
    }

    public
    function createAccountAction()
    {

        if ($this->request->isPost()) {
            // check for CSRF security
            if ($this->security->checkToken() == false) {
                $this->flash->error("invalid CSRF token ");
                $this->response->redirect('account/index');
            }
            $email = $this->request->getPost('email');
            $username = $this->request->getPost('username');
            $voornaam = $this->request->getPost('voornaam');
            $achternaam = $this->request->getPost('achternaam');
            $telefoonnummer = $this->request->getPost('telefoonnummer');
            $password = $this->request->getPost('password');
            $confirm_password = $this->request->getPost('confirm_password');
            if ($password != $confirm_password) {
                $this->flash->error('de ingevulde wachtwoorden zijn niet gelijk');
                $this->response->redirect('account/register');
            }
            $gebruiker = new Gebruiker();
            $gebruiker->rol = "user";
            $gebruiker->email = $email;
            $gebruiker->username = $username;
            $gebruiker->voornaam = $voornaam;
            $gebruiker->achternaam = $achternaam;
            $gebruiker->telefoonnummer = $telefoonnummer;
            $gebruiker->password = $password;
            $result = $gebruiker->save();
            if (!$result) {
                $output = [];
                foreach ($gebruiker->getMessages() as $message) {
                    $output[] = $message;
                }
                $output = implode("<br><br>", $output);
                $this->flash->error($output);
                $this->response->redirect('account/register');
                return;
            }
            $this->registerSession($gebruiker);
            $this->response->redirect('afspraak/index');
        }
    }
}