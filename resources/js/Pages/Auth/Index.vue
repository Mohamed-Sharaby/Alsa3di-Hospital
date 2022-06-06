<template>

  <div>
    <!-- start sign in modal section  -->
    <section class="signin-modal-section-om modal-section-om modal fade" id="signinmodal" tabindex="-1" role="dialog"
             aria-labelledby="signinmodalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">

        <div class="modal-content">
          <button type="button" class="close-butt-om" data-dismiss="modal" aria-label="Close">

          </button>
          <div class="tabs-block-group-om">

              <login :current="current" @update-tab="onUpdateTab" />

              <register :current="current" @update-tab="onUpdateTab" @update-phone="onUpdatePhone" />

              <forget-password :current="current" @update-tab="onUpdateTab" @update-phone="onUpdatePhone" />

              <confirm-account :current="current" :phone="phone" @update-tab="onUpdateTab" />

              <change-password :current="current" :phone="phone" @update-tab="onUpdateTab" />

          </div>
        </div>
      </div>
    </section>
    <!-- end sign in modal section  -->
  </div>

</template>

<script>
import Login from "./Login";
import Register from "./Register";
import ForgetPassword from "./ForgetPassword";
import ConfirmAccount from "./ConfirmAccount";
import ChangePassword from "./ChangePassword";

export default {
  name: "Index",
  components: {ChangePassword, Login, Register, ForgetPassword, ConfirmAccount},
  data() {
    return {
      current: 'login',
      phone: ''
    }
  },
  methods: {
    onUpdateTab(newValue) {
      this.current = newValue
    },
    onUpdatePhone(newValue) {
      this.phone = newValue
    }
  }
}
</script>

<style scoped>

</style>