<template>

  <div class="col-lg-3">
    <div class="my-account-list-om">
      <Link :class="`link-om fix-om ${current == 'profile' ? 'active' : ''}`" :href="$route('user.profile')">{{ __('Personal Data') }}</Link>
      <Link :class="`link-om fix-om ${current == 'reservations' ? 'active' : ''}`" :href="$route('user.reservations')">{{ __('My Reservations') }}</Link>
      <Link :class="`link-om fix-om ${current == 'orders' ? 'active' : ''}`" :href="$route('user.orders')">{{ __('My Orders') }}</Link>
      <Link :class="`link-om fix-om ${current == 'medical_file' ? 'active' : ''}`" :href="$route('user.medical_file')">{{ __('Medical file') }}</Link>
      <Link :class="`link-om fix-om ${current == 'password' ? 'active' : ''}`" :href="$route('user.password')">{{ __('Change Password') }}</Link>
      <Link class="link-om signout-link fix-om" href="/logout" method="post">{{ __('Logout') }}</Link>
    </div>
  </div>

</template>

<script>
import {Link} from "@inertiajs/inertia-vue";

export default {
  name: "NavBar",
  props: ['current'],
  components: {Link}
}
</script>

<style scoped>

</style>