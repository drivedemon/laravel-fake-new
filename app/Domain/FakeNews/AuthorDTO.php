<?php

namespace App\Domain\FakeNews;

use App\Domain\DTO;

class AuthorDTO extends DTO
{
    protected $id;
    protected $name;
    protected $role;
    protected $place;
    protected $avatarUrl;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }
}
