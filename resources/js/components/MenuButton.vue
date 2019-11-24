<template>
    <div @click="toggleMobileNav"><v-icon color="#000000" small>{{ icon }}</v-icon></div>
</template>

<script>
    export default {
        props: [],

        data() {
            return {
                icon: 'fa-bars',
            }
        },

        methods: {
            toggleMobileNav() {
                this.eventHub.$emit('toggle-mobile-nav');
            }
        },
    }
</script>
