<template>

  <div>

    <head-info :title="__('E-commerce orders')" />

    <main
        class="main-my-account-page-om main-my-reservations-page-om main_grey_background_om main-page-default-back-g-om">
      <div class="container">
        <div class="row">

          <nav-bar current="orders" />

          <div class="col-lg-9">
            <div class="requests-tabs-om nav nav-tabs" id="nav-tab" role="tablist">
              <Link class="nav-item nav-link li-om fix-om "
                    :href="$route('user.orders')" role="tab" aria-controls="requests-info" aria-selected="true">
                <span class="text-om">{{ __('My Orders') }}</span>
              </Link>
              <Link class="nav-item nav-link li-om fix-om active"
                    :href="$route('user.carts')" role="tab" aria-controls="requests-date" aria-selected="false">
                <span class="text-om">{{ __('E-commerce orders') }}</span>
              </Link>
            </div>

            <!--  -->
            <div class="requests-tabs-content-om tab-content">

              <!-- my-store-requests-om -->
              <div class="tab-pane fade show active" id="requests-date" role="tabpanel" aria-labelledby="requests-date-tab">
                <div class="cart-products-wrapper-om">
                  <div class="my-store-requests-om cart-products-section-om single-page-wrapper-om">
                    <div class="heading-table-om">
                      <div class="row-om">
                        <div class="col-om">
                          <h3 class="head-om fix-om">#</h3>
                        </div>
                        <div class="col-om">
                          <h3 class="head-om fix-om">{{ __('Order No.') }}</h3>
                        </div>
                        <div class="col-om">
                          <h3 class="head-om fix-om">{{ __('Date') }}</h3>
                        </div>
                        <div class="col-om">
                          <h3 class="head-om fix-om">{{ __('Products No.') }}</h3>
                        </div>
                        <div class="col-om">
                          <h3 class="head-om fix-om">{{ __('Total') }}</h3>
                        </div>
                        <div class="col-om ">
                          <h3 class="head-om fix-om">{{ __('Status') }}</h3>
                        </div>
                      </div>
                    </div>
                    <div class="cart-products-table-om">
                      <div class="cart-product-block-om">

                        <div class="row-om" v-for="(item, index) in items.data" :key="item.id">
                          <div class="col-om">
                            <p class="price-om fix-om">{{ index+1 }} </p>
                          </div>
                          <div class="col-om">
                            <p class="price-om fix-om"> <Link :href="$route('user.cart', item.id)"> #{{ item.id }} </Link></p>
                          </div>
                          <div class="col-om">
                            <p class="price-om fix-om">{{ formatData(item.created_at) }} </p>
                          </div>
                          <div class="col-om">
                            <p class="price-om fix-om">{{ item.items.length }} </p>
                          </div>
                          <div class="col-om">
                            <div class="total-price-close-butt-om">
                              <p class="total-price-om fix-om">{{ item.total }} {{__('SAR')}}</p>
                            </div>
                          </div>
                          <div class="col-om ">
                            <p class="parg-om hold-om fix-om">{{__(item.status)}}</p>
                            <Link class="parg-om cancle-om fix-om" :href="$route('cart.cancel', item.id)" method="post" v-if="item.status == 'new'">{{__('Cancel')}}</Link>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <!-- start pagenation  -->
              <pagination class="pagenation-om list-unstyled" :links="items.links" />
              <!-- end pagenation -->

            </div>
            <!--  -->



          </div>
        </div>
      </div>
    </main>



  </div>

</template>

<script>
import Layout from "../../Shared/Layout";
import HeadInfo from "../../Shared/HeadInfo";
import NavBar from "./NavBar";
import Pagination from "../../Shared/Pagination";
import {Link} from "@inertiajs/inertia-vue";

export default {
  name: "Orders",
  layout: Layout,
  components: {HeadInfo, NavBar, Pagination, Link},
  props: {
    items: Object,
  },
  mounted() {
    console.log('data', this.items.data)
  },
  methods: {
    formatData(date) {
      var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      var today  = new Date(date);
      return today.toLocaleDateString("ar-EG", options);
    }
  }
}
</script>

<style scoped>

</style>