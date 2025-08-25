import React from 'react';
import AppRoutes from './routes/AppRoutes';
import Header from './components/Header';
import Footer from './components/Footer';

const App: React.FC = () => {
  return (
    <>
      <Header />
      <main className="p-4">
        <AppRoutes />
      </main>
      <Footer />
    </>
  );
};

export default App;
