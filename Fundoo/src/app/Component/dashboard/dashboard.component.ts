import { Component, OnInit } from '@angular/core';
import * as $ from "jquery";
import decode from 'jwt-decode';
import { ViewService } from 'src/app/services/view.service';
import {MatDialog, MatDialogConfig} from "@angular/material";
import { LabelComponent } from '../label/label.component';
@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
  showFiller = false;
  list: any = true;
  grid: any = false;
  dialogConfig;
  constructor(private view: ViewService,private dialog: MatDialog) { }

  "angularCompilerOptions": {
    "preserveWhitespaces": true
  }
  email: string;
  ngOnInit() {
    const token = localStorage.getItem('token');
    var decoded = decode(token);
    this.email = decoded.email;
  }
  clicker() {
    if (this.list == true) {
      this.list = false;
      this.grid = true;
    }
    else {
      this.grid = false;
      this.list = true;
    }
    this.view.gridview();
  }
  opendialog()
  {
    debugger;
    this. dialogConfig = new MatDialogConfig();
    this.dialogConfig.disableClose = false;
   this.dialogConfig.autoFocus = true;
   this.dialogConfig.width='400px';
   this.dialogConfig.height='200px';
   this.dialogConfig.align='center';
   this.dialogConfig.direction='ltr';
   this.dialog.open(LabelComponent,this.dialogConfig);
  }
  signout() {
    localStorage.removeItem('token');
  }
}
