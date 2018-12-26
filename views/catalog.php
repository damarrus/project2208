<?php require_once '../templates/header.php';
 require_once '../models/Category.php';
 require_once '../models/Collection.php'?>
<link rel="stylesheet" href="../css/catalog.css">

    <div class="catalog_path">
        <a class="catalog_a" href="#">ГЛАВНАЯ</a>
        <p>/</p>
        <a class="catalog_a" href="#" style="text-transform: uppercase"> 
            <?php 
            echo $collection->title;
            ?> 
        </a>
    </div>
    <h1 class="catalog_hello">
    <?php 
        echo $collection->title;
    ?> 
    
    </h1>
    <h2 class="catalog_descr">Все товары</h2>
    <div class="catalog_list">
        <div class="catalog_list-item">
            <p>Категория</p>
            <div class="catalog_list-item-list">
            <?php 
                $categories = Category::getAll();
                foreach ($categories as $cat) {
                echo '<p>'.$cat->description.'</p>';
            }
            ?>  
                              
            </div>
        </div>
        <div class="catalog_list-item">
            <p>Размер</p>
            <div class="catalog_list-item-list">
                <p>XS</p>
                <p>S</p>
                <p>M</p>
                <p>L</p>
                <p>XL</p>
                <p>XXL</p>
            </div>
        </div>
        <div class="catalog_list-item">
            <p>Стоимость</p>
            <div class="catalog_list-item-list">
                <p>0-1000 руб.</p>
                <p>1000-3000 руб.</p>
                <p>3000-6000 руб.</p>
                <p>6000-20000 руб.</p>
            </div>
        </div>
    </div>
    <!-- <?php foreach ($products as $product) {
        echo '<h1>'.$product->title.'</h1>';
    }
    ?> -->
    <div class="catalog_cards">
        <?php
        foreach ($products as $product) {
            echo '<div class="catalog_cards-item">';
            echo '<a href="../controllers/product.php?product_id='.$product->id.'"><img src="../images/catalog/1.jpg" alt="card_1"></a>';
            echo '<p><a href="../controllers/product.php?product_id='.$product->id.'" id="cards-item-title">'.$product->title.'</a></p>';
            echo '<p id="cards-item-price">'.$product->price.' руб.</p>';
            echo '</div>';
        }
            ?>
    </div>
    <div class="catalog_pages">
        <div class="catalog_pages-item">1</div>
        <div class="catalog_pages-item">2</div>
        <div class="catalog_pages-item">3</div>
        <div class="catalog_pages-item">4</div>
    </div>

<?php require_once '../templates/footer.php' ?>