<?php

namespace Tests\Unit\app\Domain\FakeNews;

use App\Domain\FakeNews\FakeNewsService;
use App\Domain\FakeNews\PostDTO;
use App\Domain\Repo\FakeNewsRepo;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class FakeNewsServiceTest extends TestCase
{
    public function test_get_post_with_author()
    {
        $repository = $this->getRepository();
        $repository->expects($this->once())
            ->method('getAuthors')
            ->willReturn([
                [
                    'id' => 1,
                    'name' => 'john doe',
                ],
            ]);
        $repository->expects($this->once())
            ->method('getPosts')
            ->willReturn([
                [
                    'id' => 1,
                    'author_id' => 1,
                    'title' => 'test',
                    'body' => 'test',
                ],
            ]);

        $result = $this->getService($repository)->getPostWithAuthor();

        $post = $result[0];
        $this->assertSame(PostDTO::class, get_class($post));
        $this->assertSame(1, $post->getAuthor()->getId());
        $this->assertSame('john doe', $post->getAuthor()->getName());
    }

    protected function getRepository(): MockObject
    {
        return $this->createMock(FakeNewsRepo::class);
    }

    protected function getService($repository): FakeNewsService
    {
        return new FakeNewsService($repository);
    }
}
