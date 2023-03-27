<?php require "vendor/autoload.php"; ?>

<div class="row text-center mt-5">

    <div class="col-md-6 mx-auto">

        <ul class="pagination pagination-lg flex justify-content-center">
            <?php for ($index = 1; $index <= $numberOfPages; $index++) : ?>


                <?php if (isset($_GET["q"]) && !empty($_GET["q"])) : ?>


                    <?php if (isset($_GET["page"]) && $index == $_GET["page"]) : ?>

                        <li class="page-item active"><a class="page-link rounded-0" href="<?= base_url("explore.php") . "?page=" . $index . "&q=" . $_GET["q"]  ?>"><?= $index ?></a></li>

                    <?php else : ?>


                        <li class="page-item"><a class="page-link rounded-0" href="<?= base_url("explore.php") . "?page=" . $index . "&q=" . $_GET["q"] ?>"><?= $index ?></a></li>


                    <?php endif ?>



                <?php else: ?>


                    <?php if (isset($_GET["page"]) && $index == $_GET["page"]) : ?>
    
                        <li class="page-item active"><a class="page-link rounded-0" href="<?= base_url("explore.php") . "?page=" . $index  ?>"><?= $index ?></a></li>
    
                    <?php else : ?>
    
    
                        <li class="page-item"><a class="page-link rounded-0" href="<?= base_url("explore.php") . "?page=" . $index  ?>"><?= $index ?></a></li>
    
    
                    <?php endif ?>


                <?php endif ?>








            <?php endfor ?>
        </ul>

    </div>

</div>