<?php

class Product {

    const SHOW_BY_DEFAULT = 8; // Сколько товаров показывать на странице

    public static function getLatestProducts($page) {

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        // Соединение с БД
        $db = Db::getConnection();
        // Получение и возврат результатов
        $result = $db->query('SELECT id, name, price, image, rating_amount, rating_count FROM product '
                . 'ORDER BY id ASC '                
                . 'LIMIT ' . self::SHOW_BY_DEFAULT
                . ' OFFSET ' . $offset); // 

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['rating_amount'] = $row['rating_amount'];
            $productsList[$i]['rating_count'] = $row['rating_count'];
            $i++;
        }

        return $productsList;
    }

    public static function getProductsByWord($page, $word) {

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        $productsList = array();

        $result = $db->query('SELECT id, name, price, image, rating_amount, rating_count FROM product WHERE name LIKE'.'"%'.$word.'%"'
                . ' ORDER BY id ASC '                
                . 'LIMIT ' . self::SHOW_BY_DEFAULT
                . ' OFFSET ' . $offset); // 

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['rating_amount'] = $row['rating_amount'];
            $productsList[$i]['rating_count'] = $row['rating_count'];
            $i++;
        }

        return $productsList;
    }

    public static function getProductsByGenre($page, $genre) {

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        $productsList = array();

        foreach ($genre as $val) {      
            $result = $db->query('SELECT id, name, price, image, rating_amount, rating_count FROM product WHERE genre=' . $val
                    . ' ORDER BY id ASC '                
                    . 'LIMIT ' . self::SHOW_BY_DEFAULT
                    . ' OFFSET ' . $offset); // 

            $i = 0;
            while ($row = $result->fetch()) {
                $productsList[$i]['id'] = $row['id'];
                $productsList[$i]['name'] = $row['name'];
                $productsList[$i]['image'] = $row['image'];
                $productsList[$i]['price'] = $row['price'];
                $productsList[$i]['rating_amount'] = $row['rating_amount'];
                $productsList[$i]['rating_count'] = $row['rating_count'];
                $i++;
            }
        }

        return $productsList;
    }

    public static function getProductsByRating($page, $rating)
    {
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $db = Db::getConnection();

        $productsList = array();  
        if ($rating != 0 ){
        $result = $db->query('SELECT id, name, price, image, rating_amount, rating_count FROM product WHERE FLOOR(rating_amount/rating_count) =' . $rating
                 . ' ORDER BY id ASC '                
                 . 'LIMIT ' . self::SHOW_BY_DEFAULT
                . ' OFFSET ' . $offset); // 
        }
        else {
            $result = $db->query('SELECT id, name, price, image, rating_amount, rating_count FROM product WHERE rating_amount =' . $rating
                 . ' ORDER BY id ASC '                
                 . 'LIMIT ' . self::SHOW_BY_DEFAULT
                . ' OFFSET ' . $offset); // 
        }
            $i = 0;
            while ($row = $result->fetch()) {
                $productsList[$i]['id'] = $row['id'];
                $productsList[$i]['name'] = $row['name'];
                $productsList[$i]['image'] = $row['image'];
                $productsList[$i]['price'] = $row['price'];
                $productsList[$i]['rating_amount'] = $row['rating_amount'];
                $productsList[$i]['rating_count'] = $row['rating_count'];
                $i++;
            }

        return $productsList;
    }

    public static function getTotalProductsByWord($word) {
    
    $db = Db::getConnection();

    $result = $db->query('SELECT count(id) AS count FROM product WHERE name LIKE'.'"%'.$word.'%"');
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();

    return $row['count'];
    }

    public static function getTotalProductsByGenre($genre) {
    
    $db = Db::getConnection();

    foreach ($genre as $val) {   
        $result = $db->query('SELECT count(id) AS count FROM product WHERE genre=' . $val);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
    }
    return $row['count'];
    }

    public static function getTotalProductsByRating($rating) {
    
    $db = Db::getConnection();
 
    $result = $db->query('SELECT count(id) AS count FROM product WHERE FLOOR(rating_amount/rating_count) =' . $rating);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $row = $result->fetch();

    return $row['count'];
    }


    public static function getTotalProducts() {
    	
        $db = Db::getConnection();

        $result = $db->query('SELECT count(id) AS count FROM product ');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();

        return $row['count'];
    }


    public static function getProductById($id) {
        $id = intval($id);

        if ($id) {                        
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM product WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch();
        }
    }

    public static function getProdustsByIds($idsArray) {

        $products = array();
        
        $db = Db::getConnection();

        $idsString = implode(',', $idsArray);

        $sql = "SELECT * FROM product WHERE id IN ($idsString)";

        $result = $db->query($sql);        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['image'] = $row['image'];
            $i++;
        }

        return $products;
    }

    public static function getProductsList() {

        $db = Db::getConnection();

        $result = $db->query('SELECT id, name, price, image, author FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['author'] = $row['author'];
            $i++;
        }
        return $productsList;
    }

        public static function updateProductById($id, $options) {
        
        $db = Db::getConnection();

        $sql = "UPDATE product
            SET 
                name = :name,
                image = :image, 
                price = :price, 
                author = :author, 
                description = :description 
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);

        return $result->execute();

    }

    public static function createProduct($options)
    {

        $options['genre'] = 'Биография'; // УДАЛИТЬ

        $db = Db::getConnection();

        $sql = 'INSERT INTO product '
                . '(name, price, author,'
                . 'description, image, genre, rating_amount, rating_count)'
                . 'VALUES '
                . '(:name, :price, :author,'
                . ':description, :image, :genre, :rating_amount, :rating_count)';

        $rating_amount = 0;
        $rating_count = 0;
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':image', $options['image'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':author', $options['author'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':genre', $options['genre'], PDO::PARAM_STR);
        $result->bindParam(':rating_amount', $rating_amount, PDO::PARAM_STR);
        $result->bindParam(':rating_count', $rating_count, PDO::PARAM_STR);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

        public static function deleteProductById($id) {
        $db = Db::getConnection();

        $sql = 'DELETE FROM product WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        return true;
    }

    public static function getRatingAmountById($id) {
        $id = intval($id);

        if ($id) {                        
            $db = Db::getConnection();
            
            $result = $db->query('SELECT rating_amount FROM product WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch()['rating_amount'];
        }
    }

    public static function getCountRatingById($id) {
        $id = intval($id);

        if ($id) {                        
            $db = Db::getConnection();
            
            $result = $db->query('SELECT rating_count FROM product WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch()['rating_count'];
        }
    }


    public static function setRating($id, $val, $amount, $count) {

        $db = Db::getConnection();
        //Добавляет новое значение к сумме балов
        $count += 1;
        $sum = ($val + $amount)/$count;
        $sum = ceil($sum/0.5)*0.5; // Округление до 0.5
        $sum += $amount;

        $sql = "UPDATE product
            SET 
                rating_amount = :rating_amount,
                rating_count = :rating_count
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':rating_amount', $sum, PDO::PARAM_STR);
        $result->bindParam(':rating_count', $count, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function addComment($book_id, $name, $comment, $image) {

        $db = Db::getConnection();

        $sql = 'INSERT INTO comments (book_id, name, comment, image) VALUES (:book_id, :name, :comment, :image)' ;

        $result = $db->prepare($sql);
        $result->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_INT);
        $result->bindParam(':comment', $comment, PDO::PARAM_STR);
        $result->bindParam(':image', $image, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function viewCommentsByBook_id($id) {

        $db = Db::getConnection();


        $result = $db->query('SELECT name, comment, image FROM comments WHERE book_id = '.$id);
        $comments = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $comments[$i]['name'] = $row['name'];
            $comments[$i]['comment'] = $row['comment'];
            $comments[$i]['image'] = $row['image'];
            $i++;
        }
        return $comments;
    }

    public static function viewComments() {

        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM comments');
        $comments = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $comments[$i]['id'] = $row['id'];
            $comments[$i]['book_id'] = $row['book_id'];
            $comments[$i]['name'] = $row['name'];
            $comments[$i]['comment'] = $row['comment'];
            $i++;
        }
        return $comments;
    }

    public static function deleteCommentById($id) {

        $db = Db::getConnection();

        $sql = 'DELETE FROM comments WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();

        return true;
    }

    public static function getLastAdded() {

        $db = Db::getConnection();

        $result = $db->query('SELECT id, name, image FROM product '
                . 'ORDER BY id DESC '                
                . 'LIMIT ' . 3);

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['image'] = $row['image'];
            $i++;
        }

        return $productsList;
    }

}
    