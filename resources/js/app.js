
require('./bootstrap');

window.Vue = require('vue');

Vue.component('user-component', require('./components/UserComponent.vue').default);

let Event = new Vue()
window.Event = Event;

const app = new Vue({
    el: '#app',
});
