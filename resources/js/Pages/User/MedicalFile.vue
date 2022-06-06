<template>

  <div>

    <head-info :title="__('Medical file')" />

    <main
        class="main-my-account-page-om main-my-reservations-page-om main_grey_background_om main-page-default-back-g-om">
      <div class="container">
        <div class="row">

          <nav-bar current="medical_file" />

          <div class="col-lg-9">
            <div class="my-account-information-sec-om my-reservations-om single-page-wrapper-om">
              <div class="my-reservations-table-wrapper-om">
                <div class="my-reservations-table-om">
                  <div class="table-block-om table-heading-om">
                    <div class="table-row-om">
                      <div class="col-om">
                        <h2 class="parg-om fix-om">{{ __('Doctor Name') }}</h2>
                      </div>
                      <div class="col-om">
                        <h2 class="parg-om fix-om">{{ __('Specialization') }}</h2>
                      </div>
                      <div class="col-om">
                        <h2 class="parg-om fix-om">{{ __('Appointment') }}</h2>
                      </div>
                      <div class="col-om">
                        <h2 class="parg-om fix-om">{{ __('File') }}</h2>
                      </div>
                    </div>
                  </div>

                  <div class="table-block-om " v-for="item in items.data" :key="item.id">
                    <div class="table-row-om">
                      <div class="col-om">
                        <p class="parg-om fix-om">{{ item.doctor.user.name }}</p>
                      </div>
                      <div class="col-om">
                        <p class="parg-om fix-om">{{ item.specialization.name || '' }}</p>
                      </div>
                      <div class="col-om">
                        <p class="parg-om fix-om">{{ appointment(item.date) }} </p>
                      </div>
                      <div class="col-om">
                        <a v-for="attach in item.files" :href="attach.file_path" target="_blank"><p class="parg-om hold-om fix-om">{{__('Show')}}</p></a>
                      </div>
                    </div>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- start pagenation  -->
    <pagination class="pagenation-om list-unstyled" :links="items.links" />
    <!-- end pagenation -->

  </div>

</template>

<script>
import Layout from "../../Shared/Layout";
import HeadInfo from "../../Shared/HeadInfo";
import NavBar from "./NavBar";
import Pagination from "../../Shared/Pagination";
import {Link} from "@inertiajs/inertia-vue";

export default {
  name: "MedicalFile",
  layout: Layout,
  components: {HeadInfo, NavBar, Pagination, Link},
  props: {
    items: Object
  },
  methods: {
    appointment(date) {
      var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      var today  = new Date(date);
      return today.toLocaleDateString("ar-EG", options);
    }
  }
}
</script>

<style scoped>

</style>