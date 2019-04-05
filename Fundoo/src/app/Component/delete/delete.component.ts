import { Component, OnInit } from '@angular/core';
import { EditService } from 'src/app/services/edit.service';

@Component({
  selector: 'app-delete',
  templateUrl: './delete.component.html',
  styleUrls: ['./delete.component.css']
})
export class DeleteComponent implements OnInit {

  constructor(private eservice:EditService) { }
details
  ngOnInit() {
    debugger;
let deleteselectionuser=this.eservice.selectiondelete();
deleteselectionuser.subscribe((res:any)=>
{
  this.details=res as String[];
})
  }

}
