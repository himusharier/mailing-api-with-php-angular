import { Component } from '@angular/core';
import {CommonModule} from '@angular/common';
import {FormsModule} from '@angular/forms';
import {SafeHtml} from '@angular/platform-browser';
import {RouterLink} from '@angular/router';

@Component({
  selector: 'app-login',
  imports: [CommonModule, FormsModule, RouterLink],
  templateUrl: './login.component.html',
  standalone: true,
  styleUrl: './login.component.css'
})
export class LoginComponent {
  userEmail: string = "";
  userPassword: string = "";
  message: SafeHtml = "";
  isError: boolean = false;

  onSubmit() {}
}
