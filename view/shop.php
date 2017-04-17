<?php
require "header.php"; 

if (!isset($_SESSION['id'])) {
	header('Location: index.php');
} 

if (isset($_GET['id_product'])){ 
    $idProduct = $_GET['id_product']; ?>

    <article class="presentation" ng-controller="articleCtrl" ng-init="init('<?php echo $idProduct; ?>')">
        {{product.title}} {{product.price}} € {{product.categoryName}}
    </article>

    <input type="button" name="" value="buy">

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
        <li class="product" ng-repeat="product in products">
            <a href="shop.php?id_product={{product.id_product}}">
				<img src="{{product.img}}" alt="{{picture.id_product}}">
                {{product.title}} {{product.price}} € {{product.categoryName}}
			</a>
        </li>
    </ul>
</div>

<?php }

require "footer.php"
?>