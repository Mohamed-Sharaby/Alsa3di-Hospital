<template>
<div>
  <Head :title="__('Medical Specializations')" />
  <section class="breatcramp-om">
    <div class="container">
      <h1 class="breatcramp-title-om fix-om"> {{ __('Medical Specializations') }} </h1>
      <ul class="breatcramp-list-om list-unstyled fix-om">
        <li class="li-om fix-om"><Link href="/" class="link-om fix-om"> {{ __('Main') }}</Link></li>
        <li class="li-om fix-om"><span class="link-om fix-om current"> {{ __('Medical Specializations') }}</span></li>
      </ul>
    </div>
  </section>


  <main class="main-medical-specialties-page-om main_grey_background_om">
    <div class="container">
      <div class="row-om">


        <div class="col-om" v-for="item in items" :key="item.id">
          <Link class="specialization-block-om link-om" :href="`/specialty/${item.id}`">
            <figure class="figure-om loading-omd">
              <img class="lazy-omd img-om" :data-src="item.image" alt="..">
            </figure>
            <h3 class="head-om">{{ item.name }}</h3>
          </Link>
        </div>


      </div>


    </div>
  </main>


</div>
</template>

<script>
import Layout from "../../Shared/Layout";
import {Head, Link} from "@inertiajs/inertia-vue";

export default {
  name: "Index",
  props: {
    items: Array
  },
  layout: Layout,
  components: {Head, Link}
}
</script>

<style scoped>

</style>