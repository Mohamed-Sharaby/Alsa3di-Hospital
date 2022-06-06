<template>
<div>
  <Head :title="__('Main')" />
  <!-- start main slider  -->
  <section class="main-slider-om">
    <div class="swiper-container">
      <div class="swiper-wrapper">


        <div class="swiper-slide" v-for="slider in sliders" :key="slider.id">
          <div class="slider-block-om">
            <figure class="slider-img-om figure-om loading-omd asp-om">
              <img class="lazy-omd img-om" :data-src="slider.image" alt="..">
            </figure>
            <div class="slider-heading-block">
              <div class="container">
                <h1 class="slider-caption-om">
                  {{ slider.title }}
                </h1>

                <Link class="slider-book-block-om link-om" :href="$route('book.appointment')">
                  <h2 class="text-om">
<!--                    <span class="org-text-om">منظومة</span>-->
                    {{__('Completed appointments booking')}}
                  </h2>
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30.023" height="34.312"
                         viewBox="0 0 30.023 34.312">
                      <path id="Icon_awesome-calendar-alt" data-name="Icon awesome-calendar-alt"
                            d="M0,31.095a3.218,3.218,0,0,0,3.217,3.217H26.806a3.218,3.218,0,0,0,3.217-3.217V12.867H0ZM21.445,17.96a.807.807,0,0,1,.8-.8H24.93a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H22.249a.807.807,0,0,1-.8-.8Zm0,8.578a.807.807,0,0,1,.8-.8H24.93a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H22.249a.807.807,0,0,1-.8-.8ZM12.867,17.96a.807.807,0,0,1,.8-.8h2.681a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H13.671a.807.807,0,0,1-.8-.8Zm0,8.578a.807.807,0,0,1,.8-.8h2.681a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H13.671a.807.807,0,0,1-.8-.8ZM4.289,17.96a.807.807,0,0,1,.8-.8H7.774a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H5.093a.807.807,0,0,1-.8-.8Zm0,8.578a.807.807,0,0,1,.8-.8H7.774a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H5.093a.807.807,0,0,1-.8-.8ZM26.806,4.289H23.589V1.072A1.075,1.075,0,0,0,22.517,0H20.373A1.075,1.075,0,0,0,19.3,1.072V4.289H10.722V1.072A1.075,1.075,0,0,0,9.65,0H7.506A1.075,1.075,0,0,0,6.433,1.072V4.289H3.217A3.218,3.218,0,0,0,0,7.506v3.217H30.023V7.506A3.218,3.218,0,0,0,26.806,4.289Z"
                            fill="currentColor" />
                    </svg>
                  </figure>
                  <p class="text-om">
                    {{ __('Book Now') }}
                  </p>
                </Link>
              </div>
            </div>
          </div>
        </div>


      </div>

      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </section>
  <!-- end main slider  -->


  <!-- start h requests  -->
  <section class="h-requests-sec-om">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <Link class="request-block-om link-om" :href="$route('book.consult')">
            <figure class="figure-om loading-omd">
              <img class="lazy-omd img-om" :data-src="`/assets/images/requests/stethoscope.png`" alt="..">
            </figure>
            <h3 class="head-om">{{ __('Medical consultation request') }}</h3>
          </Link>
        </div>
        <div class="col-lg-4">
          <Link class="request-block-om link-om" :href="$route('book.conversation')">
            <figure class="figure-om loading-omd">
              <img class="lazy-omd img-om" :data-src="`/assets/images/requests/consulting.png`" alt="..">
            </figure>
            <h3 class="head-om">{{ __('Conversation with doctor request') }}</h3>
          </Link>
        </div>
        <div class="col-lg-4">
          <a class="request-block-om link-om" :href="$route('book.service')">
            <figure class="figure-om loading-omd">
              <img class="lazy-omd img-om" :data-src="`/assets/images/requests/love.png`" alt="..">
            </figure>
            <h3 class="head-om">{{ __('Medical service request') }}</h3>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end requests  -->

  <!-- start specialization  -->
  <section class="h-specialization-sec-om">
    <div class="container">
      <div class="main-heading-sec-om text-center">
        <h4 class="first-head-om">{{ __('Choose a specialty') }}</h4>
        <h2 class="second-head-om">{{ __('Medical Specializations') }} </h2>
        <p class="parg-om">
          {{ __('We have brought together the best doctors in healthcare to provide you with a world class medical service') }}
        </p>
      </div>
      <div class="sp-row-om">

        <div class="col-om" v-for="specialty in specializations" :key="specialty.id">
          <Link class="specialization-block-om link-om" :href="`/specialty/${specialty.id}`">
            <figure class="figure-om loading-omd">
              <img class="lazy-omd img-om" :data-src="specialty.image_path" alt="..">
            </figure>
            <h3 class="head-om">{{  specialty.name }}</h3>
          </Link>
        </div>

      </div>

      <Link class="main-read-more-sec-om fix-om" href="/specialty">{{ __('See More') }}</Link>
    </div>
  </section>
  <!-- end specialization  -->

  <!-- start h-about us section   -->
  <section class="h-about-us-sec-om">
    <!-- <div class="container"> -->
    <div class="h-about-us-wraper-om">
      <div class="h-about-content-om col-om">
        <h4 class="first-head-om fix-om">{{  __('About Us') }}</h4>
        <h2 class="second-head-om fix-om">
          {{ about.title }}
        </h2>
        <p class="parg-om fix-om">
          {{ about.details }}
        </p>

        <Link class="h-about-read-link-om fix-om" href="/about">{{ __('See More') }}</Link>
      </div>
      <div class="col-om">
        <a :href="about_video" data-fancybox="video" class="h-about-video-om video-block-om ">
          <figure class="video-block-image-om figure-om loading-omd asp-om">
            <img class="lazy-omd img-om" :data-src="about_image" alt="..">
          </figure>
        </a>
      </div>
    </div>
    <!-- </div> -->
  </section>
  <!-- end h-about us section   -->


  <!-- start doctors section -->
  <section class="h-doctors-section-om">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="heading-wraper-om">
            <div class="main-heading-sec-om ">
              <h4 class="first-head-om">{{__('Doctors')}}</h4>
              <h2 class="second-head-om">{{__('Distinct Doctors')}} </h2>
              <p class="parg-om">
                {{__('We have brought the best doctors in healthcare to provide you')}}
              </p>
            </div>
            <Link class="main-read-more-sec-om fix-om only-in-larg" href="/doctors">{{ __('See More') }}</Link>
          </div>
        </div>
        <div class="col-lg-8">
          <!-- doctors slider  -->
          <div class="doctors-slider-om">
            <div class="swiper-container">
              <div class="swiper-wrapper">

                <div class="swiper-slide" v-for="doctor in distinct_doctors" :key="doctor.id">
                  <Link class="doctor-block-om link-om" :href="`/doctor/${doctor.id}`">
                    <figure class="figure-om loading-omd asp-om">
                      <img class="lazy-omd img-om" :data-src="doctor.user.image_path"
                           alt="..">
                    </figure>
                    <h3 class="head-om fix-om">{{ doctor.user.name }}</h3>
                    <p class="desc-om fix-om"> {{ doctor.job }}</p>
                  </Link>
                </div>

              </div>

              <div class="swiper-pagination"></div>

            </div>
          </div>
        </div>
      </div>
      <!-- sm link only  -->
      <Link class="main-read-more-sec-om fix-om only-in-small" href="/doctors">{{ __('See More') }}</Link>
    </div>
  </section>
  <!-- end doctors section -->

  <!-- start h-store-section-om  -->
  <section class="h-store-section-om">
    <div class="container">
      <div class="main-heading-sec-om text-center">
        <h4 class="first-head-om">{{ __('Products') }}</h4>
        <h2 class="second-head-om">{{ __('E-commerce') }} </h2>
        <p class="parg-om">
          {{ __('You can order your medicines and any tools for any specialty') }}
        </p>
      </div>
      <div class="h-store-wraper-om">
        <div class="col-om">
          <Link class="h-store-block-img-om fix-om" href="/store">
            <figure class="figure-om loading-omd"
                    :style="`background-image: url('/assets/images/myriam-zilles-KltoLK6Mk-g-unsplash.jpg');`">
              <img class="lazy-omd img-om" :data-src="`/assets/images/home_store_section/pharmacy@3x.png`"
                   alt="..">
            </figure>
          </Link>
        </div>
        <div class="col-om">
          <Link class="h-store-block-img-om fix-om" href="/store">
            <figure class="figure-om loading-omd"
                    :style="`background-image: url('/assets/images/nrd-aMmDIsdnUro-unsplash.jpg');`">
              <img class="lazy-omd img-om" data-src="assets/images/home_store_section/eye.png" alt="..">
            </figure>
          </Link>
        </div>
      </div>
    </div>
  </section>
  <!-- end h-store-section-om  -->

  <!-- start events  -->
  <section class="h-events-om">
    <div class="container">
      <div class="heading-wraper-om">
        <div class="main-heading-sec-om ">
          <h4 class="first-head-om">{{ __('We keep you healthy') }}</h4>
          <h2 class="second-head-om">{{ __('News & Events') }} </h2>
        </div>
        <Link class="main-read-more-sec-om fix-om only-in-larg" href="/news">{{ __('See More') }}</Link>
      </div>
      <div class="row">


        <div class="col-lg-4" v-for="single_news in news" :key="single_news.id">
          <Link class="event-block-om fix-om" :href="`/news/${single_news.id}`">
            <div class="img-wraper-om">
              <figure class="img-block-om figure-om loading-omd asp-om">
                <img class="lazy-omd img-om" :data-src="single_news.image_path" alt="..">
              </figure>
              <span class="read-more-om fix-om">{{ __('See More') }}</span>
            </div>
            <div class="date-om fix-om">
              <figure class="calender-om figure-om">
                <svg xmlns="http://www.w3.org/2000/svg" width="18.6" height="21.3"
                     viewBox="0 0 30.023 34.312">
                  <path id="Icon_awesome-calendar-alt" data-name="Icon awesome-calendar-alt"
                        d="M0,31.095a3.218,3.218,0,0,0,3.217,3.217H26.806a3.218,3.218,0,0,0,3.217-3.217V12.867H0ZM21.445,17.96a.807.807,0,0,1,.8-.8H24.93a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H22.249a.807.807,0,0,1-.8-.8Zm0,8.578a.807.807,0,0,1,.8-.8H24.93a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H22.249a.807.807,0,0,1-.8-.8ZM12.867,17.96a.807.807,0,0,1,.8-.8h2.681a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H13.671a.807.807,0,0,1-.8-.8Zm0,8.578a.807.807,0,0,1,.8-.8h2.681a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H13.671a.807.807,0,0,1-.8-.8ZM4.289,17.96a.807.807,0,0,1,.8-.8H7.774a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H5.093a.807.807,0,0,1-.8-.8Zm0,8.578a.807.807,0,0,1,.8-.8H7.774a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H5.093a.807.807,0,0,1-.8-.8ZM26.806,4.289H23.589V1.072A1.075,1.075,0,0,0,22.517,0H20.373A1.075,1.075,0,0,0,19.3,1.072V4.289H10.722V1.072A1.075,1.075,0,0,0,9.65,0H7.506A1.075,1.075,0,0,0,6.433,1.072V4.289H3.217A3.218,3.218,0,0,0,0,7.506v3.217H30.023V7.506A3.218,3.218,0,0,0,26.806,4.289Z"
                        fill="currentColor" />
                </svg>
              </figure>
              <span class="day-om fix-om">{{ single_news.date }}</span>
