<template>
    <div class="hidden lg:block absolute top-20 right-20">
        <span @click="togleInfo" class="fa-stack fa-2x text-2xl cursor-pointer">
            <i class="fas fa-circle fa-stack-2x" :style="{color: this.color}"></i>

            <i class="fas fa-tags fa-stack-1x fa-inverse"></i>
        </span>
    </div>
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
