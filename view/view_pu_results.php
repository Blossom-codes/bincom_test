<?php include "../include/header.php" ?>
<?php #include "include/nav.inc.php" 
?>

<div class="container vh-100">
    <div class="row m-2">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <?php if (!isset($_SESSION['state'])) { ?>
                        <h5 class="card-title m-2">Please Select a State</h5>
                    <?php
                    } elseif (!isset($_SESSION['lga'])) {
                    ?>
                        <h5 class="card-title m-2">Please Select a LGA</h5>
                    <?php
                    } elseif (!isset($_SESSION['ward'])) {
                    ?>
                        <h5 class="card-title m-2">Please Select a Ward</h5>

                    <?php } elseif (isset($_SESSION['state']) && isset($_SESSION['lga']) && isset($_SESSION['ward'])) { ?>
                        <h5 class="card-title m-2">Polling Unit Result</h5>
                    <?php } ?>
                    <hr>
                    <form action="../include/results.inc.php" method="post">
                        <div class="row">


                            <div class="col-12">
                                <?php if (!isset($_SESSION['state'])) { ?>
                                    <div class="form-floating">
                                        <select class="form-select" id="state" name="state" aria-label="Floating label select example">
                                            <option value="25" selected>Delta</option>
                                        </select>
                                        <label for="state">State</label>
                                    </div>
                                    <div class="d-flex">
                                        <a href="home.php" class="btn btn-outline-secondary mx-1 w-25 my-3">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                                <polyline points="12 19 5 12 12 5"></polyline>
                                            </svg>

                                        </a>
                                        <button type="submit" class="btn btn-secondary mx-1 w-100 my-3" name="next_state">Next</button>
                                    </div>
                                <?php
                                } elseif (!isset($_SESSION['lga'])) {
                                ?>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="lga" name="lga" aria-label="Floating label select example">
                                                <?php
                                                $user = new User_contr;
                                                $stmt = $user->viewData("lga", "state_id", $_SESSION['state']);
                                                while ($row = $stmt->fetch()) {

                                                ?>
                                                    <option value="<?= $row['lga_id'] ?>"><?= $row['lga_name'] ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="lga">LGA</label>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-outline-secondary mx-1 w-25 my-3" name="reset">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                                <polyline points="12 19 5 12 12 5"></polyline>
                                            </svg>
                                        </button>
                                        <button type="submit" class="btn btn-secondary mx-1 w-100 my-3" name="next_lga">Next</button>
                                    </div>
                                <?php
                                } elseif (!isset($_SESSION['ward'])) {
                                ?>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <select class="form-select" id="ward" name="ward" aria-label="Floating label select example">

                                                <?php
                                                $user = new User_contr;
                                                $stmt = $user->viewData("ward", "lga_id", $_SESSION['lga']);
                                                while ($row = $stmt->fetch()) {

                                                ?>
                                                    <option value="<?= $row['ward_id'] ?>"><?= $row['ward_name'] ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="ward">Ward</label>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-outline-secondary mx-1 w-25 my-3" name="reset">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                                <polyline points="12 19 5 12 12 5"></polyline>
                                            </svg>
                                        </button>
                                        <button type="submit" class="btn btn-success w-100 mx-1 my-3" name="get_result">Get Result</button>
                                    </div>

                                <?php } ?>

                            </div>


                        </div>


                        <?php
                        if (isset($_SESSION['state']) && isset($_SESSION['lga']) && isset($_SESSION['ward'])) {
                            $user1 = new User_contr;
                            $stmt1 = $user1->viewDataWithTwoParam("polling_unit", "ward_id", $_SESSION['ward'], "lga_id", $_SESSION['lga']);
                            while ($pollingUnitRow = $stmt1->fetch()) {

                                $user2 = new User_contr;
                                $stmt2 = $user2->viewData("announced_pu_results", "polling_unit_uniqueid", $pollingUnitRow['uniqueid']);

                        ?>
                                <div class="card">
                                    <div class="card-body d-flex justify-content-between">
                                        <div class="">
                                            <h5 class="card-title">Polling Unit: <?= $pollingUnitRow['polling_unit_name'] ?></h5>
                                            <p class="card-text">Description: <?= $pollingUnitRow['polling_unit_description'] ?></p>


                                        </div>
                                        <div class="text-center">
                                            <?php $pollingUnitUniqueRow = $stmt2->fetch(); ?>
                                            Party: <?= $pollingUnitUniqueRow['party_abbreviation'] ?? null ?>
                                            <p class="fw-bold fs-2"><?= $pollingUnitUniqueRow['party_score'] ?? "no result" ?></p>

                                        </div>
                                    </div>
                                </div>
                            <?php }
                            ?>

                            <button type="submit" class="btn btn-outline-secondary w-100 m-3" name="reset">Reset</button>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../include/footer.php" ?>