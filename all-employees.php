<?php


include 'Layoutes/header.php';
include 'Layoutes/nav.php';
include './HelperClasses/functionalty.php';
include $_SERVER['DOCUMENT_ROOT'] . '/php/php-oop/employees/HelperClasses/DataBase.php';


// Assuming you have a database connection, you can fetch data here
$db = new DataBase(); // Replace with your actual database class
$tableData = $db->read('employees'); // Replace with your table name



// Content
?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 p-3 shadow rounded">
            <h2 class="p-3 col text-center mt-3 text-white bg-dark rounded">
                <?php echo FileProcessor::fileNameFromUrl() ?>
            </h2>
            <div class="p-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tableData as $row): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['department']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary">Edit</button> |
                                    <button type="button" class="btn btn-danger">delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'Layoutes/footer.php' ?>
