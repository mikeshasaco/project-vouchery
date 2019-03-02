<template>
<div class="">

    <div class="container">
        <h5 style=" margin-bottom: 4%; margin-top: 4%;"> <b>Online Businesses Coupons By Price Range</b> </h5>
    <div>


        <select v-model="filter" class="filter-selecttag">

            <option value="" disabled hidden>Select Price Range</option>

             <option value="0-20">Between $0 and $20.00</option>
            <option value="20-30">Between $20.00 and $30.00</option>
            <option value="30-40">Between $30.00 and $40.00</option>
            <option value="40-50">Between $40.00 and $50.00</option>
            <option value="50-60">Between $50.00 and $60.00</option>
            <option value="60-70">Between $60.00 and $70.00</option>
            <option value="70-80">Between $70.00 and $80.00</option>
            <option value="80-90">Between $80.00 and $90.00</option>
            <option value="90-100">Between $90.00 and $100.00</option>
            <option value="100-200">Between $100.00 and $200.00</option>
            <option value="200-300">Between $200.00 and $300.00</option>
            <option value="300-400">Between $300.00 and $400.00</option>
            <option value="400-500">Between $400.00 and $500.00</option>
            <option value="500-600">Between $500.00 and $600.00</option>
            <option value="600-700">Between $600.00 and $700.00</option>
            <option value="700-800">Between $700.00 and $800.00</option>
            <option value="800-900">Between $800.00 and $900.00</option>
            <option value="900-1000">Between $900.00 and $1000.00</option>
            <option value="1000-3000">Between $1000 and $3000</option>
            <option value="3000-6000">Between $3000 and $6000</option>
            <option value="6000-9999">Between $6000 and $9999</option>

        </select>
    </div>
      <div class="row">
        <div class="col-md-12 col-sm-12col-xs-12 filter-productbox" style="position:relative;">
          <div class="container">

            <div class="row">

              <div v-for="product in products" v-bind:key="product.id" class="card" >
                  <div class="card-header">
                <h5 class="product-vue-header" style="float:left;"> <b>{{product.company}}</b></h5>
                <a :href="product.url" target="_blank" class="viewdeal-filter"><i class="fas fa-tags"></i>View Deal</a>
                <!-- <button style="float:right;" type="button" name="button">View Deal</button> -->
                  </div>
                  <div class="col-md-4 col-8 productbox-body">
                      <h5 class="coupon-vue-title"><center> <b>{{product.title}}</b> </center></h5>
                        <p class="coupon-vue-desc ">{{product.desc}}</p>

                </div>
                         <p class="coupon-setting-code"> <center>Coupon Code: {{product.couponcode}} </center> </p>

                    <div class="product-pricing" >
                        <span class="currentpricing">${{product.currentprice}}</span>
                        <span class="newpricing">${{product.newprice}}</span>
                    </div>
                      <img class="filter-image" :src="'https://vouch.sfo2.digitaloceanspaces.com/home/forge/voucheryhub.com/storage/app/public/Coupon/'+ product.image">
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
