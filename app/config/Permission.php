<?php
/**
 * Created by PhpStorm.
 * User: ugur
 * Date: 15-12-15
 * Time: 21:08
 */
use Phalcon\Mvc\Dispatcher,
    Phalcon\Events\Event;

class Permission extends \Phalcon\Mvc\User\Plugin
{
    protected $_publicResources = [
        'index' => '*', 'user' => '*', 'contact' => '*', 'account' => '*'
    ];

    protected $_userResources = [
        'afspraak' => ['*']
    ];

    protected $_adminResources = [
        'admin' => ['*']
    ];

    protected function _getAcl()
    {
        if (!isset($this->persistent->acl)) {
            $acl = new \Phalcon\Acl\Adapter\Memory();
            $acl->setDefaultAction(Phalcon\Acl::DENY);

            $roles = [
                'guest' => new \Phalcon\Acl\Role('guest'),
                'user' => new \Phalcon\Acl\Role('user'),
                'admin' => new \Phalcon\Acl\Role('admin'),
            ];
            foreach ($roles as $role) {
                $acl->addRole($role);
            }

            // public resources
            foreach ($this->_publicResources as $resource => $action) {
                $acl->addResource(new \Phalcon\Acl\Resource($resource), $action);
            }

            // user resources
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
            // Allow User and Admin to access the user Resources
            foreach ($this->_userResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow('user', $resource, $action);
                    $acl->allow('admin', $resource, $action);
                }
            }
            // allow Admin to access the admin Resources
            foreach ($this->_adminResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow('admin', $resource, $action);
                }
            }
            $this->persistent->acl = $acl;
        }
        return $this->persistent->acl;
    }

    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        $role = $this->session->get('role');
        if (!$role) {
            $role = 'guest';
        }

        echo $role;
        die;

        // get the current controller/action from the dispatcher
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        // Get the ACL Rule list
        $acl = $this->_getAcl();

        // See if they have permission
        $allowd = $acl->isAllowed($role, $controller, $action);

        if ($allowd != Phalcon\Acl::ALLOW) {
            $dispatcher->forward([
                'controller' => 'index',
                'action' => 'index'
            ]);
            // stops dispatcher at the current operation
            return false;
        }
    }
}