<?php

namespace App\Domain\FakeNews;

use App\Domain\DTO;
use Carbon\Carbon;

class PostDTO extends DTO
{
    protected $id;
    protected $author;
    protected $authorId;
    protected $title;
    protected $body;
    protected $imageUrl;
    protected $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthorId(): ?int
    {
        return $this->authorId;
    }

    public function getAuthor(): ?AuthorDTO
    {
        return $this->author;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function getCreatedAt(): ?string
    {
        return Carbon::parse($this->createdAt)->isoFormat('dddd, MMMM, d, Y, H:mm');
    }

    public function setAuthor(AuthorDTO $author): void
    {
        $this->author = $author;
    }
}
