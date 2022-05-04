<?php

class Genres
{

    public static function getGenresList() {

        $db = Db::getConnection();

        $result = $db->query('SELECT id, name FROM genres '
                . 'ORDER BY sort_order ASC');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }

        return $categoryList;
    }

}