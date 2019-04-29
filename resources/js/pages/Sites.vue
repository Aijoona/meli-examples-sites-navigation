<template>
    <div class="row no-gutters row-eq-height">
        <sites></sites>
        <site v-if="$route.params.site_id"></site>
        <site-info v-if="$route.params.endpoint"></site-info>
    </div>
</template>

<script>
    import Sites from './../components/Sites';
    import Site from './../components/Site';
    import SiteInfo from './../components/site/SiteInfo';

    export default {
        components: {
            Sites,
            Site,
            SiteInfo
        }
    }
</script>
