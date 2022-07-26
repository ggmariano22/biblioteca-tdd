<?php

namespace App\Services;

use App\Models\Book;

class BibliotecaService
{
    private array $books = [];

    public function __construct()
    {
    }

    public function getActiveBooks(): array
    {
        //TODO
        return [];
    }

    public function addBook(Book $book): BibliotecaService
    {
        $this->books[] = $book;
        return $this;
    }

    public function getBooks(): array
    {
        return $this->books;
    }
}
