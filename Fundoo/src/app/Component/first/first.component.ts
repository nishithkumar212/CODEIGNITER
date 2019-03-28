import { Component, OnInit,Input,Output} from '@angular/core';
import { EventEmitter } from 'events';
import {MatDialog, MatDialogRef, MAT_DIALOG_DATA} from '@angular/material';
@Component({
  selector: 'app-first',
  templateUrl: './first.component.html',
  styleUrls: ['./first.component.css']
})
export class FirstComponent implements OnInit {
 users:any;
  constructor(public dialog: MatDialog) { 
    
  }
  ngOnInit() {
  }

  

}
