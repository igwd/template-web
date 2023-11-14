import './bootstrap';
import 'flowbite';

import Aos from 'aos';

document.addEventListener('DOMContentLoaded', function () {
    Aos.init();
});

document.addEventListener('livewire:navigated', function () {
    Aos.init();
});