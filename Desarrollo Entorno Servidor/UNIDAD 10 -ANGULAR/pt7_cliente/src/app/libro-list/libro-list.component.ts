import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { DatosLibrosService } from '../services/datos-libros.service';
import { ILibro } from '../interfaces/ilibro';
import { RouterModule } from '@angular/router';

@Component({
  selector: 'app-libro-list',
  templateUrl: './libro-list.component.html',
  styleUrl: './libro-list.component.css',
  standalone: true,
  imports: [CommonModule, RouterModule],
})
export class LibroListComponent implements OnInit {
  libros: ILibro[] = [];
  errorMessage: string = '';

  constructor(private librosService: DatosLibrosService) {}

  ngOnInit() {
    this.librosService.getDatos().subscribe((resp) => {
      this.libros = resp.body || [];
    });
  }

  eliminarLibro(id: number) {
    this.librosService.deleteLibro(id).subscribe({
      next: () => {
        this.ngOnInit();
      },
      error: (error) => {
        this.errorMessage = error.message;
      },
    });
  }
}
