<template>
    <div class="row justify-content-center pagination-row">
        <nav aria-label="page navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item first_page" :class="{'disabled' : pagination.current_page <= 1}">
                    <a class="page-link" @click.prevent="changePage(1)" @click="current_page = pagination.current_page">First page</a>
                </li>
                <li class="page-item previous_page" :class="{'disabled' : pagination.current_page <= 1}">
                    <a class="page-link" @click.prevent="changePage(pagination.current_page - 1)" @click="current_page = pagination.current_page">Previous</a>
                </li>
                <li class="page-item current_page" v-for="page in pages">
                    <a class="page-link" :class="isCurrentPage(page) ? 'is-current' : ''" @click.prevent="changePage(page)" @click="current_page = pagination.current_page">{{ page }}</a>
                </li>
                <li class="page-item next_page" :class="{'disabled' : pagination.current_page >= pagination.last_page}">
                    <a class="page-link" @click.prevent="changePage(pagination.current_page + 1)" @click="current_page = pagination.current_page">Next</a>
                </li>
                <li class="page-item last_page" :class="{'disabled' : pagination.current_page >= pagination.last_page}">
                    <a class="page-link" @click.prevent="changePage(pagination.last_page)" @click="current_page = pagination.current_page">Last page</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
    export default {
        props: ['pagination', 'offset'],

        data() {
            return {
                current_page: 1
            }
        },

        methods: {
            isCurrentPage(page) {
                return this.pagination.current_page === page;
            },
            changePage(page) {
                let pageNum = this.url();
                if (page > this.pagination.last_page) {
                    page = this.pagination.last_page;
                }
                this.pagination.current_page = page;
                this.pagination.page = `/api/zipcodes?page=${page}`;
                this.$emit('paginate');
                //console.log('changePage ' + this.pagination);
            },
            broadcast() {
                //console.log(this.current_page);
                return this.$emit('changed', this.current_page);
            },
            updateUrl(){
                this.pagination.current_page = this.current_page;
                history.pushState(null, null, '?page=' + this.current_page);
                //console.log('updateUrl ' + this.pagination.current_page);
            },
            // get url of page
            url(page) {
                if (! page) {
                    let query = location.search.match(/page=(\d+)/);
                    page = query ? query[1] : 1;
                }
                return Number(page);
            }
        },

        watch: {
            current_page() {
                this.broadcast().updateUrl();
            }
        },

        computed: {
            pages() {
                let pages = [];
                let from = this.pagination.current_page - Math.floor(this.offset / 2);
                if (from < 1) {
                    from = 1;
                }
                let to = from + this.offset - 1;
                if (to > this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                while (from <= to) {
                    pages.push(from);
                    from++;
                }
                return pages;
            }
        }
    }
</script>