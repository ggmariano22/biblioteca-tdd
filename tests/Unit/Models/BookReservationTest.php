<?php

namespace Tests\Unit\Models;

use App\Builders\BookBuilder;
use App\Builders\ReservationBuilder;
use App\ValueObject\Book;
use App\ValueObject\BookReservation;
use DomainException;
use Tests\TestCase;

class BookReservationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @dataProvider reservationProvider
     */
    public function testShouldReturnNewReservation($name, $cpf, Book $book)
    {
        $reservation = (new ReservationBuilder)->build([
            'name' => $name,
            'cpf'  => $cpf,
            'book' => $book->serialize()
        ]);

        self::assertInstanceOf(BookReservation::class, $reservation);
    }

    /**
     * @dataProvider reservationProvider
     */
    public function testShouldReturnWithoutBookException($name, $cpf, Book $book)
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Nao é possível realizar a reserva sem um livro');
        (new ReservationBuilder)->build([
            'name' => $name,
            'cpf'  => $cpf
        ]);
    }

    /**
     * @dataProvider reservationProvider
     */
    public function testShouldReturnWithoutCpfException($name, $cpf, Book $book)
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Nao é possível realizar a reserva sem informar o CPF');
        (new ReservationBuilder)->build([
            'name' => $name,
            'book' => $book->serialize()
        ]);
    }

    public function reservationProvider(): array
    {
        $book = (new BookBuilder)->build([
            'name'   => 'Clean Code',
            'author' => 'Robert C. Martin',
            'pages'  => 424,
            'active' => 1
        ]);

        return [
            [
                'name' => 'Guilherme Mariano dos Santos',
                'cpf'  => 42499307854,
                'book' => $book
            ]
        ];
    }
}