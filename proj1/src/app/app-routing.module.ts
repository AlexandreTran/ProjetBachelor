import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { CatalogueComponent } from './catalogue/catalogue.component';
import { CalendrierComponent } from './calendrier/calendrier.component';
import { AccueilComponent } from './accueil/accueil.component';


const routes: Routes = [
  {
    path: '',
    component: AccueilComponent
  },
  {
    path: 'Cal',
    component: CalendrierComponent
  },
  {
    path: 'Cat',
    component: CatalogueComponent
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
