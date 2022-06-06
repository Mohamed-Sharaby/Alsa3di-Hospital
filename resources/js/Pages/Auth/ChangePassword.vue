<template>

  <b-modal class="tab-block-om active-om" id="change-password-modal" hide-footer hide-header>
    <div class="signup-section-om">
    <form @submit.prevent="submit">
      <h2 class="signin-head-om add-email-head-om">{{ __('Change Password') }}</h2>
      <p class="signin-sub-head-om add-email-parg-om">{{__('Please type your phone to restore password')}}</p>

      <div class="alert alert-danger" v-if="error">
        {{error}}
      </div>


      <div class="signup-form-content-om">

        <div class="input-group-om">
          <input class="input-om" type="password" v-model="form.password" :placeholder="__('Password')" required>
        </div>

        <div class="input-group-om">
          <input class="input-om" type="password" v-model="form.password_confirmation" :placeholder="__('Confirm Password')" required>
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
  name: "ChangePassword",
  components: {BModal},
  props: ['current', 'phone'],
  data() {
    return {
      form: {
        password: '',
        password_confirmation: '',
      },
      error: ''
    }
  },
  methods: {
    async submit() {
      let data = this.form;
      data['phone'] = this.phone;
      await axios.post('/change-password', data).then(response => {
        if (response.data.status) {
          this.$toasted.success(this.__('Password Updated Successfully'));
          this.openModal('login-modal');
        } else {
          this.error = response.data.msg
        }
      }).catch(error => console.log('error', error))
    },
    openModal(modal) {
      this.$bvModal.hide('change-password-modal')
      this.$bvModal.show(modal)
    }

  }
}
</script>

<style scoped>

</style>