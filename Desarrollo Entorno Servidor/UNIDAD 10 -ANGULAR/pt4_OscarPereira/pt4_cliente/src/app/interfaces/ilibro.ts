import { IAutor } from './iautor';

export interface ILibro {
  id: number;
  titulo: string;
  fechaP: string;
  ventas: number;
  autor_id: number;
  created_at: string;
  updated_at: string;
  autor: IAutor;
}
