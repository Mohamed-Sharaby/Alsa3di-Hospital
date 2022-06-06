<template>

  <div>
    <head-info :title="__('Personal Data')" />


    <main class="main-my-account-page-om main-personal-data-page-om main_grey_background_om main-page-default-back-g-om">
      <div class="container">
        <div class="row">

          <nav-bar current="profile" />

          <div class="col-lg-9">

            <div class="alert alert-danger" v-if="error.length > 0">{{error}}</div>

            <form @submit.prevent="submit">
              <div class="my-account-information-sec-om personal-data-om single-page-wrapper-om">
                <div class="row-om">
                  <div class="col-om">
                    <div class="input-group-om">
                      <input class="input-om" type="text" v-model="form.name" :placeholder="__('Name')" required>
                    </div>
                  </div>
                  <div class="col-om">
                    <div class="input-group-om">
                      <input class="input-om" type="text" v-model="form.phone" :placeholder="__('Phone')" required>
                    </div>
                  </div>
                  <div class="col-om">
                    <div class="input-group-om">
                      <input class="input-om" type="text" v-model="form.email" :placeholder="__('Email')" required>
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
  name: "Index",
  layout: Layout,
  components: {HeadInfo, NavBar},
  data() {
    return {
      form: {
        name: '',
        phone: '',
        email: ''
      },
      error: ''
    }
  },
  computed: {
    user() {
      return this.$page.props.auth.user
    }
  },
  mounted() {
    this.form.name = this.user.name;
    this.form.phone = this.user.phone;
    this.form.email = this.user.email;
  },
  methods: {
    async submit() {
      await axios.post(this.$route('user.updateProfile'), this.form).then(response => {
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

</style>