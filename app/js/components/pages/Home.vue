<template>
    <div class="px-4 pt-3 my-5">
        <h1 class="display-4 fw-bold text-left">Fill the form and get cheque!</h1>
        <div class="my-3 pt-5">
            <cheque-form></cheque-form>
        </div>
    </div>
</template>

<script>
    import ChequeForm from "../forms/ChequeForm";

    export default {
        name: "Home",
        components: {
            ChequeForm
        }
    }
</script>

<style scoped>

</style>