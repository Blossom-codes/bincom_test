<?php include "../include/header.php" ?>
<?php #include "../include/nav.inc.php" 
?>

<div class="container vh-100">
    <div class="row h-100">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Please follow the instructions to save results for a new polling unit.</h5>
                    <hr>
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

                    <?php } ?>

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
                                        <button type="submit" class="btn btn-secondary mx-1 w-100 my-3" name="save_state">Next</button>
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
                                        <button type="submit" class="btn btn-secondary mx-1 w-100 my-3" name="save_lga">Next</button>
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
                                                    <option value="<?= $row['ward_id'] ."&".$row['uniqueid']?>"><?= $row['ward_name'] ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="ward">Ward</label>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-outline-secondary mx-1 w-25 my-3" name="save_reset">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                                <polyline points="12 19 5 12 12 5"></polyline>
                                            </svg>
                                        </button>
                                        <button type="submit" class="btn btn-secondary w-100 mx-1 my-3" name="save_ward">Next</button>
                                    </div>

                                <?php }
                                if (isset($_SESSION['state']) && isset($_SESSION['lga']) && isset($_SESSION['ward'])) {
                                ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title fw-light">Finally</h5>
                                            <div class="form-floating mb-3">
                                                <input type="text" name="polling_unit_name" class="form-control" id="polling_unit_name" placeholder="Staff Model College">
                                                <label for="polling_unit_name">Polling Unit Name</label>
                                            </div>
                                            <div class="form-floating">
                                                <input type="text" class="form-control" name="polling_unit_desc" id="polling_unit_desc" placeholder="desc">
                                                <label for="polling_unit_desc">Description</label>
                                            </div>
                                            <div class="d-flex w-100">
                                                <button type="submit" class="btn btn-outline-secondary mx-1 w-25 my-3" name="save_reset">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left">
                                                        <line x1="19" y1="12" x2="5" y2="12"></line>
                                                        <polyline points="12 19 5 12 12 5"></polyline>
                                                    </svg>
                                                </button>
                                                <button type="submit" class="btn btn-warning w-100 mx-1 my-3" name="create_polling_unit">Create Polling Unit</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } ?>

                            </div>


                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../include/footer.php" ?>