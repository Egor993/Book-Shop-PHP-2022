<?php

namespace App\Components;

class Pagination
{
    /**
     * Общее количество записей
     */
    private $totalEntries;

    /**
     * Записей на страницу
     */
    public const LIMIT = 8;

    public function __construct($totalEntries)
    {
        # Устанавливаем общее количество записей
        $this->totalEntries = $totalEntries;
    }

    public function getTotalPages(): array
    {
        $pages = [];
        $countPages = ceil($this->totalEntries / self::LIMIT);
        for ($i = 1; $i <= $countPages; $i++) {
            $pages[] = $i;
        }
        return $pages;
    }
}
