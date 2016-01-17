<?php
use Phalcon\Tag,
    \Phalcon\Security;

class AccountController extends BaseController
{
    public function indexAction()
    {
        // set title page
        Tag::setTitle("login");
    }

    public function registerSession($gebruiker)
    {
        // set session equal to a logged  user in  the database
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

    public function loginAction()
    {
        // check if a form is posted
        if ($this->request->isPost()) {
            // check for CSRF security & against bruteforce hacking
            if ($this->security->checkToken() == false) {
                $this->flash->error("invalid CSRF token ");
                // redirect to login page
                $this->response->redirect('account/index');
            } else {
                // get input from the form
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                // set up qeury checks if user input is equal to username or email from the gebruiker table
                $gebruiker = Gebruiker::findFirst([
                    "(email = :email: OR username = :email:)",
                    "bind" => [
                        "email" => $email
                    ]
                ]);
                // if user exists
                if ($gebruiker) {
                    // checks if given password equals a hashed password from the gebruiker table
                    if ($this->security->checkHash($password, $gebruiker->password)) {
                        // if passwords are equal create session for the user
                        $this->registerSession($gebruiker);
                        $user = $this->session->get('auth');
                        $rol = ($user['rol']);
                        if ($rol == "user") {
                            //Forward to the afspraken page if the user is a user
                            $this->response->redirect('afspraak/index');
                            //Forward to the admin page if the user is an admin
                        } else if ($rol == "admin") {
                            $this->response->redirect('admin/overzicht');
                        }
                        //$this->flash->success('welcome' . " " . $gebruiker->voornaam);
                    } else {
                        // forward to login page if user password is incorrect
                        $this->flash->error("De ingevoerde gegevens zijn niet correct");
                        $this->response->redirect('account/index');
                    }

                } else {
                    // forward to login page if user details are incorrect
                    $this->flash->error("De ingevoerde gegevens zijn niet correct");
                    $this->response->redirect('account/index');
                }
            }
        }
    }

    public
    function signoutAction()
    {
        // logout for user
        echo $this->session->destroy();
        $this->response->redirect('index/index');
    }


    public
    function createAccountAction()
    {

        // checks if a post is committed
        if ($this->request->isPost()) {
            // check for CSRF security
            if ($this->security->checkToken() == false) {
                $this->flash->error("invalid CSRF token ");
                $this->response->redirect('account/index');
            }
            // saves input from form in a variable
            $email = $this->request->getPost('email');
            $username = $this->request->getPost('username');
            $voornaam = $this->request->getPost('voornaam');
            $tussenvoegsel = $this->request->getPost('tussenvoegsel');
            $achternaam = $this->request->getPost('achternaam');
            $telefoonnummer = $this->request->getPost('telefoonnummer');
            $password = $this->request->getPost('password');
            $confirm_password = $this->request->getPost('confirm_password');
            // checks if both password fields are equal
            if ($password != $confirm_password) {
                $this->flash->warning('de ingevulde wachtwoorden zijn niet gelijk');
                $this->response->redirect('account/register');
            }
            // initiate model
            $gebruiker = new Gebruiker();
            // assign post input to a field form the table
            $gebruiker->rol = "user";
            $gebruiker->email = $email;
            $gebruiker->username = $username;
            $gebruiker->tussenvoegsel = $tussenvoegsel;
            $gebruiker->voornaam = $voornaam;
            $gebruiker->achternaam = $achternaam;
            $gebruiker->telefoonnummer = $telefoonnummer;
            $gebruiker->password = $password;
            // save the inputs in the table
            $result = $gebruiker->save();
            // checks if any invalid values are past
            if (!$result) {
                $output = [];
                foreach ($gebruiker->getMessages() as $message) {
                    $output[] = $message;
                }
                $output = implode("<br><br>", $output);
                // displays incorrect input
                $this->flash->error($output);
                $this->response->redirect('account/register');
                return;
            }
            $this->registerSession($gebruiker);
            $this->response->redirect('afspraak/index');
        }
    }

    public
    function registerAction()
    {
        Tag::setTitle("registreer");
    }
}
