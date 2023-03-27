<?php $pageTitle = "Mini API"; ?>

<?php require "partials/header.php" ?>

<?php require "partials/navigation.php" ?>



<main>
<section class="bg-light p-5 px-lg-0 py-lg-5">

    <div class="container">

        <h2 class="text-center fw-bolder">survey+ Features</h2>


        <div class="row mt-5 py-5 align-items-center">


            <div class="col-lg-3">

                <div class="card h-100">

                    <div class="card-header">
                       <h4 class="fw-bold text-center"> Create Surveys</h3>
                    </div>

                    <div class="card-body text-center">
                        <p class="mb-0 fs-6"><small>Create as many surveys as you want and invite already existing survey takers through email for a survey</small></p>
                    </div>

                    <div class="card-footer text-center">
                        <a href="<?= base_url("signup.php") ?>" class="btn btn-primary rounded-0 text-center text-white w-100" target="_blank">Sign Up</a>
                    </div>

                </div>

            </div>


             <div class="col-lg-3">

                <div class="card h-100">

                    <div class="card-header">
                       <h4 class="fw-bold text-center"> Email Verification</h3>
                    </div>

                    <div class="card-body text-center">
                        <p class="mb-0 fs-6"><small>All emails of surveys takers are verified! Hence you're sure your survey invitations are received</small></p>
                    </div>

                    <div class="card-footer text-center">
                    <a href="<?= base_url("signup.php") ?>" class="btn btn-outline-secondary rounded-0 text-center w-100" target="_blank">Sign Up</a>
                    </div>

                </div>

            </div>


             <div class="col-lg-3">

                <div class="card h-100">

                    <div class="card-header">
                       <h4 class="fw-bold text-center"> Survey Statistics</h3>
                    </div>

                    <div class="card-body text-center">
                        <p class="mb-0 fs-6"><small>Have an idea of how many surveys you've already created and other important statistics</small></p>
                    </div>

                    <div class="card-footer text-center">
                        <a href="<?= base_url("signup.php") ?>" class="btn btn-primary rounded-0 text-center text-white w-100" target="_blank">Sign Up</a>
                    </div>

                </div>

            </div>


             <div class="col-lg-3">

                <div class="card h-100">

                    <div class="card-header">
                       <h4 class="fw-bold text-center">Add Questions</h3>
                    </div>

                    <div class="card-body text-center">
                        <p class="mb-0 fs-6"><small>Adddd as many questions as you want, of different types like simple text, one choice or multi-choice questions</small></p>
                    </div>

                    <div class="card-footer text-center">
                        <a href="<?= base_url("signup.php") ?>" class="btn btn-outline-secondary rounded-0 text-center w-100" target="_blank">Sign Up</a>
                    </div>

                </div>

            </div>
           



        </div>


    </div>


</section>


</main>



<?php require "partials/footer.php" ?>