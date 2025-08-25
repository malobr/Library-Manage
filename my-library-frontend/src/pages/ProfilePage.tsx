import React, { useEffect, useState } from 'react';
import { fetchUser, User } from '../services/api';

const ProfilePage: React.FC = () => {
  const [user, setUser] = useState<User | null>(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const loadUser = async () => {
      setLoading(true);
      const data = await fetchUser();
      setUser(data);
      setLoading(false);
    };
    loadUser();
  }, []);

  if (loading) return <p>Carregando usuário...</p>;
  if (!user) return <p>Usuário não encontrado. Faça login.</p>;

  return (
    <div className="p-4">
      <h1 className="text-2xl font-bold mb-4">Perfil</h1>
      <p><strong>Nome:</strong> {user.name}</p>
      <p><strong>Email:</strong> {user.email}</p>
    </div>
  );
};

export default ProfilePage;
