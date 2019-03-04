<template>

<div class="zipcodes">

    <div v-show="loading" class="spinner-bg">
        <div class="spinner"></div>
    </div>

    <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5" @paginate="fetchZips()"></pagination>

    <div class="row zipcode-row" v-for="zipcode in zipcodes">
        <div class="col-md-4 zipcode-title vertical-center">
            <span>
            <h3 v-cloak>
                <a v-bind:href="'/zipcode/' + zipcode.zip">{{ zipcode.zip }}</a>
            </h3>
            <p v-cloak>
                {{ zipcode.city }}, {{ zipcode.state_name }}
            </p>
            </span>
        </div>
        <div class="col-md-8 zipcode-info">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span>County</span> {{ zipcode.county_name }}</li>
                <li class="list-group-item"><span>Timezone</span> {{ zipcode.timezone }}</li>
                <li class="list-group-item"><span>Population</span> {{ zipcode.population }}</li>
            </ul>
        </div>
    </div>

    <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5" @paginate="fetchZips()"></pagination>
</div>

</template>

<script>
import axiosRetry from 'axios-retry';

export default {

    data() {
        return{
            zipcodes: {},
            pagination: {
                current_page: 1
            },
            loading: false,
            errored: false
        }
    },

    mounted() {
        this.url();
        this.fetchZips(); 
    },

    methods: {
        // get zipcode data
        fetchZips(){
            this.loading = true;

            axiosRetry(axios, { retries: 3, shouldResetTimeout: true });

            axios
                .get(this.pagination.page, {
                    timeout: '8000'
                })
                .then(response => {
                    this.zipcodes = response.data.data;
                    this.pagination.last_page = response.data.last_page;
                })
                .catch(error => {
                    //console.log(error.response.data);
                    console.log(error);
                    this.errored = true;
                })
                .finally(() => this.loading = false);
        },
        // get url of page
        url(page) {
            if (! page) {
                let query = location.search.match(/page=(\d+)/);
                page = query ? query[1] : 1;
            }
            this.pagination.page = `/api/zipcodes?page=${page}`;
            this.pagination.current_page = Number(page);
            return `/api/zipcodes?page=${page}`;
        }

    }
}
</script>

<style>

</style>
