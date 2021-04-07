<?php 
include('session.php');
include('templates/header.php');

include('services/pretty.php');
include('services/count_substring.php');

$conn = db_connection();

//$episode variable for page content
$sql = "SELECT episode, logline, description, characters, id from episodes order by chronology asc";
$result = mysqli_query($conn, $sql);
$episodes = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

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
// var_dump(getPicFromEpisode('Pilot', $conn, $count_substring));
?>

<div class="container">
<h1 class="my-5">Episodes</h1>    
<div class="row">
    
    <?php 
        foreach($episodes as $episode): ?>
            <div class="col-sm-4 mb-3">
        <div class="card">
            <img src="<?php  
                echo htmlspecialchars(getPicFromEpisode($episode["episode"], $conn, $count_substring)[0]["path_to_pic"]) ? 
                htmlspecialchars(getPicFromEpisode($episode["episode"], $conn, $count_substring)[0]["path_to_pic"]) 
                :
                'images/eevee.svg';
            ?>
            "  alt="" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title mb-3"><?php echo htmlspecialchars($episode["episode"]); ?></h5>
                <h6 class="card-subtitle text-muted mb-3"><?php echo htmlspecialchars($episode["logline"]); ?></h6>
                <p class="card-text">
                <?php echo htmlspecialchars(substr($episode["description"], 0, 100)) . '...'; ?>
                </p>
                <p class="card-text">
                    Cast: <em><?php echo htmlspecialchars($episode["characters"]);?></em>
                </p>
                <a href="episode.php?id=<?php echo htmlspecialchars($episode['id']); ?>" class="btn btn-outline-primary">More</a>
            </div>
        </div>
    </div>
        <?php endforeach;
    ?>
    
    </div>
</div>

<?php
mysqli_close($conn);
include('templates/footer.php');
 