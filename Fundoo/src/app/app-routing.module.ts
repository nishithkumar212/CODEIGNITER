import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from './Component/login/login.component';
import { RegisterComponent } from './Component/register/register.component';
import { ForgotpasswordComponent } from './Component/forgotpassword/forgotpassword.component';
import { ResetComponent } from './Component/reset/reset.component';
import { DashboardComponent } from './Component/dashboard/dashboard.component';
import { NoteComponent } from './Component/note/note.component';
import { FirstComponent } from './Component/first/first.component';
import { ReminderComponent } from './Component/reminder/reminder.component';
import { TrashComponent } from './Component/trash/trash.component';
import { ChildComponent } from './Component/child/child.component';
import { ParentComponent } from './Component/parent/parent.component';
import { DeleteComponent } from './Component/delete/delete.component';


const routes: Routes = [
    { path: 'login', component: LoginComponent },
    { path: 'register', component: RegisterComponent },
    { path: 'forgot', component: ForgotpasswordComponent },
    { path: '', component: LoginComponent },
    { path: 'reset', component: ResetComponent },
    {
        path: 'dashboard', component: DashboardComponent,
        children: [
            {
                path: 'note',
                component: NoteComponent,
            },
            {
                path:'reminder',
                component:ReminderComponent,
            },
            {
                path:'trash',
                component:TrashComponent,
            },
            {
                path:'delete',
                component:DeleteComponent,
            }
        ]
    },
    {path:'details',component:FirstComponent},
    {path:'child',component:ChildComponent},
    {path:'parent',component:ParentComponent}
]
@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule]
})
export class AppRoutingModule { }
