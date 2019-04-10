import { Component, OnInit } from '@angular/core';
import { EditService } from 'src/app/services/edit.service';
import decode from 'jwt-decode';
@Component({
  selector: 'app-delete',
  templateUrl: './delete.component.html',
  styleUrls: ['./delete.component.css']
})

export class DeleteComponent implements OnInit {
  token:any;
  tokenemail:any;
  constructor(private eservice:EditService) { }
details
  ngOnInit() {
    debugger;
    this.token=localStorage.getItem("token");
      this.tokenemail=decode(this.token);
let deleteselectionuser=this.eservice.selectiondelete(this.tokenemail);
deleteselectionuser.subscribe((res:any)=>
{
  this.details=res as String[];
})
  }

}
