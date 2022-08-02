<?php

namespace App\Builders;

use App\ValueObject\BookReservation;
use DomainException;

class ReservationBuilder implements BuilderInterface
{
    public function build(array $params): BookReservation
    {
        if ($this->validateParams($params)) {
            //TODO: caso nome esteja vazio, realizar consulta pelo CPF
    
            return new BookReservation(
                (new BookBuilder())->build($params['book']),
                $params['cpf'],
                $params['name']
            );
        }
    }

    private function validateParams(array $params)
    {
        if (empty($params['book'])) {
            throw new DomainException('Nao é possível realizar a reserva sem um livro');
        }

        if (!isset($params['cpf'])) {
            throw new DomainException('Nao é possível realizar a reserva sem informar o CPF');
        }

        return true;
    }
}
