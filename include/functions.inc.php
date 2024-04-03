<?php

function error_msg($input)
{
    if ($input == "") {
        return $_SESSION['error'];
    } elseif (isset($_SESSION['error'][$input])) {
        return $_SESSION['error'][$input];
    }
}
function success_msg($input)
{
    if ($input == "") {
        return $_SESSION['success'];
    } elseif (isset($_SESSION['success'][$input])) {
        return $_SESSION['success'][$input];
    }
}

function save_error($input, $error_msg)
{
    return  $_SESSION['error'][$input] = $error_msg;;
}
function save_success($input, $success_msg)
{
    return $_SESSION['success'][$input] = $success_msg;;
}
function save_pop_up_error($title, $error_msg, $icon, $button)
{
    return  $_SESSION['error'] = [
        "title" => $title,
        "msg" => $error_msg,
        "icon" => $icon,
        "button" => $button,
    ];
}
function save_pop_up_success($title, $success_msg, $icon, $button)
{
    return  $_SESSION['success'] = [
        "title" => $title,
        "msg" => $success_msg,
        "icon" => $icon,
        "button" => $button,
    ];
}
function fail()
{
    if (isset($_SESSION['error'])) {
        return true;
    } else {
        return false;
    }
}
function validating($case, $data, $input)
{
    switch ($case) {
        case 'required':
            if (empty($data)) {
                save_error($input, "$input cannot be empty");
            }
            break;
        case 'number':
            $int = filter_var((int)$data, FILTER_VALIDATE_INT);
            if (!($int)) {
                save_error($input, "Please enter a valid number");
            }
            break;
        case 'email':
            $email = filter_var($data, FILTER_VALIDATE_EMAIL);
            if (!($email)) {
                save_error($input, "Email format required");
            }
            break;
            // case 'confirm_password':
            //     if (!(compare($_POST['password'],$data))) {
            //         save_error($input, "Password do not match");
            //     }
            //     break;
        case 'checkbox':
            if (empty($data)) {
                save_error($input, "Accept terms and conditions to continue");
            }
            break;
            // case 'file':
            //     file_upload($data, $input);
            //     break;
    }
}
// function money_format($money)
// {
// if (count($money) == 4) {
    
// }
// }
