<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/task.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare task object
$task = new Task($db);
 
// set ID property of record to read
$task->unit_id = isset($_GET['unit_id']) ? $_GET['unit_id'] : die();
 
// read the details of task to be edited by unit_id
$stmt = $task->readTasksByUnit();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // tasks array
    $tasks_arr=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $task_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
        );
 
        array_push($tasks_arr, $task_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show tasks data in json format
    echo json_encode($tasks_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user task does not exist
    echo json_encode(array("message" => "task does not exist."));
}
?>