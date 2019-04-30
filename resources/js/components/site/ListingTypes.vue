<template>
    <div>
        <div v-if="error" class="error">
            {{ error }}
        </div>

        <h2>Tipos de publicaciones</h2>

        <ul class="currencies" v-if="data">
            <li v-for="{ id, name } in data">
                <a :href="'https://api.mercadolibre.com/sites/' + $route.params.site_id + '/listing_types/' + id"
                   target="_blank">
                    {{ name }}
                    <small class="entity-id">({{ id }})</small>
                </a>
            </li>
        </ul>
        <loading v-if="loading"></loading>
    </div>
</template>

<script>
    import AbstractSiteInfoComponent from './AbstractSiteInfoComponent';

    export default {
        extends: AbstractSiteInfoComponent,
        methods: {
            getEndpoint() {
                return 'listing_types';
            }
        }
    }
</script>

<style lang="scss">
</style>
