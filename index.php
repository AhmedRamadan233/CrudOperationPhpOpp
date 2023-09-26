<?php 
 include './Layoutes/header.php';
 include './Layoutes/nav.php';
 include './HelperClasses/functionalty.php' ;
 


include $_SERVER['DOCUMENT_ROOT'] . '/php/php-oop/employees/HelperClasses/DataBase.php';


// Assuming you have a database connection, you can fetch data here
$db = new DataBase(); // Replace with your actual database class
$tableData = $db->read('employees'); // Replace with your table name



// Content
?>
<!-- Content -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 p-3 shadow rounded">

            <h2 class="  p-3 col text-center mt-3 text-white bg-dark rounded">
                <?php echo FileProcessor::fileNameFromUrl() ?>
            </h2>
            <?php
                // An array of different background colors
                $backgroundColors = ["bg-primary", "bg-success", "bg-info", "bg-warning", "bg-danger"];
                // Initialize a counter to track the current background color index
                $currentColorIndex = 0;
                ?>

                <div class="row">
                    <?php foreach ($tableData as $row): ?>
                        <?php
                        // Get the current background color class
                        $currentColorClass = $backgroundColors[$currentColorIndex];
                        // Increment the counter and wrap around if necessary
                        $currentColorIndex++;
                        if ($currentColorIndex >= count($backgroundColors)) {
                            $currentColorIndex = 0;
                        }
                        ?>

                        <div class="col-md-4">
                            <div class="card <?php echo $currentColorClass; ?> mb-3">
                                <div class="card-header"><?php echo $row['id']; ?> | <?php echo $row['department']; ?> </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <p class="card-text"><?php echo $row['email']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
        </div>
    </div>
</div>



<?php include './Layoutes/footer.php' ?>