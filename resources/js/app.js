import "../css/style.css";

import Alpine from "alpinejs";
import persist from "@alpinejs/persist";
import 'flowbite';

Alpine.plugin(persist);
window.Alpine = Alpine;
Alpine.start();

