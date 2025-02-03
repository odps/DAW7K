import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavBarComponent } from './nav-bar/nav-bar.component';
import { AutorListComponent } from './autor-list/autor-list.component';
import { HttpClientModule } from '@angular/common/http';
import { WelcomeComponent } from './welcome/welcome.component';
import { LibroListComponent } from './libro-list/libro-list.component';
import { AutorListFilterPipe } from './autor-list-filter.pipe';
import { AutorCreateComponent } from './autor-create/autor-create.component';
import { LibroCreateComponent } from './libro-create/libro-create.component';
import { FormsModule } from '@angular/forms';
import { ReactiveFormsModule } from '@angular/forms';
import { LibroEditComponent } from './libro-edit/libro-edit.component';
import { AutorEditComponent } from './autor-edit/autor-edit.component';
import { RouterModule } from '@angular/router';
@NgModule({
  declarations: [
    AppComponent,
    NavBarComponent,
    AutorListComponent,
    WelcomeComponent,
    AutorListFilterPipe,
    AutorCreateComponent,
    LibroCreateComponent,
    LibroEditComponent,
    AutorEditComponent,
  ],
  imports: [
    LibroListComponent,
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule,
    RouterModule,
  ],
  bootstrap: [AppComponent],
})
export class AppModule {}
