import { Component, OnInit ,Input } from '@angular/core';
import { NoteService } from 'src/app/services/note.service';
import decode from 'jwt-decode';
import { FormGroup, FormBuilder } from '@angular/forms';
@Component({
  selector: 'app-editlabel',
  templateUrl: './editlabel.component.html',
  styleUrls: ['./editlabel.component.css']
})
export class EditlabelComponent implements OnInit {
  @Input() childMessage: string;
  flag=true;
myvalue:any;
tokenvalue:any;
childlabelselection:any;
details:any;
uid:any;
noteform:FormGroup;
  constructor(private service: NoteService,fb:FormBuilder) {
    this.noteform=fb.group(
      {
          title:"",
          description:"",
      });
   }

initialize()
{
  this.flag=false;
}
  ngOnInit() {

    this.tokenvalue = localStorage.getItem('token');
this.myvalue = decode(this.tokenvalue);
this.uid= this.myvalue['id'];
  
  this.service.viewlabel().subscribe((res:any)=>
    {
      let data=res;
    
console.log(data+"aaaa");
      this.childlabelselection=this.service.childlabel(data.data);
      this.childlabelselection.subscribe((res:any)=>
      {
             
              console.log(res);
                 this.details =res;
      });

    });
  }
  Forms(value:any,labelid)
  {
    debugger;
    let user = this.service.register1(value,labelid,this.uid);
    user.subscribe((res:any)=>
    {
      
    })
  }
}
