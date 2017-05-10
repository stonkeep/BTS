
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./bootstrap-table/bootstrap-table');
require('./bootstrap-table/bootstrap-table-locale-all');
require('./bootstrap-table/extensions/accent-neutralise/bootstrap-table-accent-neutralise.min');
require('./bootstrap-table/bootstrap.min');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('regiao', require('./components/Regiao.vue'));
Vue.component('cargo', require('./components/Cargo.vue'));
Vue.component('tema', require('./components/Tema.vue'));
Vue.component('natureza', require('./components/NaturezaJuridica.vue'));
Vue.component('publicoalvo', require('./components/PublicoAlvo.vue'));
Vue.component('subtema', require('./components/SubTema.vue'));
Vue.component('tecnologia', require('./components/Tecnologia.vue'));
Vue.component('categoria', require('./components/Categoria.vue'));
Vue.component('premio', require('./components/Premio.vue'));
Vue.component('table-example', require('./components/tablesExample.vue'));

const app = new Vue({
    el: '#app'
});
