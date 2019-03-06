import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators, FormBuilder } from '@angular/forms';
import { RegisterService } from 'src/app/register.service';
import { PasswordValidation } from 'src/app/password.validator';
import {Router} from '@angular/router';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {
  submitted=false;
registerForm: FormGroup;
  constructor(fb:FormBuilder,private regservice:RegisterService ,private router:Router ) 
  { 
    this.registerForm = fb.group({
      firstname:[null,[Validators.required]],
      lastname:[null,[Validators.required]],
      email:[null,[Validators.required,Validators.email]],
      password:[null,[Validators.required]],
      confirmpassword:[null,[Validators.required]],
    },
    {
      validator: PasswordValidation.MatchPassword
    });
  }
  ngOnInit() {
  }
  submitForm(value: any){
    debugger;
    
    this.submitted=true;
    console.log(value);
     this.regservice.registeruser(value);
  }
 redirectto()
 {
   this.router.navigate(['login'])
 }
}
