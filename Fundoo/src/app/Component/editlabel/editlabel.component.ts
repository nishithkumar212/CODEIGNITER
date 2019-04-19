import { Component, OnInit ,Input } from '@angular/core';
import { NoteService } from 'src/app/services/note.service';
@Component({
  selector: 'app-editlabel',
  templateUrl: './editlabel.component.html',
  styleUrls: ['./editlabel.component.css']
})
export class EditlabelComponent implements OnInit {
  @Input() childMessage: string;
  constructor(private service: NoteService) { }
flag=true;
childlabelselection:any;
details:any;
initialize()
{
  this.flag=false;
}
Forms(value:any)
{
  let user = this.service.register1(value);
}

  ngOnInit() {
    debugger;
  this.service.viewlabel().subscribe((res:any)=>
    {
      let data=res;
      debugger;
console.log(data+"aaaa");
      this.childlabelselection=this.service.childlabel(data.data);
      this.childlabelselection.subscribe((res:any)=>
      {
              debugger;
              console.log(res);
                 this.details =res;
      });

    });
  }

}
