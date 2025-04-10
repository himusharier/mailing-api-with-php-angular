import { Component } from '@angular/core';
import {CommonModule} from '@angular/common';
import {FormsModule} from '@angular/forms';
import {SafeHtml} from '@angular/platform-browser';

@Component({
  selector: 'app-register',
  imports: [CommonModule, FormsModule],
  templateUrl: './register.component.html',
  standalone: true,
  styleUrl: './register.component.css'
})
export class RegisterComponent {
  userName: string = "";
  userEmail: string = "";
  userPassword: string = "";
  message: SafeHtml = "";
  isError = false;

  onRegister() {}
}
