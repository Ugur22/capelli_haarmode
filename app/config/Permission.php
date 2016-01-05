<?php
/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 15-12-15
 * Time: 21:08
 */
use Phalcon\Mvc\Dispatcher,
    Phalcon\Events\Event,
    Phalcon\Acl;


class Permission extends \Phalcon\Mvc\User\Plugin
{
    /**
     * Constants to prevent a typo
     */
    const GUEST = 'guest';
    const USER = 'overons';
    const ADMIN = 'admin';

    protected $_publicResources = [
        'index' => '*', 'overons' => '*', 'contact' => '*', 'account' => '*'
    ];

    protected $_userResources = [
        'afspraak' => ['*']
    ];

    protected $_adminResources = [
        'admin' => ['*']
    ];

    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {

        // DEBUG
        $this->session->destroy();

        $role = $this->session->get('rol');
        echo $role;
        if (!$role) {
            $role = self::GUEST;
        }



        // get the current controller/action from the dispatcher
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        // Get the ACL Rule list
        $acl = $this->_getAcl();

        // See if they have permission
        $allowd = $acl->isAllowed($role, $controller, $action);

        if ($allowd != Phalcon\Acl::ALLOW)
        {
            $this->flash->error("you don't have permission to access this area");
            $this->response->redirect('index');
            $dispatcher->forward([
                'controller' => 'index',
                'action' => 'index'
            ]);
            // stops dispatcher at the current operation
            return false;
        }
    }

    protected function _getAcl()
    {
        if (!isset($this->persistent->acl)) {
            $acl = new \Phalcon\Acl\Adapter\Memory();
            $acl->setDefaultAction(Phalcon\Acl::DENY);

            $roles = [
                self::GUEST => new \Phalcon\Acl\Role(self::GUEST),
                self::USER => new \Phalcon\Acl\Role(self::USER),
                self::ADMIN => new \Phalcon\Acl\Role(self::ADMIN),
            ];
            foreach ($roles as $role) {
                $acl->addRole($role);
            }

            // public resources
            foreach ($this->_publicResources as $resource => $action) {
                $acl->addResource(new \Phalcon\Acl\Resource($resource), $action);
            }

            // overons resources
            foreach ($this->_userResources as $resource => $action) {
                $acl->addResource(new \Phalcon\Acl\Resource($resource), $action);
            }

            // admin resources
            foreach ($this->_adminResources as $resource => $action) {
                $acl->addResource(new \Phalcon\Acl\Resource($resource), $action);
            }

            // Allow all roles to access the public Resources
            foreach ($roles as $role) {
                foreach ($this->_publicResources as $resource  => $actions) {
                    $acl->allow($role->getName(), $resource, '*');
                }
            }
            // Allow User and Admin to access the overons Resources
            foreach ($this->_userResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow(self::USER, $resource, $action);
                    $acl->allow(self::ADMIN, $resource, $action);
                }
            }
            // allow Admin to access the admin Resources
            foreach ($this->_adminResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow(self::ADMIN, $resource, $action);
                }
            }
            $this->persistent->acl = $acl;
        }
        return $this->persistent->acl;
    }
}