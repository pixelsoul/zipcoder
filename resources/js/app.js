
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('DataTable', require('./components/DataTable.vue'));

Vue.component('pagination', require('./components/PaginationComponent.vue').default);
Vue.component('zipcodes', require('./components/ZipCodes.vue').default);
Vue.component('google-map', require('./components/GoogleMap.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({

    el: '#app',

    /** 
    data: {
        posts: {},
        pagination: {
            'current_page': 1
        }
    },
    
    methods: {
        fetchPosts() {
            //console.log(this.getQuery('page'));
            //this.pagination.current_page = this.getQuery('page');
            axios.get('api/zipcodes?page=' + this.pagination.current_page)
                .then(response => {
                    this.posts = response.data.data;
                    this.pagination.last_page = response.data.last_page;
                })
                .catch(error => {
                    console.log(error.response.data);
                });
        },
        getQuery($q) {
            let uri = window.location.search.substring(1); 
            let params = new URLSearchParams(uri);
            return params.get($q);
        }
    },

    mounted() {
        this.fetchPosts();
    }
    */

});
