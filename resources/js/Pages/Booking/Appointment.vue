<template>

  <div>

    <head-info :title="__('Book an appointment')" />

    <main class="main-booking-page-om main_grey_background_om">
      <div class="container">

        <div class="booking-tabs-om nav nav-tabs" id="nav-tab" role="tablist">
          <a :class="`nav-item nav-link li-om fix-om ${current == '' ? 'active' : ''}`" id="booking-info-tab" data-toggle="tab"
             @click="current = ''" role="tab" aria-controls="booking-info" aria-selected="true">
            <span class="num-om">1</span>
            <span class="text-om">{{__('Book info')}}</span>
          </a>
          <a :class="`nav-item nav-link li-om fix-om ${current == 'first' ? 'active' : ''}`" id="booking-date-tab" data-toggle="tab" @click="current = 'first'"
             role="tab" aria-controls="booking-date" aria-selected="false">
            <span class="num-om">2</span>
            <span class="text-om">{{__('Date & Time')}}</span>
          </a>
          <a :class="`nav-item nav-link li-om fix-om ${current == 'second' ? 'active' : ''}`" id="booking-payment-tab" data-toggle="tab"
             @click="current = 'second'" role="tab" aria-controls="booking-payment" aria-selected="false">
            <span class="num-om">3</span>
            <span class="text-om">{{__('Payment')}}</span>
          </a>
        </div>

        <form @submit.prevent="submit">
          <div class="site-form-block-om appointment-booking-form tab-content">

            <div class="alert alert-danger" v-if="error.length > 0">
              {{error}}
            </div>

              <div :class="`tab-pane fade ${!current ? 'show active' : ''}`" id="booking-info" role="tabpanel"
                   aria-labelledby="booking-info-tab">

                <div class="row">
                  <div class="col-lg-6">
                    <div class="input-group-om">
                      <label class="lable-om">{{ __('Choose branch') }}</label>
                      <select class="input-om select-om" v-model="book.branch_id" @change="getDoctors" required>
                        <option selected disabled hidden>{{__('Choose branch')}}</option>
                        <option v-for="branch in branches" :value="branch.id">{{branch.name}}</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="input-group-om">
                      <label class="lable-om">{{ __('Choose a specialty') }}</label>
                      <select class="input-om select-om" v-model="book.specialization_id" @change="getDoctors" required>
                        <option selected disabled hidden>{{ __('Choose a specialty') }}</option>
                        <option v-for="specialty in specializations" :value="specialty.id">{{specialty.name}}</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="input-group-om">
                      <label class="lable-om">{{ __('Phone') }}</label>
                      <input class="input-om" type="text" v-model="book.phone" :placeholder="__('Phone')" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="input-group-om">
                      <label class="lable-om">{{ __('Doctor') }}</label>
                      <select class="input-om select-om" v-model="book.doctor_id" required>
                        <option selected disabled hidden>{{ __('Choose') }}</option>
                        <option v-for="doctor in doctors" :value="doctor.id">{{ doctor.user.name}}</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="submit-button-wrapper-om">
                      <input class="submit-butt-om min-width-om" type="button" @click="nextTab('first')" :value="__('Next')">
                    </div>
                  </div>
                </div>

              </div>
              <div :class="`tab-pane fade ${current == 'first' ? 'show active' : ''}`" id="booking-date" role="tabpanel" aria-labelledby="booking-date-tab">
                <div class="row">
                  <div class="col-lg-6">
                    <!-- date  -->
                    <div class="input-group-om">
                      <label class="lable-om">{{ __('Choose day') }}</label>
                      <!-- <input type="text" class="input-om" id="datepicker"> -->
    <!--                  <div class="datepicker-om full-widthdate-picker-om" @click="getDate"></div>-->
                      <datepicker :inline="true" :language="pickerLang" @selected="getAppointments" :disabled-dates="disabledDates"></datepicker>

                    </div>

                  </div>
                  <div class="col-lg-6">
    <!--                <div class="input-group-om">-->
    <!--                  <label class="lable-om">اختر الساعة</label>-->
    <!--                  <input type="time" class="input-om">-->
    <!--                </div>-->
                    <div class="times-lables-content-om">
                      <div class="row-om">


                        <div v-if="has_appointments" class="col-om" v-for="appointment in appointments" :key="appointment.id">
                          <button type="button" :class="`time-lable-block-om ${appointment.taken ? 'disabled-appointment' : ''}`" @click="book.appointment_id = appointment.id" :disabled="appointment.taken">
                            <span class="text-om  fix-om">{{ appointment.timeslot }}</span>
                          </button>
                        </div>

                        <div class="col-om" v-if="!has_appointments">
                          <p>{{__('No appointments')}}</p>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="submit-button-wrapper-om">
                      <input class="submit-butt-om min-width-om" type="button" @click="nextTab('second')" :value="__('Next')">
                    </div>
                  </div>
                </div>
              </div>
              <div :class="`tab-pane fade ${current == 'second' ? 'show active' : ''}`" id="booking-payment" role="tabpanel" aria-labelledby="booking-payment-tab">
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
                  <input class="submit-butt-om " type="submit" :value="__('BOOK')">
                </div>
              </div>
            </div>

          </div>
        </form>


      </div>
    </main>

  </div>

