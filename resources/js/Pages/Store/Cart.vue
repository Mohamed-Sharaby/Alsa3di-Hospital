<template>
<div>

  <head-info :title="__('Cart')" />

  <main class="main-cart-page-om main_grey_background_om main-page-default-back-g-om">
    <div class="container">
      <div class="cart-products-wrapper-om">
        <div class="cart-products-section-om single-page-wrapper-om">
          <div class="heading-table-om">
            <div class="row-om">
              <div class="col-om">
                <h3 class="head-om fix-om">{{__('Product Image')}}</h3>
              </div>
              <div class="col-om">
                <h3 class="head-om fix-om">{{__('Product Name')}}</h3>
              </div>
              <div class="col-om">
                <h3 class="head-om fix-om">{{ __('Price') }}</h3>
              </div>
              <div class="col-om">
                <h3 class="head-om fix-om">{{ __('Quantity') }}</h3>
              </div>
              <div class="col-om">
                <h3 class="head-om fix-om">{{  __('Total') }}</h3>
              </div>
            </div>
          </div>
          <div class="cart-products-table-om">

            <div class="cart-product-block-om" v-for="item in items">
              <div class="row-om">
                <div class="col-om">
                  <figure class="product-img-block-om figure-om loading-omd asp-om">
                    <img class="lazy-omd img-om" :data-src="item.product.image_path" alt="..">
                  </figure>
                </div>
                <div class="col-om">
                  <p class="cat-om fix-om">{{  item.product.sub_category.name }}</p>
                  <h3 class="product-name-om fix-om">{{ item.product.name }}</h3>
                </div>
                <div class="col-om">
                  <p class="price-om fix-om">{{item.price}} {{__('SAR')}}</p>
                </div>
                <div class="col-om">
                  <div class="input-group-om quantity-om">
                    <input class="input-om" type="number" min="1" :value="item.qty" @change="updateQty(item.id, $event)">
                  </div>
                </div>
                <div class="col-om">
                  <div class="total-price-close-butt-om">
                    <p class="total-price-om fix-om">{{parseInt(item.price) * parseInt(item.qty)}} {{__('SAR')}}</p>
                    <Link class="remove-cart-product-om fix-om"
                          :href="`/remove-from-cart/${item.id}`" method="delete" as="button" @click="removeFromCart(item.id)">
                      <figure class="figure-om">
                        <img src="/assets/images/close.svg" alt="close">
                      </figure>
                    </Link>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="cart-code-final-prices-sec-om">
        <div class="col-om-1">
          <div class="discount-code-section-om single-page-wrapper-om">
            <h2 class="head-om fix-om">{{ __('Coupon code') }}</h2>
            <div class="discount-input-group-om">
              <form @submit.prevent="checkCoupon">
                <input class="input-om" type="text" v-model="code" :placeholder="__('Enter coupon code')">
                <button class="discount-submit-butt-om fix-om">{{ __('Apply') }}</button>
                <span class="error" v-if="error.length > 0">{{ error }}</span>
              </form>
            </div>
          </div>
        </div>
        <div class="col-om-2">
          <div class="cart-total-paid-price-sec-om single-page-wrapper-om">
            <h2 class="head-om fix-om">{{__('Cart total')}}</h2>
            <div class="all-prices-table-om">
              <div class="price-block-om">
                <h3 class="price-head-om fix-om">{{ __('Total') }}</h3>
                <p class="price-om fix-om">{{total_products}} {{__('SAR')}}</p>
              </div>
              <div class="price-block-om">
                <h3 class="price-head-om fix-om">{{ __('Delivery') }}</h3>
                <p class="price-om fix-om"> {{ delivery > 0 ? delivery+' '+ __('SAR') : __('Free')}}</p>
              </div>
              <div class="price-block-om final-om">
                <h3 class="price-head-om fix-om">{{__('Discount')}} ({{discount}} %)</h3>
                <p class="price-om fix-om">{{discount_val}} {{__('SAR')}}</p>
              </div>
              <div class="price-block-om final-om">
                <h3 class="price-head-om fix-om">{{__('Cart total')}}</h3>
                <p class="price-om fix-om">{{total}} {{__('SAR')}}</p>
              </div>
            </div>
            <div class="continu-buttons-block-om">
              <Link class="submit-butt-om  commplete-buy-butt-om fix-om " :disabled="items.length == 0"
              as="button" href="/finish-cart" method="post" :data="{total, discount_val, discount, code, delivery}">{{__('Complete pay')}}</Link>
              <Link class="continue-shopping-link-om fix-om" href="/store">{{__('Continue shopping')}}</Link>
            </div>
          </div>
        </div>
      </div>

    </div>

  </main>

</div>
</template>

<script>
import Layout from "../../Shared/Layout";
import HeadInfo from "../../Shared/HeadInfo";
import {Link} from "@inertiajs/inertia-vue";

export default {
  name: "Cart",
  layout: Layout,
  components: {HeadInfo, Link},
  props: {cart: Array, delivery_cost: String},
  data() {
    return {
      code: '',
      qty: '',
      error: '',
      discount: 0,
      discount_val: 0,
      items: this.cart,
      delivery: parseInt(this.delivery_cost)
    }
  },
  computed: {
    total_products() {
      let result = 0;
      this.items.forEach(item => {
        result += parseInt(item.price) * parseInt(item.qty)
      })
      return result;
    },
    total() {
      let result = this.total_products;
      return result - this.discount_val + this.delivery;
    }
  },
  methods: {
    updateQty(id,event) {
      axios.post(`/add-to-cart/${id}`, {qty: event.target.value, type: 'json'}).then(response => {
        this.items = response.data.data
        this.$toasted.success(this.__('Successfully'));
      }).catch(error => console.log(error))
    },
    removeFromCart(id) {
      this.items = this.items.filter(item => item.id == id);
    },
    checkCoupon() {

      if (this.discount == 0) {
        axios.post('/check-coupon', {code: this.code}).then(response => {
          if (response.data.status) {
            this.discount = parseInt(response.data.data)
            this.discount_amount()
            this.$toasted.success(this.__('Successfully'));
            // this.code = ''
            this.error = ''
          } else {
            this.error = response.data.data;
          }
        }).catch(error => console.log(error))
      }

    },
    discount_amount() {
      if (this.discount === 0) this.discount_val = 0;
      this.discount_val = (this.total * this.discount / 100);
    }

  }
}
</script>

<style scoped>

</style>