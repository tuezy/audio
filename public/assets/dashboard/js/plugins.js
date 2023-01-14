/*
Template Name: Velzon - Admin & Dashboard Template
Author: Themesbrand
Version: 2.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Common Plugins Js File
*/

//Common plugins
if(document.querySelectorAll("[toast-list]") || document.querySelectorAll('[data-choices]') || document.querySelectorAll("[data-provider]")){
  document.writeln("<script type='text/javascript' src='/assets/dashboard/libs/toastify-js'></script>");
  document.writeln("<script type='text/javascript' src='/assets/dashboard/libs/choices.js/choices.js.min.js'></script>");
  document.writeln("<script type='text/javascript' src='/assets/dashboard/libs/flatpickr/flatpickr.min.js'></script>");
}
