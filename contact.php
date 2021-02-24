<?php include('templates/header.php');

//note that the form action goes to contact_handler.php, which has the mail logic
//it also sets a flash message in the $_SESSION["flash"] variable which is used to output the success message here

if (isset($_SESSION["flash"])) {
    $message_to_user = $_SESSION["flash"]["message"];
    unset($_SESSION["flash"]);
}
?>

<div class="container">
    <div class="row my-5">
        <div class="col d-flex justify-content-center">
            <h1>Contact</h1>
        </div>
    </div>
</div>
<!--container-->

<div class="container">
    <div class="row bg-light p-5 mt-5">
        <div class="col">
            <form id="contact_form" method="post" action="logic/contact_handler.php" role="form">


                <div class="controls">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_name">First name *</label>
                                <input id="form_name" type="text" name="first_name" class="form-control" placeholder="Please enter your first name *" required="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_Last name">Last name *</label>
                                <input id="form_lastname" type="text" name="last_name" class="form-control" placeholder="Please enter your last name *" required="required">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_email">Email *</label>
                                <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_need">How can I help you? *</label>
                                <select id="form_need" name="request" class="form-control" required="required">
                                    <option value=""></option>
                                    <option value="Request quotation">I want to add to the database</option>
                                    <option value="Request order status">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_message">Message *</label>
                                <textarea id="form_message" name="message" class="form-control" placeholder="Message for EeVee-base *" rows="4" required="required"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-success btn-send" value="Send message">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-muted">
                                <strong>*</strong> These fields are required.
                            </p>
                        </div>
                    </div>
                    <?php 
                    if ($message_to_user) : ?>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success mt-5" role="alert">
                                <?php echo $message_to_user; ?>
                            </div>
                        </div>
                    </div>
                    
                    <?php endif; ?>

                </div>

            </form>
        </div>
        <div class="col">
            <div class="card pt-3">
                <a href="#"><img class="card-img-top" src="templates/assets/images/sylveon.jpg" alt=""></a>
                <div class="card-body">

                    <h5 class="card-title">
                        Pixi</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Played by: Roxie Rene Rose</h6>

                </div>
            </div>

        </div>
    </div>
</div>
<!--container-->


<?php include('templates/footer.php'); ?>