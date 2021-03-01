<?php 
include('session.php');
include('logic/top-logic.php');
include('templates/header.php');  

?>


<div class="container">
    <div class="row my-5">
        <div class="col mb-5">
        <div class="card">
        <img src="
        <?php
        echo $top_rich[0][0];
        ?>
        " alt="" class="card-img-top img-fluid">
        <div class="card-body">
        <h2 class="my-3">Richest EeVees</h2>
        <ul class="list-group">
    <?php 
    foreach($richest as $eevee): ?>
    <li class="list-group-item">
        <?php echo $eevee[0];
            echo ', $' . $eevee[1];
        ?>
    </li>

    <?php endforeach; ?>
        </ul>
        </div>
        </div>
        
          
        </div>
        <div class="col mb-5">
        <div class="card">
        <div class="card-body">
        <img src="
        <?php
        echo $top_popular[0][0];
        ?>
        " alt="" class="card-img-top img-fluid">
        <h2 class="my-3">Most Social Media Followers</h2>
        <ul class="list-group">
        <?php 
       foreach($popular as $eevee): ?>
        <li class="list-group-item">
           <?php echo $eevee[0]; 
                echo ', ' . $eevee[1] . ' followers';
            ?>  
        </li>
      <?php endforeach; 
        ?>
        </ul>
        </div>
        </div>
        
        
        </div>
    </div>
</div>