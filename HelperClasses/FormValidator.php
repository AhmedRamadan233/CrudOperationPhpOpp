<?php
class FormValidator {
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
