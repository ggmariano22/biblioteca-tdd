<?php

namespace App\Builders;

use App\ValueObject\Book;
use DomainException;
use Throwable;

class BookBuilder implements BuilderInterface
{
    public function build(array $params): Book
    {
        try {
            $book = new Book();
    
            $book
            ->setName($params['name'])
            ->setAuthor($params['author'])
            ->setPages($params['pages'])
            ->setActive($params['active'] ?? 0);
    
            return $book;
        } catch (Throwable $e) {
            throw new DomainException($e->getMessage());
        }
    }
}