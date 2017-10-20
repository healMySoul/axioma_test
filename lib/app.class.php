<?php

class App
{
    protected static $router;
    public static $db;

    /**
     * @return mixed
     */
    public static function getRouter()
    {
        return self::$router;
    }

    public static function run($uri)
    {
        self::$router = new Router($uri);
        //self::$db = new DB(Config::get('db.host'), Config::get('db.user'), Config::get('db.password'), Config::get('db.db_name'));
        $db_connection = new PDO("mysql:host=" . Config::get('db.host') . ";dbname=" . Config::get('db.db_name'), Config::get('db.user'), Config::get('db.password'));
        $db_connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        self::$db = $db_connection;

        $controller_class = ucfirst(self::$router->getController()) . 'Controller';
        $controller_method = strtolower(self::$router->getMethodPrefix() . self::$router->getAction());

        // Calling controller
        $controller_object = new $controller_class();

        if (method_exists($controller_object, $controller_method)) {
            $view_path = $controller_object->$controller_method();
            $view_object = new View($controller_object->getData(), $view_path);
            $content = $view_object->render();
        } else {
            throw new Exception('Method ' . $controller_method . ' of class ' . $controller_class . ' doesn\'t exist');
        }

        $layout = self::$router->getRoute();
        $layout_path = VIEWS_PATH . DS . $layout . '.phtml';
        $layout_view_object = new View(compact('content'), $layout_path);

        echo $layout_view_object->render();
    }
}
