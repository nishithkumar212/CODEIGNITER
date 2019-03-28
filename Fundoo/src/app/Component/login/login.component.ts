import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators, FormBuilder } from '@angular/forms';
import {LoginService } from '../../services/login.service';
import {Router} from '@angular/router';
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
  constructor(fb: FormBuilder,private  loginservice:LoginService,private route:Router ) {
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
    console.log(value);
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
}
