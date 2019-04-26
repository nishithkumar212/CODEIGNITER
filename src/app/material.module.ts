import {NgModule} from "@angular/core";
import { CommonModule } from '@angular/common';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { LayoutModule } from '@angular/cdk/layout';
import {MatChipsModule} from '@angular/material/chips';
import {
MatButtonModule, MatCardModule, MatDialogModule, MatInputModule, MatTableModule,
MatToolbarModule, MatMenuModule,MatIconModule, MatProgressSpinnerModule,
MatSelectModule ,MatFormFieldModule,MatSidenavModule,MatDividerModule, MatListModule,
MatDatepickerModule ,MatNativeDateModule ,MAT_DIALOG_DATA
} from '@angular/material';
import {MatCheckboxModule} from '@angular/material/checkbox';
import {MatSnackBarModule} from '@angular/material';

@NgModule({
imports: [
CommonModule, 
BrowserAnimationsModule,
LayoutModule,
MatToolbarModule,
MatButtonModule, 
MatCardModule,
MatInputModule,
MatDialogModule,
MatTableModule,
MatMenuModule,
MatIconModule,
MatSelectModule,
MatProgressSpinnerModule,
MatFormFieldModule,
MatSidenavModule,
MatDividerModule,
MatListModule,
MatDatepickerModule,
MatNativeDateModule,
MatCheckboxModule,
MatChipsModule,
MatSnackBarModule
],
exports: [
CommonModule,
MatToolbarModule, 
MatButtonModule, 
MatCardModule, 
MatInputModule, 
MatDialogModule, 
MatTableModule, 
MatMenuModule,
MatIconModule,
MatProgressSpinnerModule,
MatSelectModule,
MatFormFieldModule,
MatSidenavModule,
MatDividerModule,
MatListModule,
MatCheckboxModule,
MatChipsModule,
MatSnackBarModule
],
})
export class CustomMaterial { }