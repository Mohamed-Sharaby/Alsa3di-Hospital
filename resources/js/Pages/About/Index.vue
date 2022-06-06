<template>
<div>

  <head-info :title="__('About Us')" />


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
                  <h4 class="first-head-om">{{ __('About Us') }}</h4>
                  <h2 class="second-head-om"> {{ item.title }} </h2>
                </div>

                <p class="single-page-parg-om parg-change-font-om" v-html="item.details">
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>


    <!-- manger content  -->
    <section class="pg-about-us-manger-sec-om">
      <div class="container">
        <div class="manger-wrapper-om">
          <div class="row">
            <div class="col-lg-3 col-md-12">
              <figure class="single-block-img-om figure-om loading-omd ">
                <img class="lazy-omd img-om" data-src="/assets/images/doctor.jpg" alt="..">
              </figure>
            </div>
            <div class="col-lg-9 col-md-12">
              <div class="main-heading-sec-om ">
                <h2 class="second-head-om">{{ item.author }} </h2>
                <h4 class="first-head-om">{{ item.job }}</h4>
              </div>
              <div>
                <p class="single-page-parg-om parg-change-font-om" v-html="item.author_details">
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- start why us -->
    <section class="why-us-sec-om">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="why-us-block-om">
              <figure class="single-block-img-om figure-om loading-omd">
                <img class="lazy-omd img-om" data-src="/assets/images/whyus/witness.png" alt="..">
              </figure>
              <h3 class="head-om fix-om">{{__('Vision')}}</h3>
              <p class="single-page-parg-om ">
                {{ item.vision }}
              </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="why-us-block-om">
              <figure class="single-block-img-om figure-om loading-omd">
                <img class="lazy-omd img-om" data-src="/assets/images/whyus/messenger.png" alt="..">
              </figure>
              <h3 class="head-om fix-om">{{__('Message')}}</h3>
              <p class="single-page-parg-om ">
                {{ item.message }}
              </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="why-us-block-om">
              <figure class="single-block-img-om figure-om loading-omd">
                <img class="lazy-omd img-om" data-src="/assets/images/whyus/goal.png" alt="..">
              </figure>
              <h3 class="head-om fix-om">{{__('Goals')}}</h3>
              <p class="single-page-parg-om ">
                {{ item.goals }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

</div>
</template>

<script>
import Layout from "../../Shared/Layout";
import HeadInfo from "../../Shared/HeadInfo";

export default {
name: "Index",
  layout: Layout,
  props: {
    item: Object
  },
  components: {HeadInfo}
}
</script>

<style scoped>

</style>