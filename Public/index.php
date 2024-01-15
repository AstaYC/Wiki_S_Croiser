<?php
session_start();
require __DIR__ . "/../vendor/autoload.php";


use App\Controllers\RegisterController;
use App\Controllers\LoginController;
use App\Controllers\DisplayUser;

use App\Controllers\admin\WikiController;
use App\Controllers\admin\CategorieController;
use App\Controllers\admin\TagController;
use App\Controllers\author\WikiAuthorController;
use App\Routes\Router;


error_reporting(E_ALL);
ini_set('display_errors', '1');

$path = $_SERVER['REQUEST_URI']; 
$uri = parse_url($path)["path"]; 
$method = strtolower($_SERVER["REQUEST_METHOD"]);

$router = new Router();

// ------> GET ROUTER ;

$router->get('/',fn() => LoginController::display());
$router->get('/register',fn () => RegisterController::index());
$router->get('/login',fn() => LoginController::index());

$router->get('/wiki',fn()=>WikiController::index());
$router->get('/wikiArchive',fn()=>WikiController::indexArch());
$router->get('/user',fn()=>DisplayUser::displayUser());
$router->get('/categorie',fn()=> CategorieController::index());
$router->get('/tag', fn()=>TagController::index());

$router->get('/author', fn()=>WikiAuthorController::index());
$router->get('/author/parametre', fn()=>WikiAuthorController::gererWiki());

//----> POST ROUTER ;

$router->post('/register',fn()=>RegisterController::register());
$router->post('/login', fn()=>LoginController::login());

$router->post('/wiki/add',fn()=>WikiController::addWiki());
$router->post('/wiki/delete',fn()=>WikiController::deleteWiki());
$router->post('/wiki/recuperer',fn()=>WikiController::recupererWiki());


$router->post('/categorie/add',fn()=>CategorieController::addCategorie());
$router->post('/categorie/update',fn()=>CategorieController::updateCategorie());
$router->post('/categorie/delete',fn()=>CategorieController::deleteCategorie());

$router->post('/tag/add',fn()=>TagController::addTag());
$router->post('/tag/update',fn()=>TagController::updateTag());
$router->post('/tag/delete',fn()=>TagController::deleteTag());

$router->post('/author/parametre/add',fn()=>WikiAuthorController::addAuthorWiki());
$router->post('/author/parametre/delete',fn()=>WikiAuthorController::deleteWiki());
$router->post('/author/parametre/update',fn()=>WikiAuthorController::updateUserWiki());


$router->dispatch($uri,$method);

?>