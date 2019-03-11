import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators, FormBuilder } from '@angular/forms';
import {LoginService } from '../../services/login.service';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  submitted = false;
  loginForm: FormGroup;
  errormsg :string="";

  /**
   * @param fb creating an FormBuilder instance instead of formcontrol and form group 
   * It includes validations for the controllers.
   */
  constructor(fb: FormBuilder,private  loginservice:LoginService ) {
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
      if (res.message == "200") {
     
      this.errormsg = "Login  success";
      } else if (res.message == "204") {
      this.errormsg = "Login  failed";
      }
      });
  }
  }

