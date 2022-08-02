<?php

namespace App\ValueObject;

//use Illuminate\Database\Eloquent\Model;

class Book
{
    private string $name;

    private string $author;
    
    private int $pages;
    
    private int $active;
    
    private bool $isAvaliable;

    public function __construct()
    {
    }
    
    public function setName(string $name): Book
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string|null
    {
        return $this?->name;
    }

    public function setAuthor(string $author): Book
    {
        $this->author = $author;
        return $this;
    }

    public function getAuthor(): string|null
    {
        return $this?->author;
    }

    public function setPages(int $pages): Book
    {
        $this->pages = $pages;
        return $this;
    }

    public function getPages(): int|null
    {
        return $this?->pages;
    }

    public function setActive(int $active): Book
    {
        $this->active = $active ?? 0;
        return $this;
    }

    public function isAvaliable(): bool
    {
        return $this->isAvaliable ?? false;
    }

    public function isActive(): bool
    {
        return $this->active ?? false;
    }

    public function getBooks(): array|null
    {
        return $this->books;
    }

    public function serialize(): array
    {
        return [
            'name'        => $this->name,
            'author'      => $this->author,
            'pages'       => $this->pages,
            'active'      => $this->isActive(),
            'isAvaliable' => $this->isAvaliable()
        ];
    }
}
