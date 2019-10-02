<?php

namespace App\Model;

/**
* Interface ComicRepositoryInterface
*/
interface ComicRepositoryInterface
{
    public function getRecentComic();
    public function getComicByNumber($number);
}
