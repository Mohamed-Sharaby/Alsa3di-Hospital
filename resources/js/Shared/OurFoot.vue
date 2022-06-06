<template>
<div>
  <footer class="footer-om">
    <div class="footer-content-om">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="footer-block">
              <figure class="footer-logo figure-om">
                <img class="img-om" :src="`/assets/images/logo.png`" alt="..">
              </figure>

              <p class="footer-parg-om">
                {{ settings.brief }}
              </p>


              <div class="social-om footer-social-om">
                <a class="link-om" :href="settings.facebook" target="_blank">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15.869" height="15.869"
                         viewBox="0 0 15.869 15.869">
                      <path fill="currentColor"
                            d="M14.169 2.25H1.7A1.7 1.7 0 0 0 0 3.95v12.469a1.7 1.7 0 0 0 1.7 1.7h4.862v-5.4H4.33v-2.535h2.232V8.249A3.1 3.1 0 0 1 9.88 4.832 13.52 13.52 0 0 1 11.847 5v2.164h-1.108a1.27 1.27 0 0 0-1.432 1.372v1.649h2.436l-.39 2.539H9.307v5.4h4.862a1.7 1.7 0 0 0 1.7-1.7V3.95a1.7 1.7 0 0 0-1.7-1.7z"
                            transform="translate(0 -2.25)" />
                    </svg>
                  </figure>
                </a>
                <a class="link-om" :href="settings.twitter" target="_blank">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17.426" height="14.153"
                         viewBox="0 0 17.426 14.153">
                      <path fill="currentColor"
                            d="M15.635 6.908c.011.155.011.31.011.464A10.092 10.092 0 0 1 5.484 17.533 10.093 10.093 0 0 1 0 15.93a7.388 7.388 0 0 0 .862.044A7.153 7.153 0 0 0 5.3 14.449a3.578 3.578 0 0 1-3.339-2.477 4.5 4.5 0 0 0 .675.055 3.777 3.777 0 0 0 .94-.122A3.572 3.572 0 0 1 .708 8.4v-.044a3.6 3.6 0 0 0 1.614.453 3.577 3.577 0 0 1-1.106-4.776A10.152 10.152 0 0 0 8.58 7.77a4.032 4.032 0 0 1-.088-.818 3.575 3.575 0 0 1 6.181-2.444 7.032 7.032 0 0 0 2.267-.862 3.562 3.562 0 0 1-1.57 1.968 7.16 7.16 0 0 0 2.057-.553 7.677 7.677 0 0 1-1.791 1.846z"
                            transform="translate(0 -3.381)" />
                    </svg>
                  </figure>
                </a>
                <a class="link-om" :href="settings.youtube" target="_blank">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17.699" height="13.276"
                         viewBox="0 0 17.699 13.276">
                      <path fill="currentColor"
                            d="M17.583 7.432a2.687 2.687 0 0 0-2.558-2.807c-1.915-.09-3.869-.125-5.863-.125h-.623c-1.991 0-3.948.035-5.864.124A2.693 2.693 0 0 0 .121 7.439C.034 8.669 0 9.9 0 11.131s.035 2.462.118 3.7a2.7 2.7 0 0 0 2.555 2.818c2.012.093 4.076.135 6.175.131s4.159-.035 6.175-.131a2.7 2.7 0 0 0 2.558-2.818c.083-1.234.121-2.465.118-3.7s-.033-2.465-.116-3.699zm-10.427 7.09V7.729l5.013 3.395z"
                            transform="translate(0 -4.5)" />
                    </svg>

                  </figure>
                </a>
                <a class="link-om" :href="settings.instagram" target="_blank">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15.955" height="15.951"
                         viewBox="0 0 15.955 15.951">
                      <path fill="currentColor"
                            d="M7.974 6.123a4.09 4.09 0 1 0 4.09 4.09 4.083 4.083 0 0 0-4.09-4.09zm0 6.748a2.659 2.659 0 1 1 2.659-2.659 2.664 2.664 0 0 1-2.659 2.659zm5.211-6.916A.954.954 0 1 1 12.231 5a.952.952 0 0 1 .954.956zm2.709.968A4.72 4.72 0 0 0 14.6 3.582a4.752 4.752 0 0 0-3.342-1.288c-1.317-.075-5.264-.075-6.581 0a4.745 4.745 0 0 0-3.338 1.285A4.736 4.736 0 0 0 .051 6.921c-.075 1.317-.075 5.264 0 6.581a4.72 4.72 0 0 0 1.288 3.342 4.758 4.758 0 0 0 3.342 1.288c1.317.075 5.264.075 6.581 0a4.721 4.721 0 0 0 3.338-1.288 4.751 4.751 0 0 0 1.293-3.344c.075-1.317.075-5.261 0-6.577zm-1.7 7.99a2.692 2.692 0 0 1-1.516 1.516c-1.05.416-3.542.32-4.7.32s-3.655.093-4.7-.32a2.692 2.692 0 0 1-1.516-1.516c-.416-1.05-.32-3.541-.32-4.7s-.093-3.655.32-4.7A2.692 2.692 0 0 1 3.272 4c1.05-.416 3.542-.32 4.7-.32s3.655-.093 4.7.32a2.692 2.692 0 0 1 1.516 1.516c.416 1.05.32 3.541.32 4.7s.1 3.652-.316 4.699z"
                            transform="translate(.005 -2.238)" />
                    </svg>
                  </figure>
                </a>
                <a class="link-om" :href="settings.snapchat" target="_blank">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17.851" height="16.782"
                         viewBox="0 0 17.851 16.782">
                      <path fill="currentColor"
                            d="M17.81 14.234c-.182.424-.95.735-2.348.952a6.539 6.539 0 0 0-.227.835.4.4 0 0 1-.423.309H14.8c-.328 0-.669-.151-1.355-.151a2.759 2.759 0 0 0-1.961.718 3.927 3.927 0 0 1-2.581.955 4 4 0 0 1-2.539-.952 2.756 2.756 0 0 0-1.964-.72 13.168 13.168 0 0 0-1.355.165.414.414 0 0 1-.433-.315 6.458 6.458 0 0 0-.227-.841c-.721-.112-2.347-.4-2.388-1.121a.371.371 0 0 1 .309-.386 5.248 5.248 0 0 0 3.564-3l.008-.018a.792.792 0 0 0 .086-.654c-.176-.415-.937-.564-1.257-.69-.827-.327-.942-.7-.893-.959a.9.9 0 0 1 1.151-.539 2 2 0 0 0 .821.22.712.712 0 0 0 .347-.076c-.071-1.253-.248-3.043.2-4.043a4.75 4.75 0 0 1 4.41-2.845h.352a4.717 4.717 0 0 1 4.418 2.846c.445 1 .27 2.782.2 4.045a.683.683 0 0 0 .3.075 2.083 2.083 0 0 0 .769-.218.944.944 0 0 1 .714 0 .724.724 0 0 1 .543.623c.006.34-.3.633-.9.872-.074.029-.164.058-.259.088-.342.108-.858.272-1 .6a.792.792 0 0 0 .086.654l.008.018a5.247 5.247 0 0 0 3.564 3 .38.38 0 0 1 .272.553z"
                            transform="translate(0 -1.078)" />
                    </svg>
                  </figure>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="footer-block collapse-block-om">
              <h2 class="footer-head-om collapse-head-om">{{ __('Links') }}</h2>
              <ul class="footer-links-list list-unstyled list-collapse-om">
                <li class="li-om"><Link href="/" class="link-om">{{ __('Main') }}</Link></li>
                <li class="li-om"><Link href="/about" class="link-om">{{ __('About') }}</Link></li>
