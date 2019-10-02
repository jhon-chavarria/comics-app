<?php

namespace App\Presenter;
use App\Model\ComicRepositoryInterface;

/**
* Class ComicPresenter, Bridge for Controller and Repositories
*/
class ComicPresenter 
{
    private $comic;
    private $link;
  
    function getRecentComic(ComicRepositoryInterface $repository)
    {
        $this->comic = $repository->getRecentComic();
    }

    function getComicByNumber(ComicRepositoryInterface $repository, $number)
    {
        $this->comic = $repository->getComicByNumber($number);
    }

    function getNextNavigationLink(ComicRepositoryInterface $repository, $number)
    {
        $this->link = $repository->getNextNavigationLink($number);
    }

    function getPrevNavigationLink(ComicRepositoryInterface $repository, $number)
    {
        $this->link = $repository->getPrevNavigationLink($number);
    }

    function showNextLink()
    {
        return $this->link;
    }

    function showComic()
    {
        return $this->comic;
    }
}
