import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController, ToastController } from 'ionic-angular';
import { Http } from '@angular/http';
import { Storage } from '@ionic/storage';
/**
 * Generated class for the WeekexercisePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-weekexercise',
  templateUrl: 'weekexercise.html',
})
export class WeekexercisePage {

  weekexercises : any[];
  day : any = {};

  constructor(public loadingCtrl: LoadingController,public navCtrl: NavController, public navParams: NavParams,public http: Http, public toastCtrl: ToastController) {
    
    let url = "";

    let loading = this.loadingCtrl.create({
      content: 'Loading Please Wait...'
    });
    loading.present();

    this.day.name = "Weekexercises";
    if(this.navParams.get("day")){
      this.day = this.navParams.get("day");
      url = "http://192.168.1.7/gym_app/Api/weekexercise/"+this.day.id;
    }else{
      url = "http://192.168.1.7/gym_app/Api/weekexercise/"+this.day.id;
    }

    this.http.get(url).subscribe ((res)=>{
      console.log(url);
      console.log(res.json());

      let response = res.json();
      console.log(response);
      if(JSON.stringify(res.json()).toString()=="\"Error has occurred\""){
        console.log("true");
        loading.dismiss();
        this.toastCtrl.create({
          message: response.error,
          duration: 5000
        }).present();
        return;
      }else{
        loading.dismiss();
        this.weekexercises = response;
      }
    });
  }

  weekexercisedetials(weekexercise){
    this.navCtrl.push('ExercisedetailsPage', { "exercise":weekexercise, "week" : true});
  }
}
