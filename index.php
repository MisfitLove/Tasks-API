
<?php

// $request = $_SERVER['REDIRECT_URL'];

// switch ($request) {
//     case '/' :
//         require __DIR__ . '/views/index.php';
//         break;
//     case '' :
//         require __DIR__ . '/views/index.php';
//         break;
//     case '/about' :
//         require __DIR__ . '/views/about.php';
//         break;
//     default: 
//         require __DIR__ . '/views/404.php';
//         break;
// }

$url = __DIR__ ;

echo "$url/api/units/read.php - array unitów
[
	{
		\"id\" : string id
		\"name\" string
		\"description\": string
	}
]

https://$url/api/tasks/read_unit.php?unit_id={id} - array tasków dla unita
[
	{
		\"id\" : id
		\"name\": string
		\"description\": string
	}
]

https://$url/api/pictures/read_task.php?task_id={id} - array obrazków dla taska

[
	{
		\"id\": id
		\"word\": string
		\"url\": string 
	}
]";

?>