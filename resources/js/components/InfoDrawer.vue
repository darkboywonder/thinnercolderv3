<template>
    <v-navigation-drawer
        v-model="show_drawer"
        width="relative"
        height="100vh"
        temporary
        fixed
        right
    >
        <div class="sm:block md:hidden flex items-center justify-start m-2">
            <div @click="toggle"><i class="fas fa-arrow-right text-2xl text-black cursor-pointer"></i></div>
        </div>

        <slot></slot>
    </v-navigation-drawer>
</template>

<script>
    export default {
        props: {

        },

        data() {
            return {
                show_drawer: null,
                right: true,
            }
        },

        methods: {
            toggle() {
                    this.show_drawer = ! this.show_drawer;
            }
        },

        created() {
            this.eventHub.$on('toggle-info-drawer', this.toggle);
        }
    }
</script>

<style scoped>

</style>
