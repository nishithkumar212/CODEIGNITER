import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators, FormBuilder } from '@angular/forms';
import {LoginService } from '../../services/login.service';
import {Router} from '@angular/router';
import {
	AuthService,
	FacebookLoginProvider,
	GoogleLoginProvider
} from "angular-6-social-login";
import { getAuthServiceConfigs } from "../../Models/socialloginconfig"
import { CookieService } from 'ngx-cookie-service';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  submitted = false;
  loginForm: FormGroup;
  errormsg :string="";
  value:any;
  tokens:any;

  /**
   * @param fb creating an FormBuilder instance instead of formcontrol and form group 
   * It includes validations for the controllers.
   */
  constructor(fb: FormBuilder,private  loginservice:LoginService,private route:Router, private socialAuthService: AuthService,private _cookieService: CookieService,) {
    this.loginForm = fb.group({
      email: [null, [Validators.required, Validators.email]],
      password: [null, [Validators.required]],
    })
  }
  ngOnInit() {

  }

  /**
   * @param value indicates values taken from the user
   * button-on-click all the values are transfered to the submitform method.
   */
  submitForm(value: any) {
    this.submitted = true;
    // console.log(value);
    let status =this.loginservice.login(value);
    status.subscribe((res: any) => {
      debugger;
    if(res.message=="200")
    {
      debugger
      this.errormsg="login success";
      const tokens =res.token;
      localStorage.setItem('token',tokens);
      this.route.navigate(["/dashboard"]);
    }
    else{
      this.errormsg="login failed";
    }
      
  });
  }

  public socialSignIn(socialPlatform: string) {
	//	debugger;
		let socialPlatformProvider;
		if (socialPlatform == "facebook") {
			socialPlatformProvider = FacebookLoginProvider.PROVIDER_ID;
		} else if (socialPlatform == "google") {
			socialPlatformProvider = GoogleLoginProvider.PROVIDER_ID;
		}

		this.socialAuthService.signIn(socialPlatformProvider).then(userData => {
      console.log(userData,"Hghg");
      debugger;
			this.sendToRestApiMethod(
				userData.token,
				userData.email,
				userData.image,
				userData.name
			);
		});
  }
  iserror:any;
  errorMessage :any;

	sendToRestApiMethod(token, email, image, name): void {
   // debugger;
		let obsss = this.loginservice.socialLoginData(email, name,image);
		obsss.subscribe(
			(res: any) => {
        
        console.log(res,"jkhnij");
				if (res.message == "200") {
					 this._cookieService.set("email", email);
					localStorage.setItem("token", res.token);
					this._cookieService.set("image", image);
				this.route.navigate(["/dashboard"]);
					// obsss.unsubscribe();
        } 
        // else {
				// 	// this._cookieService.set("email", email);
				// 	localStorage.setItem("token", res.token);
				// 	// this._cookieService.set("image", image);
        //   this.route.navigate(["/dashboard"]);
				// 	// obsss.unsubscribe();
				// }
			},
			error => {
				this.iserror = true;
				this.errorMessage = error.message;
			}
		);
	}
}