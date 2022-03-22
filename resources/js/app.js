require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
Echo.private('user-added.' + userId)
    .notification((notification) => {
        console.log(notification.type);
    });
