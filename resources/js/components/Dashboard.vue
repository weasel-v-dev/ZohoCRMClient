<template>
    <div class="container">
        <v-app class="lighten-5">
            <v-card
            >
                <v-img
                    class="white--text align-end"
                    height="200px"
                    src="https://cdn.vuetifyjs.com/images/parallax/material.jpg"
                >
                </v-img>
                <v-card-text class="text--primary">
                    <GoForm></GoForm>
                </v-card-text>
            </v-card>
        </v-app>
    </div>
</template>
<script>
    import GoForm from "../UI/GoForm.vue";

    export default {
        components: {
            GoForm
        }
    }
</script>
<style scoped>
::v-deep .v-application--wrap {
    min-height: fit-content;
}
</style>

