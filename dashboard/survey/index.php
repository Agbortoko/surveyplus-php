<?php

use Surveyplus\App\Controllers\SurveyController;

$pageTitle = "All Surveys"; ?>

<?php require "../../vendor/autoload.php"; ?>

<?php require DASHBOARD_PATH . "/partials/header.php" ?>

<?php

$surveys = new SurveyController();

$all_surveys = $surveys->show();

?>

<body class="sb-nav-fixed">

    <?php require DASHBOARD_PATH . "/partials/navigation.php" ?>

    <div id="layoutSidenav">

        <?php require DASHBOARD_PATH . "/partials/sidebar.php" ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">


                    <?php require DASHBOARD_PATH . "/partials/notification.php" ?>

                    <div class="row align-items-center">
                        <div class="col-md-6">

                            <h1 class="mt-4"><?= $pageTitle ?></h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">See All Existing Surveys</li>
                            </ol>

                        </div>
                        <div class="col-md-6 text-start text-md-end mb-5 mb-md-0">

                            <?php if (isset($_SESSION["handle"]) & !empty($_SESSION["handle"])) : ?>
                                <p class="mb-0 fs-2"><?= $_SESSION["full_name"] ?> </p>
                                <p class="mb-0 fs-5"><?= $_SESSION["handle"] ?> </p>
                            <?php endif ?>

                        </div>
                    </div>

                    <!-- Surveys table -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            <?= $pageTitle ?> Table
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Published</th>
                                        <th>Expires</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Published</th>
                                        <th>Expires</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if (isset($all_surveys) && !empty($all_surveys)) : ?>
                                        <?php foreach ($all_surveys as $survey) : ?>

                                            <tr>
                                                <td>
                                                    <?= $survey["name"] ?>
                                                    <div class="d-block p-0">
                                                        <a href="<?= DASHBOARD_URL . '/survey/edit.php?survey=' . $survey['id'] . '&action=edit' ?>">Edit Survey</a>
                                                    </div>
                                                </td>
                                                <td><?= $survey["description"] ?></td>
                                                <td><?= $survey["createdOn"] ?></td>
                                                <td><?= $survey["updatedOn"] ?></td>
                                                <td>
                                                    <?php if($survey["published"] == 1): ?>
                                                        <span class="badge bg-primary">Published</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-secondary">Not Published</span>
                                                    <?php endif ?>
                                                </td>
                                                <td><?= $survey["expiresOn"] ?></td>
                                                <td>
                                                    <?php if($survey["published"] != 1): ?>
                                                        <button class="btn btn-sm btn-danger">Delete</button>
                                                    <?php endif ?>
                                                </td>
                                            </tr>

                                        <?php endforeach ?>


                                    <?php endif ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </main>


            <?php require DASHBOARD_PATH . "/partials/content-footer.php" ?>

        </div>

    </div>


    <?php require DASHBOARD_PATH . "/partials/footer.php" ?>

</body>

</html>