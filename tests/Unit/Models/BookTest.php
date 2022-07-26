<?php

namespace Tests\Unit\Models;

use App\Services\BibliotecaService;
use App\Models\Book;
use Tests\TestCase;

class BookTest extends TestCase
{
    protected BibliotecaService $service;

    public function setUp(): void
    {
        $this->service = new BibliotecaService();
        parent::setUp();
    }

    public function testShouldReturnActiveBook()
    {
        $book = new Book();
        $book->setActive(1);

        self::assertEquals(1, $book->isActive());
    }

    public function testShouldReturnTwoBooks()
    {
        $book1 = new Book();
        $book2 = new Book();

        $this->service->addBook($book1);
        $this->service->addBook($book2);

        self::assertCount(2, $this->service->getBooks());
    }
}