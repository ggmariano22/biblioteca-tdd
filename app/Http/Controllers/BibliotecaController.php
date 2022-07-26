<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BibliotecaController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return json_encode([
            'deu boa patrao'
        ]);
    }

    public function createBook(Request $request)
    {
        $book = new Book();

        $book
        ->setName('O Pequeno Princinpe')
        ->setAuthor('Antoine de Saint-Exupéry')
        ->setPages(96)
        ->setActive(1);

        dd($book->addBook($book));
    }
}
