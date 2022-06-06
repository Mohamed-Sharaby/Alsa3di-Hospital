<template>

  <div>
    <head-info :title="__('Change Password')" />


    <main class="main-my-account-page-om main-personal-data-page-om main_grey_background_om main-page-default-back-g-om">
      <div class="container">
        <div class="row">

          <nav-bar current="password" />

          <div class="col-lg-9">

            <div class="alert alert-danger" v-if="error.length > 0">{{error}}</div>

            <form @submit.prevent="submit">
              <div class="my-account-information-sec-om personal-data-om single-page-wrapper-om">
                <div class="row-om">

                  <div class="col-om">
                    <div class="input-group-om password-group-om">
                      <input class="input-om" type="password" v-model="form.old_password" :placeholder="__('Old Password')" required>

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
                  </div>

                  <div class="col-om">
                    <div class="input-group-om password-group-om">
                      <input class="input-om" type="password" v-model="form.password" :placeholder="__('New Password')" required>

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
                  </div>
                  <div class="col-om">
                    <div class="input-group-om password-group-om">
                      <input class="input-om" type="password" v-model="form.password_confirmation" :placeholder="__('Confirm New Password')">

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
                  </div>

                </div>
              </div>
              <div class="modification-button-wrapper-om">
                <button class="submit-butt-om min-width-om fix-om" type="submit">{{ __('Save') }}</button>
              </div>
            </form>


          </div>
        </div>
      </div>
    </main>
  </div>


</template>

<script>
import Layout from "../../Shared/Layout";
import HeadInfo from "../../Shared/HeadInfo";
import NavBar from "./NavBar";

export default {
  name: "Password",
  layout: Layout,
  components: {HeadInfo, NavBar},
  data() {
    return {
      form: {
        old_password: '',
        password: '',
        password_confirmation: ''
      },
      error: ''
    }
  },

  methods: {
    async submit() {
      await axios.post(this.$route('user.updatePassword'), this.form).then(response => {
        if (response.data.status) {
          this.$toasted.success(response.data.data)
          this.error = ''
        } else {
          this.error = response.data.data;
        }
      })
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