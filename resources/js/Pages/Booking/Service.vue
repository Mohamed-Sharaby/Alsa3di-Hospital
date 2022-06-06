<template>

  <div>

    <head-info :title="__('Medical service request')" />

    <main class="main-medical-consultation-request-page-om main-requests-page-om  main_grey_background_om">
      <div class="container">

        <div class="site-form-block-om request-form-om">

          <div class="alert alert-danger" v-if="error.length > 0">{{ error }}</div>

          <form @submit.prevent="submit">
            <div class="row">
            <div class="col-lg-6">
              <div class="input-group-om">
                <label class="lable-om">{{ __('Branch') }}</label>

                <select class="input-om select-om" v-model="book.branch_id" @change="getServices" required>
                  <option selected disabled hidden>{{ __('Branch') }}</option>
                  <option v-for="branch in branches" :value="branch.id">{{  branch.name }}</option>
                </select>
              </div>

              <div class="input-group-om">
                <label class="lable-om">{{ __('Service Type') }}</label>

                <select class="input-om select-om" v-model="book.service_id" required>
                  <option selected disabled hidden>{{ __('Service Type') }}</option>
                  <option v-for="service in services" :value="service.id">{{  service.name }}</option>
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
          </form>

        </div>

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
  name: "Service",
  layout: Layout,
  components: {HeadInfo, Datepicker},
  props: {branches: Array},
  data() {
    return {
      date_picker: {
        ar: ar,
        en: en,
      },
      error: '',
      services: [],
      disabledDates: {
        to: new Date(Date.now() - 864e5), // yesterday 864e5 == 86400000 == 24*60*60*1000
      },
      book: {
        date: '',
        branch_id: '',
        service_id: '',
        phone: '',
        details: '',
      }
    }
  },
  computed: {
    pickerLang() {
      return this.date_picker[this.$page.props.lang];
    }
  },
  methods: {
    async submit() {
      await axios.post(this.$route('book.service.store'), this.book).then(response => {
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
    },
    getServices() {
      axios.get(this.$route('book.services'), {
        params: {
          branch_id: this.book.branch_id
        }
      }).then(response => {
        if (response.data.status) {
          this.services = response.data.data;
        }
      }).catch(error => console.log(error));
    }

  }

}
</script>

<style scoped>

</style>