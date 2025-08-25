import React from 'react';
import { Link } from 'react-router-dom';

const Header: React.FC = () => (
  <header className="bg-gray-800 text-white p-4">
    <nav className="flex gap-4">
      <Link to="/">Home</Link>
      <Link to="/rentals">Rentals</Link>
      <Link to="/login">Login</Link>
      <Link to="/register">Register</Link>
      <Link to="/profile">Profile</Link>
    </nav>
  </header>
);

export default Header;
