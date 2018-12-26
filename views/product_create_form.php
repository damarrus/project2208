<form method="POST" action="product_create.php">
    Title <input type="text" name="title"><br><br>
    Price <input type="number" name="price"><br><br>
    Category_id 
    <select name="category_id">
        <?php foreach ($categories as $category) {
            echo '<option value="'.$category->id.'">'.$category->title.'</option>';
        } ?>
    </select><br><br>
    Collection_id <input type="number" name="collection_id"><br><br>
    <button type="submit">Создать товар</button>
</form>