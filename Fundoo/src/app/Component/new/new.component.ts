import { Component, OnInit } from '@angular/core';
import { NoteService } from 'src/app/services/note.service';
import decode from 'jwt-decode';
import {SearchService}  from "../../services/search.service";
@Component({
  selector: 'app-new',
  templateUrl: './new.component.html',
  styleUrls: ['./new.component.css']
})
export class NewComponent implements OnInit {
tokenvalue:any;
myvalue;
emailvalues;
details:string[];
  constructor(private service: NoteService ,private search:SearchService) { }

  ngOnInit() {
    debugger;
    this.tokenvalue = localStorage.getItem('token');
    this.myvalue = decode(this.tokenvalue);
    this.emailvalues = this.myvalue['id'];
    let user = this.service.selection(this.emailvalues);
    user.subscribe((res:any)=>
    {
        this.details=res;
    });
    this.fetchsearch();
  }
  mydata;
fetchsearch()
{
  this.search.searchingreturn().subscribe((res:any)=>
  {
      this.mydata=res.data;
      console.log(this.mydata);
  });
}
}
