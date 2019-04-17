
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('landing_nav', require('./components/LandingNav.vue').default);
Vue.component('landing_header', require('./components/LandingHeader.vue').default);
Vue.component('landing_banner', require('./components/LandingBanner.vue').default);
Vue.component('landing_footer', require('./components/LandingFooter.vue').default);
Vue.component('landing_auth', require('./components/LandingAuth.vue').default);

const app = new Vue({
    el: '#app'
});
