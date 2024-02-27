<?php require 'inc/head.php'; ?>
<?php session_start(); ?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($_SESSION['cart'] as $id => $cookie) { ?>
            <h3><?= $cookie['name']; ?></h3>
            <p><?= $cookie['description']; ?></p>
            <p><?= $cookie['quantity']; ?></p>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
