<?php

namespace App\Builders;

use App\Models\Book;
use DomainException;
use Throwable;

class BookBuilder implements BuilderInterface
{
    public static function build(array $params): Book
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