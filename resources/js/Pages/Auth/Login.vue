<template>

  <!-- Login modal -->
  <b-modal hide-footer hide-header id="login-modal">
    <div class="tab-block-om active-om">
      <div class="signin-section-om">
    <form @submit.prevent="submit">
      <p class="signin-sub-head-om">{{ __('Welcome') }}</p>
      <h2 class="signin-head-om">{{ __('Login to you account') }}</h2>

      <div class="alert alert-danger" v-if="error.length > 0">
        {{error}}
      </div>

      <div class="signin-form-content-om">
        <div class="input-group-om">
          <input class="input-om" type="text" v-model="form.user_info" :placeholder="__('Mobile Or Email')" required>
        </div>
        <div class="input-group-om password-group-om">
          <input class="input-om" type="password" v-model="form.password" :placeholder="__('Password')" required>

          <button class="show-password-button-om">
            <figure class="figure-om">
              <svg xmlns="http://www.w3.org/2000/svg" width="20.164" height="20.164"
                   viewBox="0 0 20.164 20.164">
                <g id="Icon_feather-eye-off" transform="translate(-.439 -.439)">
                  <path id="Path_591"
                        d="M15.393 17.432a8.258 8.258 0 0 1-4.871 1.689c-5.741 0-9.021-6.561-9.021-6.561A15.131 15.131 0 0 1 5.65 7.689M8.8 6.2a7.479 7.479 0 0 1 1.721-.2c5.741 0 9.021 6.561 9.021 6.561a15.172 15.172 0 0 1-1.771 2.616M12.26 14.3a2.46 2.46 0 1 1-3.477-3.477"
                        class="eye-path-cl-om" transform="translate(0 -2.04)" />
                  <path id="Path_592" d="M1.5 1.5l18.042 18.042"
                        class="eye-path-cl-om ss-line-through-om" />
                </g>
              </svg>

            </figure>
          </button>
        </div>
        <a class="forget-password-link-om link-om ss-activate-tab-om"
           @click="openModal('forget-password-modal')">{{ __('Forget Password?') }}</a>
        <div class="input-group-om">
          <input class="submit-butt-om" type="submit" :value="__('Login')">
        </div>
        <a class="signup-last-link-om link-om " @click="openModal('register-modal')">
          <span class="text-om">{{ __('Create new account') }}</span>
        </a>
      </div>
    </form>
  </div>
    </div>
  </b-modal>

</template>

<script>
import { BModal } from 'bootstrap-vue'

export default {
  name: "Login",
  components: {BModal},
  data() {
    return {
      form: {
        user_info: '',
        password: ''
      },
      error: ''
    }
  },
  props: ['current'],
  methods: {
    async submit() {
      await axios.post('/login', this.form).then(response => {
        if (response.data.status) {
          // window.location.reload();
          window.location.href = window.location.pathname;
        } else {
          this.error = response.data.data;
        }
      });
    },

    openModal(modal) {
      this.$bvModal.hide('login-modal')
      this.$bvModal.show(modal)
    }
  }
}
</script>

<style scoped>
.eye-path-cl-om {
  fill: none;
  stroke: #8d8d8d;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke-width: 1.5px
}
</style>