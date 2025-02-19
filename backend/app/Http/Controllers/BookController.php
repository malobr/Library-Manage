<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Listar todos os livros
    public function index()
    {
        // Obter todos os livros com paginação (10 livros por página)
        $books = Book::paginate(10);
    
        return response()->json([
            'books' => $books->items(),  // Itens da página atual
            'total' => $books->total(),  // Total de livros encontrados
            'per_page' => $books->perPage(),  // Quantidade de itens por página
            'current_page' => $books->currentPage(),  // Página atual
            'last_page' => $books->lastPage()  // Última página
        ]);
    }
    

    // Mostrar um livro específico
   
    public function show($name)
    {
        // Buscar livros com o nome similar (paginado)
        $books = Book::where('name', 'like', '%' . $name . '%')->paginate(10);
    
        // Verificando se existem livros encontrados
        if ($books->isEmpty()) {
            return response()->json(['message' => 'Nenhum livro encontrado'], 404);
        }
    
        // Retornando os livros paginados com a coluna 'available'
        return response()->json([
            'books' => $books->items(),
            'total' => $books->total(),
            'per_page' => $books->perPage(),
            'current_page' => $books->currentPage(),
            'last_page' => $books->lastPage(),
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
