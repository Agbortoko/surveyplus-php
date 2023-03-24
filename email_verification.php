<?php $pageTitle = "Home"; ?>

<?php require "partials/header.php" ?>


<?php

use Surveyplus\App\Middleware\CheckLoggedInUser;
$guestOnly = new CheckLoggedInUser();
$guestOnly->guestOnly();

?>

<?php require "partials/navigation.php" ?>


<main class="container h-screen d-flex justify-content-center align-items-center">

    <?php if(!isset($_GET["error"])): ?>

        <?php require "partials/notification.php"?>
        

        <div class="container">

            <div class="row">

                <div class="col-lg-5 mx-auto">
                    <div class="card rounded-0 border border-1 border-primary">
            
                    <div class="card-header">
                        <h3 class="text-center"><span class="fw-bold">survey+</span> Email Verification</h3>
                    </div>

                    <div class="card-body text-center py-4">

                        <h4>Hello!</h4>

                        <a href="#" class="btn btn-primary btn-lg rounded-0 text-center text-white">Click to Your Verify Email Address</a>

                        <p class="mb-0 mt-3">Verify your email address to validate your survey submission</p>

                    </div>
            
            
                    </div>

                </div>
            </div>


        </div>

    <?php endif ?>


</main>


<?php require "partials/footer.php" ?>