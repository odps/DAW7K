import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  standalone: false,
  styleUrl: './app.component.css',
})
export class AppComponent {
  title = 'pt3';
  nombre = 'Oscar';
  apellidos = 'Pereira';
  retornarNombreApellidos() {
    return this.nombre + ' ' + this.apellidos;
  }
}
