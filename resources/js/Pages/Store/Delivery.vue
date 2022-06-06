<template>

  <div>

    <head-info :title="__('Delivery Info')" />

    <main class="main-payment-page-om main_grey_background_om main-page-default-back-g-om">
      <div class="container">

        <div class="booking-tabs-om cart-payment-tabs-om">
          <div class="li-om fix-om active">
            <span class="num-om">1</span>
            <span class="text-om">{{__('Delivery Info')}}</span>
          </div>
          <div class="li-om fix-om">
            <span class="num-om">2</span>
            <span class="text-om">{{__('Payment')}}</span>
          </div>
        </div>

        <div class="pp-cart-payment-section-om single-page-wrapper-om">
          <h2 class="head-om fix-om">{{__('Delivery Info')}}</h2>

          <div class="alert alert-success" v-if="successShow">{{__('Updated Successfully')}}</div>

          <form @submit.prevent="saveDeliveryInfo">
            <div class="row">
            <div class="col-lg-6">
              <div class="input-group-om">
                <label class="lable-om">{{__('Name')}}</label>
                <input class="input-om" type="text" v-model="delivery.name" :placeholder="__('Name')" required>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="input-group-om">
                <label class="lable-om">{{__('Phone')}}</label>
                <input class="input-om" type="text" v-model="delivery.phone" :placeholder="__('Phone')">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="input-group-om">
                <label class="lable-om">{{__('Area')}}</label>
                <select class="input-om select-om" v-model="delivery.area_id" @change="getCities" required>
                  <option selected disabled hidden>اختر </option>
                  <option v-for="area in areas" :value="area.id">{{area.name}}</option>
                </select>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="input-group-om">
                <label class="lable-om">{{__('City')}}</label>
                <select class="input-om select-om" v-model="delivery.city_id" required>
                  <option selected disabled hidden>اختر </option>
                  <option v-for="city in cities" :value="city.id">{{city.name}}</option>
                </select>
              </div>
            </div>


            <div class="col-lg-6">
              <div class="input-group-om">
                <label class="lable-om">{{__('Street Name')}}</label>
                <input class="input-om" type="text" v-model="delivery.street" :placeholder="__('Street Name')" required>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="input-group-om">
                <label class="lable-om">{{__('Building Number')}}</label>
                <input class="input-om" type="text" v-model="delivery.building_number" :placeholder="__('Building Number')">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="input-group-om">
                <label class="lable-om">{{__('Notes')}}</label>

                <textarea class="textarea-om" :placeholder="__('Notes')" v-model="delivery.notes"></textarea>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="input-group-om">
                <label class="lable-om">{{__('Email')}}</label>
                <input class="input-om" type="text" v-model="delivery.email" :placeholder="__('Email')">
              </div>
            </div>

            <div class="col-lg-6">
              <div style="display: flex; justify-content: center">
                <button class="submit-butt-om  commplete-buy-butt-om fix-om btn" type="submit">{{__('Save')}}</button>
              </div>
            </div>

          </div>
          </form>

        </div>


        <cart-details :cart="cart" :details="1" go="cart.payment" />


      </div>
    </main>

  </div>


</template>

<script>
import Layout from "../../Shared/Layout";
import HeadInfo from "../../Shared/HeadInfo";
import {Link} from "@inertiajs/inertia-vue";
import CartDetails from "./CartDetails";

export default {
  name: "Delivery",
  layout: Layout,
  components: {HeadInfo, Link, CartDetails},
  props: {cart: Object, areas: Array},
  computed: {
    user() {
      return this.$page.props.auth.user
    },
    total_products() {
      let result = 0;
      this.cart.items.forEach(item => {
        result += parseInt(item.price) * parseInt(item.qty)
      })
      return result;
    },
  },
  data() {
    return {
      delivery: {
        name: '',
        phone: '',
        email: '',
        area_id: '',
        city_id: '',
        street: '',
        building_number: '',
        notes: '',
      },
      cities: [],
      successShow: false
    }
  },
  methods: {
    getCities() {
      axios.get('/cities/'+this.delivery.area_id).then(response => {
        this.cities = response.data.data;
      }).catch(error => console.log(error))
    },
    saveDeliveryInfo() {
      axios.post(this.$route('cart.updateDelivery', this.cart.id), this.delivery).then(response => {
        this.successShow = true;
        setTimeout(() => {
            this.successShow = false;
          }, 5000)
      }).catch(error => console.log(error))
    }
  },
  mounted() {
      this.delivery.name = this.cart.name || this.user.name;
      this.delivery.phone = this.cart.phone || this.user.phone;
      this.delivery.email = this.cart.email || this.user.email;
      this.delivery.area_id = this.cart.area_id || 0;
      this.delivery.city_id = this.cart.city_id || '';
      this.delivery.street = this.cart.street || '';
      this.delivery.building_number = this.cart.building_number || '';
      this.delivery.notes = this.cart.notes || '';
      this.getCities();
  }

}
</script>

<style scoped>

</style>