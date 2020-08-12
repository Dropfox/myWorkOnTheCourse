<?php

try {

    spl_autoload_register(function (string $className) {
        require_once __DIR__ . '/src/' . $className . '.php';
    });

    $route = $_GET ['route'] ?? '';
    $routes = require __DIR__ . '/src/myproject/routes/routes.php';

    $isRoutFound = null;
    foreach ($routes as $pattern => $controllerAndMethod) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRoutFound = true;
            break;
        }
    }

    if (!$isRoutFound) {
        throw new \myproject\Exceptions\NotFoundException();
    }

    unset($matches[0]);
    $controllerName = $controllerAndMethod [0];
    $method = $controllerAndMethod [1];

    $controller = new $controllerName();
    $controller->$method (...$matches);
} catch (\myproject\Exceptions\DbExceptions $e) {
    $view = new \myproject\view\View(__DIR__ . '/tamplates/errors');
    $view->renderHtml('500.php', ['error' => $e->getMessage()], 500);
} catch (\myproject\Exceptions\NotFoundException $e) {
    $view = new \myproject\view\View(__DIR__ . '/tamplates/errors');
    $view->renderHtml('404.php', ['error' => $e->getMessage()], 404);
} catch (\myproject\Exceptions\UnauthorizedException $e) {
    $view = new \myproject\view\View(__DIR__ . '/tamplates/errors');
    $view->renderHtml('401.php', ['error' => $e->getMessage()], 401);
} catch (\myproject\Exceptions\Forbidden $e) {
    $view = new \myproject\view\View(__DIR__ . '/tamplates/errors');
    $view->renderHtml('403.php', ['error' => $e->getMessage()], 403);
} catch (\myproject\Exceptions\InvalidAdminException $e) {
    $view = new \myproject\view\View(__DIR__ . '/tamplates/errors');
    $view->renderHtml('5.php', ['error' => $e->getMessage()], 5);
}