<!--                <li class="li-om"><a href="#!" class="link-om">{{ __('Branches') }}</a></li>-->
                <li class="li-om"><Link href="/specialty" class="link-om">{{ __('Specializations') }}</Link></li>
                <li class="li-om"><Link href="/doctors" class="link-om">{{ __('Doctors') }}</Link></li>
                <li class="li-om"><a href="store.html" class="link-om">{{ __('E-commerce') }}</a></li>
                <li class="li-om"><a href="archive-events.html" class="link-om">{{ __('News & Events') }}</a></li>
                <li class="li-om"><Link href="/contact-us" class="link-om">{{ __('Contact Us') }}</Link></li>
                <li class="li-om"><Link href="/pages/terms" class="link-om">{{ __('Usage') }}</Link></li>
                <li class="li-om"><Link href="/pages/privacy" class="link-om">{{ __('Privacy') }}</Link></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4">

            <div class="footer-block">
              <h2 class="footer-head-om">{{ __('Download Application') }}</h2>
              <div class="footer-download-app-om">
                <a class="download-block link-om" :href="settings.google_play" target="_blank">
                  <figure class="figure-om loading-omd ">
                    <img class="lazy-omd img-om" data-src="/assets/images/download_1.png" alt="..">
                  </figure>
                </a>
                <a class="download-block link-om" :href="settings.app_store" target="_blank">
                  <figure class="figure-om loading-omd ">
                    <img class="lazy-omd img-om" data-src="/assets/images/download_2.png" alt="..">
                  </figure>
                </a>
              </div>

              <h2 class="footer-head-om">{{__('Subscribe to the Email Newsletter')}}</h2>
              <div class="footer-newsletter-om">
                <form @submit.prevent="subscribe">
                  <input class="newsletter-input-om" type="email" v-model="subscribe_email"
                         :placeholder="__('Enter Email')">
                  <span class="error" v-if="error.length > 0">{{ error }}</span>
                  <button class="newsletter-submit-om butt-om">{{ __('Subscribe') }}</button>
                </form>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
    <div class="copyright-om">
      <div class="container">
        <p class="copyright-parg-om">
          {{ __('All copyrights reserved to Al-saedi group 2021') }}
        </p>
      </div>
    </div>
  </footer>

  <auth />

</div>
</template>

<script>



import {Link} from "@inertiajs/inertia-vue";
import Auth from "../Pages/Auth/Index";

export default {
name: "OurFoot",
  components : {
    Link, Auth
  },
  props: {
    settings: Object,
  },
  data() {
    return {
      subscribe_email: '',
      error: ''
    }
  },
  methods: {
    subscribe() {
      axios.post('/subscribe-newsletter', this.$data).then(response => {
        if (response.data.status) {
          this.$toasted.success(response.data.data, {icon: 'fa-check'})
          this.subscribe_email = '';
          this.error = '';
        } else {
          this.error = response.data.data;
        }
      }).catch(error => console.log('error', error))
    }
  }
}
</script>

<style scoped>

</style>