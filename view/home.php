<?php include "../include/header.php" ?>
<?php #include "../include/nav.inc.php" 
?>

<div class="container">
    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="row">

            <div class="col-12 col-md-4 p-1">
                <a class="text-decoration-none link-dark" href="store_new_results.php">
                    <div class="card bg-warning text-light p-3 p-md-4" style="height: 170px;">
                        <div class="card-body">
                            <h5 class="card-title text-center">Store New Results</h5>
                            <p class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                    <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                    <polyline points="7 3 7 8 15 8"></polyline>
                                </svg>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 p-1">
                <a class="text-decoration-none link-dark" href="view_total_results.php">
                    <div class="card bg-primary text-light p-3 p-md-4" style="height: 170px;">
                        <div class="card-body">
                            <h5 class="card-title text-center">Total LGA Result</h5>
                            <p class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                    <polyline points="13 2 13 9 20 9"></polyline>
                                </svg>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4 p-1">
                <a class="text-decoration-none link-dark" href="view_pu_results.php">
                    <div class="card bg-success text-light p-3 p-md-4" style="height: 170px;">
                        <div class="card-body">
                            <h5 class="card-title text-center">Polling Unit Results</h5>
                            <p class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>

<?php unset($_SESSION['state']);
unset($_SESSION['lga']);
unset($_SESSION['ward']);
include "../include/footer.php" ?>