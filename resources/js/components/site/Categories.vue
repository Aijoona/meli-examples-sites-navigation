<template>
    <div>
        <div v-if="error" class="error">
            {{ error }}
        </div>

        <h2>Categorías</h2>

        <ul class="currencies" v-if="listingTypes">
            <li v-for="{ id, name } in listingTypes">
                <a :href="'https://api.mercadolibre.com/currencies/' + id" target="_blank">
                    {{ name }} ({{ id }})
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
                return 'categories';
            }
        }
    }
</script>
