<template>

  <div>

    <head-info :title="__('Cart Details')" />

    <main class="main-payment-page-om main_grey_background_om main-page-default-back-g-om">
      <div class="container">



        <div class="pp-cart-payment-section-om single-page-wrapper-om">
          <h2 class="head-om fix-om">{{__('Cart Details')}}</h2>

           <div class="row">
              <div class="col-lg-6">
                <div class="input-group-om">
                  <label class="lable-om">{{__('Name')}}</label>
                  <input class="input-om" type="text" :value="cart.name" :placeholder="__('Name')" required readonly>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="input-group-om">
                  <label class="lable-om">{{__('Phone')}}</label>
                  <input class="input-om" type="text" :value="cart.phone" :placeholder="__('Phone')" readonly>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="input-group-om">
                  <label class="lable-om">{{__('Area')}}</label>
                  <input class="input-om" type="text" :value="cart.area.name || ''" :placeholder="__('Area')" readonly>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="input-group-om">
                  <label class="lable-om">{{__('City')}}</label>
                  <input class="input-om" type="text" :value="cart.city.name || ''" :placeholder="__('City')" readonly>
                </div>
              </div>


              <div class="col-lg-6">
                <div class="input-group-om">
                  <label class="lable-om">{{__('Street Name')}}</label>
                  <input class="input-om" type="text" :value="cart.street" :placeholder="__('Street Name')" required readonly>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="input-group-om">
                  <label class="lable-om">{{__('Building Number')}}</label>
                  <input class="input-om" type="text" :value="cart.building_number" :placeholder="__('Building Number')" readonly>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="input-group-om">
                  <label class="lable-om">{{__('Notes')}}</label>

                  <textarea class="textarea-om" :placeholder="__('Notes')" readonly="">{{cart.notes}}</textarea>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="input-group-om">
                  <label class="lable-om">{{__('Email')}}</label>
                  <input class="input-om" type="text" :value="cart.email" :placeholder="__('Email')">
                </div>
              </div>


            </div>

        </div>


        <cart-details :cart="cart" :details="0" go="" />


      </div>
    </main>


  </div>

</template>

<script>
import HeadInfo from "../../Shared/HeadInfo";
import CartDetails from "../Store/CartDetails";
import Layout from "../../Shared/Layout";

export default {
  name: "Cart",
  layout: Layout,
  components: {HeadInfo, CartDetails},
  props: {cart: Object}
}
</script>

<style scoped>

</style>