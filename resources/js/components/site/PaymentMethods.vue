<template>
    <div>

        <h2>Métodos de pago</h2>

        <ul class="payment-methods" v-if="data">
            <li v-for="{ id, thumbnail, name, instalments } in data">
                <a :href="'https://api.mercadolibre.com/sites/' + $route.params.site_id + '/payment_methods/' + id"
                   target="_blank">
                    <img class="logo" :src="thumbnail" v-if="thumbnail"/>

                    {{ name }}
                    <small class="entity-id">({{ id }})</small>

                    <span class="notes" v-if="instalments > 1">- Hasta {{ instalments }} cuotas</span>
                </a>
            </li>
        </ul>
        <error :message="error" v-if="error"></error>
        <loading v-if="loading"></loading>
    </div>
</template>

<script>
    import AbstractSiteInfoComponent from './AbstractSiteInfoComponent';

    export default {
        extends: AbstractSiteInfoComponent,
        methods: {
            getEndpoint() {
                return 'payment_methods';
            }
        }
    }
</script>
