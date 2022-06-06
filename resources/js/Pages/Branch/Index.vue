<template>
<div>
  <Head :title="item.name" />

  <section class="breatcramp-om">
    <div class="container">
      <h1 class="breatcramp-title-om fix-om">{{ item.name }}</h1>
      <ul class="breatcramp-list-om list-unstyled fix-om">
        <li class="li-om fix-om"><a href="#!" class="link-om fix-om">{{ __('Main') }}</a></li>
        <li class="li-om fix-om"><a href="#!" class="link-om fix-om">{{ __('Branches') }}</a></li>
        <li class="li-om fix-om"><span class="link-om fix-om current">{{ item.name }}</span></li>
      </ul>
    </div>
  </section>


  <main class="main-single-branch-om main_grey_background_om main-page-default-back-g-om">

    <section class="about-branch-om">
      <div class="container">
        <div class="single-page-wrapper-om">
          <figure class="single-block-img-om figure-om loading-omd ">
            <img class="lazy-omd img-om" data-src="/assets/images/logo2.png" alt="..">
          </figure>
          <h2 class="head-om fix-om">{{ item.name }}</h2>
          <p class="single-page-parg-om parg-change-font-om">
            {{ item.details }}
          </p>
        </div>
      </div>
    </section>

    <section class="branch-special-doctors-om">
      <div class="container">
        <div class="main-heading-sec-om text-center">
          <h4 class="first-head-om">{{ __('Branch Doctors') }}</h4>
          <h2 class="second-head-om">{{ __('Distinct Doctors') }} </h2>
          <p class="parg-om">
            {{ __('We have brought together the best doctors in healthcare to provide you with a world class medical service') }}
          </p>
        </div>
        <div class="row">
          <div class="col-lg-3" v-for="(doctor, index) in item.doctors" :key="index">
            <a class="doctor-block-om branch-doctor-om link-om" href="#!">
              <figure class="figure-om loading-omd asp-om">
                <img class="lazy-omd img-om" data-src="assets/images/doc-2.jpg" alt="..">
              </figure>
              <h3 class="head-om fix-om">{{ doctor.name }}</h3>
              <p class="desc-om fix-om"> {{ doctor.job }}</p>
            </a>
          </div>

        </div>

        <Link class="main-read-more-sec-om  fix-om" href="/doctors" :data="{branch:item.id}">{{ __('See More') }}</Link>
      </div>
    </section>

    <section class="branch-gallery-om">
      <div class="container">
        <div class="main-heading-sec-om text-center">
          <h4 class="first-head-om">{{ __('Gallery') }}</h4>
          <h2 class="second-head-om">{{ __('Branch and medical devices images') }} </h2>
        </div>

        <div class="swiper-container">
          <div class="swiper-wrapper">

            <div class="swiper-slide" v-for="(image, index) in item.images" :key="index">
              <a class="branch-image-block-om" data-fancybox="gallery" :href="image.file_path">
                <figure class="figure-om loading-omd asp-om">
                  <img class="lazy-omd img-om" :data-src="image.file_path" alt="..">
                </figure>
              </a>
            </div>

          </div>
          <!-- Add Pagination -->
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>

    <section class="map-section-om">
      <div class="container">
        <div class="main-heading-sec-om text-center">
          <h4 class="first-head-om">{{ __('Address') }}</h4>
          <h2 class="second-head-om">{{ __('Our location') }} </h2>
        </div>

        <div class="map-om">
          <google-map :mapConfig="mapConfig" class="map-ifram-om" loading="lazy"></google-map>
        </div>
      </div>
    </section>

  </main>


</div>
</template>

<script>
import GoogleMap from "../../Shared/GoogleMap";
import Layout from "../../Shared/Layout";
import {Head, Link} from '@inertiajs/inertia-vue'


export default {

  name: "Index",
  components : {GoogleMap, Head, Link},
  props: {
    item: Object
  },
  layout: Layout,
  computed: {
    mapConfig () {
      return {
        lat: parseFloat(this.item.lat), lng: parseFloat(this.item.lng)
      }
    },
  },
}
</script>

<style scoped>

</style>