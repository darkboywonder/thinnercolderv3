<template>
    <div>
        <select @change="updateSizes" v-model="material_selected">
            <option v-for="option in material_options" :value="option">
                {{ option }}
            </option>
        </select>
        <select v-model="size_selected">
            <option v-for="option in size_options" v-bind:value="option">
                {{ option }}
            </option>
        </select>

        <p>{{ current_price }}</p>

        <p>{{ current_paypal_code }}</p>
    </div>
</template>

<script>
    export default {
        props: {
            prices: Object,
        },

        computed: {
            material_options() {
                return Object.keys(this.prices);
            },

            current_price() {
                return this.prices[this.material_selected][this.size_selected].price;
            },

            current_paypal_code() {
                return this.prices[this.material_selected][this.size_selected].paypal;
            }
        },

        data() {
            return {
                material_selected: '',
                size_selected: '',
                size_options: [],
            }
        },

        methods: {
            updateSizes() {
                this.size_options = Object.keys(this.prices[this.material_selected]);
                this.size_selected = this.size_options[0];
            }
        },

        created() {
            this.material_selected = this.material_options[0];
            this.updateSizes();
        }
    }
</script>
