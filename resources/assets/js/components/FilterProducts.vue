<template>
<div class="">
    <div class="container">
        <h5 style=" margin-bottom: 4%; margin-top: 4%;"> <b>Online Businesses Coupons By Price Range</b></h5>
        <div>
            <select v-model="filter" class="filter-selecttag">
                <option value="" disabled hidden>Select Price Range</option>
                <option value="0-100">Between $0 and $100.00</option>
                <option value="100-200">Between $100.00 and $200.00</option>
                <option value="200-300">Between $200.00 and $300.00</option>
                <option value="300-500">Between $300.00 and $500.00</option>
                <option value="500-700">Between $500.00 and $700.00</option>
                <option value="700-1000">Between $700.00 and $1000.00</option>
                <option value="1000-10000">$1000.00+</option>
            </select>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12col-xs-12 filter-productbox" style="position:relative;">
                <div class="container">
                    <div class="row">
                        <div v-for="product in products" v-bind:key="product.id" class="card" >
                            <div class="col-md-3 col-lg-2 avatar">
                                <img class="filter-image" :src="'https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Coupon/'+ product.image">
                            </div>
                            <div class="col-md-6 col-lg-7 productbox-body">
                                <h5 class="product-vue-company">
                                <b>{{product.company}}</b></h5>
                                <h6 class="coupon-vue-title"><b>{{product.title}}</b></h6>
                                <h7 class="coupon-vue-desc ">{{product.desc}}</h7>
                                <div class="product-pricing" >
                                    <span class="currentpricing">${{product.currentprice}}</span>
                                    <span class="newpricing">${{product.newprice}}</span>
                                </div>
                                <p v-if="!product.couponcode"></p>
                                <p v-else-if="product.coupon" style="font-weight:bold; font-size:12px; opacity:0.9; margin:0;">Coupon Code: {{product.couponcode}} </p>
                                <p v-else style="font-weight:bold; font-size:12px; opacity:0.9; margin:0;">Coupon Code: ******</p>

                            </div>
                            <div class="col-md-3 col-lg-3 view-button" >
                                <a :href="product.url" target="_blank" class="viewdeal"><i class="fas fa-tags"></i>View Deal</a>                               
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data(){
            return {
                products: [],
                filter: ''
            }

        },
        watch: {
            filter: function(){
                axios.post('/filter',{
                    max: this.max,
                    min: this.min
                }).then(({data}) => {
                    this.products = data
                })
            }
        },
        computed: {
            min: function() {
                return this.filter.split('-')[0];
            },
            max: function() {
                return this.filter.split('-')[1];
            }
        },
        created(){
            axios.post('/get').then(({data}) => {
                this.products = data
            })
        }

    }
</script>
