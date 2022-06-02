<?php

namespace App\Components;

class Cart
{
    public static function addProduct($id): void
    {
        $id = intval($id);
        // Если в корзине уже есть товары
        if (isset($_SESSION['products'])) {
            // То заполним наш массив товарами
            $productsInCart = $_SESSION['products'];
        }
        // Если товар есть в корзине, но был добавлен еще раз, увеличим количество
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]++;
        } else {
            // Добавляем нового товара в корзину
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;
    }

    public static function decreaseProduct($id): void
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

    }

    public static function countItems(): int
    {
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

    public static function getProducts(): array
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return [];
    }

    public static function getTotalPrice($products): int
    {
        $productsInCart = self::getProducts();

        $total = 0;
        
        if ($productsInCart) {            
            foreach ($products as $product) {
                $total += $product->price * $productsInCart[$product->id];
            }
        }

        return $total;
    }

    public static function deleteProducts($id): void
    {
        // Получаем массив с идентификаторами и количеством товаров в корзине
        $productsInCart = self::getProducts();

        // Удаляем из массива элемент с указанным id
        unset($productsInCart[$id]);

        // Записываем массив товаров с удаленным элементом в сессию
        $_SESSION['products'] = $productsInCart;
    }

    public static function clear(): void
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

}
