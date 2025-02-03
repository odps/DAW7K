import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Router, ActivatedRoute } from '@angular/router';
import { DatosLibrosService } from '../services/datos-libros.service';
import { IAutor } from '../interfaces/iautor';
import { DatosAutoresService } from '../datos-autores.service';

@Component({
  selector: 'app-libro-edit',
  templateUrl: './libro-edit.component.html',
  styleUrl: './libro-edit.component.css',
  standalone: false,
})
export class LibroEditComponent implements OnInit {
  private libroService: DatosLibrosService;
  private router: Router;
  private formBuilder: FormBuilder;
  private autoresService: DatosAutoresService;
  private ruta: ActivatedRoute;

  autores: IAutor[] = [];
  myForm: FormGroup;
  errorMessage: string = '';
  id: string | null | undefined;

  constructor(
    libroService: DatosLibrosService,
    autoresService: DatosAutoresService,
    router: Router,
    formBuilder: FormBuilder,
    ruta: ActivatedRoute
  ) {
    this.libroService = libroService;
    this.router = router;
    this.formBuilder = formBuilder;
    this.autoresService = autoresService;
    this.ruta = ruta;
    this.myForm = this.formBuilder.group({
      titulo: ['', Validators.required],
      fechaP: ['', Validators.required],
      ventas: ['', Validators.required],
      autor_id: ['', Validators.required], // Changed from 'autor' to 'autor_id'
    });
  }

  ngOnInit(): void {
    this.autoresService.getDatos().subscribe({
      next: (response) => {
        this.autores = response.body || [];
      },
      error: (error) => {
        this.errorMessage = error.message;
      },
    });

    this.id = this.ruta.snapshot.paramMap.get('id');
    if (this.id) {
      this.libroService.getLibro(this.id).subscribe({
        next: (response) => {
          const libro = response.body;
          if (libro) {
            this.myForm.patchValue({
              titulo: libro.titulo,
              fechaP: libro.fechaP,
              ventas: libro.ventas,
              autor_id: libro.autor_id,
            });
          }
        },
        error: (error) => {
          this.errorMessage = error.message;
        },
      });
    }
  }

  onSubmit(libro: any) {
    if (this.id) {
      this.libroService.updateLibro(this.id, libro).subscribe({
        next: () => {
          this.router.navigate(['/libro-list']);
        },
        error: (error) => {
          this.errorMessage = error.message;
        },
      });
    }
  }
}
