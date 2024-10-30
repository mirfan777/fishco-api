// Import CSS
import "flatpickr/dist/flatpickr.min.css";
import "../css/style.css";

import Alpine from "alpinejs";
import persist from "@alpinejs/persist";
import 'flowbite';
import jQuery from 'jquery';

// Make jQuery globally available
window.$ = jQuery;

// Alpine.js Initialization
Alpine.plugin(persist);
window.Alpine = Alpine;
Alpine.start();
