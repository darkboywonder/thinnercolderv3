<template>
    <v-navigation-drawer
        v-model="show_drawer"
        width="relative"
        height="100vh"
        fixed
    >
        <div class="bg-white h-12">
            <section class="flex justify-end items-center h-12">
                <i @click="toggle" class="block fas fa-arrow-left mr-8 text-lg"></i>
            </section>
        </div>

        <div class="w-full p-4 mt-4">
            <img src="/resource_img/thinnercolder_logo.png"/>
        </div>

        <navigation-links></navigation-links>
    </v-navigation-drawer>
</template>

<script>
    export default {
        props: [],

        data() {
            return {
                show_drawer: null,
                right: null,
            }
        },

        methods: {
            toggle() {
                this.show_drawer = ! this.show_drawer;
            }
        },

        created() {
            this.eventHub.$on('toggle-mobile-nav', this.toggle);
        }
    }
</script>
