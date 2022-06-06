<template>
<div>

  <Head :title="__('Doctors')" />
  <section class="breatcramp-om">
    <div class="container">
      <h1 class="breatcramp-title-om fix-om">{{ __('Doctors') }} </h1>
      <ul class="breatcramp-list-om list-unstyled fix-om">
        <li class="li-om fix-om"><a href="#!" class="link-om fix-om">{{ __('Main') }}</a></li>
        <li class="li-om fix-om"><span class="link-om fix-om current">{{ __('Doctors') }}</span>
        </li>
      </ul>
    </div>
  </section>


  <main class="main-archive-doctors-om main_grey_background_om">
    <div class="container">

      <!-- start fliter  -->
      <section class="doctors-filter-om">
        <div class="row">
          <div class="col-md-6">
            <div class="filter-block-om search-block-om">
              <h4 class="head-om fix-om">{{ __('Search') }}</h4>
              <div class="input-group-om">
                <input class="input-om" type="text" v-model="word" @change="filter" :placeholder="__('Search for doctor')">
                <button class="butt-om fix-om" >
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
            <div class="row">
              <div class="col-md-6">
                <div class="filter-block-om">
                  <h4 class="head-om fix-om">{{ __('Select Branch') }} </h4>
                  <div class="input-group-om">
                    <select class="input-om select-om" v-model="branch" @change="filter">
                      <option selected disabled>{{ __('Branch') }}</option>
                      <option v-for="s_branch in branches" :value="s_branch.id">{{ s_branch.name }}</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="filter-block-om">
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
          </div>
        </div>

      </section>
      <!-- end fliter  -->

      <!-- start doctors-content  -->
      <section class="arch-doctors-content-om">
        <div class="row-om">

          <div class="col-om" v-for="item in items.data" :key="item.id">
            <a class="doctor-block-om link-om" :href="`/doctor/${item.id}`">
              <figure class="figure-om loading-omd asp-om">
                <img class="lazy-omd img-om" :data-src="item.user.image_path" alt="..">
              </figure>
              <h3 class="head-om fix-om">{{ item.user.name }}</h3>
              <p class="desc-om fix-om"> {{ item.job }}</p>
            </a>
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
import {Link, Head} from "@inertiajs/inertia-vue";

export default {
  name: "Index",
  layout: Layout,
  components: {Pagination, Link, Head},
  data() {
    return {
      word: this.filters.word || '',
      branch: this.filters.branch || '',
      specialty: this.filters.specialty || '',
    }
  },
  props: {
    items: Object,
    branches: Array,
    specializations: Array,
    filters: Object
  },
  methods : {
    filter() {
      this.$inertia.get('/doctors', this.$data)
      $(this.$el).find('.selectpicker').selectpicker('refresh');
    }
  },


}
</script>

<style scoped>

</style>