<?php require 'inc/head.php'; ?>
<?php require 'inc/data/products.php';
if(empty($_SESSION['login']))
{
    header('Location: login.php');
    exit();
}
?>

<?php $quantities = array_count_values($_SESSION['cart']); ?>
    <section class="cookies container-fluid">
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th>Réf.</th>
                    <th>Preview</th>
                    <th>Produit</th>
                    <th>Prix U.</th>
                    <th>Quantité</th>
                    <th>Prix Tot.</th>
                </tr>
                </thead>
                <tbody>
                <?php $totalPrice = 0; ?>
                <?php foreach ($_SESSION['cart'] as $productId => $quantities){ ?>
                    <tr>
                        <td><?= $productId;?></td>
                        <td><img src="assets/img/product-<?= $productId; ?>.jpg" alt="<?= $catalog[$productId]['name']; ?>"
                                 style="height: 70px" class="img-responsive">
                        </td>
                        <td><?= $catalog[$productId]['name'];?></td>
                        <td><?= $catalog[$productId]['price'];?></td>
                        <td>
                            <a href="?reduce_in_cart=<?= $productId; ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                            </a>
                            <?= $quantities;?>
                            <a href="?add_to_cart=<?= $productId; ?>" class="btn btn-primary">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </a>
                        </td>
                        <td><?= $rowTotalPrice = $quantities * $catalog[$productId]['price'];?></td>
                    </tr>
                    <?php $totalPrice += $rowTotalPrice; ?>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5">
                        Total :
                    </td>
                    <td>
                        <?= $totalPrice; ?>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </section>
<?php require 'inc/foot.php'; ?>