<template>
    <div class="app-wrapper no-gutters">
        <router-view></router-view>
    </div>
</template>

<script>
    import Sites from './Sites'

    export default {
        components: {
            Sites
        }
    }
</script>

<style lang="scss">
    .app-wrapper {
        font-family: 'Nunito Sans', sans-serif;
    }

    ul {
        padding: 0;
        margin: 0;

        li {
            list-style: none;
        }
    }

    .no-gutters {
        margin-right: 0;
        margin-left: 0;

        > .col,
        > [class*="col-"] {
            padding-right: 0;
            padding-left: 0;
        }
    }

    small.entity-id {
        color: #777;
        font-size: 90%;
    }
</style>
