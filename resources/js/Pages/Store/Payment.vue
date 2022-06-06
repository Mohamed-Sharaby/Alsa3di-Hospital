<template>

  <div>

    <head-info :title="__('Payment')" />

    <main class="main-payment-page-om main_grey_background_om main-page-default-back-g-om">
      <div class="container">

        <div class="booking-tabs-om cart-payment-tabs-om">
          <div class="li-om fix-om ">
            <span class="num-om">1</span>
            <span class="text-om">{{__('Delivery Info')}}</span>
          </div>
          <div class="li-om fix-om active">
            <span class="num-om">2</span>
            <span class="text-om">{{ __('Payment') }}</span>
          </div>
        </div>

        <div class="pp-cart-payment-section-om single-page-wrapper-om">
          <h2 class="head-om fix-om">{{ __('Payment') }}</h2>

          <div class="bayment-methods-content-om">

            <!-- method 1  -->
            <div class="bayment-method-block-om">
              <input class="radio-om" type="radio" value="cash" v-model="book.payment_type" id="card_method_om">
              <label class="bayment-method-lable-om" for="card_method_om">
                <figure class="figure-om">
                  <svg xmlns="http://www.w3.org/2000/svg" width="41.001" height="27.334"
                       viewBox="0 0 41.001 27.334">

                    <g id="pay_1_" transform="translate(0 -85.333)">
                      <g id="Group_443" transform="translate(0 85.333)">
                        <g id="Group_442" transform="translate(0 0)">
                          <path id="Path_579"
                                d="M36.73 85.333H4.271A4.277 4.277 0 0 0 0 89.6v18.8a4.277 4.277 0 0 0 4.271 4.271H36.73A4.277 4.277 0 0 0 41 108.4V89.6a4.277 4.277 0 0 0-4.27-4.267zm2.563 23.067a2.566 2.566 0 0 1-2.563 2.563H4.271a2.566 2.566 0 0 1-2.563-2.563V89.6a2.566 2.566 0 0 1 2.563-2.563H36.73a2.566 2.566 0 0 1 2.562 2.563v18.8z"
                                class="bay-svg" transform="translate(0 -85.333)" />
                        </g>
                      </g>
                      <g id="Group_445" transform="translate(0 90.458)">
                        <g id="Group_444" transform="translate(0 0)">
                          <path id="Path_580"
                                d="M40.147 149.333H.854a.855.855 0 0 0-.854.854v5.125a.855.855 0 0 0 .854.854h39.293a.855.855 0 0 0 .854-.854v-5.125a.855.855 0 0 0-.854-.854zm-.854 5.125H1.708v-3.417h37.584v3.417z"
                                class="bay-svg" transform="translate(0 -149.333)" />
                        </g>
                      </g>
                      <g id="Group_447" transform="translate(5.125 102.417)">
                        <g id="Group_446" transform="translate(0 0)">
                          <path id="Path_581"
                                d="M75.1 298.667H64.854a.854.854 0 1 0 0 1.708H75.1a.854.854 0 1 0 0-1.708z"
                                class="bay-svg" transform="translate(-64 -298.667)" />
                        </g>
                      </g>
                      <g id="Group_449" transform="translate(5.125 105.833)">
                        <g id="Group_448" transform="translate(0 0)">
                          <path id="Path_582"
                                d="M75.1 341.333H64.854a.854.854 0 0 0 0 1.708H75.1a.854.854 0 0 0 0-1.708z"
                                class="bay-svg" transform="translate(-64 -341.333)" />
                        </g>
                      </g>
                      <g id="Group_451" transform="translate(29.042 100.708)">
                        <g id="Group_450">
                          <path id="Path_583"
                                d="M366.938 277.333h-1.708a2.566 2.566 0 0 0-2.563 2.563v1.704a2.566 2.566 0 0 0 2.563 2.563h1.708a2.566 2.566 0 0 0 2.562-2.563v-1.7a2.566 2.566 0 0 0-2.562-2.567zm.854 4.271a.855.855 0 0 1-.854.854h-1.708a.855.855 0 0 1-.854-.854V279.9a.855.855 0 0 1 .854-.854h1.708a.855.855 0 0 1 .854.854z"
                                class="bay-svg" transform="translate(-362.667 -277.333)" />
                        </g>
                      </g>
                    </g>
                  </svg>
                </figure>
                <span class="text-om">{{__('Pay Cash')}}</span>
              </label>
            </div>

            <!-- method 2  -->
            <div class="bayment-method-block-om">
              <input class="radio-om" type="radio" value="visa" v-model="book.payment_type" id="hospital_method_om">
              <label class="bayment-method-lable-om" for="hospital_method_om">
                <figure class="figure-om">


                  <svg xmlns="http://www.w3.org/2000/svg" id="price" width="26.2" height="26.2" viewBox="0 0 26.2 26.2">

                    <g id="Group_454">
                      <g id="Group_453">
                        <path id="Path_584" d="M22.363 3.837A13.1 13.1 0 0 0 3.837 22.363 13.1 13.1 0 0 0 22.363 3.837zM13.1 24.665A11.565 11.565 0 1 1 24.665 13.1 11.578 11.578 0 0 1 13.1 24.665z" class="bay-svg"/>
                      </g>
                    </g>
                    <g id="Group_456" transform="translate(9.044 4.933)">
                      <g id="Group_455">
                        <path id="Path_585" d="M181.612 103.8h-1.644a1.7 1.7 0 1 1 0-3.4h3.289a.768.768 0 1 0 0-1.535h-1.7v-1.7a.768.768 0 1 0-1.535 0v1.7h-.055a3.234 3.234 0 1 0 0 6.468h1.644a1.7 1.7 0 0 1 0 3.4h-3.289a.768.768 0 0 0 0 1.535h1.7v1.7a.768.768 0 1 0 1.535 0v-1.7h.055a3.234 3.234 0 0 0 0-6.468z" class="bay-svg" transform="translate(-176.734 -96.401)"/>
                      </g>
                    </g>
                  </svg>

                </figure>
                <span class="text-om">{{ __('Pay by visa') }}</span>
              </label>
            </div>
          </div>

          <div class="booking-card-info-content-om" >
            <div class="row-om" v-if="book.payment_type == 'visa'">
              <div class="col-om-1 col-om">
                <div class="input-group-om">
                  <label class="lable-om">{{__('Card number')}}</label>
                  <input type="text" class="input-om" v-model="book.payment.card_no" :placeholder="__('Card number')">
                </div>
              </div>
              <div class="col-om-2 col-om">
                <div class="input-group-om">
                  <label class="lable-om">{{ __('Expire date') }}</label>
                  <input type="text" class="input-om datepicker-om" v-model="book.payment.expire_date" :placeholder="__('Month / Year')">
                </div>
              </div>
              <div class="col-om-2 col-om">
                <div class="input-group-om">
                  <label class="lable-om">CVV</label>
                  <input type="text" class="input-om" v-model="book.payment.cvv" placeholder="CVV">
                </div>
              </div>
            </div>
            <div class="submit-button-wrapper-om">
              <form @submit.prevent="finishCart">
                <input class="submit-butt-om " type="submit" :value="__('Complete pay')">
              </form>
            </div>
          </div>

        </div>


        <cart-details :cart="cart" details="1" go="" />


      </div>
    </main>

  </div>


</template>

<script>
import Layout from "../../Shared/Layout";
import CartDetails from "./CartDetails";
import HeadInfo from "../../Shared/HeadInfo";

export default {
  name: "Payment",
  layout: Layout,
  props: {cart: Object},
  components: {CartDetails, HeadInfo},
  data() {
    return {
      book: {
        payment_type: 'cash',
        payment: {
          card_no: '',
          expire_date: '',
          cvv: '',
        }
      },
    }
  },
  methods: {
    finishCart(){
      this.$inertia.post(this.$route('cart.submit', this.cart.id), this.book)
    }
  }
}
</script>

<style scoped>
.bay-svg{fill:"currentColor"}
</style>