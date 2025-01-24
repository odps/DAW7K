import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DatosLibrosService } from '../services/datos-libros.service';
import { ILibro } from '../interfaces/ilibro';

@Component({
  selector: 'app-libro-list',
  templateUrl: './libro-list.component.html',
  styleUrl: './libro-list.component.css',
  standalone: true,
  imports: [CommonModule],
})
export class LibroListComponent implements OnInit {
  libros: ILibro[] = [];

  constructor(private librosService: DatosLibrosService) {}

  ngOnInit() {
    this.librosService.getDatos().subscribe((resp) => {
      this.libros = resp.body || [];
    });
  }
}
