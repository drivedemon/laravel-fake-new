<?php

namespace App\Domain\FakeNews;

use App\Domain\Repo\FakeNewsRepo;

class FakeNewsService
{
    private FakeNewsRepo $fakeNewsRepo;

    public function __construct(FakeNewsRepo $fakeNewsRepo)
    {
        $this->fakeNewsRepo = $fakeNewsRepo;
    }

    public function getPostWithAuthor(): array
    {
        $authors = $this->convertToArrayFormat($this->fakeNewsRepo->getAuthors(), AuthorDTO::class);
        $posts = $this->convertToArrayFormat($this->fakeNewsRepo->getPosts(), PostDTO::class);

        foreach ($posts as $index => $post) {
            $authorId = $post->getAuthorId();
            $author = array_values(
                array_filter($authors, function($author, $key) use ($authorId) {
                    return $authorId == $author->getId();
                }, ARRAY_FILTER_USE_BOTH)
            );

            $post->setAuthor($author[0]);
        }

        return $posts;
    }

    private function convertToArrayFormat(array $collections, $classDTO): array
    {
        $formatDTO = [];

        foreach ($collections as $index => $collection) {
            $formatDTO[] = New $classDTO($collection);
        }

        return $formatDTO;
    }
}
