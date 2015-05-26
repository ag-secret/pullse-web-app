<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('Route');

Router::addUrlFilter(function ($params, $request) {
    if (isset($request->params['club_slug']) && !isset($params['club_slug'])) {
        $params['club_slug'] = $request->params['club_slug'];
    }
    return $params;
});

Router::scope('/:club_slug', function ($routes) {
    $routes->connect('/conta/localidade', ['controller' => 'Clubs', 'action' => 'locationSettings']);
    $routes->connect(
        '/',
        ['controller' => 'AdmUsers', 'action' => 'login']
    );
    $routes->connect(
        '/logout',
        ['controller' => 'AdmUsers', 'action' => 'logout']
    );
    $routes->connect(
        '/conta/configuracoes',
        ['controller' => 'AdmUsers', 'action' => 'settings']
    );
});

Router::scope('/:club_slug/eventos', function ($routes) {
    $routes->connect('/', ['controller' => 'Events', 'action' => 'index']);
    $routes->connect('/adicionar', ['controller' => 'Events', 'action' => 'add']);
    $routes->connect('/editar/*', ['controller' => 'Events', 'action' => 'edit']);
    $routes->connect('/deletar/*', ['controller' => 'Events', 'action' => 'delete']);
});

Router::scope('/:club_slug/general_settings', function ($routes) {
    $routes->extensions(['json']);
    $routes->connect('/send_notificacoes_evento', ['controller' => 'GeneralSettings', 'action' => 'sendNotificacoesEvento']);
});

Router::scope('/:club_slug/propagandas', function ($routes) {
    $routes->connect('/', ['controller' => 'Ads', 'action' => 'index']);
    $routes->connect('/adicionar', ['controller' => 'Ads', 'action' => 'add']);
    $routes->connect('/editar/*', ['controller' => 'Ads', 'action' => 'edit']);
    $routes->connect('/deletar/*', ['controller' => 'Ads', 'action' => 'delete']);

    $routes->connect('/configuracoes', ['controller' => 'AdsSettings', 'action' => 'edit']);
});

Router::scope('/:club_slug/eventos', function ($routes) {
    $routes->connect('/', ['controller' => 'Events', 'action' => 'index']);
    $routes->connect('/adicionar', ['controller' => 'Events', 'action' => 'add']);
    $routes->connect('/editar/*', ['controller' => 'Events', 'action' => 'edit']);
});

Router::scope('/:club_slug/clientes', function ($routes) {
    $routes->connect('/', ['controller' => 'Users', 'action' => 'index']);
});

Router::scope('/:club_slug/notificacoes-push', function ($routes) {
    $routes->connect('/', ['controller' => 'CustomPushNotifications', 'action' => 'index']);
    $routes->connect('/criar', ['controller' => 'CustomPushNotifications', 'action' => 'add']);
    $routes->connect('/editar/*', ['controller' => 'CustomPushNotifications', 'action' => 'edit']);
    $routes->connect('/delete/*', ['controller' => 'CustomPushNotifications', 'action' => 'delete']);
    $routes->extensions(['json']);
    $routes->connect('/enviar/*', ['controller' => 'CustomPushNotifications', 'action' => 'send']);
});

Router::scope('/:club_slug/usuarios', function ($routes) {
    $routes->connect('/', ['controller' => 'AdmUsers', 'action' => 'index']);
    $routes->connect('/adicionar', ['controller' => 'AdmUsers', 'action' => 'add']);
    $routes->connect('/editar/*', ['controller' => 'AdmUsers', 'action' => 'edit']);
});

Router::scope('/', function ($routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);



    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `InflectedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'InflectedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'InflectedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('InflectedRoute');
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
