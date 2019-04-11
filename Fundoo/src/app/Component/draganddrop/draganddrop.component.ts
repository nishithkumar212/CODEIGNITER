import { Component, OnInit } from '@angular/core';
import { hasLifecycleHook } from '@angular/compiler/src/lifecycle_reflector';
import { CdkDragDrop, moveItemInArray } from '@angular/cdk/drag-drop';
@Component({
  selector: 'app-draganddrop',
  templateUrl: './draganddrop.component.html',
  styleUrls: ['./draganddrop.component.css']
})
export class DraganddropComponent implements OnInit {

  constructor() { }
  items = [
    'Item 0',
    'Item 1',
    'Item 2',
    'Item 3',
    'Item 4',
    'Item 5',
    'Item 6',
    'Item 7',
  ]
  dropped(event: CdkDragDrop<string[]>) {
    moveItemInArray(
       this.items, 
       event.previousIndex, 
       event.currentIndex
      );
    }
  ngOnInit() {
  }

}
