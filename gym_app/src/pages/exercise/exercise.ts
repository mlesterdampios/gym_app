import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, LoadingController, ToastController } from 'ionic-angular';
import { Http } from '@angular/http';
import { Storage } from '@ionic/storage';
/**
 * Generated class for the ExercisePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-exercise',
  templateUrl: 'exercise.html',
})
export class ExercisePage {

  exercises : any[];
  page: number;
  cat : any = {};

  constructor(public loadingCtrl: LoadingController,public navCtrl: NavController, public navParams: NavParams,public http: Http, public toastCtrl: ToastController) {
    this.page = 1;
    let url = "";

    let loading = this.loadingCtrl.create({
      content: 'Loading Please Wait...'
    });
    loading.present();

    this.cat.name = "Exercises";
    if(this.navParams.get("cat")){
      this.cat = this.navParams.get("cat");
      url = "http://192.168.1.7/gym_app/Api/exercise?page="+this.page+'&cat='+this.cat.id;
    }else{
      url = "http://192.168.1.7/gym_app/Api/exercise?page="+this.page;
    }

    this.http.get(url).subscribe ((res)=>{
      console.log(url);
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
        this.exercises = response;
      }
    });
  }

  exercisedetials(exercise){
    this.navCtrl.push('ExercisedetailsPage', { "exercise":exercise});
  }
}
