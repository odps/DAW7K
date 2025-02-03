import { Pipe, PipeTransform } from '@angular/core';
import { IAutor } from './interfaces/iautor';

@Pipe({
  name: 'autorListFilter',
  standalone: false,
})
export class AutorListFilterPipe implements PipeTransform {
  transform(autores: IAutor[], filterBy: string): IAutor[] {
    filterBy = filterBy ? filterBy.toLowerCase() : '';
    return filterBy
      ? autores.filter((autor) => {
          // return autor.nombre.toLowerCase().indexOf(filterBy) !== -1;
          return (
            autor.nombre.toLowerCase().indexOf(filterBy) !== -1 ||
            autor.apellidos.toLowerCase().indexOf(filterBy) !== -1
          );
        })
      : autores;
  }
}
