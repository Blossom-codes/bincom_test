<?php
include "functions.inc.php";
include "autoloader.inc.php";


if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['next_state'])) {
    $state = $_SESSION['state'] = $_POST['state'];
    header("location: ../view/view_pu_results.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['next_lga'])) {
    $lga = $_SESSION['lga'] = $_POST['lga'];
    header("location: ../view/view_pu_results.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['get_result'])) {
    $ward = $_SESSION['ward'] = $_POST['ward'];

    header("location: ../view/view_pu_results.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['reset'])) {
    unset($_SESSION['state']);
    unset($_SESSION['lga']);
    unset($_SESSION['ward']);
    header("location: ../view/view_pu_results.php");
}
// if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit_lga'])) {
//     $user = new User_contr;
//     $lga_id = $_POST['lga'];
//     $ward = $user->viewData("ward", "lga_id", $lga_id);
//     $totalScore =  0;
//     while ($wardRow = $ward->fetch()) {
//         echo "<pre>".  $ward_id = $wardRow['ward_id'];
//         $totalScore += $ward_id;
//         $pollingUnit = $user->viewDataWithTwoParam("polling_unit", "ward_id", "$ward_id", "lga_id", "$lga_id");
//             $pollingUnitRow = $pollingUnit->fetch();
//                 $pollingUnitUniqueId = $pollingUnitRow['uniqueid'];
//                 echo "<pre>". $pollingUnitUniqueId ?? "";
//         //         $pollingUnitScore = $user->viewData("announced_pu_results", "polling_unit_uniqueid", $pollingUnitUniqueId);

//         //         $pollingUnitScoreRow = $pollingUnitScore->fetch();
//         //          $pollingUnitScoreRow['party_score'] ?? "";
//         //          $totalScore += $pollingUnitScoreRow['party_score'];                 
//         //         }

//     }
//     echo "<pre>" . $totalScore;
//     // echo $totalScore ?? "";
// header("location: ../view/view_total_results.php");

// }
