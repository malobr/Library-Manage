import axios from 'axios';

export interface User {
  id: number;
  name: string;
  email: string;
}

export interface Book {
  id: number;
  name: string;
}

export interface Rental {
  id: number;
  user: User;
  book: Book;
  start_date: string;
  end_date: string;
}

const api = axios.create({
  baseURL: 'http://localhost:8000/api',
  withCredentials: true, // cookies/sanctum
});

// Aluguéis
export const fetchRentals = async (): Promise<Rental[]> => {
  try {
    const { data } = await api.get<Rental[]>('/rentals');
    return data;
  } catch (error) {
    console.error(error);
    return [];
  }
};

// Login
export const loginUser = async (email: string, password: string) => {
  try {
    const { data } = await api.post('/login', { email, password });
    return data;
  } catch (error) {
    throw error;
  }
};

// Registro
export const registerUser = async (name: string, email: string, password: string) => {
  try {
    const { data } = await api.post('/register', { name, email, password });
    return data;
  } catch (error) {
    throw error;
  }
};

// Obter usuário logado
export const fetchUser = async (): Promise<User | null> => {
  try {
    const { data } = await api.get<User>('/user');
    return data;
  } catch (error) {
    console.error(error);
    return null;
  }
};
