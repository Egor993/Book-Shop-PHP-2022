<?php

/*
 * Изменение размеров изображения
 */

class Image {

    public static function resize($file, $quality = 75) {

        global $tmp_path;

        // Ограничение по ширине в пикселях
        $max_size = 300;

        // Cоздаём исходное изображение на основе исходного файла
        if ($file['type'] == 'image/jpeg')
         $source = imagecreatefromjpeg ($file['tmp_name']);
        else if ($file['type'] == 'image/png')
         $source = imagecreatefrompng ($file['tmp_name']);
        else
         return false;
        $src = $source;
        // Определяем ширину и высоту изображения
        $w_src = imagesx($src); 
        $h_src = imagesy($src);
        $w = $max_size;
        if ($w_src > $w) {
            // Вычисление пропорций
            $ratio = $w_src/$w;
            $w_dest = round($w_src/$ratio);
            $h_dest = round($h_src/$ratio);
             
             // Создаём пустую картинку
            $dest = imagecreatetruecolor($w_dest, $h_dest);
             
             // Копируем старое изображение в новое с изменением параметров
            imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src); 
             
             // Вывод картинки и очистка памяти
            imagejpeg($dest, 'template/images/tmp/' . $file['name'], $quality);
            imagedestroy($dest);
            imagedestroy($src);
             
            return $file['name'];
        }
        else {
             // Вывод картинки и очистка памяти
            imagejpeg($src, 'template/images/tmp/' . $file['name'], $quality);
            imagedestroy($src);
             
        return $file['name'];

        }
    }

}
