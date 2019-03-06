import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators, FormBuilder } from '@angular/forms';
import { RegisterService } from '../../services/register.service';
import { PasswordValidation } from 'src/app/password.validator';
import { Router } from '@angular/router';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {
   submitted = false;
   registerForm: FormGroup;
   errormsg :string="";
  /**
   * @param regservice  the service which is used for routing and calling the api from it
   * @param router used for routing 
   * The constructor includes some validations 
   */
  constructor(private fb: FormBuilder, private regservice: RegisterService, private router: Router) {
    this.registerForm = fb.group({
      firstname: [null, [Validators.required]],
      lastname: [null, [Validators.required]],
      email: [null, [Validators.required, Validators.email]],
      password: [null, [Validators.required]],
      confirmpassword: [null, [Validators.required]],
    },
      {
        validator: PasswordValidation.MatchPassword
      });
  }
  ngOnInit() {
    
  }

  /**
   * @param value indicates the values from th form controllers
   */
  submitForm(value: any) {
    debugger;

    this.submitted = true;
    console.log(value);
    let status=this.regservice.registeruser(value);
    status.subscribe((res: any) => {
      debugger;
      console.log(res.message);
      if (res.message == "200") {
     
      this.errormsg = "Register success";
      } else if (res.message == "204") {
      this.errormsg = "Register failed";
      }
      });
  }
  /**
   * method to redirect to the module on click of a button
   */
  redirectto() {
    this.router.navigate(['login'])
  }
}
