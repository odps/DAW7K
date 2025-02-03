import { TestBed } from '@angular/core/testing';

import { DatosLibrosService } from './datos-libros.service';

describe('DatosLibrosService', () => {
  let service: DatosLibrosService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DatosLibrosService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
