<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Listar todos os livros
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    // Mostrar um livro específico
    public function show($id)
    {
        $book = Book::find($id);
        
        if (!$book) {
            return response()->json(['message' => 'Livro não encontrado'], 404);
        }

        return response()->json([
            'book' => $book,
            'available' => $book->available,  // Adiciona a disponibilidade
        ]);
    }

    // Criar um novo livro
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:books,name',
            'type' => 'required|string',
            'author' => 'required|string',
            'pages' => 'required|integer',
            'price' => 'required|numeric',
            'synopsis' => 'required|string',
        ]);

        $book = Book::create($request->all());

        return response()->json($book, 201);
    }

    // Atualizar um livro específico
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        
        if (!$book) {
            return response()->json(['message' => 'Livro não encontrado'], 404);
        }

        $request->validate([
            'name' => 'required|string|unique:books,name,' . $id,
            'type' => 'required|string',
            'author' => 'required|string',
            'pages' => 'required|integer',
            'price' => 'required|numeric',
            'synopsis' => 'required|string',
        ]);

        $book->update($request->all());

        return response()->json($book);
    }

    // Deletar um livro específico
    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Livro não encontrado'], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Livro deletado com sucesso']);
    }
}
