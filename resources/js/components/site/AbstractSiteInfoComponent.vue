<script>
    import axios from 'axios';
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
            Loading,
        },
        methods: {
            fetchData() {
                this.error = this.data = null;
                this.loading = true;
                axios
                    .get('/api/sites/' + this.$route.params.site_id + '/' + this.getEndpoint())
                    .then(response => {
                        this.loading = false;
                        this.data = response.data;
                    });
            }
        },
        watch: {
            '$route'(to, from) {
                this.fetchData();
            }
        }
    }
</script>