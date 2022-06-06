<template>
<div>

  <Head :title="item.name" />

  <section class="breatcramp-om">
    <div class="container">
      <h1 class="breatcramp-title-om fix-om">{{ __('Medical Specializations') }} </h1>
      <ul class="breatcramp-list-om list-unstyled fix-om">
        <li class="li-om fix-om"><Link href="/" class="link-om fix-om">{{ __('Main') }}</Link></li>
        <li class="li-om fix-om"><Link href="/specialty" class="link-om fix-om">{{ __('Medical Specializations') }}</Link></li>
        <li class="li-om fix-om"><span class="link-om fix-om current">{{ item.name }}</span>
        </li>
      </ul>
    </div>
  </section>


  <main class="main-single-medical-specialtie-om main_grey_background_om">
    <!-- main content  -->
    <section class="medical-specialtie-section-om">
      <div class="container">

        <div class="row">
          <div class="col-lg-8">

            <!-- start single img  -->
            <a class="single-img-link-lock-om" data-fancybox="gallery"
               :href="item.image_path">
              <figure class="single-img-block-om figure-om loading-omd asp-om">
                <img class="lazy-omd img-om"
                     :data-src="item.image_path" alt="..">
              </figure>
            </a>
            <!-- end single img  -->

            <!-- single-page-wrapper-om -->
            <div class="single-page-wrapper-om">
              <h2 class="single-page-head-om">{{  item.name }}</h2>
              <div class="single-page-content-om content-change-font-om">
                <p class="single-page-parg-om">
                  {{ item.details }}
                </p>
              </div>
            </div>

            <!-- single-page-wrapper-om -->
            <div class="single-page-wrapper-om">
              <h2 class="single-page-head-om">{{ __('Services') }}</h2>
              <div class="single-page-content-om content-color-change-om">
                <p class="single-page-parg-om">
                  {{ __('Our medical team of specialists, exceed expectations and perform operations that include') }}
                </p>
                <ul class="single-page-list-om list-unstyled fix-om">
                  <li v-for="service in item.services" :key="service.id">{{ service.name }}</li>
                </ul>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- slider  -->
    <section class="specialtie-doctors-section-om">
      <div class="container">
        <h2 class="single-page-head-om">({{ item.doctors.length }}) {{ __('Doctors in')}} {{ item.name }}</h2>
        <div class="single-doctors-slider-om">
          <div class="swiper-container">

            <div class="swiper-wrapper" v-for="doctor in item.doctors" :key="doctor.id">
              <div class="swiper-slide">
                <Link class="doctor-block-om link-om" :href="`/doctor/${doctor.id}`">
                  <figure class="figure-om loading-omd asp-om">
                    <img class="lazy-omd img-om" :data-src="doctor.user.image_path" alt="..">
                  </figure>
                  <h3 class="head-om fix-om">{{ doctor.user.name }}</h3>
                  <p class="desc-om fix-om">{{ doctor.job }}</p>
                </Link>
              </div>


            </div>

            <div class="swiper-pagination"></div>

          </div>
        </div>
      </div>
    </section>
  </main>

</div>
</template>

<script>
import Layout from "../../Shared/Layout";
import {Head, Link} from "@inertiajs/inertia-vue";

export default {
  name: "Show",
  props: {
    item: Object
  },
  layout: Layout,
  components: {Head, Link}
}
</script>

<style scoped>

</style>