import { Component } from '@angular/core';
import { IAutor } from '../interfaces/iautor';

@Component({
  selector: 'app-autor-list',
  standalone: false,

  templateUrl: './autor-list.component.html',
  styleUrl: './autor-list.component.css',
})
export class AutorListComponent {
  tituloListado = 'Lista de autores';
  autores: IAutor[] = [
    { id: 1, nombre: 'Hermann', apellidos: 'Hesse' },
    { id: 2, nombre: 'Ketchup', apellidos: 'Heinz' },
    { id: 3, nombre: 'Johny', apellidos: 'Cash' },
  ];
}
