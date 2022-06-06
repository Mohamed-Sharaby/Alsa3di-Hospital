<template>

  <div>

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

          <div class="cart-product-block-om" v-for="item in cart.items">
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
                <p class="price-om fix-om">{{item.quantity}} </p>
              </div>
              <div class="col-om">
                <p class="price-om fix-om">{{item.total_price}} {{__('SAR')}}</p>
              </div>

            </div>
          </div>

        </div>
      </div>

    </div>
    <div class="cart-total-paid-price-sec-om single-page-wrapper-om">
      <h2 class="head-om fix-om">{{__('Cart total')}}</h2>
      <div class="all-prices-table-om">
        <div class="price-block-om">
          <h3 class="price-head-om fix-om">{{ __('Total') }}</h3>
          <p class="price-om fix-om">{{total_products}} {{__('SAR')}}</p>
        </div>
        <div class="price-block-om">
          <h3 class="price-head-om fix-om">{{ __('Delivery') }}</h3>
          <p class="price-om fix-om"> {{ cart.delivery_cost > 0 ? cart.delivery_cost +' '+ __('SAR') : __('Free')}}</p>
        </div>
        <div class="price-block-om final-om">
          <h3 class="price-head-om fix-om">{{__('Discount')}} ({{cart.coupon_discount}} %)</h3>
          <p class="price-om fix-om">{{cart.coupon_val}} {{__('SAR')}}</p>
        </div>
        <div class="price-block-om final-om">
          <h3 class="price-head-om fix-om">{{__('Cart total')}}</h3>
          <p class="price-om fix-om">{{cart.total}} {{__('SAR')}}</p>
        </div>
      </div>
      <div class="continu-buttons-block-om" v-if="details">
        <Link class="submit-butt-om  commplete-buy-butt-om fix-om " :disabled="cart.items.length == 0" v-if="go != ''"
              as="button" :href="$route(go, cart.id)" >{{__('Complete pay')}}</Link>
        <Link class="continue-shopping-link-om fix-om" href="/store">{{__('Continue shopping')}}</Link>
      </div>

    </div>

  </div>

</template>

<script>
import {Link} from "@inertiajs/inertia-vue";

export default {
  name: "CartDetails",
  props: ['cart', 'details', 'go'],
  components: {Link},
  computed: {

    total_products() {
      let result = 0;
      this.cart.items.forEach(item => {
        result += parseInt(item.total_price)
      })
      return result;
    }
  },
}
</script>

<style scoped>

</style>