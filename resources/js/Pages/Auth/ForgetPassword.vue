<template>

  <b-modal class="tab-block-om active-om" id="forget-password-modal" hide-footer hide-header>
    <div class="signup-section-om">
    <form @submit.prevent="submit">
      <h2 class="signin-head-om add-email-head-om">{{ __('Forget Password') }}</h2>
      <p class="signin-sub-head-om add-email-parg-om">{{__('Please type your phone to restore password')}}</p>

      <div class="alert alert-danger" v-if="error">
        {{error}}
      </div>


      <div class="signup-form-content-om">

        <div class="input-group-om">
          <input class="input-om" type="number" v-model="phone" :placeholder="__('Phone')" required>
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
  name: "ForgetPassword",
  components: {BModal},
  props: ['current'],
  data() {
    return {
      phone: '',
      error: '',
    }
  },
  methods: {
    async submit() {
      await axios.post('/forget-password', {phone: this.phone}).then(response => {
        if (response.data.status) {
          this.$emit('update-phone', this.phone)
          this.openModal('confirm-account-modal')
        } else {
          this.error = response.data.msg
        }
      }).catch(error => console.log('error', error));
    },
    openModal(modal) {
      this.$bvModal.hide('forget-password-modal')
      this.$bvModal.show(modal)
    }

  }
}
</script>

<style scoped>

</style>