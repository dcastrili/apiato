<?php

namespace App\Containers\Authorization\Providers;

use App\Containers\Authorization\Middlewares\EntrustRoleForWeb;
use App\Port\Middleware\Providers\PortMiddlewareServiceProvider;
use Zizaco\Entrust\Middleware\EntrustAbility;
use Zizaco\Entrust\Middleware\EntrustPermission;
use Zizaco\Entrust\Middleware\EntrustRole;

/**
 * Class MiddlewareServiceProvider
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class MiddlewareServiceProvider extends PortMiddlewareServiceProvider
{

    protected $middleware = [

    ];

    protected $middlewareGroups = [
        'web' => [

        ],
        'api' => [

        ],
    ];

    protected $routeMiddleware = [
        // Entrust Package middleware's
        'role'       => EntrustRole::class,
        'permission' => EntrustPermission::class,
        'ability'    => EntrustAbility::class,
        // By Hello API
        'role.web'   => EntrustRoleForWeb::class,
    ];

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->registerAllMiddlewares($this->middleware, $this->middlewareGroups, $this->routeMiddleware);
    }

    /**
     * Register anything in the container.
     */
    public function register()
    {

    }
}
