<template>
    <div class="site-info">
        <h2>Categorías</h2>

        <ul class="categories" v-if="data">
            <li v-for="{ id, name } in data">
                <a :href="'https://api.mercadolibre.com/categories/' + id" target="_blank">
                    {{ name }} <small>({{ id }})</small>
                </a>
            </li>
        </ul>

        <no-result v-if="data && data.length == 0"></no-result>
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
                return 'categories';
            }
        }
    }
</script>
