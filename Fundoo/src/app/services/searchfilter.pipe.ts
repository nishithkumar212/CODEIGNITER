import { Pipe, PipeTransform } from '@angular/core';
import { note} from "../Models/note";
@Pipe({
  name: 'searchfilter'
})
export class SearchfilterPipe implements PipeTransform {
  transform(notes: note [] , search?:string):note [] {
    debugger;
    console.log('chandhu garu',notes);
    if(!notes||!search)
    {
    return notes;
  }
  // console.log('chand',notes);
   return notes.filter(notes =>notes.title.indexOf(search.toLowerCase()) !==-1 || notes.description.indexOf(search.toLowerCase())!==-1);
  }
}
