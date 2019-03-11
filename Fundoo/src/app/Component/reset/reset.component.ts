import { Component, OnInit } from '@angular/core';
import { FormGroup, Validators, FormBuilder } from '@angular/forms';
import { ResetService } from '../../services/reset.service';
import { ActivatedRoute } from '@angular/router';
@Component({
  selector: 'app-reset',
  templateUrl: './reset.component.html',
  styleUrls: ['./reset.component.css']
})
export class ResetComponent implements OnInit {
  resetForm: FormGroup;
  submitted = false;
 errormsg:string="";

  constructor(private fb: FormBuilder, private service: ResetService, ) {
    this.resetForm = fb.group(
      {
        password: [null, [Validators.required]],
      },
    );
  }
  ngOnInit() {
    let obs = this.service.getEmail();
  }
  submitForm(value: any) {
    debugger
    let userpass=this.service.resetpassword(value);
    userpass.subscribe((res:any)=>
    {
      if(res==200)
      {
        this.errormsg="password updated";
      }
      else{
        this.errormsg="something went wrong please check again";
      }
    })
}
}