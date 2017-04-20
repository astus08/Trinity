<?php
require "header.php"; 

if (!isset($_SESSION['id'])) {
	header('Location: index.php');
} 

if (!empty($_SESSION['basket']) && isset($_SESSION['basket'])) {
    # code...
    ?>
        <a href="cart.php"><img src="images/cart.svg" style="width: 50px;"/> </a>
    <?php
}

if (isset($_GET['id_product'])){ 
    $idProduct = $_GET['id_product']; ?>

    <article class="presentation" ng-controller="articleCtrl" ng-init="init('<?php echo $idProduct; ?>')">
        {{product.title}} {{product.price}} € {{product.categoryName}}
    </article>

    <form action="../controller/Shop_Controller.php" method="POST">
        <input style="display: none;" name="id_product" type="text" value="<?php echo $_GET['id_product']; ?>">
        <input type="submit" name="buy" value="buy">
    </form>

<?php } else { ?>

<p>The BDB is aslo purpose some articles that you can buy. The benefits can help us to purpose new activities.</p>

<div ng-controller="shopCtrl">
    <div class="options"> Oder by :
        <select name="order" ng-model="sort.model">
            <option ng-repeat="option in sort.options" value="{{option.value}}">{{option.display}}</option>
        </select>
        <input type="text" class="research-field" ng-model="searchField.title" value="" placeholder="Search">
	</div>
    <ul class="grid">
        <li class="product" ng-repeat="product in products" >
            <a href="shop.php?id_product={{product.id_product}}">
				<img src="{{product.img}}" alt="{{picture.id_product}}" style="width: 200px; height: 200px;">
                {{product.title}} {{product.price}} € {{product.categoryName}}
			</a>
        </li>
    </ul>
</div>

<?php }

require "footer.php"
?>