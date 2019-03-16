import { Component, OnInit } from '@angular/core';
import { supportsWebAnimations } from '@angular/animations/browser/src/render/web_animations/web_animations_driver';
import { FormGroup, FormBuilder } from '@angular/forms';

@Component({
  selector: 'app-note',
  templateUrl: './note.component.html',
  styleUrls: ['./note.component.css']
})
export class NoteComponent implements OnInit {
  flag:any=true;
  noteform:FormGroup;
  constructor(private fb:FormBuilder) 
  {
    this.noteform=fb.group({
      title:"",
      description:""
    });
  }
  ngOnInit() {
  }
  initialize()
  {
    this.flag=!this.flag;
  }
  Forms(value:any)
  {
    debugger;
    console.log(value);
  }

}
