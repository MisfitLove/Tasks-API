<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/picture.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare picture object
$picture = new Picture($db);
 
// set ID property of record to read
$picture->task_id = isset($_GET['task_id']) ? $_GET['task_id'] : die();
 
// read the details of picture to be edited by task_id
$stmt = $picture->readpicturesByTask();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // pictures array
    $pictures_arr=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $picture_item=array(
            "id" => $id,
            "word" => $word,
            "url" => $url,
        );
 
        array_push($pictures_arr, $picture_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show pictures data in json format
    echo json_encode($pictures_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user picture does not exist
    echo json_encode(array("message" => "picture does not exist."));
}
?>