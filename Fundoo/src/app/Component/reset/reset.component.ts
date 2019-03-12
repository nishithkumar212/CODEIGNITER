import { Component, OnInit } from '@angular/core';
import { FormGroup, Validators, FormBuilder } from '@angular/forms';
import { ResetService } from '../../services/reset.service';
@Component({
  selector: 'app-reset',
  templateUrl: './reset.component.html',
  styleUrls: ['./reset.component.css']
})
export class ResetComponent implements OnInit {

    show:any;
  submitted = false;
  resetForm: FormGroup;
   errormsg:string="";
   session:string="";
  constructor(private fb: FormBuilder, private service: ResetService, ) {
    this.resetForm = fb.group(
      {
        password: [null, [Validators.required]],
      },
    );
  }
  ngOnInit() {
    let obs = this.service.getEmail();
    debugger
    obs.subscribe((result:any)=>
    {
      debugger
      if(result.message=="200")
      {
        this.show=true;
        this.session = "session exists";
      }
      else if(result.message=="204")
      {
        this.session="your session was expired";
        this.show=false;
     
       
      }
    });
  }
  submitForm(value: any) {
    debugger
    let userpass=this.service.resetpassword(value);
    userpass.subscribe((res:any)=>
    {
      debugger
      if(res.message =="200")
      {
        this.errormsg="password updated";
      }
      else if(res.message=="204")
      {
        this.errormsg="something went wrong please check again";
      }
    });
}
}