import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController, ToastController } from 'ionic-angular';
import { Http } from '@angular/http';
import { Storage } from '@ionic/storage';
/**
 * Generated class for the WeekcategoryPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-weekcategory',
  templateUrl: 'weekcategory.html',
})
export class WeekcategoryPage {

  weekcategorys : any[];
  page: number;

  constructor(public loadingCtrl: LoadingController,public navCtrl: NavController, public navParams: NavParams,public http: Http, public toastCtrl: ToastController) {
    this.page = 1;
    let loading = this.loadingCtrl.create({
      content: 'Loading Please Wait...'
    });

    loading.present();

    this.http.get("http://192.168.1.7/gym_app/Api/weekcategory?page="+this.page).subscribe ((res)=>{
      console.log(res.json());

      let response = res.json();
      console.log(response);
      if(JSON.stringify(res.json()).toString()=="\"Error has occurred\""){
        loading.dismiss();
        this.toastCtrl.create({
          message: response.error,
          duration: 5000
        }).present();
        return;
      }else{
        loading.dismiss();
        this.weekcategorys = response;
      }
      
    });
  }

  openExerciseByCat(weekcategory){
    this.navCtrl.push('WeekexercisePage', { "day":weekcategory });
  }
}
