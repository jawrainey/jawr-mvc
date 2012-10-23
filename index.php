<?php
// ONE POINT OF ENTRY!
ini_set('display_errors','0');

require 'config.php';

require 'core/models/Blog.php';
require 'core/models/Admin.php';

require 'libraries/Database.php';
require 'libraries/Router.php';
require 'libraries/Input.php';
require 'libraries/Session.php';
require 'libraries/Auth.php';
require 'libraries/View.php';

require 'core/controllers/Index.php';
require 'core/controllers/Login.php';
require 'core/controllers/About.php';
require 'core/controllers/Admin.php';
require 'core/controllers/Blog.php';
require 'core/controllers/Projects.php';
require 'core/controllers/Error.php';

//LIBRARIES...
$db         = new Database();
$session    = new Session();
$view       = new View();
$input      = new Input();
$auth       = new Auth($db, $session);

//MODELS
$blogModel  = new BlogModel($db);
$adminModel = new AdminModel($db);

//CONTROLLERS
$index      = new Index($view, $blogModel);
$about      = new About($view, $blogModel);
$blog       = new Blog($view, $blogModel);
$projects   = new Projects($view, $blogModel);
$login      = new Login($view, $input, $auth);
$admin      = new Admin($view, $adminModel, $input, $auth);
$error      = new Error($view);

//ROUTER
$router     = new Router();

//ROUTER SETTINGS
$controllers= array($index, $about, $blog, $projects, $admin, $login, $error);
$routes     = $router->getUri();

//So it begins...
foreach ( $controllers as $controller )
{
    if ( get_class($controller) == $routes['controller'] )
    {
        call_user_func_array( array( $controller, $routes['action'] ), $routes['params'] );
    }
}
/* End of file index.php */
/* Location: index.php */
