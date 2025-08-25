import React from 'react';
import { Link } from 'react-router-dom';

const HomePage: React.FC = () => (
  <div className="p-4">
    <h1 className="text-3xl font-bold mb-4">Bem-vindo à Biblioteca</h1>
    <p>Use o menu para navegar pelos aluguéis, login ou registro.</p>
    <Link to="/rentals" className="text-blue-500 mt-4 block">Ver Aluguéis</Link>
  </div>
);

export default HomePage;
