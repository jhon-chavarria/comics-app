<?php

namespace App\Http\Controllers;

use App\Model\ComicRepositoryInterface;
use App\Presenter\ComicPresenter;
use Illuminate\Http\Request;

class WebComicController extends Controller
{
    /**
     * @var ComicPresenter
     */
    private $comicPresenter;
    /**
     * @var ComicRepositoryInterface
     */
    private $comicRepositoryInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ComicRepositoryInterface $comicRepositoryInterface)
    {
        $this->comicRepositoryInterface = $comicRepositoryInterface;
        $this->comicPresenter = new ComicPresenter();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $this->comicPresenter->getRecentComic($this->comicRepositoryInterface);
        return view('comic', ['comic' => $this->comicPresenter->showComic()]);
    }

    public function getComicByNumber(Request $request)
    {
        $this->comicPresenter->getComicByNumber($this->comicRepositoryInterface, $request->comicNumber);
        $comic = $this->comicPresenter->showComic();

        if ($comic) {
            return view('comic', ['comic' => $this->comicPresenter->showComic()]);
        } else {
            return abort(404);
        }
    }

    public function getNavigation($page)
    {
        $prev = self::getPrevAction($page);
        $next = self::getNextAction($page);

        return view('navigation', ['prev' => $prev, 'next' => $next]);
    }
    /**
     * Prev Link Action
     */
    private function getPrevAction($page)
    {
        if ($page == 1) {
            return '';
        }

        $this->comicPresenter->getPrevNavigationLink($this->comicRepositoryInterface, $page);
        return $prev = '/comic/' . $this->comicPresenter->showNextLink();
    }

    /**
     * Next Link Action
     */
    private function getNextAction($page)
    {
        $this->comicPresenter->getRecentComic($this->comicRepositoryInterface);
        $currentComic = $this->comicPresenter->showComic();

        if ($currentComic['num'] === $page) {
            return '';
        }
     
        $this->comicPresenter->getNextNavigationLink($this->comicRepositoryInterface, $page);
        return '/comic/' . $this->comicPresenter->showNextLink();
    }
}
