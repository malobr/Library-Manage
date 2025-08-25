import React from 'react';
import { Link } from 'react-router-dom';

const NotFoundPage: React.FC = () => (
  <div className="p-4 text-center">
    <h1 className="text-3xl font-bold mb-4">404 - Página não encontrada</h1>
    <Link to="/" className="text-blue-500">Voltar para Home</Link>
  </div>
);

export default NotFoundPage;
