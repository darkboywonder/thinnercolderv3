/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import vuetify from './plugins/vuetify'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


let eventHub = new Vue();

Vue.mixin({
    data: function () {
        return {
            eventHub: eventHub,
        }
    }
});

Vue.component('side-nav', require('./components/SideNav.vue').default);
Vue.component('navigation-links', require('./components/NavigationLinks.vue').default);
Vue.component('menu-button', require('./components/MenuButton.vue').default);
Vue.component('info-action-button', require('./components/InfoActionButton.vue').default);
Vue.component('mobile-info-action-button', require('./components/MobileInfoActionButton.vue').default);
Vue.component('info-drawer', require('./components/InfoDrawer.vue').default);
Vue.component('pricing', require('./components/Pricing.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    vuetify,
    el: '#app',
});
