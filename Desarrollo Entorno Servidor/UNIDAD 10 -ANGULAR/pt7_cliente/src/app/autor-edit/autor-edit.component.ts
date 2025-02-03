import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Router, ActivatedRoute } from '@angular/router';
import { DatosAutoresService } from '../datos-autores.service';
import { IAutor } from '../interfaces/iautor';

@Component({
  selector: 'app-autor-edit',
  standalone: false,

  templateUrl: './autor-edit.component.html',
  styleUrl: './autor-edit.component.css',
})
export class AutorEditComponent implements OnInit {
  myForm: FormGroup;
  errorMessage: string = '';
  id: string | null | undefined;

  constructor(
    private autoresService: DatosAutoresService,
    private router: Router,
    private formBuilder: FormBuilder,
    private ruta: ActivatedRoute
  ) {
    this.myForm = this.formBuilder.group({
      nombre: ['', Validators.required],
      apellidos: ['', Validators.required],
    });
  }

  ngOnInit(): void {
    this.id = this.ruta.snapshot.paramMap.get('id');
    if (this.id) {
      this.autoresService.getAutor(this.id).subscribe({
        next: (response) => {
          const autor = response.body;
          if (autor) {
            this.myForm.patchValue({
              nombre: autor.nombre,
              apellidos: autor.apellidos,
            });
          }
        },
        error: (error) => {
          this.errorMessage = error.message;
        },
      });
    }
  }

  onSubmit(autor: any) {
    if (this.id) {
      this.autoresService.updateAutor(this.id, autor).subscribe({
        next: () => {
          this.router.navigate(['/autor-list']);
        },
        error: (error) => {
          this.errorMessage = error.message;
        },
      });
    }
  }
}
