<template>
    <div class="col-auto sites sites-shadow">
        <div class="loading" v-if="loading">
            <span>Loading...</span>
        </div>

        <div v-if="error" class="error">
            {{ error }}
        </div>

        <ul class="site-menu" v-if="sites">
            <li v-for="{ flag, name, id } in sites" :class="$route.params.site_id == id ? 'active' : ''">
                <router-link :to="{ name: 'site', params: { site_id: id } }">
                    <img :alt=name :src="flag"/>
                    <span>{{ name }}</span>
                    <small>({{ id }})</small>
                </router-link>
            </li>
        </ul>

        <a class="cache-clear" href="/cache/clear">Limpiar caché</a>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                loading: false,
                sites: null,
                error: null,
            };
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.error = this.sites = null;
                this.loading = true;
                axios
                    .get('/api/sites')
                    .then(response => {
                        this.loading = false;
                        this.sites = response.data.sort(function (one, another) {
                            return one.name > another.name ? 1 : -1;
                        });
                    });
            }
        }
    }
</script>

<style lang="scss">
    .sites-shadow {
        box-shadow: 5px 0px 10px 0px rgba(200, 150, 50, 0.7);
        z-index: 3;
    }

    .sites {
        $background: #fff159;
        background-color: $background;
        padding: 10px 0 10px;
        border-radius: 3px;

        .site-menu {
            li {
                cursor: pointer;
                font-size: 1rem;
                text-transform: uppercase;

                a {
                    display: block;
                    padding: 6px 90px 6px 10px;
                    color: #333;

                    img {
                        display: inline-block;
                        width: 24px;
                        border-radius: 10%;
                        margin-right: 5px;
                    }

                    small {
                        color: #777;
                        font-size: 90%;
                    }

                    &:hover {
                        background-color: #f8d032;
                        text-decoration: none;
                    }
                }

                &.active {
                    background-color: #f8d032;
                    text-decoration: none;
                }
            }
        }

        .cache-clear {
            display: inline-block;
            margin: 20px 20px 0;
        }
    }
</style>
