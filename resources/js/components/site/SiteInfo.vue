<template>
    <div class="col site-details">
        <div class="content">
            <currencies v-if="$route.params.endpoint == 'currencies'"></currencies>
            <listing-types v-if="$route.params.endpoint == 'listing_types'"></listing-types>
            <shipping-methods v-if="$route.params.endpoint == 'shipping_methods'"></shipping-methods>
            <payment-methods v-if="$route.params.endpoint == 'payment_methods'"></payment-methods>
            <categories v-if="$route.params.endpoint == 'categories'"></categories>
        </div>
    </div>
</template>

<script>
    import Currencies from './Currencies';
    import ListingTypes from './ListingTypes';
    import ShippingMethods from './ShippingMethods';
    import PaymentMethods from './PaymentMethods';
    import Categories from './Categories';

    export default {
        components: {
            Currencies,
            ListingTypes,
            ShippingMethods,
            PaymentMethods,
            Categories
        }
    }
</script>

<style lang="scss">
    .site-details {
        $background: #eee;
        background-color: $background;
        padding: 30px;
        border-radius: 3px;

        .content {
            padding: 0 30px;

            li {
                text-transform: uppercase;

                a {
                    display: block;
                    padding: 6px 90px 6px 10px;
                    color: #555;

                    &:hover {
                        background-color: #f8d032;
                        text-decoration: none;
                    }
                }


                .notes {
                    margin-left: 5px;
                    font-style: italic;
                    font-size: 80%;
                }
            }
        }
    }
</style>