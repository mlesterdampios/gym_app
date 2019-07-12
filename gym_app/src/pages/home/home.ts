import { Component } from '@angular/core';
import { IonicPage, NavController } from 'ionic-angular';

@IonicPage({})
@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

  constructor(public navCtrl: NavController) {

  }

  openPage(pageName : string){
    if(pageName=="category"){
      this.navCtrl.push('CategoryPage');
    }
    if(pageName=="weekcategory"){
      this.navCtrl.push('WeekcategoryPage');
    }
  }
}
