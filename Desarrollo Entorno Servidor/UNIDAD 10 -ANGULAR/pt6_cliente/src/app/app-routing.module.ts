import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AutorListComponent } from './autor-list/autor-list.component';
import { WelcomeComponent } from './welcome/welcome.component';
import { LibroListComponent } from './libro-list/libro-list.component';
import { LibroCreateComponent } from './libro-create/libro-create.component';
import { AutorCreateComponent } from './autor-create/autor-create.component';

const routes: Routes = [
  { path: 'welcome', component: WelcomeComponent },
  { path: 'autor-list', component: AutorListComponent },
  { path: 'autor-create', component: AutorCreateComponent },
  { path: 'libro-list', component: LibroListComponent },
  { path: 'libro-create', component: LibroCreateComponent },
  { path: '', redirectTo: 'welcome', pathMatch: 'full' },
  { path: '**', redirectTo: 'welcome', pathMatch: 'full' },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
