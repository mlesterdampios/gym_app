import { Component, ViewChild } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { Storage } from '@ionic/storage';
/**
 * Generated class for the MenuPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-menu',
  templateUrl: 'menu.html',
})
export class MenuPage {

	homePage: any;
  user: any;
  isAdmin : any;
	@ViewChild('content') childNavCtrl: NavController;
	loggedIn: boolean;

  constructor(public navCtrl: NavController, public navParams: NavParams, public storage: Storage) {
  	this.homePage = 'HomePage';
    this.user = {};
    this.isAdmin =0;
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad MenuPage');
  }
    ionViewDidEnter() {
    this.storage.ready().then(()=>{
      this.storage.get("userLoginInfo").then((userLoginInfo)=>{
        if(userLoginInfo != null){
          console.log("User logged in...");
          this.user = userLoginInfo;
          console.log(this.user);
          this.loggedIn = true;
          if(this.user.user_level == 1){
            this.isAdmin = 1;
          }else{
            this.isAdmin = 0;
          }
        }else{
          console.log("No user found.");
          this.user = {};
          this.loggedIn = false;
        }
      })
    })
  }

  openPage(pageName : string){
    if(pageName=="homepage"){
      this.childNavCtrl.setRoot('HomePage');
    }
    if(pageName=="signup"){
      this.navCtrl.push('SignupPage');
    }
    if(pageName=="login"){
      this.navCtrl.push('LoginPage');
      //this.loggedIn = true;
    }
    if(pageName=="activities"){
      this.navCtrl.push('ActivityPage');
      //this.loggedIn = true;
    }
    if(pageName=="weekcategory"){
      this.navCtrl.push('WeekcategoryPage');
    }
    if(pageName=="myaccount"){
       this.navCtrl.push('SignupPage', { "user":this.user});
    }
    
    if(pageName=="logout"){
      this.storage.remove("userLoginInfo").then(()=>{
        this.user = {};
        this.loggedIn = false;
        this.isAdmin = 0;
      })
    }
  }
}
