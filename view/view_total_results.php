<?php include "../include/header.php" ?>
<?php #include "../include/nav.inc.php" 
?>

<div class="container vh-100">
    <div class="row h-100">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Please select a local government area(LGA)</h5>
                    <hr>
                   
                    <form action="../include/results.inc.php" method="post">
                        <div class="form-floating">
                            <select class="form-select" name="lga" id="floatingSelect" aria-label="Floating label select example">
                                <?php
                                $user = new User_contr;
                                $stmt = $user->viewData("lga", "state_id", 25);
                                while ($row = $stmt->fetch()) {

                                ?>
                                    <option value="<?= $row['lga_id'] ?>"><?= $row['lga_name'] ?></option>

                                <?php
                                }
                                ?>
                            </select>
                            <label for="floatingSelect">LGA</label>
                        </div>
                        <button type="submit" name="submit_lga" class="btn btn-primary w-100 mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "../include/footer.php" ?>