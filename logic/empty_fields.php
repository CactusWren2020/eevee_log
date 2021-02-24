<?php 
//character name
    if (empty($_POST['character_name'])) {
        $errors['character_name'] = "A character name is required.";
    } else {
        $character_name = $_POST['character_name'];
    }
    //character age
    if (empty($_POST['character_age'])) {
        $errors['character_age'] = "A character age is required.";
    } else {
        $temp = explode(',', $_POST['character_age']);
        $temp = implode('', $temp);
        $character_age = (int)$temp;
    }
    //character powers
    if (empty($_POST['character_powers'])) {
        $errors['character_powers'] = "A character power is required.";
    } else {
        $character_powers = mysqli_real_escape_string($conn, $_POST['character_powers']);
    }
    //actor name
    if (empty($_POST['actor_name'])) {
        $errors['actor_name'] = "An actor name is required.";
    } else {
        $actor_name = $_POST['actor_name'];
    }
    //actor age
    if (empty($_POST['actor_age'])) {
        $errors['actor_age'] = "A character age is required.";
    } else {
        $temp = explode(',', $_POST['actor_age']);
        $temp = implode(',', $temp);
        $actor_age = (int)$temp;
    }
    //actor followers
    if (empty($_POST['actor_followers'])) {
        $errors['actor_followers'] = "Actor followers are required.";
    } else {
        $temp = explode(',', $_POST['actor_followers']);
        $temp = implode('', $temp);
        $actor_followers = (int)$temp;
    }
    //actor net worth
    if (empty($_POST['actor_net_worth'])) {
        $errors['actor_net_worth'] = "Actor net worth is required.";
    } else {
        $temp = explode(',', $_POST['actor_net_worth']);
        $temp = implode('', $temp);
        $actor_net_worth = (int)$temp;
    }

    //character description
    if (empty($_POST['character_description'])) {
        $errors['character_description'] = "A character description is required.";
    } else {
        $character_description = mysqli_real_escape_string($conn, $_POST['character_description']);
    }
    //character personality
    if (empty($_POST['character_personality'])) {
        $errors['character_personality'] = "A character personality is required.";
    } else {
        $character_personality = mysqli_real_escape_string($conn, $_POST['character_personality']);
    }
    //actor description
    if (empty($_POST['actor_description'])) {
        $errors['actor_description'] = "Actor description is required.";
    } else {
        $actor_description = mysqli_real_escape_string($conn, $_POST['actor_description']);
    }
    //actor personality
    if (empty($_POST['actor_personality'])) {
        $errors['actor_personality'] = "An actor personality is required.";
    } else {
        $temp = $_POST['actor_personality'];
        $actor_personality = mysqli_real_escape_string($conn, $temp);
    }