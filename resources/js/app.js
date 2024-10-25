import "../css/style.css";

import Alpine from "alpinejs";
import persist from "@alpinejs/persist";
import 'flowbite';
import jQuery from 'jquery';

window.$ = jQuery;
Alpine.plugin(persist);
window.Alpine = Alpine;
Alpine.start();

