<?php

require_once '../db.php';

class Collection
{
    public $id;
    public $title;
    public $description;

    public function __construct($id)
    {
        global $mysqli;

        $query = "SELECT collection_id, title, description FROM collections 
            WHERE collection_id = $id";
        $result = $mysqli->query($query);

        $data = $result->fetch_assoc();

        $this->id = $data['collection_id'];
        $this->title = $data['title'];
        $this->description = $data['description'];
    }

    public static function getAll()
    {
        global $mysqli;

        $query = "SELECT collection_id FROM collections";
        $result = $mysqli->query($query);
        // var_dump($result);
        $row_cnt = mysqli_num_rows($result);
        if ($row_cnt == 0) {
            return $error;
        } else if ($row_cnt != 0) {
            $collections = [];
            while ($Collection_data = $result->fetch_assoc()) {
                $collections[] = new Collection($Collection_data['collection_id']);
            }
            return $collections;
        }
    }
}
    // $Collection = new Collection(2);
    // var_dump($Collection->title);

    // $collections = Collection::getAll();
    // var_dump($collections);

    // foreach ($collections as $collection) {
    //       echo '<h1>'.$collection->title.'</h1>';
    // }