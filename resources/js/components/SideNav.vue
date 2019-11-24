<template>
    <v-navigation-drawer
        :permanent="visibility === 'desktop'"
        :temporary="visibility === 'mobile'"
        v-model="show_drawer"
        width="relative"
        height="100vh"
        fixed
    >
        <div class="w-full p-4 mt-4">
            <img src="/resource_img/thinnercolder_logo.png"/>
        </div>

        <v-list
            dense
            nav
        >
            <v-list-item
                class="flex justify-center item-center"
                color="#000000"
                v-for="item in items"
                :key="item.title"
                link
            >
                <div class="inline-flex w-24">
                    <v-list-item-icon class="mr-1">
                        <v-icon color="#000000" small>{{ item.icon }}</v-icon>
                    </v-list-item-icon>

                    <v-list-item-content>
                        <v-list-item-title>{{ item.title }}</v-list-item-title>
                    </v-list-item-content>
                </div>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
    export default {
        props: ['visibility'],

        data() {
            return {
                show_drawer: null,
                items: [
                    { title: 'Artwork', icon: 'fa-brush' },
                    { title: 'Designs', icon: 'fa-pencil-alt' },
                    { title: 'Contact', icon: 'fa-paper-plane' },
                    { title: 'Shopping', icon: 'fa-shopping-cart' },
                ],
                right: null,
            }
        },

        methods: {
            toggle() {
                if (this.visibility === 'mobile') {
                    this.show_drawer = ! this.show_drawer;
                }
            }
        },

        created() {
            this.eventHub.$on('toggle-mobile-nav', this.toggle);
        }
    }
</script>
