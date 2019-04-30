<template>
    <div class="col-auto site">
        <div v-if="loading" class="loading">
            Loading...
        </div>

        <div v-if="site" class="flag">
            <img :alt="site.name" :src="site.flag"/>
        </div>

        <div v-if="site" class="title">
            {{ site.name }}
            <small>({{ site.id }})</small>
        </div>

        <div v-if="site && site.url" class="url">
            <a :href="site.url" target="_blank">
                {{ site.url }}
            </a>
        </div>

        <ul v-if="site" class="attributes">
            <li :class="$route.params.endpoint == 'categories' ? 'active' : ''">
                <router-link
                        :to="{ name: 'details', params: { site_id: $route.params.site_id, endpoint: 'categories' } }">
                    Ver categorías
                </router-link>
            </li>
            <li :class="$route.params.endpoint == 'payment_methods' ? 'active' : ''">
                <router-link
                        :to="{ name: 'details', params: { site_id: $route.params.site_id, endpoint: 'payment_methods' } }">
                    Ver métodos de pago
                </router-link>
            </li>
            <li :class="$route.params.endpoint == 'shipping_methods' ? 'active' : ''">
                <router-link
                        :to="{ name: 'details', params: { site_id: $route.params.site_id, endpoint: 'shipping_methods' } }">
                    Ver métodos de envío
                </router-link>
            </li>
            <li :class="$route.params.endpoint == 'currencies' ? 'active' : ''">
                <router-link
                        :to="{ name: 'details', params: { site_id: $route.params.site_id, endpoint: 'currencies' } }">
                    Ver monedas soportadas
                </router-link>
            </li>
            <li :class="$route.params.endpoint == 'listing_types' ? 'active' : ''">
                <router-link
                        :to="{ name: 'details', params: { site_id: $route.params.site_id, endpoint: 'listing_types' } }">
                    Ver tipos de publicaciones
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    import axios from 'axios';
    import Sites from './Sites';

    export default {
        data() {
            return {
                loading: false,
                site: null,
                error: null,
            };
        },
        created() {
            this.fetchData();
        },
        activated() {
            console.log('jojojo');
        },
        components: {
            Sites
        },
        methods: {
            fetchData() {
                this.error = this.site = null;
                this.loading = true;
                axios
                    .get('/api/sites/' + this.$route.params.site_id)
                    .then(response => {
                        this.loading = false;
                        this.site = response.data;
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

<style lang="scss">
    .site {
        $background: #f8d032;
        background-color: $background;
        padding: 30px 0 30px;
        border-radius: 3px;
        width: 385px;

        box-shadow: 5px 0px 10px 0px rgba(200, 150, 50, 0.7);
        z-index: 1;

        .flag {
            text-align: center;
            margin-bottom: 10px;

            img {
                width: 20%;
                border-radius: 10%;
            }
        }

        .title {
            color: #333;
            text-align: center;
            font-size: 1.8rem;
            text-transform: uppercase;

            small {
                color: #777;
                font-size: 90%;
            }
        }

        .url {
            text-align: center;

            a:hover {
                text-decoration: none;
            }
        }

        .attributes {
            margin: 20px 0 20px;
            padding: 0;
            font-size: 1rem;

            li {
                text-transform: uppercase;

                a {
                    display: block;
                    padding: 6px 90px 6px 20px;
                    color: #555;

                    &:hover {
                        background-color: darken(desaturate(adjust-hue(#f8d032, -7), 6.60), 9.02);
                        text-decoration: none;
                    }
                }

                &.active {
                    a {
                        background-color: darken(desaturate(adjust-hue(#f8d032, -7), 6.60), 9.02);
                    }
                }
            }
        }
    }
</style>
