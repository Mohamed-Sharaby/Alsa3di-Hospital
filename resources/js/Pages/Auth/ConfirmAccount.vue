<template>

  <b-modal class="tab-block-om active-om" id="confirm-account-modal" hide-footer hide-header>
    <div class="signup-section-om">
    <form @submit.prevent="submit">
      <h2 class="signin-head-om add-email-head-om">{{ __('Confirm Phone') }}</h2>
      <p class="signin-sub-head-om add-email-parg-om">{{__('We send verify code to your phone, check your phone and write the sent code')}}</p>

      <div class="alert alert-danger" v-if="error">
        {{error}}
      </div>


      <div class="signup-form-content-om">

        <div class="input-group-om">
          <input class="input-om" type="number" v-model="code" :placeholder="__('Enter Code')">
        </div>
        <div class="input-group-om">
          <input class="submit-butt-om" type="submit" :value="__('Send')">
        </div>
        <a class="signup-last-link-om link-om ss-activate-tab-om" @click="openModal('login-modal')"
           ><span class="text-om">{{ __('Login') }}</span></a>
      </div>
    </form>
  </div>
  </b-modal>

</template>

<script>
import {BModal} from "bootstrap-vue";

export default {
  name: "ConfirmAccount",
  components: {BModal},
  props: ['current', 'phone'],
  data() {
    return {
      code: '',
      error: '',
    }
  },
  methods: {
    async submit() {
      await axios.post('/verify', {code: this.code, phone: this.phone}).then(response => {
        if (response.data.status) {
          if (response.data.data == 'verify') window.location.reload();
          else this.openModal('change-password-modal');
        } else {
          this.error = response.data.data;
        }
      }).catch(error => console.log('error', error))
    },
    openModal(modal) {
      this.$bvModal.hide('confirm-account-modal')
      this.$bvModal.show(modal)
    }

  }
}
</script>

<style scoped>

</style>