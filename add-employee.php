<?php
include './Layoutes/header.php';
include './Layoutes/nav.php';
include './HelperClasses/functionalty.php';
include './HelperClasses/FormValidator.php';
include './HelperClasses/FormHandler.php';

// Initialize variables with default values
$name = '';
$email = '';
$department = '';
$password = '';
$errors = [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $password = $_POST['password'];

    $errors = FormHandler::handleFormSubmission($name, $email, $department, $password);
}

// Rest of your code remains unchanged
?>
<!-- Content -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 p-3 shadow rounded">
            <h2 class="p-3 col text-center mt-3 text-white bg-dark rounded">
                <?php echo FileProcessor::fileNameFromUrl() ?>
            </h2>
            <div class="container p-3 mt-3 custom-form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <?php if (isset($errors['name'])): ?>
            <div class="text-danger"><?php echo $errors['name']; ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <?php if (isset($errors['email'])): ?>
            <div class="text-danger"><?php echo $errors['email']; ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="department" class="form-label">Department:</label>
        <select class="form-select" id="department" name="department">
            <option value="">Select a department</option>
            <option value="HR" <?php if ($department === 'HR') echo 'selected'; ?>>HR</option>
            <option value="IT" <?php if ($department === 'IT') echo 'selected'; ?>>IT</option>
            <option value="Marketing" <?php if ($department === 'Marketing') echo 'selected'; ?>>Marketing</option>
            <!-- Add more department options as needed -->
        </select>
        <?php if (isset($errors['department'])): ?>
            <div class="text-danger"><?php echo $errors['department']; ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password">
        <?php if (isset($errors['password'])): ?>
            <div class="text-danger"><?php echo $errors['password']; ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>
</form>

            </div>
        </div>
    </div>
</div>

<?php include './Layoutes/footer.php'; ?>
