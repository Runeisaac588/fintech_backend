<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
|
*/

require_once app_path(
    'core/modules/auth/AuthRoutes.php',
    
);

require app_path(
        'core/modules/orders/OrdersRoutes.php',

);

// require app_path(
//     'Modules/Wallet/Routes/wallet.routes.php'
// );

// require app_path(
//     'Modules/Transfer/Routes/transfer.routes.php'
// );

// require app_path(
//     'Modules/Transaction/Routes/transaction.routes.php'
// );