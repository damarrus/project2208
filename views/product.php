<?php require_once '../templates/header.php';
    require_once '../models/Product.php';
?>
   
   
            
<link rel="stylesheet" href="../css/product.css">


<div class="product-img">
</div>

<div class="product-description">
    <h1 class="product-title">
        <?php 
            $product = new Product($_GET['product_id']);
            echo $product->title;
        ?>  
    </h1>
        <h4>Артикул 380954</h4>
            <br>
                <h3><i class="product-price">
                        <?php 
                            $product = new Product($_GET['product_id']);
                            echo $product->price . ' руб.';
                        ?> 
                    </i>
                <h3>
                    <br>
                        <p>Отличные кеды из водонепроницаемого материала. Отлично подходят для любой погоды. Приятно сидят на ноге, стильные и комфортные</p>
                            <br>
</div>

<div class="product-size">
    <h3>РАЗМЕР</h3>
        <div class="sizes">
            <div class="size" value="38">38</div>
            <div class="size" value="39">39</div>
            <div class="size" value="40">40</div>
            <div class="size" value="41">41</div>
            <div class="size" value="42">42</div>
        </div>
</div>
<div class="product-button" id="product-button">
    <span>Добавить в корзину</span>
</div>


<?php require_once '../templates/footer.php' ?>
