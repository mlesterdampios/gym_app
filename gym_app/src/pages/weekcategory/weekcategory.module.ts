import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { WeekcategoryPage } from './weekcategory';

@NgModule({
  declarations: [
    WeekcategoryPage,
  ],
  imports: [
    IonicPageModule.forChild(WeekcategoryPage),
  ],
})
export class WeekcategoryPageModule {}
