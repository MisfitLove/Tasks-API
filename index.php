
<?php

//altoRouter
require './router/AltoRouter.php';
$router = new AltoRouter();

//mapping routes, http://altorouter.com/usage/mapping-routes.html
$router->map( 'GET', '/api/units/', function() {
    require __DIR__ . '/api/units/read.php';
});

$router->map( 'GET', '/api/units/[i:id]/tasks/', function($id) {
    require __DIR__ . '/api/tasks/read_unit.php?unit_id=$id';
});

/* Match the current request */
$match = $router->match();
if( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}



echo "Nothing to see here";

?>