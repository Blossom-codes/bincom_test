
<script src="../assets/script/sweetalert.min.js"></script>
<!-- <script>
  swal({
    title: "hi",
    text: "hello",
    icon: "success",
    button: true
  });
</script> -->
<script>
    <?php
    if ($_SESSION['success']) {
    ?>
        swal({
            title: "<?= success_msg("")['title'] ?>",
            text: "<?= success_msg("")['msg'] ?>",
            icon: "<?= success_msg("")['icon'] ?>",
            button: "<?= success_msg("")['button'] ?>",
        });
    <?php
    } ?>
</script>
<script>
    <?php
    if ($_SESSION['error']) {
    ?>
        swal({
            title: "<?= error_msg("")['title'] ?>",
            text: "<?= error_msg("")['msg'] ?>",
            icon: "<?= error_msg("")['icon'] ?>",
            button: "<?= error_msg("")['button'] ?>",
        });
    <?php
    } ?>
</script>
<script src="../assets/aos/aos.js"></script>
<script>
    AOS.init({
        duration: 2000
    });
</script>
<script src="../assets/script/nav.js"></script>
<script src="../assets/script/loader.js"></script>
<script src="../assets/script/popper.js"></script>
<script src="../assets/script/bootstrap.min.js"></script>
</body>

</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['success']);
unset($_SESSION['values']);
unset($_SESSION['user']);
?>