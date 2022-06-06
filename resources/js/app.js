import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'
import * as VueGoogleMaps from 'vue2-google-maps'
import Vuelidate from 'vuelidate'
import Toasted from 'vue-toasted';
import { BootstrapVue } from 'bootstrap-vue'

Vue.config.productionTip = false

import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)

Vue.use(Toasted, {
    iconPack : 'fontawesome', // set your iconPack, defaults to material. material|fontawesome|custom-class
    keepOnHover: true,
    action : {
        text : 'Close',
        onClick : (e, toastObject) => {
            toastObject.goAway(0);
        }
    },
    duration: 3500
})
Vue.use(Vuelidate);


InertiaProgress.init()
Vue.mixin(require('./trans'));
Vue.prototype.$route = route;

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyCsT140mx0UuES7ZwcfY28HuTUrTnDhxww',
        libraries: 'places', // This is required if you use the Autocomplete plugin
    },
});

window.axios = require('axios');

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    title: title => `${title} - Elsa3dy`,
    setup({ el, App, props }) {
        new Vue({
            render: h => h(App, props),
        }).$mount(el)
    },
})


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#vue-app',
// });
