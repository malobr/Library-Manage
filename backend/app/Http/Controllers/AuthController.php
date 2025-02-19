<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // Registro de Usuário
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'cpf' => 'required|unique:users,cpf',
            'email' => 'required|unique:users,email',
            'password' => ['required', Password::min(6)],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user, 201);
    }

    // Login de Usuário
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user]);

    }

    // Logout de Usuário
    public function logout(Request $request)
    {
        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json(['message' => 'Logout realizado com sucesso']);
    }

    // Listar todos os usuários
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Mostrar um usuário específico
    public function show($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        return response()->json($user);
    }

    // Atualizar um usuário específico
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string',
            'cpf' => 'nullable|unique:users,cpf,' . $id,  // Ignorar o CPF do próprio usuário ao validar
            'email' => 'nullable|email|unique:users,email,' . $id,  // Ignorar o e-mail do próprio usuário ao validar
            'password' => ['nullable', Password::min(6)], // Senha opcional, mas confirmada
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $user = User::find($id);
    
        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
    
        // Atualizar os dados do usuário
        $user->update([
            'name' => $request->name ?? $user->name,
            'cpf' => $request->cpf ?? $user->cpf,  // Manter o CPF atual se não for enviado
            'email' => $request->email ?? $user->email,  // Manter o e-mail atual se não for enviado
            'password' => $request->password ? Hash::make($request->password) : $user->password,  // Atualizar a senha se fornecida
        ]);
    
        return response()->json($user);
    }
    
    // Deletar um usuário específico
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuário deletado com sucesso']);
    }
}
