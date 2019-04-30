<template>
    <div>

        <h2>Monedas soportadas</h2>

        <ul class="data" v-if="data">
            <li v-for="{ id, description, symbol } in data">
                <a :href="'https://api.mercadolibre.com/currencies/' + id" target="_blank">
                    {{ description }} ({{ id }})
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
                return 'currencies';
            }
        }
    }
</script>
