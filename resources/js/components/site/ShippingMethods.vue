<template>
    <div>
        <div v-if="error" class="error">
            {{ error }}
        </div>

        <h2>Métodos de envío</h2>

        <ul class="currencies" v-if="data">
            <li v-for="{ id, name, company_name } in data">
                <a :href="'https://api.mercadolibre.com/shipping_methods/' + id" target="_blank">
                    {{ name }}
                    <small>({{ id }})</small>
                    <span class="notes" v-if="company_name">- Servicio prestado por {{ company_name }}</span>
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
                return 'shipping_methods';
            }
        }
    }
</script>
