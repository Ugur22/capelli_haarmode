<?php
/**
 * Services are globally registered in this file
 *
 * @var \Phalcon\Config $config
 */

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
}, true);

/**
 * Setting up the view component
 */
$di->setShared('view', function () use ($config) {

    $view = new View();

    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {

            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ));

            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () use ($config) {
    return new DbAdapter($config->database->toArray());
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () {
    return new MetaDataAdapter();
});

// custom dispatcher overrides the default
$di->set('$dispatcher', function () use ($di) {
    $eventsManager = $di->getShared('eventsManager');
    // custom ACl class
    $permission = new Permission();
    // Listen for events from the permission class
    $eventsManager->attach('dispatch', $permission);
    $dispatcher = new \Phalcon\Mvc\Dispatcher();
    $dispatcher->setEventsManager($eventsManager);
    return $dispatcher;
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $session = new \Phalcon\Session\Adapter\Files();
    $session->start();
    return $session;
});



// flash data (temp data)
$di->set('flash', function () {
    $flash = new \Phalcon\Flash\Session([
        'error' => 'data-error',
        'success' => 'data-success',
        'notice' => 'data-error',
        'warning' => 'data-errors'
    ]);
    return $flash;
});


/**
 * Start the session the first time some component request the session service
 */
$di->set('router', function () {

    return require __DIR__ . '/routes.php';

});
