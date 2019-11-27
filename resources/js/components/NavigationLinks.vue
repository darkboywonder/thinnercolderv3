<template>
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
</template>

<script>
    export default {
        props: [],

        data() {
            return {
                items: [
                    { title: 'Artwork', icon: 'fa-brush' },
                    { title: 'Designs', icon: 'fa-pencil-alt' },
                    { title: 'Contact', icon: 'fa-paper-plane' },
                    { title: 'Shopping', icon: 'fa-shopping-cart' },
                ],
            }
        },
    }
</script>

