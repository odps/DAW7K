import { DatosAutoresService } from '../datos-autores.service';
import { Router } from '@angular/router';

import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';

@Component({
  selector: 'app-autor-create',
  standalone: false,

  templateUrl: './autor-create.component.html',
  styleUrl: './autor-create.component.css',
})
export class AutorCreateComponent implements OnInit {
  private router: Router;
  private formBuilder: FormBuilder;
  private autoresService;

  myForm: FormGroup;
  errorMessage: string = '';

  constructor(
    autoresService: DatosAutoresService,
    router: Router,
    FormBuilder: FormBuilder
  ) {
    this.router = router;
    this.formBuilder = FormBuilder;
    this.autoresService = autoresService;

    this.myForm = this.formBuilder.group({
      nombre: ['', Validators.required],
      apellidos: ['', Validators.required],
    });
  }

  ngOnInit() {}

  onSubmit(autor: any) {
    this.autoresService.createAutor(autor).subscribe({
      next: (data) => {
        // navegamos a la ruta autor-list
        this.router.navigate(['/autor-list']);
      },
      error: (error) => {
        // interpolamos a la vista error.message
        this.errorMessage = error.message;
      },
    });
  }
}
