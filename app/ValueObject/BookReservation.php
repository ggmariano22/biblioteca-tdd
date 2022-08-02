<?php

namespace App\ValueObject;

class BookReservation
{
    public function __construct(
        private Book $book,
        private int $cpf,
        private string $name
    ) {
    }

    public function getBook(): Book
    {
        return $this->book;
    }

    public function getCpf(): int|string
    {
        return $this->cpf;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
