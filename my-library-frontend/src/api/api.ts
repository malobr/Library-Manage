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
  withCredentials: true, // se usar cookies/autenticação
});

export const fetchRentals = async (): Promise<Rental[]> => {
  try {
    const { data } = await api.get<Rental[]>('/rentals');
    return data;
  } catch (error) {
    console.error(error);
    return [];
  }
};
