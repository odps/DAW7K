import { Component, OnInit } from '@angular/core';
import { IAutor } from '../interfaces/iautor';
import { DatosAutoresService } from '../datos-autores.service';

@Component({
  selector: 'app-autor-list',
  standalone: false,

  templateUrl: './autor-list.component.html',
  styleUrl: './autor-list.component.css',
})
export class AutorListComponent implements OnInit {
  constructor(private autorService: DatosAutoresService) {}

  ngOnInit() {
    //lanzamos evento de creacion
    console.log('Listado de autores inicializado');
    this.autorService.getDatos().subscribe((resp) => {
      // accedemos al body de la respuesta HTTP.
      this.autores = resp.body || [];
    });
  }
  tituloListado = 'Lista de autores';
  autores: IAutor[] = [];
  // autores: IAutor[] = [
  //   { id: 1, nombre: 'Hermann', apellidos: 'Hesse' },
  //   { id: 2, nombre: 'Ketchup', apellidos: 'Heinz' },
  //   { id: 3, nombre: 'Johny', apellidos: 'Cash' },
  // ];
}
