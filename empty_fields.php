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
        $character_age = $_POST['character_age'];
    }
    //character powers
    if (empty($_POST['character_powers'])) {
        $errors['character_powers'] = "A character power is required.";
    } else {
        $character_powers = $_POST['character_powers'];
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
        $actor_age = $_POST['actor_age'];
    }
    //actor followers
    if (empty($_POST['actor_followers'])) {
        $errors['actor_followers'] = "Actor followers are required.";
    } else {
        $actor_followers = $_POST['actor_followers'];
    }
    //actor net worth
    if (empty($_POST['actor_net_worth'])) {
        $errors['actor_net_worth'] = "Actor net worth is required.";
    } else {
        $actor_net_worth = $_POST['actor_net_worth'];
    }

    //character description
    if (empty($_POST['character_description'])) {
        $errors['character_description'] = "A character description is required.";
    } else {
        $character_description = $_POST['character_description'];
    }
    //actor description
    if (empty($_POST['actor_description'])) {
        $errors['actor_description'] = "Actor description is required.";
    } else {
        $actor_description = $_POST['actor_description'];
    }