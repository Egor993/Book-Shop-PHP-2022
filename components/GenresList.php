<?php

class GenresList
{
    public const DRAMA = 'drama';
    public const NOVEL = 'novel';
    public const GUIDE = 'guide';
    public const BIOGRAPHY = 'biography';
    public const FANTASY = 'fantasy';
    public const FANTASTIC = 'fantastic';

    public static function getGenresList(): array
    {
        return [
            self::DRAMA => 'Драма',
            self::NOVEL => 'Новелла',
            self::GUIDE => 'Руководство',
            self::BIOGRAPHY => 'Биография',
            self::FANTASY => 'Фэнтези',
            self::FANTASTIC => 'Фантастика'
        ];
    }
}