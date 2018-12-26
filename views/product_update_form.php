<form method="POST" action="product_update.php">
    Title <input type="text" name="title" value="<?php echo $product->title ?>"><br><br>
    Price <input type="number" name="price" value="<?php echo $product->price ?>"><br><br>
    Category_id 
    <select name="category_id">
        <?php foreach ($categories as $category) {
            echo '<option '.($product->category_id == $category->id ? 'selected' : '').' value="'.$category->id.'">'.$category->title.'</option>';
        } ?>
    </select><br><br>
    Collection_id <input type="number" name="collection_id" value="<?php echo $product->collection_id ?>"><br><br>
    <input type="hidden" name="product_id" value="<?php echo $product->id ?>">
    <button type="submit">Создать товар</button>
</form>