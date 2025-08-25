import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { registerUser } from '../services/api';

const RegisterPage: React.FC = () => {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const navigate = useNavigate();

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    try {
      await registerUser(name, email, password);
      navigate('/login');
    } catch (err) {
      setError('Erro ao registrar usuário.');
    }
  };

  return (
    <div className="p-4 max-w-md mx-auto">
      <h1 className="text-2xl font-bold mb-4">Registro</h1>
      {error && <p className="text-red-500">{error}</p>}
      <form onSubmit={handleSubmit} className="flex flex-col gap-2">
        <input type="text" placeholder="Nome" value={name} onChange={e => setName(e.target.value)} className="border p-2 rounded" required />
        <input type="email" placeholder="Email" value={email} onChange={e => setEmail(e.target.value)} className="border p-2 rounded" required />
        <input type="password" placeholder="Senha" value={password} onChange={e => setPassword(e.target.value)} className="border p-2 rounded" required />
        <button type="submit" className="bg-green-500 text-white p-2 rounded mt-2">Registrar</button>
      </form>
    </div>
  );
};

export default RegisterPage;
