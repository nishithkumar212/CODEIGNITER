import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LoginComponent } from './Component/login/login.component';
import { RegisterComponent } from './Component/register/register.component';
import { CustomMaterial } from './material.module';
import { FlexLayoutModule } from "@angular/flex-layout";
import {MatFormFieldModule} from '@angular/material/form-field';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import { HttpClientModule, HttpHeaders }    from '@angular/common/http';
import {ResetComponent}  from './Component/reset/reset.component';
import {RegisterService} from './services/register.service';
import { ForgotpasswordComponent } from './Component/forgotpassword/forgotpassword.component';
import { DashboardComponent } from './Component/dashboard/dashboard.component';
import {NoteComponent} from './Component/note/note.component';
import {DatePipe} from '@angular/common';
import { MatDatepickerModule } from "@angular/material/datepicker";
import {MatGridListModule }from '@angular/material/grid-list';
import {Observable } from"rxjs";
import { FirstComponent } from './Component/first/first.component';
import { MatDialogModule } from '@angular/material/dialog';
import {EditnotesComponent} from './Component/editnotes/editnotes.component';
import { ReminderComponent } from './Component/reminder/reminder.component';
import { TrashComponent } from './Component/trash/trash.component';
import { LabelComponent } from './Component/label/label.component';
import { ParentComponent } from './Component/parent/parent.component';
import { ChildComponent } from './Component/child/child.component';
@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    RegisterComponent,
    ForgotpasswordComponent,
    ResetComponent,
    DashboardComponent,
    NoteComponent,
    FirstComponent,
    EditnotesComponent,
    ReminderComponent,
    TrashComponent,
    LabelComponent,
    ParentComponent,
    ChildComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    CustomMaterial,
    FlexLayoutModule,
    MatFormFieldModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    MatDatepickerModule,
    MatGridListModule,
    MatDialogModule
  ],
  providers: [RegisterService,DatePipe],
  bootstrap: [AppComponent],
  entryComponents: [EditnotesComponent,LabelComponent]
  
})
export class AppModule { }
