import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController, AlertController, LoadingController } from 'ionic-angular';
import { Http } from '@angular/http';

import { FileTransfer, FileUploadOptions, FileTransferObject } from '@ionic-native/file-transfer';
import { Camera, CameraOptions } from '@ionic-native/camera';
/**
 * Generated class for the SignupPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */
@IonicPage({})
@Component({
  selector: 'page-signup',
  templateUrl: 'signup.html',
})
export class SignupPage {

	newUser: any = {};
  isEditing : boolean;
  imageURI:any;

  constructor(public loadingCtrl: LoadingController,private transfer: FileTransfer,private camera: Camera,public http: Http, public navCtrl: NavController, public navParams: NavParams, public toastCtrl: ToastController, public alertCtrl: AlertController) {
    this.newUser.profile_img = "http://192.168.1.7/gym_app/public/uploads/profile/default_user.png";
    if(this.navParams.get("user")){
      this.newUser = this.navParams.get("user");
      this.isEditing = true;
    }
  }


  ionViewDidLoad() {
    console.log('ionViewDidLoad SignupPage');
  }

  checkUser(){
    let validUser = false;

      //email looks valid
      if(this.newUser.username){
      this.http.get("http://192.168.1.7/gym_app/Api/username/"+this.newUser.username).subscribe ((response)=>{

        if(JSON.stringify(response.json()).toString()=="\"Error has occurred\""){
          validUser = true;
          this.toastCtrl.create({
              message: "Congratulations! Username is good to go.",
              duration: 3000
            }).present();
        }else{
          validUser = false;
          this.toastCtrl.create({
              message: "Username already registered. Please check.",
              showCloseButton: true
            }).present();
        }

        console.log(validUser);
      });
    }
  }

  checkEmail(){
  	let validEmail = false;

  	let reg = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  	if(reg.test(this.newUser.email)){
  		//email looks valid

  		this.http.get("http://192.168.1.7/gym_app/Api/useremail/"+this.newUser.email).subscribe ((res)=>{

  			if(JSON.stringify(res.json()).toString()=="\"Error has occurred\""){
  				validEmail = true;
  				this.toastCtrl.create({
		          message: "Congratulations! Email is good to go.",
		          duration: 3000
		        }).present();
  			}else{
  				validEmail = false;
  				this.toastCtrl.create({
		          message: "Email already registered. Please check.",
		          showCloseButton: true
		        }).present();
  			}

  			console.log(validEmail);
  		});
  	}else{
  		validEmail = false;
  		this.toastCtrl.create({
		    message: "Invalid Email. Please check.",
		    showCloseButton: true
		}).present();
  		console.log(validEmail);
  	}
  }

  validateInputs(){
    if((this.newUser.name) &&
       (this.newUser.email) &&
       (this.newUser.username) &&
       (this.newUser.password) &&
       (this.newUser.contact))
    {
      return true;
    }
    return false;
  }

  presentToast(msg) {
  let toast = this.toastCtrl.create({
    message: msg,
    duration: 3000,
    position: 'bottom'
  });

  toast.onDidDismiss(() => {
    console.log('Dismissed toast');
  });

  toast.present();
  }

  getImage() {
  const options: CameraOptions = {
      quality: 100,
      destinationType: this.camera.DestinationType.FILE_URI,
      sourceType: this.camera.PictureSourceType.PHOTOLIBRARY
    }

    this.camera.getPicture(options).then((imageData) => {
      this.imageURI = imageData;
    }, (err) => {
      console.log(err);
      this.presentToast(err);
    });
  }

  addImage(name){
    this.newUser.profile_img = "http://192.168.1.7/gym_app/public/uploads/profile/"+name;
  }

  uploadFile() {
    if(!this.imageURI){
      this.presentToast("Select Image first");
      return;
    }
    let loader = this.loadingCtrl.create({
      content: "Uploading..."
    });
    loader.present();
    const fileTransfer: FileTransferObject = this.transfer.create();

    let options: FileUploadOptions = {
      fileKey: 'userfile',
      fileName: this.newUser.id.toString()+"xx"+ (Math.floor(Date.now() / 1000)).toString() + ".jpg",
      chunkedMode: false,
      mimeType: "image/jpeg",
      headers: {}
    }

    fileTransfer.upload(this.imageURI, 'http://192.168.1.7/gym_app/UploadProfile_Controller/do_upload', options)
      .then((data) => {
        let res = JSON.parse(data.response);
        this.addImage(res["upload_data"]["orig_name"]);
      loader.dismiss();
      this.presentToast("Image uploaded successfully");
    }, (err) => {
      console.log(err);
      loader.dismiss();
      this.presentToast(err);
    });
  }

  removeImage(){
    this.newUser.profile_img = 'http://192.168.1.7/gym_app/public/uploads/profile/default_user.png';
  }

  signup(){
    let loading = this.loadingCtrl.create({
      content: 'Loading Please Wait...'
    });
    loading.present();

  	let userData = {};

  	userData = {
  		"name": this.newUser.name,
  		"email": this.newUser.email,
  		"username": this.newUser.username,
  		"password": this.newUser.password,
      "gender": this.newUser.gender,
      "contact": this.newUser.contact,
      "address": this.newUser.address,
      "age": this.newUser.age,
      "height": this.newUser.height,
      "weight": this.newUser.weight,
      "profile_img": this.newUser.profile_img.replace("http://192.168.1.7/gym_app/public/uploads/profile/","") || 'default_user.png'
  	}
    if(this.validateInputs()){
          if(!this.isEditing){
            let postData = new FormData();
            postData.append('data' , JSON.stringify(userData));
            this.http.post("http://192.168.1.7/gym_app/Api/user", postData)
                .subscribe(data => {
                  loading.dismiss();
                  console.log(data);
                    var alert = this.alertCtrl.create({
                        title: "User Created",
                        subTitle: "<b>Name</b>: " + this.newUser.name + " " + "<br/>" +
                                  "<b>Email</b>: " + this.newUser.email + "<br/>",
                        buttons: [{
                          text: "Close",
                          handler: () => {
                            this.navCtrl.push('LoginPage');
                          }
                        }]
                    }).present();
                }, error => {
                    console.log(JSON.stringify(error.json()));
                });
          }else{
            let postData = new FormData();
            postData.append('data' , JSON.stringify(userData));
            this.http.post("http://192.168.1.7/gym_app/Api/useredit/"+this.newUser.id, postData)
                .subscribe(data => {
                  loading.dismiss();
                  console.log(data);
                    var alert = this.alertCtrl.create({
                        title: "User Modified",
                        subTitle: "<b>Name</b>: " + this.newUser.name + " " + "<br/>" +
                                  "<b>Email</b>: " + this.newUser.email + "<br/>",
                        buttons: [{
                          text: "Close",
                          handler: () => {
                            this.navCtrl.pop();
                          }
                        }]
                    }).present();
                }, error => {
                    console.log(JSON.stringify(error.json()));
                });
          }
        }else{
          loading.dismiss();
          this.toastCtrl.create({
            message: "Please fill all fields with correct data",
            duration: 5000
          }).present();
        }
  }
}
