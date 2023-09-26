<?php
// Include the 'DataBase' class
include $_SERVER['DOCUMENT_ROOT'] . '/php/php-oop/employees/HelperClasses/DataBase.php';

class FormHandler {
    public static function handleFormSubmission($name, $email, $department, $password) {
        $errors = [];
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!self::validateName($name)) {
                $errors['name'] = "Name is required";
            }

            if (!self::validateEmail($email)) {
                $errors['email'] = "Invalid email format";
            }

            if (!self::validateDepartment($department)) {
                $errors['department'] = "Please select a valid department";
            }

            if (!self::validatePassword($password)) {
                $errors['password'] = "Password should be at least 6 characters long";
            }

            if (empty($errors)) {
                // Process the submitted data here
                // For example, you can insert it into a database or perform other actions
                $db = new DataBase();

                $newPassword = $db->enc_password($password);
                $sql = "INSERT INTO employees (name, email, department, password) 
                        VALUES ('$name', '$email', '$department', '$newPassword')";
                
                $insertResult = $db->insert($sql);

                if ($insertResult === "Added successfully") {
                    $success = "Data added successfully.";
                }
            }
        }

        return ['errors' => $errors, 'success' => $success];
    }

    public static function validateName($name) {
        return !empty($name);
    }

    public static function validateEmail($email) {
        return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validateDepartment($department) {
        $validDepartments = ['HR', 'IT', 'Marketing'];
        return in_array($department, $validDepartments);
    }

    public static function validatePassword($password) {
        return !empty($password) && strlen($password) >= 6;
    }

    public static function displaySuccess($message) {
        if (!empty($message)) {
            return '<div class="alert alert-success">' . $message . '</div>';
        }
        return '';
    }
}
?>
