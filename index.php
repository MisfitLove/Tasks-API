
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

echo "
<p>
$url/api/units/read.php - array unitów<br>
[<br>
	{<br>
		\"id\" : string id,<br>
		\"name\" string,<br>
		\"description\": string<br>
	}<br>
]<br>
</p>
<p>
$url/api/tasks/read_unit.php?unit_id={id} - array tasków dla unita<br>
[<br>
	{<br>
		\"id\" : id<br>
		\"name\": string<br>
		\"description\": string<br>
	}<br>
]<br>
</p>
<p>
$url/api/pictures/read_task.php?task_id={id} - array obrazków dla taska<br>
[<br>
	{<br>
		\"id\": id<br>
		\"word\": string<br>
		\"url\": string <br>
	}<br>
]<br></p>";

?>