import { TestBed } from '@angular/core/testing';

import { DatosAutoresService } from './datos-autores.service';

describe('DatosAutoresService', () => {
  let service: DatosAutoresService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DatosAutoresService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
