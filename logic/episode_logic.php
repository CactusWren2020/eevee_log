<?php 
include('../services/count_substring.php');

$conn = db_connection();

function getPicFromEpisode($episode) {
    //get all characters
    $sql = "SELECT character_name from characters";
$result = mysqli_query($conn, $sql);
$characters = mysqli_fetch_all($result, MYSQLI_ASSOC);

//array of all characters from characters
$character_array = [];
foreach($characters as $character) {
    array_push($character_array, $character["character_name"]);
}
//get episode description
//get episode description from episode
$sql = "SELECT description from episodes WHERE episode = '$episode'";
$result = mysqli_query($conn, $sql);
$episode_description = mysqli_fetch_all($result, MYSQLI_ASSOC);

//push character into array if they're in the episode
$included_characters = [];

//count will hold the number of mentions and the character with the most mentions
$count = new stdClass(); 
foreach ($character_array as $character) {
    if ($count_substring($character, $episode_description[0]['description']) > $count) {
        $count->count = $count_substring($character, $episode_description[0]['description']);
        $count->top_character = $character;
    }
}

$sql = "SELECT path_to_pic from characters WHERE character_name = '$count->top_character'";
$result = mysqli_query($conn, $sql);
$top_character_pic = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);



    return $top_character_pic;
}