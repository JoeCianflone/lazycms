require('./bootstrap');

Vue.component('sidebar', require('./components/Sidebar.vue'));

const app = new Vue({
    el: '#app'
});
