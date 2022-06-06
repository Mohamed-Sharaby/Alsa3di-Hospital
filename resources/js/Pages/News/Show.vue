<template>
  <div>

    <Head :title="item.title" />

    <section class="breatcramp-om">
      <div class="container">
        <h1 class="breatcramp-title-om fix-om">{{item.title}} </h1>
        <ul class="breatcramp-list-om list-unstyled fix-om">
          <li class="li-om fix-om"><Link href="/" class="link-om fix-om">{{ __('Main') }}</Link></li>
          <li class="li-om fix-om"><Link href="/news" class="link-om fix-om">{{ __('News & Events') }}</Link></li>
        </ul>
      </div>
    </section>


    <main class="main-single-event-om main_grey_background_om main-page-default-back-g-om">

      <!-- main content  -->
      <section class="single-event-section-om">
        <div class="container">

          <div class="single-event-content-om single-page-wrapper-om">
            <!-- start single img  -->
            <a class="single-img-link-block-om" data-fancybox="gallery"
               :href="item.image_path">
              <figure class="single-img-block-om figure-om loading-omd asp-om">
                <img class="lazy-omd img-om" :data-src="item.image_path"
                     alt=".." />
              </figure>
            </a>
            <!-- end single img  -->
            <div class="details-wrapper-om">

              <h2 class="single-page-head-om">{{  item.title }}</h2>


              <div class="date-views-om">
                <div class="block-om">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" id="wall-clock" width="21.37" height="21.37" viewBox="0 0 21.37 21.37">
                      <defs>

                      </defs>
                      <path id="Path_565" d="M10.685 0A10.685 10.685 0 1 0 21.37 10.685 10.7 10.7 0 0 0 10.685 0zm0 20.034a9.349 9.349 0 1 1 9.349-9.349 9.36 9.36 0 0 1-9.349 9.349z"
                            class="cls-1" />
                      <path id="Path_566" d="M209.13 83.118h-1.336v6.955l4.2 4.2.944-.944-3.808-3.809z" class="cls-1"
                            transform="translate(-197.777 -77.748)" />
                    </svg>


                  </figure>
                  <span class="text-om">{{ item.since_date }}</span>
                </div>
                <div class="block-om">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="33.51" height="21.5" viewBox="0 0 33.51 21.5">
                      <defs>

                      </defs>
                      <g id="interface_3_" transform="translate(0.281 0.25)">
                        <g id="Group_409" transform="translate(0 0)">
                          <g id="Group_408" transform="translate(0)">
                            <path id="Path_569" d="M32.739 102.694c-.294-.4-7.308-9.859-16.265-9.859S.5 102.291.209 102.694a1.087 1.087 0 0 0 0 1.282c.294.4 7.308 9.859 16.265 9.859s15.971-9.457 16.265-9.859a1.086 1.086 0 0 0 0-1.282zm-16.265 8.968c-6.6 0-12.313-6.276-14-8.328 1.689-2.054 7.392-8.327 14-8.327s12.312 6.275 14 8.328c-1.685 2.054-7.388 8.328-14 8.328z"
                                  class="clock-om" transform="translate(0 -92.835)" />
                          </g>
                        </g>
                        <g id="Group_411" transform="translate(9.957 3.983)">
                          <g id="Group_410" transform="translate(0 0)">
                            <path id="Path_570" d="M161.239 154.725a6.517 6.517 0 1 0 6.517 6.517 6.525 6.525 0 0 0-6.517-6.517zm0 10.862a4.345 4.345 0 1 1 4.345-4.345 4.35 4.35 0 0 1-4.345 4.345z"
                                  class="clock-om" transform="translate(-154.722 -154.725)" />
                          </g>
                        </g>
                      </g>
                    </svg>

                  </figure>
                  <span class="text-om">{{ item.views.length }}</span>
                </div>
              </div>


              <div class="single-page-content-om content-change-font-om">
                <p class="single-page-parg-om" v-html="item.details">
                </p>


                <div class="share-via-sec-om">
                  <span class="share-via-text-om fix-om">{{ __('Share With') }}</span>
                  <ul class="share-via-list-om fix-om">
                    <li>
                      <a class="link-om fix-om" :href="`https://www.facebook.com/sharer.php?u=${$route('news.show', item.id)}`" target="_blank">
                        <figure class="figure-om loading-omd">
                          <img class="lazy-omd img-om"
                               data-src="/assets/images/event_social/event-facebook.svg" alt=".." />
                        </figure>
                      </a>
                    </li>


                    <li>
                      <a class="link-om fix-om" :href="`https://twitter.com/intent/tweet?url=${$route('news.show', item.id)}&text=${item.title}`">
                        <figure class="figure-om loading-omd">
                          <img class="lazy-omd img-om"
                               data-src="/assets/images/event_social/eventtwitter.svg" alt=".." />
                        </figure>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
      <!-- end main content -->

      <!-- slider  -->
      <section class="important-enents-section-om">
        <div class="container">
          <h2 class="single-page-head-om">{{__('News may interest')}}</h2>

          <div class="row">

            <div class="col-lg-4" v-for="single_news in similar_news" :key="single_news.id">
              <Link class="event-block-om fix-om" :href="`/news/${single_news.id}`">
                <div class="img-wraper-om">
                  <figure class="img-block-om figure-om loading-omd asp-om">
                    <img class="lazy-omd img-om" :data-src="single_news.image_path" alt="..">
                  </figure>
                  <span class="read-more-om fix-om">{{ __('See More') }}</span>
                </div>
                <div class="date-om fix-om">
                  <figure class="calender-om figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18.6" height="21.3" viewBox="0 0 30.023 34.312">
                      <path id="Icon_awesome-calendar-alt" data-name="Icon awesome-calendar-alt"
                            d="M0,31.095a3.218,3.218,0,0,0,3.217,3.217H26.806a3.218,3.218,0,0,0,3.217-3.217V12.867H0ZM21.445,17.96a.807.807,0,0,1,.8-.8H24.93a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H22.249a.807.807,0,0,1-.8-.8Zm0,8.578a.807.807,0,0,1,.8-.8H24.93a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H22.249a.807.807,0,0,1-.8-.8ZM12.867,17.96a.807.807,0,0,1,.8-.8h2.681a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H13.671a.807.807,0,0,1-.8-.8Zm0,8.578a.807.807,0,0,1,.8-.8h2.681a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H13.671a.807.807,0,0,1-.8-.8ZM4.289,17.96a.807.807,0,0,1,.8-.8H7.774a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H5.093a.807.807,0,0,1-.8-.8Zm0,8.578a.807.807,0,0,1,.8-.8H7.774a.807.807,0,0,1,.8.8v2.681a.807.807,0,0,1-.8.8H5.093a.807.807,0,0,1-.8-.8ZM26.806,4.289H23.589V1.072A1.075,1.075,0,0,0,22.517,0H20.373A1.075,1.075,0,0,0,19.3,1.072V4.289H10.722V1.072A1.075,1.075,0,0,0,9.65,0H7.506A1.075,1.075,0,0,0,6.433,1.072V4.289H3.217A3.218,3.218,0,0,0,0,7.506v3.217H30.023V7.506A3.218,3.218,0,0,0,26.806,4.289Z"
                            fill="currentColor" />
                    </svg>
                  </figure>
                  <span class="day-om fix-om">{{ single_news.date }}</span>
                  <!--              <span class="month-om fix-om">7 مارس</span>-->
                </div>
                <h3 class="head-om fix-om">{{ single_news.title }}</h3>
                <p class="parg-om fix-om" v-html="single_news.details.substr(0, 100)">
                </p>
              </Link>
            </div>


          </div>

        </div>
      </section>
    </main>

  </div>
</template>

<script>
import Layout from "../../Shared/Layout";
import {Link, Head} from "@inertiajs/inertia-vue";

export default {
  name: "Show",
  layout: Layout,
  props: {
    item: Object,
    similar_news: Array
  },
  components: {Link, Head},
}
</script>

<style scoped>
.cls-1 {
  fill: currentColor
}
.clock-om {
  fill: currentColor;
  stroke: #fff;
  stroke-width: .5px
}
</style>