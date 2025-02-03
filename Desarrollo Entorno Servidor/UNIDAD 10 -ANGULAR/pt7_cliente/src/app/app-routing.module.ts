import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AutorListComponent } from './autor-list/autor-list.component';
import { WelcomeComponent } from './welcome/welcome.component';
import { LibroListComponent } from './libro-list/libro-list.component';
import { LibroCreateComponent } from './libro-create/libro-create.component';
import { AutorCreateComponent } from './autor-create/autor-create.component';
import { AutorEditComponent } from './autor-edit/autor-edit.component';
import { LibroEditComponent } from './libro-edit/libro-edit.component';

const routes: Routes = [
  { path: 'welcome', component: WelcomeComponent },
  { path: 'autor-list', component: AutorListComponent },
  { path: 'libro-list', component: LibroListComponent },
  { path: 'autor-create', component: AutorCreateComponent },
  { path: 'libro-create', component: LibroCreateComponent },
  { path: 'libro-edit/:id', component: LibroEditComponent },
  { path: 'autor-edit/:id', component: AutorEditComponent },
  { path: 'libro-delete/:id', component: LibroEditComponent },
  { path: 'autor-delete/:id', component: AutorEditComponent },
  { path: '', redirectTo: 'welcome', pathMatch: 'full' },
  { path: '**', redirectTo: 'welcome', pathMatch: 'full' },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
