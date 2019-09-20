<?php

namespace Core;

class Route
{
    /**
     *
     */
    public static function start()
    {
        $controllerName = 'FeedbackForm';
        $actionName = '';
        $params = [];
        $url = trim($_SERVER['REQUEST_URI']);

        if ($url === '/' && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $actionName = 'create';
        }elseif ($url === '/') {
            $actionName = 'index';
        }

        $params['url'] = $url;

        session_start();

        if (empty($_SESSION['token'])) {
            $_SESSION['token'] = bin2hex(random_bytes(32));
        }

        $controllerName = 'Controllers\\' . $controllerName . 'Controller';

        self::execute($controllerName, $actionName, $params);

    }

    /**
     * Вызов метода класса контроллера или показ страницы ошибки, если метода не существует
     *
     * @param $controllerName - имя класса контроллера
     * @param $actionName - имя исполняемого метода в классе
     * @param $params
     */
    private static function execute($controllerName, $actionName, $params)
    {
        $controller = new $controllerName;

        if (!empty($params)) {
            $controller->setData('params', $params);
        }

        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            Route::errorPage404();
        }
    }

    /**
     * Показ 404 страницы
     */
    public static function errorPage404()
    {
        $view = new View();
        $view->generate('HTTP/1.1 404 Not Found', 'error404.php');
        exit();
    }
}

?>