<!--              <span class="month-om fix-om">7 مارس</span>-->
            </div>
            <h3 class="head-om fix-om">{{ single_news.title }}</h3>
            <p class="parg-om fix-om">
              {{ single_news.details.substr(0, 100)}} ...
            </p>
          </Link>
        </div>

      </div>

      <!-- sm link only  -->
      <Link class="main-read-more-sec-om fix-om only-in-small" href="/news">{{ __('See More') }}</Link>
    </div>
  </section>
  <!--end  events  -->

  <!-- start h-banners-om  -->
  <section class="h-banners-om">
    <div class="container">
      <div class="banners-slider-om">
        <div class="swiper-container">
          <div class="swiper-wrapper">

            <div class="swiper-slide" v-for="offer in offers" :key="offer.id">
              <a class="banner-block-om fix-om" :href="offer.url" target="_blank">
                <figure class="figure-om loading-omd asp-om">
                  <img class="lazy-omd img-om" :data-src="offer.image_path" alt="..">
                </figure>
              </a>
            </div>

          </div>

          <div class="swiper-pagination"></div>

        </div>
      </div>
    </div>
  </section>
  <!-- end h-banners-om  -->
</div>
</template>

<script>
import Layout from "../Shared/Layout";
import {Head, Link} from "@inertiajs/inertia-vue";

export default {
  name: "index",
  layout: Layout,
  components: {Head, Link},
  props: {
    sliders: Array,
    specializations: Array,
    about: Object,
    distinct_doctors: Array,
    news: Array,
    offers: Array,
    about_video: String,
    about_image: String,
  },
  mounted() {
    if (this.$page.props.flash.success) {
      this.$toasted.success(this.$page.props.flash.success, {icon: 'fa-check'})
    }
  }
}
</script>

<style scoped>

</style>