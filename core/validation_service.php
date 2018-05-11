<?php
    function isEmpty($values){
        foreach ($values as $value) {
            if ($value==null) {
                return "Field cannot be empty.";
            }
        }
        return null;
    }
    function matchPassword($pass1, $pass2){
        if ($pass1 != $pass2) {
            return "Password does not match.";
        }
    }
    function isValidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo 'Invalid email address';
        }
    }
    function calculateAge($date)
    {
        $date1=date_create(date("Y-m-d"));
        $date2=date_create($date);
        return date_diff($date1,$date2);
    }
    function isValidUpdateInfo($user){
        if ($user['fname'] == ''){
            return 'First name required';
        }else if ($user['lname'] == ''){
            return 'Last name required';
        }else if ($user['dob'] == '' ){
            return 'Date of birth required';
        }else if ($user['gender'] == ''){
            return 'Select gender';
        }else if ($user['religion'] == ''){
            return 'Select religion';
        }else if ($user['blood'] == ''){
            return 'Select blood group';
        }else if ($user['email'] == ''){
            return 'Email required';
        }else if ($user['number1'] == ''){
            return 'Number 1 required';
        }else if(!filter_var($user['email'], FILTER_VALIDATE_EMAIL)){
            return 'Invalid email address';
        }else if ($user['height']!='' && !is_numeric($user['height'])){
            return 'Enter valid height';
        }else if ($user['weight']!='' && !is_numeric($user['weight'])){
            return 'Enter valid weight';
        }
    }
?>