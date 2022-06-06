<template>

  <!-- Register modal -->
  <b-modal class="tab-block-om active-om" id="register-modal" hide-footer hide-header>
    <div class="signup-section-om">
    <form @submit.prevent="register">
      <h2 class="signin-head-om">{{ __('Create new account') }}</h2>

      <div class="alert alert-danger" v-if="error">
        {{error}}
      </div>

      <div class="signup-form-content-om">
        <div class="input-group-om">
          <input class="input-om" type="text" v-model="form.name" :placeholder="__('Name')">
        </div>
        <div class="input-group-om">
          <input class="input-om" type="tel" v-model="form.phone" :placeholder="__('Phone')">
        </div>
        <div class="input-group-om">
          <input class="input-om" type="email" v-model="form.email"
                 :placeholder="__('Email')">
        </div>
        <div class="input-group-om">
          <input class="input-om" type="password" v-model="form.password" :placeholder="__('Password')">
        </div>
        <div class="input-group-om">
          <input class="submit-butt-om" type="submit" :value="__('Create account')">
        </div>
        <a class="signup-last-link-om link-om ss-activate-tab-om4"  @click="openModal('login-modal')">
          <span class="text-om">{{ __('Login') }}</span></a>
      </div>
    </form>
  </div>
  </b-modal>

</template>

<script>
import {BModal} from "bootstrap-vue";

export default {
  name: "Register",
  components: {BModal},
  data() {
    return {
      form: {
        name: '',
        password: '',
        email: '',
        phone: '',
      },
      phoneRegx: new RegExp(/^(9665|009665|5|05)[0-9]{8}/),
      error: ''
    }
  },
  watch : {
    'form.phone'(newVal, oldVal) {
      if (!this.phoneRegx.test(newVal)) {
        this.error = this.__('Phone must be saudi number');
      } else {
        this.error = '';
      }
    }
  },
  props: ['current'],
  methods: {
    async register() {
      this.error = '';
      if (!this.phoneRegx.test(this.form.phone)) {
        this.error = this.__('Phone must be saudi number');
      } else  {
        this.error = '';
        await axios.post('/register', this.form).then(response => {
          if (response.data.status) {
            this.$emit('update-phone', this.form.phone)
            this.openModal('confirm-account-modal');
          } else {
            this.error = response.data.msg;
          }
        }).catch(error => console.log('error', error))
      }

    },
    openModal(modal) {
      this.$bvModal.hide('register-modal')
      this.$bvModal.show(modal)
    }
  }
}
</script>

<style scoped>

</style>