import React from 'react';
import { Routes, Route } from 'react-router-dom';
import HomePage from '../pages/HomePage';
import Header from '../components/Header';

import RentalsPage from '../pages/RentalsPage';
import LoginPage from '../pages/LoginPage';
import RegisterPage from '../pages/RegisterPage';
import ProfilePage from '../pages/ProfilePage';
import NotFoundPage from '../pages/NotFoundPage';

const AppRoutes: React.FC = () => (
    <>
    
     <Header />
  <Routes>
    <Route path="/" element={<HomePage />} />
    <Route path="/rentals" element={<RentalsPage />} />
    <Route path="/login" element={<LoginPage />} />
    <Route path="/register" element={<RegisterPage />} />
    <Route path="/profile" element={<ProfilePage />} />
    <Route path="*" element={<NotFoundPage />} />
  </Routes>
    
    </>
);

export default AppRoutes;
