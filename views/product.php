<?php require_once '../templates/header.php';?>      
<link rel="stylesheet" href="../css/product.css">


<div class="product-img"></div>

<div class="product-description">
    <h1 class="product-title">
        <?php 
            echo $product->title;
        ?>  
    </h1>
        <h4 class="pb">Артикул 380954</h4>
        <h3 class="product-price pb">
            <?php 
                echo $product->price . ' руб.';
            ?>
        </h3>
        <p class="pb">Отличные кеды из водонепроницаемого материала. Отлично подходят для любой погоды. Приятно сидят на ноге, стильные и комфортные</p>
</div>

<div class="product-size pb">
    <h3>РАЗМЕР</h3>
    <div class="sizes">
    <?php 
        foreach ($sizes as $size) {
            echo '<div class="sizes-item"><p>'.$size->value.'</p></div>';
            }
    ?>
    </div>
</div>
<div class="product-button" id="product-button">
    <span>Добавить в корзину</span>
</div>


<?php require_once '../templates/footer.php' ?>
