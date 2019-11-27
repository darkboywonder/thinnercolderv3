<template>
    <div>
        <div v-if="is_sellable" class="flex flex-col items-center">
            <h4 class="mt-4 mb-2 font-poiret text-2xl text-center text-slate">Select Canvas Type</h4>

            <select class="w-3/5 bg-gray-600 p-2 rounded" @change="updateSizes" v-model="material_selected">
                <option v-for="option in material_options" :value="option">
                    {{ option }}
                </option>
            </select>

            <h4 class="mt-4 mb-2 font-poiret text-2xl text-center text-slate">Select Size</h4>

            <select class="w-3/5 bg-gray-600 p-2 rounded" v-model="size_selected">
                <option v-for="option in size_options" v-bind:value="option">
                    {{ option }}
                </option>
            </select>

            <h3 class="font-poiret text-3xl text-center text-slate mt-8">{{ current_price }}</h3>

            <p class="font-open-sans font-weight-light italic text-sm text-gray-700 text-center mb-2">Shipping and tax not included</p>

            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" id="pal">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" :value="current_paypal_code">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
            <button class="mt-4 py-2 px-4 rounded shadow-md text-white" type="submit" form="pal" value="submit" :style="{ backgroundColor: color}">
                <i class="fas fa-shopping-cart text-lg"></i>

                <span>Add to Cart</span>
            </button>
        </div>
        <div v-else>
            <h4 class="mt-4 mb-2 font-poiret text-4xl text-center text-slate">Sold</h4>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            prices: {},
            color: {},
            is_sellable: {},
        },

        computed: {
            material_options() {
                if (this.is_sellable) {
                    return Object.keys(this.prices);
                }
            },

            current_price() {
                if (this.is_sellable) {
                    return this.prices[this.material_selected][this.size_selected].price;
                }
            },

            current_paypal_code() {
                if (this.is_sellable) {
                    return this.prices[this.material_selected][this.size_selected].paypal;
                }
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
                this.size_selected = this.size_options[0] || '';
            }
        },

        created() {
            if (this.is_sellable) {
                this.material_selected = this.material_options[0] || '';
                this.updateSizes();
            }
        }
    }
</script>
