<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Book;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    // Listar todos os aluguéis
    public function index()
{
    // Paginando os aluguéis, incluindo as relações 'book' e 'user'
    $rentals = Rental::with(['book', 'user'])->paginate(10);  // 10 resultados por página

    return response()->json($rentals);
}


    // Mostrar um aluguel específico
    public function show($searchTerm)
    {
        // Buscar aluguel com base no nome do usuário ou do livro
        $rental = Rental::with(['book', 'user'])
            ->whereHas('user', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->orWhereHas('book', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->get();
    
        if (!$rental) {
            return response()->json(['message' => 'Aluguel não encontrado'], 404);
        }
    
        return response()->json($rental);
    }
    

    // Criar um novo aluguel (alugar um livro)
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        // Verificar se o livro está disponível
        $book = Book::find($request->book_id);
        if (!$book->available) {
            return response()->json(['message' => 'Este livro não está disponível'], 400);
        }

        // Criar o aluguel
        $rental = Rental::create($request->all());

        // Atualizar a disponibilidade do livro
        $book->update(['available' => false]);

        return response()->json($rental, 201);
    }

    // Atualizar um aluguel específico
    public function update(Request $request, $id)
    {
        $rental = Rental::find($id);

        if (!$rental) {
            return response()->json(['message' => 'Aluguel não encontrado'], 404);
        }

        $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        $rental->update($request->all());

        return response()->json($rental);
    }

    // Deletar um aluguel específico
    public function destroy($id)
    {
        $rental = Rental::find($id);

        if (!$rental) {
            return response()->json(['message' => 'Aluguel não encontrado'], 404);
        }

        // Atualizar a disponibilidade do livro
        $book = $rental->book;
        $book->update(['available' => true]);

        $rental->delete();

        return response()->json(['message' => 'Aluguel deletado com sucesso']);
    }

    // Devolver um livro
    public function returnBook($id)
    {
        $rental = Rental::find($id);

        if (!$rental) {
            return response()->json(['message' => 'Aluguel não encontrado'], 404);
        }

        // Atualizar a disponibilidade do livro
        $book = $rental->book;
        $book->update(['available' => true]);

        // Atualizar a data de devolução
        $rental->update(['end_date' => now()]);

        return response()->json(['message' => 'Livro devolvido com sucesso']);
    }
}
