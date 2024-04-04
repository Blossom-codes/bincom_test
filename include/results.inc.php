<?php
include "functions.inc.php";
include "autoloader.inc.php";


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['next_state'])) {
    $state = $_SESSION['state'] = $_POST['state'];
    header("location: ../view/view_pu_results.php");
} elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['save_state'])) {
    $state = $_SESSION['state'] = $_POST['state'];
    header("location: ../view/store_new_results.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['next_lga'])) {
    $lga = $_SESSION['lga'] = $_POST['lga'];
    header("location: ../view/view_pu_results.php");
} elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['save_lga'])) {
    $lga = $_SESSION['lga'] = $_POST['lga'];
    header("location: ../view/store_new_results.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['get_result'])) {
    $ward = $_SESSION['ward'] = $_POST['ward'];

    header("location: ../view/view_pu_results.php");
} elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['save_ward'])) {
    $ward = $_SESSION['ward'] = $_POST['ward'];
    header("location: ../view/store_new_results.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['reset'])) {
    unset($_SESSION['state']);
    unset($_SESSION['lga']);
    unset($_SESSION['ward']);
    header("location: ../view/view_pu_results.php");
} elseif ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['save_reset'])) {
    unset($_SESSION['state']);
    unset($_SESSION['lga']);
    unset($_SESSION['ward']);
    header("location: ../view/store_new_results.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit_lga'])) {
    $user = new User_contr;
    echo "<pre> lga_id " . $lga_id = $_POST['lga'];

    $lga = $user->viewData("lga", "lga_id", $lga_id);
    $lgaRow = $lga->fetch();
    $lga_name = $lgaRow['lga_name'];
    $ward = $user->viewData("ward", "lga_id", $lga_id);
    $totalScore =  0;
    while ($wardRow = $ward->fetch()) {
        $ward_id = $wardRow['ward_id'];

        $pollingUnit = $user->viewDataWithTwoParam("polling_unit", "ward_id", "$ward_id", "lga_id", "$lga_id");
        $pollingUnitRow = $pollingUnit->fetch();

        $pollingUnitUniqueId = $pollingUnitRow['uniqueid'] ?? 0;
        // echo "<pre> unique_id " . $pollingUnitUniqueId;
        if ($pollingUnitUniqueId != 0) {
            $pollingUnitScore = $user->viewData("announced_pu_results", "polling_unit_uniqueid", $pollingUnitUniqueId);
            $pollingUnitScoreRow = $pollingUnitScore->fetch();
            $partyScore = $pollingUnitScoreRow['party_score'] ?? 0;
            $totalScore += $partyScore;
        }
    }

    header("location: ../view/view_total_results.php?lga_name=$lga_name&&total_score=$totalScore");
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['create_polling_unit'])) {
    $ward = explode("&", $_SESSION['ward']);
    $ward_id = $ward[0];
    $ward_unique_id = $ward[1];
    $user = new User_contr;
    $stmt = $user->setPollingUnit($_POST['polling_unit_name'], $_POST['polling_unit_desc'], $_SESSION['lga'], $ward_id, $ward_unique_id);
    if ($stmt) {
        save_pop_up_success("Success", "Polling Unit was created successfully", "success", "Ok");
    } else {
        save_pop_up_error("Error", "An error occurred", "error", "Ok");
    }
    var_dump($stmt);
    // header("location: ../view/store_new_results.php");
}
