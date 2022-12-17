import './bootstrap';
import * as bootstrap from 'bootstrap';
import Turbolinks from 'turbolinks';

Turbolinks.start();

// Assign bootstrap to window variable
window.bootstrap = bootstrap;


import Alpine from 'alpinejs';

window.Alpine = Alpine;

import './../../vendor/power-components/livewire-powergrid/dist/powergrid';

Alpine.start();
