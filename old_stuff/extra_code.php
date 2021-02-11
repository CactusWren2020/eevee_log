<?php 

//query the database by character name
// if (isset($_GET['character_query'])) {
//     if (empty($_GET['character_name_query'])) {
//         echo 'a character name is required';
//     } else {
        
//         $character_name_query = mysqli_real_escape_string($conn, $_GET['character_name_query']);
//         $sql = "SELECT * FROM characters WHERE character_name = '$character_name_query'";
//         $result = mysqli_query($conn, $sql);
//         $result_array = mysqli_fetch_assoc($result);
//         var_dump($result_array);

//         $pathinfo = pathinfo($result_array['path_to_pic']);
//         echo $pathinfo['filename'].'.'.$pathinfo['extension'];

//         mysqli_free_result($result);
//         mysqli_close($conn);
//     }
// }

// form that asks user for name of character to be queried 
//<form action="update.php" method="GET" class="mt-5 bg-light p-5">
// <div class="form-row">
//     <div class="col">
//         <label for="" class="">Character Name</label>
//         <input type="text" class="form-control" placeholder="Which character do you want to update?" name="character_name_query">
//     </div>


//     <div class="col">
//         <label for="" class="">&nbsp;</label>
//         <input type="submit" value="submit" name="character_query" class="form-control btn btn-dark">
//     </div>
// </div>


// </form> 