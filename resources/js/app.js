import './bootstrap';

import Alpine from 'alpinejs';
import mask from '@alpinejs/mask';

import jQuery from 'jquery';
window.$ = jQuery;

window.Alpine = Alpine;
Alpine.plugin(mask);

Alpine.start();