</template>

<script>
import HeadInfo from "../../Shared/HeadInfo";
import Layout from "../../Shared/Layout";
import Datepicker from 'vuejs-datepicker';
import {ar, en} from 'vuejs-datepicker/dist/locale'


export default {
  name: "Appointment",
  components: {HeadInfo, Datepicker},
  layout: Layout,
  props: {
    branches: Array,
    specializations: Array,
  },
  data() {
    return {
      date_picker: {
        ar: ar,
        en: en,
      },
      doctors: [],
      appointments: [],
      has_appointments: false,
      book: {
        branch_id: '',
        specialization_id: '',
        doctor_id: '',
        phone: '',
        date: '',
        appointment_id: '',
        payment_type: 'cash',
        payment: {
          card_no: '',
          expire_date: '',
          cvv: '',
        }
      },
      current: '',
      error: '',
      disabledDates: {
        to: new Date(Date.now() - 864e5), // yesterday 864e5 == 86400000 == 24*60*60*1000
        customPredictor: function(date) {
          // disables the date if it is a multiple of 5
          // if(date.getDate() == (new Date()).getDate()){
          //   return false
          // }
        }
      }
    }
  },
  computed: {
    pickerLang() {
      return this.date_picker[this.$page.props.lang];
    },
    branches_items() {
      return this.branches.map(item => {
        return {value: item.id, text: item.name}
      })
    }
  },
  methods: {
    getAppointments(date) {
      this.book.date = date;
      axios.get('/book/timeslots', {
        params: {doctor: this.book.doctor_id, date}
      }).then(response => {
        if (response.data.data.length > 0) {
          this.has_appointments = true;
          this.appointments = response.data.data;
        } else {
          this.has_appointments = false;
        }
      }).catch(error => console.log('error', error))
    },
    getDoctors() {
      axios.get(this.$route('book.doctors'), {
        params: {
          branch_id: this.book.branch_id,
          specialization_id: this.book.specialization_id
        }
      }).then(response => {
        if (response.data.status) {
          this.doctors = response.data.data;
        }
      }).catch(error => console.log(error));
    },
    nextTab(type) {
      if (type == 'first') {
        if (this.book.branch_id.length == 0 || this.book.specialization_id.length == 0 || this.book.doctor_id.length == 0 || this.book.phone.length == 0) {
          this.error = this.__('Enter all data');
        } else {
          this.current = type
          this.error = ''
        }
      }
      if (type == 'second') {
        if (this.book.appointment_id.length == 0 || this.book.date.length == 0) {
          this.error = this.__('Enter all data');
        } else {
          this.current = type
          this.error = ''
        }
      }
    },

    async submit() {
      await axios.post(this.$route('book.appointment.store'), this.book).then(response => {
        if (response.data.status) {
          this.$toasted.success(response.data.data);
          setTimeout(()=> {
            window.location.href = this.$route('user.reservations')
          }, 2000)
        } else {
          this.error = response.data.data
        }
      }).catch(error => console.log('error', error))
    }

  }
}
</script>

<style scoped>
.bay-svg{fill:"currentColor"}
</style>