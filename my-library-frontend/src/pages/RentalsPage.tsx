import React, { useEffect, useState } from 'react';
import { fetchRentals, Rental } from '../services/api';

const RentalsPage: React.FC = () => {
  const [rentals, setRentals] = useState<Rental[]>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const loadRentals = async () => {
      setLoading(true);
      const data = await fetchRentals();
      setRentals(data);
      setLoading(false);
    };
    loadRentals();
  }, []);

  if (loading) return <p>Carregando aluguéis...</p>;
  if (!rentals.length) return <p>Nenhum aluguel encontrado.</p>;

  return (
    <div className="p-4">
      <h1 className="text-2xl font-bold mb-4">Aluguéis</h1>
      <ul className="space-y-2">
        {rentals.map(rental => (
          <li key={rental.id} className="border p-2 rounded">
            <p><strong>Usuário:</strong> {rental.user.name} ({rental.user.email})</p>
            <p><strong>Livro:</strong> {rental.book.name}</p>
            <p><strong>Início:</strong> {rental.start_date}</p>
            <p><strong>Fim:</strong> {rental.end_date}</p>
          </li>
        ))}
      </ul>
    </div>
  );
};

export default RentalsPage;
