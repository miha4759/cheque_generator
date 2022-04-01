<template>
    <div>
        <headings></headings>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import Headings from "./components/partials/Headings";

    export default {
        name: "App",
        components: {
            Headings
        }
    }
</script>

<style scoped>

</style>