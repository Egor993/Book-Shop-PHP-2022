<?php

namespace App\Components;

class Image {

    public static function resize($file, $quality = 75): string
    {
        $maxSize = 300;

        // Cоздаём исходное изображение на основе исходного файла
        if ($file['type'] == 'image/jpeg') {
            $source = imagecreatefromjpeg($file['tmp_name']);
        } else {
            $source = imagecreatefrompng($file['tmp_name']);
        }
        // Определяем ширину и высоту изображения
        $widthSrc = imagesx($source); 
        $hightSrc = imagesy($source);
        if ($widthSrc > $maxSize) {
            // Вычисление пропорций
            $ratio = $widthSrc/$maxSize;
            $widthDest = round($widthSrc/$ratio);
            $hightDest = round($hightSrc/$ratio);
             
             // Создаём пустую картинку
            $dest = imagecreatetruecolor($widthDest, $hightDest);
             
             // Копируем старое изображение в новое с изменением параметров
            imagecopyresampled($dest, $source, 0, 0, 0, 0, $widthDest, $hightDest, $widthSrc, $hightSrc); 
             
             // Вывод картинки и очистка памяти
            imagejpeg($dest, 'template/images/tmp/' . $file['name'], $quality);
            imagedestroy($dest);
            imagedestroy($source);
             
            return $file['name'];
        } else {
             // Вывод картинки и очистка памяти
            imagejpeg($source, 'template/images/tmp/' . $file['name'], $quality);
            imagedestroy($source);
             
        return $file['name'];
        }
    }

}
