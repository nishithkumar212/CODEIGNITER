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
import { DeleteComponent } from './Component/delete/delete.component';
import { EditlabelComponent } from './Component/editlabel/editlabel.component';
import { FileSelectDirective } from 'ng2-file-upload';
import{
SocialLoginModule,
    AuthServiceConfig,
    GoogleLoginProvider,
    FacebookLoginProvider,
    AuthService,
} from "angular-6-social-login";
import { getAuthServiceConfigs } from "./Models/socialloginconfig";
import { CookieService } from 'ngx-cookie-service';
import { DraganddropComponent } from './Component/draganddrop/draganddrop.component';
import { DragDropModule } from '@angular/cdk/drag-drop';
import { NewComponent } from './Component/new/new.component';
import { SearchfilterPipe } from './services/searchfilter.pipe';
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
    ChildComponent,
    DeleteComponent,
    EditlabelComponent,
    FileSelectDirective,
    DraganddropComponent,
    NewComponent,
    SearchfilterPipe,
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
    MatDialogModule,
    DragDropModule
  ],
  
  providers: [RegisterService,DatePipe,AuthService,CookieService,
   {
      provide: AuthServiceConfig,
      useFactory: getAuthServiceConfigs
    }
  ],
  bootstrap: [AppComponent],
  entryComponents: [EditnotesComponent,LabelComponent]
  
})

export class AppModule { }
