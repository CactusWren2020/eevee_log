<?php 
include('templates/header.php');
?>

<div class="container-fluid">
    <div class="row">
        <div class="col col-md-4 col-lg-2">
        <ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">Disabled</a>
  </li>
</ul>
        </div>

        <div class="col col-md-8 col-lg-10 bg-light px-5 overview">
            <h2 class="py-5 display-4">Overview</h2>
            <div class="row mb-5">
                <div class="col bg-primary rounded tab mr-4 shadow p-5">EeVees</div>
                <div class="col bg-success rounded tab mr-4 shadow p-5">Page views</div>
                <div class="col bg-danger rounded tab mr-4 shadow p-5">Edits Made</div>
                <div class="col bg-warning rounded tab shadow p-5">Users</div>
            </div>
            <div class="row mb-5">
                <div class="col rounded report mr-4 shadow p-5">Characters Added</div>
                <div class="col rounded report shadow p-5">Edits by User</div>
            </div>
            <div class="row mb-5">
                <div class="col col-md-6 col-lg-8 rounded report mr-4 shadow p-5">
                lorem
                </div>
                <div class="col rounded report shadow p-5">
                lorem
                </div>
            </div>
        </div>
    </div>

</div>



<?php
include('templates/footer.php');