<template>
<div>

  <Head :title="title" />
  <section class="breatcramp-om">
    <div class="container">
      <h1 class="breatcramp-title-om fix-om">{{ title }} </h1>
      <ul class="breatcramp-list-om list-unstyled fix-om">
        <li class="li-om fix-om"><Link href="/" class="link-om fix-om">{{ __('Main') }}</Link></li>
        <li class="li-om fix-om"><span class="link-om fix-om current">{{ title }}</span></li>
      </ul>
    </div>
  </section>

</div>
</template>

<script>
import {Link, Head} from "@inertiajs/inertia-vue";

export default {
  name: "HeadInfo",
  props: {
    title: String
  },
  components: {
    Head, Link
  }
}
</script>

<style scoped>

</style>