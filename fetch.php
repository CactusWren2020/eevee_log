<?php
include('config/db_connect.php');
$conn = db_connection();


//get content from stream
$content = trim(file_get_contents("php://input"));
file_put_contents('fetch2.txt', '$content: ' . print_r($content, true), FILE_APPEND);

//decode json -> object
$decoded_content = json_decode($content);

file_put_contents('fetch2.txt', '$decoded_content: ' . print_r($decoded_content, true), FILE_APPEND);

//get data with key of 'name'
$term = mysqli_real_escape_string($conn, $decoded_content->term);
//query for name = $name
$sql = "SELECT character_name, actor_name, id from characters WHERE character_name LIKE '%$term%' OR actor_name LIKE '%$term%'";
$result = mysqli_query($conn, $sql);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);


file_put_contents('fetch2.txt', '$result: ' . print_r($result, true), FILE_APPEND);

//create object to send back to fetch
$myObj = new \stdClass();

//insert an array
$myObj->character = [];

//push new objects, each representing a character/actor, into the object->array
foreach ($result as $character) :
    $tempObj = new \stdClass();
    $tempObj->character_name = $character["character_name"];
    $tempObj->actor_name = $character["actor_name"];
    $tempObj->id = $character["id"];
    array_push($myObj->character, $tempObj);
endforeach;

file_put_contents('fetch2.txt', '$myObj: ' . print_r($myObj, true), FILE_APPEND);


//encode object into JSON
$myJSON = json_encode($myObj);
//echo it back to the fetch
echo $myJSON;
