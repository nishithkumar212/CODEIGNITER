import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators, FormBuilder } from '@angular/forms';
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  submitted=false;
loginForm : FormGroup;
  constructor(fb:FormBuilder) { 
    this.loginForm = fb.group({
      email:[null,[Validators.required,Validators.email]],
      password:[null,[Validators.required]],
    })
  }
  ngOnInit() {
  }
  submitForm(value: any){
    this.submitted=true;
   
  }
}
