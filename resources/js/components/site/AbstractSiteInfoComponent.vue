<script>
    import axios from 'axios';
    import Error from './Error';
    import NoResult from './NoResult';
    import Loading from './../Loading';

    export default {
        data() {
            return {
                loading: false,
                data: null,
                error: null,
            };
        },
        created() {
            this.fetchData();
        },
        components: {
            NoResult,
            Error,
            Loading,
        },
        methods: {
            fetchData() {
                this.error = this.data = null;
                this.loading = true;
                axios
                    .get('/api/sites/' + this.$route.params.site_id + '/' + this.getEndpoint())
                    .then(
                        response => {
                            this.loading = false;
                            this.data = response.data;
                        },
                        response => {
                            this.loading = false;
                            this.error = 'Uy! Algo salió mal.';
                        }
                    )
            }
        },
        watch: {
            '$route'(to, from) {
                this.fetchData();
            }
        }
    }
</script>

<style lang="scss">
    .site-info {
        h2 {
            margin-bottom: 20px;
        }

        li {
            margin-bottom: 3px;
        }
    }
</style>