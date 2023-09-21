<?php
include './Layoutes/header.php';
include './Layoutes/nav.php';
include '../HelperClasses/FileProcessor.php.php';
include '../HelperClasses/FormValidator.php';
include '../HelperClasses/FormHandler.php' ;
 ?>

<!-- Content -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 p-3 shadow rounded">

            <h2 class="p-3 col text-center mt-3 text-white bg-dark rounded">
            <?php echo FileProcessor::fileNameFromUrl() ?>

            </h2>
        </div>
    </div>
</div>

<?php include './Layoutes/footer.php' ?>