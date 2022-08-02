<?php

namespace App\Http\Controllers;

use App\Builders\BookBuilder;
use App\Services\BibliotecaService;
use Illuminate\Http\Request;

class BibliotecaController extends Controller
{
    public function __construct(private BibliotecaService $service)
    {
    }

    public function index()
    {
        return $this->responseToJsonSuccess(
            $this->service->getBooks()
        );
    }

    public function createBook(Request $request)
    {
        $book = (new BookBuilder())->build($request->all());
        $this->service->addBook(($book));

        return $this->responseToJsonSuccess(httpCode: 201);
    }

    public function createReservation(Request $request)
    {
        dd($request->all());
    }
}
