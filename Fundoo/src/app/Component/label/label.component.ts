import { Component, OnInit ,Inject} from '@angular/core';
import {MAT_DIALOG_DATA, MatDialogRef} from "@angular/material"
@Component({
  selector: 'app-label',
  templateUrl: './label.component.html',
  styleUrls: ['./label.component.css']
})
export class LabelComponent implements OnInit {

  constructor(private dialogRef: MatDialogRef<LabelComponent>, @Inject(MAT_DIALOG_DATA) data:any) 
  {
      debugger;
   }

  ngOnInit() {
  }

}
