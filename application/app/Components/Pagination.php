<?php

namespace App\Components;

class Pagination
{
    private $totalEntries;

    public const LIMIT_ENTRIES_ON_PAGE = 8;

    public function __construct($totalEntries)
    {
        $this->totalEntries = $totalEntries;
    }

    public function getTotalPages(): array
    {
        $pages = [];
        $countPages = ceil($this->totalEntries / self::LIMIT_ENTRIES_ON_PAGE);
        for ($i = 1; $i <= $countPages; $i++) {
            $pages[] = $i;
        }
        return $pages;
    }
}
