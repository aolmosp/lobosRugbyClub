import './bootstrap';

import Alpine from 'alpinejs';
import Choices from "choices.js";
import Swal from 'sweetalert2'

import 'choices.js/public/assets/styles/choices.min.css';

import flatpickr from "flatpickr";


window.Alpine = Alpine;
window.Choices = Choices;
window.Swal = Swal;
window.flatpickr = flatpickr;

import collapse from '@alpinejs/collapse'
 
Alpine.plugin(collapse)
Alpine.start();


window.Toast = Swal.mixin({
    toast: true,
    position: 'center',
    customClass: {
      popup: 'colored-toast',
    },
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
  })