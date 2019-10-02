<?php

namespace App\Presenter;
use App\Model\ComicRepositoryInterface;

class ComicPresenter 
{
    private $comic;
  
    function getRecentComic(ComicRepositoryInterface $repository)
    {
        $this->comic = $repository->getRecentComic();
    }

    function getComicByNumber(ComicRepositoryInterface $repository, $number)
    {
        $this->comic = $repository->getComicByNumber($number);
    }

    function showComic()
    {
        return $this->comic;
    }
}
