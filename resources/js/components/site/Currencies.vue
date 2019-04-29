<template>
    <div>
        <div v-if="error" class="error">
            {{ error }}
        </div>

        <h2>Monedas soportadas</h2>

        <ul class="data" v-if="data">
            <li v-for="{ id, description, symbol } in data">
                <a :href="'https://api.mercadolibre.com/currencies/' + id" target="_blank">
                    {{ description }} ({{ id }})
                </a>
            </li>
        </ul>
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
