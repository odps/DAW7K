import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';
import { Router } from '@angular/router';
import { DatosLibrosService } from '../services/datos-libros.service';
import { IAutor } from '../interfaces/iautor';
import { DatosAutoresService } from '../datos-autores.service';

@Component({
  selector: 'app-libro-create',
  templateUrl: './libro-create.component.html',
  styleUrls: ['./libro-create.component.css'],
  standalone: false,
})
export class LibroCreateComponent implements OnInit {
  private libroService: DatosLibrosService;
  private router: Router;
  private formBuilder: FormBuilder;
  private autoresService;

  autores: IAutor[] = [];
  myForm: FormGroup;
  errorMessage: string = '';

  constructor(
    libroService: DatosLibrosService,
    autoresService: DatosAutoresService,
    router: Router,
    formBuilder: FormBuilder
  ) {
    this.libroService = libroService;
    this.router = router;
    this.formBuilder = formBuilder;
    this.autoresService = autoresService;
    this.myForm = new FormGroup({});
  }

  onSubmit(libro: any) {
    this.libroService.createLibro(libro).subscribe({
      next: (data) => {
        // navegamos a la ruta libro-list
        this.router.navigate(['/libro-list']);
      },
      error: (error) => {
        // interpolamos a la vista error.message
        this.errorMessage = error.message;
      },
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
  }
}
