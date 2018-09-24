<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/test-yogesh','AdminController@test_yogesh');

$router->group(['prefix' =>'admin'], function () use ($router) {
    $controller_path = 'AdminController@';
    $router->post('/admin-login', $controller_path.'adminLlogin');
});

$router->group(['prefix' => 'category'], function () use ($router) {
    $controller_path = 'BlogController@';
    $router->get('/category', $controller_path.'category');
    $router->post('/add-category', $controller_path.'addCategory');
    $router->post('/edit-category', $controller_path.'editCategory');
    $router->get('/update-category/{categoryId}', $controller_path.'editCategory');
});

$router->group(['prefix' => 'tag'], function () use ($router) {
    $controller_path = 'BlogController@';
    $router->get('/tag', $controller_path.'tag');
    $router->post('/add-tag', $controller_path.'addTag');
    $router->post('/edit-tag', $controller_path.'editTag');
    $router->get('/update-tag/{tagId}', $controller_path.'editTag');
});

$router->group(['prefix' => 'blog'], function () use ($router) {
    $controller_path = 'BlogController@';
    $router->post('/add-blog', $controller_path.'addBlog');
    $router->post('/edit-blog', $controller_path.'editBlog');
    $router->get('/update-blog/{blogId}', $controller_path.'editBlog');
});

$router->group(['prefix' => 'cms'], function () use ($router) {
    $controller_path = 'CmsController@';
    $router->post('/add-page', $controller_path.'addPage');
    $router->post('/edit-page', $controller_path.'editPage');
    $router->get('/update-page/{pageId}', $controller_path.'updatePage');
});
