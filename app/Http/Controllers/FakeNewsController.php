<?php

namespace App\Http\Controllers;

use App\Domain\FakeNews\FakeNewsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class FakeNewsController extends Controller
{
    private FakeNewsService $fakeNewsService;

    public function __construct(FakeNewsService $fakeNewsService)
    {
        $this->fakeNewsService = $fakeNewsService;
    }

    public function index(): Factory|View|Application
    {
        $posts = $this->fakeNewsService->getPostWithAuthor();

        return view('welcome', compact('posts'));
    }
}
