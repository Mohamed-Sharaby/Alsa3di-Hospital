<template>
  <div>

    <head-info :title="__('Privacy')" />

    <main class="main-about-us-om main_grey_background_om main-page-default-back-g-om">

      <!-- about us content  -->
      <section class="pg-about-us-content-om">
        <div class="container">
          <div class="single-page-wrapper-om">
            <div class="row">
              <div class="col-lg-4">
                <figure class="single-block-img-om figure-om loading-omd asp-om">
                  <img class="lazy-omd img-om" data-src="/assets/images/logo2.png" alt="..">
                </figure>
              </div>
              <div class="col-lg-8">
                <div class="about-info-om">
                  <div class="main-heading-sec-om">
                    <h4 class="first-head-om">{{ __('Privacy') }}</h4>
                  </div>

                  <p class="single-page-parg-om parg-change-font-om" v-html="item">
                  </p>

                </div>
              </div>
            </div>

          </div>
        </div>
      </section>


    </main>

  </div>
</template>

<script>
import HeadInfo from "../Shared/HeadInfo";
import Layout from "../Shared/Layout";

export default {
  name: "Privacy",
  layout: Layout,
  components: {HeadInfo},
  props: {item: String}
}
</script>

<style scoped>

</style>