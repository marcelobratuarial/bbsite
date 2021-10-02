<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/register', 'RegisterController::index');
$routes->get('/login', 'LoginController::index');
$routes->get('/dashboard', 'DashboardController::index',['filter' => 'routeFilter']);
$routes->get('/dash/posts-list', 'DashboardController::postsList',['filter' => 'routeFilter']);
$routes->get('/dash/categories-list', 'DashboardController::categoriesList',['filter' => 'routeFilter']);

$routes->post('/dash/cat/save', 'DashboardController::saveCat',['filter' => 'routeFilter']);

$routes->get('/dash/post/(:num)/edit', 'DashboardController::postEdit/$1',['filter' => 'routeFilter']);
$routes->get('/dash/post/create', 'DashboardController::postCreate',['filter' => 'routeFilter']);
$routes->post('/dash/post/save', 'DashboardController::savePost',['filter' => 'routeFilter']);
$routes->post('/dash/post/delete-image', 'DashboardController::removeImagePost',['filter' => 'routeFilter']);
$routes->post('/dash/post/publish', 'DashboardController::publishPost',['filter' => 'routeFilter']);


$routes->post('/dash/post/fileupload', 'DashboardController::fileUpload',['filter' => 'routeFilter']);

$routes->get('/logout', 'LoginController::logout');

$routes->get('/', 'Pages::index', ['as' => 'hoome']);
$routes->get('/sobre', 'Pages::about', ['as' => 'ab']);
$routes->get('/cursos-palestras', 'Pages::courses');
$routes->get('/servicos', 'Pages::solutions');
$routes->get('/faq', 'Pages::faq');
$routes->post('/area-cliente/carro-reserva/send', 'Pages::sendCarroReserva');
$routes->get('/area-cliente/carro-reserva', 'Pages::carroReserva');
$routes->post('/area-cliente/app/send', 'Pages::sendApp');
$routes->get('/area-cliente/app', 'Pages::App');
$routes->post('/area-cliente/funeral/send', 'Pages::sendFuneral');
$routes->get('/area-cliente/funeral', 'Pages::Funeral');
$routes->post('/area-cliente/vidros/send', 'Pages::sendVidros');
$routes->get('/area-cliente/vidros', 'Pages::Vidros');
$routes->get('/area-cliente', 'Pages::areaCliente');
$routes->post('/f-modelos', 'Pages::carregaModelos');
$routes->post('/f-empresa', 'Pages::findEmpresa');
$routes->post('/f-cep', 'Pages::findCEP');
$routes->get('/servicos/dygo', 'Pages::dygo', ['as' => 'dygo']);
$routes->get('/servicos/(:any)', 'Pages::servicos/$1');
$routes->get('/servicos/(:any)/(:any)', 'Pages::servicos/$1/$2');
// $routes->get('/servicos/para-entidades-do-3-setor', 'Pages::entidades3Setor', ['as' => 'entidades3setor']);
// $routes->get('/servicos/para-seguradoras', 'Pages::seguradoras', ['as' => 'seguradoras']);
// $routes->get('/servicos/para-insurtechs', 'Pages::insurtechs', ['as' => 'insurtechs']);
// $routes->get('/servicos/plataformas-personalizadas', 'Pages::plataformasPersonalizadas', ['as' => 'plataformasPersonalizadas']);
$routes->get('/blog/q/(:any)', 'Pages::find/$1');
$routes->get('/blog/cat/(:any)', 'Pages::blog/$1');
$routes->get('/blog', 'Pages::blog');
$routes->get('/blog/(:any)', 'Pages::blogPost/$1');
$routes->get('/contato', 'Pages::contact');
$routes->post('/contact/send', 'Pages::contact');

$routes->get('/(:any)', 'Pages::pagina/$1');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
