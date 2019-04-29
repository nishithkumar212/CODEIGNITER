import { Component, OnInit } from '@angular/core';
import { FormGroup,  Validators, FormBuilder} from '@angular/forms';
import {ForgetserviceService} from '../../services/forgetservice.service';
@Component({
  selector: 'app-forgotpassword',
  templateUrl: './forgotpassword.component.html',
  styleUrls: ['./forgotpassword.component.css']
})

export class ForgotpasswordComponent implements OnInit {

  submitted =false;
  forgetForm:FormGroup;
  errormsg:string="";
  constructor(private fb:FormBuilder,private forgotservice:ForgetserviceService ) { 
    this.forgetForm=fb.group({
      email: [null, [Validators.required, Validators.email]],
    });
}
  ngOnInit() 
   {
   }
submitForm(value: any) {
  debugger;
  this.submitted =true;
  console.log(value);
  let status =this.forgotservice.forgotpass(value);
  status.subscribe((res: any) => {
    debugger;
    console.log(res.message);
    if (res.message == "200") {
    this.errormsg = "Reset link send to your mail";
    } else if (res.message == "204") {
    this.errormsg = "Register failed";
    }
    });
}
}
