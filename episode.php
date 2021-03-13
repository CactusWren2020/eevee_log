<?php 
include('session.php');
include('templates/header.php');
include('services/count_substring.php');

$conn = db_connection();

//get id from query string and fill out fields
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
$sql = "SELECT * from episodes WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$episodes = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

// simplify variable for easier use below
$episode = $episodes[0];

//logic for path_top_pic (getPicFromEpisode($episode))
function getPicFromEpisode($episode, $conn, $count_substring)
{
    //get all characters
    $sql = "SELECT character_name from characters";
    $result = mysqli_query($conn, $sql);
    $characters = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //array of all characters from characters
    $character_array = [];
    foreach ($characters as $character) {
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
    $count->count = 0;
    foreach ($character_array as $character) {
        if ($count_substring($character, $episode_description[0]['description']) > $count->count) {
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

// var_dump($episode);






}

?>
 
<div class="container">
    <div class="row bg-light">
        <div class="col align-items-center">   
            <h1 class="my-5">Episode</h1>
            <img src="
            <?php  
                echo getPicFromEpisode($episode["episode"], $conn, $count_substring)[0]["path_to_pic"] ? 
                getPicFromEpisode($episode["episode"], $conn, $count_substring)[0]["path_to_pic"] 
                :
                'images/eevee.svg';
            ?>
            " class="img-fluid my-5 episode-pic" >
            <h2 class="mb-5"><?php echo $episode["episode"] . ', ' . $episode["chronology"];  ?>
            <h3 class="h4 mb-5">Logline: <?php echo $episode["logline"]; ?></h3>
            <h4 class="h5 mb-5">Cast : <?php echo $episode["characters"] ?></h4>
            <p><?php echo $episode["description"]; ?></p>

        </div>
    </div>
</div>
<?php
mysqli_close($conn); 
include('templates/footer.php');
?>