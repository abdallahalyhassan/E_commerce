<?php
namespace App;
class Validator {
    private $errors = [];

    // validate strings 
    public function validateString($field, $value, $min = 2, $max = 255) {
        if (empty($value)) {
            $this->errors[$field] = "$field cannot be empty.";
        } elseif (strlen($value) < $min || strlen($value) > $max) {
            $this->errors[$field] = "$field must be between $min and $max characters.";
        }
    }

    //  validate numbers 
    public function validateNumber($field, $value, $min = 0, $max = PHP_INT_MAX) {
        if (!is_numeric($value)) {
            $this->errors[$field] = "$field must be a number.";
        } elseif ($value < $min || $value > $max) {
            $this->errors[$field] = "$field must be between $min and $max.";
        }
    }
// validate emails
    public function validateEmail($field, $value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = "Invalid email format.";
        }
    }

    // validate password
    public function validatePassword($field, $value, $min = 6) {
        if (strlen($value) < $min) {
            $this->errors[$field] = "$field must be at least $min characters.";
        }
    }

    // validate confirm password
    public function validateMatch($field, $value, $matchField, $matchValue) {
        if ($value !== $matchValue) {
            $this->errors[$field] = "$field must match $matchField.";
        }
    }

    // validate dates 
    public function validateDate($field, $value) {
        if (!strtotime($value)) {
            $this->errors[$field] = "$field is not a valid date.";
        }
    }

    //  validate about uploads files  
    public function validateFile($field, $file, $allowedTypes = ["jpg", "jpeg", "png", "pdf"], $maxSize = 5) {
        if ($file["error"] == UPLOAD_ERR_OK) {
            $fileExt = pathinfo($file["name"], PATHINFO_EXTENSION);
            if (!in_array(strtolower($fileExt), $allowedTypes)) {
                $this->errors[$field] = "$field must be one of: " . implode(", ", $allowedTypes);
            }
            if ($file["size"] > ($maxSize * 1024 * 1024)) {
                $this->errors[$field] = "$field must be less than $maxSize MB.";
            }
        } else {
            $this->errors[$field] = "Error uploading $field.";
        }
    }

    // validate empty values
    public function validateRequired($field, $value) {
        if (empty($value)) {
            $this->errors[$field] = "$field is required.";
        }
    }

    //   validate about phone using regex
    public function validateRegexPhone($field, $value, $pattern) {
        if (!preg_match($pattern, $value)) {
            $this->errors[$field] = "invalid mobile number";
        }
    }

    //  validate about unique columns  
    public function validateUnique($field, $value, $table, $column, $conn) {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM $table WHERE $column = ?");
        $stmt->execute([$value]);
        if ($stmt->fetchColumn() > 0) {
            $this->errors[$field] = "$field must be unique.";
        }
    }

    // return errors 
    public function getErrors() {
        return $this->errors;
    }

    // check has error or not
    public function hasErrors() {
        return !empty($this->errors);
    }
}
