<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<?php session_start(); ?>

<?php
if (isset($_GET['add_to_cart'])) {
    // Récupère l'ID du cookie depuis la requête GET
    $cookie_id = $_GET['add_to_cart'];
    // Initialise le panier s'il n'existe pas encore dans la session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    // Vérifie si le cookie est déjà dans le panier
    if (isset($_SESSION['cart'][$cookie_id])) {
        // Ajoute un cookie
        $_SESSION['cart'][$cookie_id]['quantity'] = $_SESSION['cart'][$cookie_id]['quantity'] + 1;
    } else {
        // Ajoute le cookie au panier dans la session avec une quantité de 1
        $_SESSION['cart'][$cookie_id] = $catalog[$cookie_id];
        $_SESSION['cart'][$cookie_id]['quantity'] = 1;
    }
}
?>

<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3>
                            <?= $cookie['name']; ?>
                        </h3>
                        <p>
                            <?= $cookie['description']; ?>
                        </p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>