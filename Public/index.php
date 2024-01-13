<?php
session_start();
require __DIR__ . "/../vendor/autoload.php";


use App\Controllers\RegisterController;
use App\Controllers\LoginController;
use App\Controllers\DisplayUser;

use App\Controllers\admin\WikiController;
use App\Controllers\admin\CategorieController;
use App\Controllers\admin\TagController;
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
$router->get('/user',fn()=>DisplayUser::displayUser());
$router->get('/categorie',fn()=> CategorieController::index());
$router->get('/tag', fn()=>TagController::index());


//----> POST ROUTER ;

$router->post('/register',fn()=>RegisterController::register());
$router->post('/login', fn()=>LoginController::login());


$router->post('/categorie/add',fn()=>CategorieController::addCategorie());
$router->post('/categorie/update',fn()=>CategorieController::updateCategorie());
$router->post('/categorie/delete',fn()=>CategorieController::deleteCategorie());

$router->post('/tag/add',fn()=>TagController::addTag());
$router->post('/tag/update',fn()=>TagController::updateTag());
$router->post('/tag/delete',fn()=>TagController::deleteTag());


$router->dispatch($uri,$method);

?>