<?php

class Cart
{

    /**
     * Добавление товара в корзину (сессию)
     * @param int $id
     */
    public static function addProduct($id)
    {
        $id = intval($id);

        // Если в корзине уже есть товары
        if (isset($_SESSION['products'])) {
            // То заполним наш массив товарами
            $productsInCart = $_SESSION['products'];
        }

        // Если товар есть в корзине, но был добавлен еще раз, увеличим количество
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] ++;
        } else {
            // Добавляем нового товара в корзину
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;

        return self::countItems();
    }

    public static function decreaseProduct($id)
    {
        $id = intval($id);
        // Получаем список товаров
        $productsInCart = self::getProducts();
        // Уменьшаем нужный товар на 1
        $productsInCart[$id]--;
        if ($productsInCart[$id] == 0) {
            unset($productsInCart[$id]);
        }

        $_SESSION['products'] = $productsInCart;

        return self::countItems();
    }

    public static function countItems() {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getProducts() {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    public static function getTotalPrice($products){
        $productsInCart = self::getProducts();

        $total = 0;
        
        if ($productsInCart) {            
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

        public static function deleteProducts($id) {
        // Получаем массив с идентификаторами и количеством товаров в корзине
        $productsInCart = self::getProducts();

        // Удаляем из массива элемент с указанным id
        unset($productsInCart[$id]);

        // Записываем массив товаров с удаленным элементом в сессию
        $_SESSION['products'] = $productsInCart;
    }

        public static function clear() {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

}
