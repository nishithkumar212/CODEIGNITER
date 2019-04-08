import { Component, OnInit } from '@angular/core';
import { NoteService } from 'src/app/services/note.service';

@Component({
  selector: 'app-editlabel',
  templateUrl: './editlabel.component.html',
  styleUrls: ['./editlabel.component.css']
})
export class EditlabelComponent implements OnInit {

  constructor(private service: NoteService) { }
flag=true;
initialize()
{
  this.flag=false;
}
Forms(value:any)
{
  let user = this.service.register1(value);
  
}
  ngOnInit() {
  }
}
