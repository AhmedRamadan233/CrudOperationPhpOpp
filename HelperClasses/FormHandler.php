<?php
require_once 'FormValidator.php'; // Use require_once to include the FormValidator.php file

class FormHandler {
    public static function handleFormSubmission($name, $email, $department, $password) {
        $errors = [];

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
        }

        return $errors;
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
}

?>
