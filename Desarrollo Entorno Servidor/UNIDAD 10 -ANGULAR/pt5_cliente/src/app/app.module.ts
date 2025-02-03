import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavBarComponent } from './nav-bar/nav-bar.component';
import { AutorListComponent } from './autor-list/autor-list.component';
import { HttpClientModule } from '@angular/common/http';
import { WelcomeComponent } from './welcome/welcome.component';
import { LibroListComponent } from './libro-list/libro-list.component';
import { FormsModule } from '@angular/forms';
import { AutorListFilterPipe } from './autor-list-filter.pipe';

@NgModule({
  declarations: [
    AppComponent,
    NavBarComponent,
    AutorListComponent,
    WelcomeComponent,
    AutorListFilterPipe,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule, // Add this line
    LibroListComponent, // Add this line
    FormsModule,
  ],
  bootstrap: [AppComponent],
})
export class AppModule {}
