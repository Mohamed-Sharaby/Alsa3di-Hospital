<template>
<div>

  <Head :title="item.user.name" />

  <section class="breatcramp-om">
    <div class="container">
      <h1 class="breatcramp-title-om fix-om">{{ __('Doctors') }} </h1>
      <ul class="breatcramp-list-om list-unstyled fix-om">
        <li class="li-om fix-om"><a href="#!" class="link-om fix-om">{{ __('Main') }}</a></li>
        <li class="li-om fix-om"><a href="#!" class="link-om fix-om">{{ __('Doctors') }}</a></li>
        <li class="li-om fix-om"><span class="link-om fix-om current">{{ item.user.name }}</span>
        </li>
      </ul>
    </div>
  </section>


  <main class="main-single-doctor-om main_grey_background_om main-page-default-back-g-om">

    <section class="single-doctor-content-om">
      <div class="container">
        <div class="single-page-wrapper-om">
          <div class="row-om">
            <div class="col-om-1 col-om">
              <!-- doctor.jpg -->
              <figure class="single-block-img-om figure-om loading-omd asp-om">
                <img class="lazy-omd img-om" :data-src="item.user.image_path"
                     alt="..">
              </figure>
            </div>
            <div class="col-om-2 col-om">
              <h2 class="single-page-head-om">{{ item.user.name }}</h2>
              <h4 class="doctor-postion-om fix-om">{{ item.job }}</h4>
              <div class="single-page-content-om content-change-font-om">
                <p class="single-page-parg-om" v-html="item.details">
                </p>
              </div>
<!--              <h3 class="doctor-master-lang-info fix-om">دكتوراه في الطب</h3>-->
              <h3 class="doctor-master-lang-info fix-om">{{ __('Languages') }} : {{ item.lang }}</h3>
              <a class="header-reserv-link-om link-om" href="#!">
                <figure class="figure-om">
                  <svg class="svg-om" xmlns="http://www.w3.org/2000/svg" width="22.81" height="26.068" viewBox="0 0 22.81 26.068">
                    <path fill="currentColor" d="M0 23.625a2.445 2.445 0 0 0 2.444 2.444h17.922a2.445 2.445 0 0 0 2.444-2.444V9.776H0zm16.293-9.979a.613.613 0 0 1 .611-.611h2.036a.613.613 0 0 1 .611.611v2.037a.613.613 0 0 1-.611.611H16.9a.613.613 0 0 1-.611-.611zm0 6.517a.613.613 0 0 1 .611-.611h2.036a.613.613 0 0 1 .611.611V22.2a.613.613 0 0 1-.611.611H16.9a.613.613 0 0 1-.611-.611zm-6.517-6.518a.613.613 0 0 1 .611-.611h2.037a.613.613 0 0 1 .611.611v2.037a.613.613 0 0 1-.611.611h-2.037a.613.613 0 0 1-.611-.611zm0 6.517a.613.613 0 0 1 .611-.611h2.037a.613.613 0 0 1 .611.611V22.2a.613.613 0 0 1-.611.611h-2.037a.613.613 0 0 1-.611-.611zm-6.517-6.517a.613.613 0 0 1 .611-.611h2.036a.613.613 0 0 1 .611.611v2.037a.613.613 0 0 1-.611.611H3.87a.613.613 0 0 1-.611-.611zm0 6.517a.613.613 0 0 1 .611-.611h2.036a.613.613 0 0 1 .611.611V22.2a.613.613 0 0 1-.611.611H3.87a.613.613 0 0 1-.611-.611zm17.107-16.9h-2.444V.815A.817.817 0 0 0 17.107 0h-1.629a.817.817 0 0 0-.815.815v2.444H8.146V.815A.817.817 0 0 0 7.332 0H5.7a.817.817 0 0 0-.815.815v2.444H2.444A2.445 2.445 0 0 0 0 5.7v2.446h22.81V5.7a2.445 2.445 0 0 0-2.444-2.441z"></path>
                  </svg>
                </figure>
                <span class="text-om">{{ __('Book an appointment') }}</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="doctor-can-help-sec-om">
      <div class="container">
        <!-- start  doctor-can-help-sec-om -->
        <div class="single-page-wrapper-om">
          <h2 class="single-page-head-om">{{ __('Doctor can help in') }}</h2>
          <div class="single-page-content-om content-color-change-om">

            <ul class="single-page-list-om list-unstyled fix-om">
              <li v-for="service in item.services" :key="service.id">{{ service.name }}</li>
            </ul>
          </div>
        </div>
        <!-- end  doctor-can-help-sec-om -->
      </div>
    </section>

  </main>

</div>
</template>

<script>
import Layout from "../../Shared/Layout";
import {Head} from "@inertiajs/inertia-vue";

export default {
  name: "Show",
  layout: Layout,
  components: {Head},
  props: {
    item: Object
  }
}
</script>

<style scoped>

</style>