<template>
        <div @click="togleInfo"><i class="fas fa-tags"></i></div>
</template>

<script>
    export default {
        props: ['color'],

        data() {
            return {}
        },

        methods: {
            togleInfo() {
                this.eventHub.$emit('toggle-info-drawer');
            }
        },
    }
</script>
