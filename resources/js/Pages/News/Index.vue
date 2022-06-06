<template>
<div>

  <head-info :title="__('News & Events')" />


  <main class="main-archive-events-om main_grey_background_om main-page-default-back-g-om">
    <div class="container">

      <!-- start fliter  -->
      <section class="events-filter-om doctors-filter-om">
        <div class="row">
          <div class="col-md-6">
            <div class="filter-block-om search-block-om">
              <h4 class="head-om fix-om">{{ __('Search') }}</h4>
              <div class="input-group-om">
                <input class="input-om" type="text" v-model="word" :placeholder="__('Search')" @change="filter">
                <button class="butt-om fix-om">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16.891" height="16.891"
                         viewBox="0 0 16.891 16.891">
                      <g>
                        <g opacity="0.8">
                          <g>
                            <path fill="currentColor"
                                  d="M16.685 15.693l-4.8-4.8a6.7 6.7 0 1 0-1 1l4.8 4.8a.7.7 0 1 0 1-1zm-10-3.725a5.278 5.278 0 1 1 5.278-5.278 5.284 5.284 0 0 1-5.277 5.277z"
                                  transform="translate(0 -0.5) translate(0 0.5) translate(0 -0.003)" />
                          </g>
                        </g>
                      </g>
                    </svg>

                  </figure>
                </button>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="filter-block-om adjust-width-om">
              <h4 class="head-om fix-om">{{ __('Specialty') }}</h4>
              <div class="input-group-om">
                <select class="input-om select-om" v-model="specialty" @change="filter">
                  <option selected disabled>{{ __('All') }}</option>
                  <option v-for="specialization in specializations" :value="specialization.id">{{ specialization.name }}</option>
                </select>
              </div>
            </div>
          </div>

        </div>

      </section>
      <!-- end fliter  -->

      <!-- start doctors-content  -->
      <section class="arch-events-content-om">
        <div class="row">

          <div class="col-lg-4" v-for="single_news in items.data" :key="single_news.id">
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
              <p class="parg-om fix-om" v-html="single_news.details.substr(0, 100)">
              </p>
            </Link>
          </div>

        </div>


        <!-- start pagenation  -->
        <pagination class="pagenation-om list-unstyled" :links="items.links" />
        <!-- end pagenation -->

      </section>
      <!-- end doctors-content  -->

    </div>
  </main>

</div>
</template>

<script>
import Layout from "../../Shared/Layout";
import Pagination from "../../Shared/Pagination";
import {Head, Link} from "@inertiajs/inertia-vue";
import HeadInfo from "../../Shared/HeadInfo";

export default {
  name: "Index",
  layout: Layout,
  components: {Pagination, Link, Head, HeadInfo},
  data() {
    return {
      word: this.filters.word || '',
      specialty: this.filters.specialty || '',
    }
  },
  props: {
    items: Object,
    specializations: Array,
    filters: Object
  },
  methods : {
    filter() {
      this.$inertia.get('/news', this.$data)
      $('.selectpicker').selectpicker('refresh');
    }
  },
}
</script>

<style scoped>

</style>