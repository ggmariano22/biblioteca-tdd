<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\ValueObject\Book;
use App\Builders\BookBuilder;
use App\Services\BibliotecaService;

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

    public function testShouldBeInstanceOfBook()
    {
        $book = new Book();
        $this->service->addBook($book);

        self::assertInstanceOf(Book::class, $this->service->getBooks()[0]);
    }

    /**
     * @dataProvider bookProvider
     */
    public function testBookPropertiesValue(
        string $name,
        string $author, 
        int $pages,
        int $active
    ) {
        $book = (new BookBuilder)->build([
            'name'   => $name,
            'author' => $author,
            'pages'  => $pages,
            'active' => $active,
        ]);

        self::assertEquals($book->getName(), $name);
        self::assertEquals($book->getAuthor(), $author);
        self::assertEquals($book->getPages(), $pages);
        self::assertEquals($book->isActive(), $active);
    }

    /**
     * @dataProvider bookProvider
     */
    public function testBookPropertiesTypes(
        string $name,
        string $author,
        int $pages,
        int $active
    ) {
        $book = (new BookBuilder())->build([
            'name'   => $name,
            'author' => $author,
            'pages'  => $pages,
            'active' => $active,
        ]);

        self::assertIsString($book->getName());
        self::assertIsString($book->getAuthor());
        self::assertIsInt($book->getPages());
        self::assertTrue($book->isActive());
    }

    public function bookProvider(): array
    {
        return [
            [
                'name'   => 'Clean Code',
                'author' => 'Robert C. Martin',
                'pages'  => 424,
                'active' => 1
            ]
        ];
    }
}
