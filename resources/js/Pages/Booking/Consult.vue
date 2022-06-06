<template>

  <div>

    <head-info :title="__('Medical consultation request')" />

    <main class="main-medical-consultation-request-page-om main-requests-page-om  main_grey_background_om">
      <div class="container">

        <form @submit.prevent="submit">
          <div class="site-form-block-om request-form-om">

            <div class="alert alert-danger" v-if="error.length > 0">{{error}}</div>

          <div class="row">
            <div class="col-lg-6">

              <div class="input-group-om">
                <label class="lable-om">{{ __('Choose a specialty') }}</label>
                <select class="input-om select-om" v-model="book.specialization_id" @change="getDoctors" required>
                  <option selected disabled hidden>{{ __('Choose a specialty') }}</option>
                  <option v-for="specialty in specializations" :value="specialty.id">{{  specialty.name }}</option>
                </select>
              </div>

              <div class="input-group-om">
                <label class="lable-om">{{ __('Doctor') }}</label>
                <select class="input-om select-om" v-model="book.doctor_id" required>
                  <option selected disabled hidden>{{ __('Doctor') }}</option>
                  <option v-for="doctor in doctors" :value="doctor.id">{{  doctor.user.name }}</option>
                </select>
              </div>

              <div class="input-group-om">
                <label class="lable-om">{{ __('Details') }}</label>

                <textarea class="textarea-om" v-model="book.details" :placeholder="__('Details')" required></textarea>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="input-group-om">
                <label class="lable-om">{{ __('Phone') }}</label>
                <input class="input-om" type="text" v-model="book.phone" :placeholder="__('Phone')" required>

              </div>
              <div class="input-group-om">
                <label class="lable-om">{{ __('Choose day') }} </label>
                <datepicker :inline="true" :language="pickerLang" @selected="getSelectedDate" :disabled-dates="disabledDates"></datepicker>


              </div>
            </div>
            <div class="col-lg-12">
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
import Layout from "../../Shared/Layout";
import HeadInfo from "../../Shared/HeadInfo";
import Datepicker from "vuejs-datepicker";
import {ar, en} from "vuejs-datepicker/dist/locale";

export default {
  name: "Consult",
  layout: Layout,
  components: {HeadInfo, Datepicker},
  props: {specializations: Array},
  data() {
    return {
      date_picker: {
        ar: ar,
        en: en,
      },
      error: '',
      doctors: [],
      disabledDates: {
        to: new Date(Date.now() - 864e5), // yesterday 864e5 == 86400000 == 24*60*60*1000
      },
      book: {
        date: '',
        specialization_id: '',
        doctor_id: '',
        phone: '',
        details: '',
        type: 'consult'
      }
    }
  },
  computed: {
    pickerLang() {
      return this.date_picker[this.$page.props.lang];
    }
  },
  methods: {
    getDoctors() {
      axios.get(this.$route('book.doctors'), {
        params: {
          specialization_id: this.book.specialization_id
        }
      }).then(response => {
        if (response.data.status) {
          this.doctors = response.data.data;
        }
      }).catch(error => console.log(error));
    },
    async submit() {
      await axios.post(this.$route('book.request_doctor'), this.book).then(response => {
        if (response.data.status) {
          this.$toasted.success(response.data.data);
          setTimeout(()=> {
            window.location.href = this.$route('user.orders')
          }, 2000)
        } else {
          this.error = response.data.data
        }
      }).catch(error => console.log('error', error))
    },
    getSelectedDate(date) {
      this.book.date = date;
    }

  }

}
</script>

<style scoped>

</style>