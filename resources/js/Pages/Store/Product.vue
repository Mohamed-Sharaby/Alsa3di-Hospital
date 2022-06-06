<template>
<div>

  <head-info :title="item.name" />

  <main class="main-single-product-om main_grey_background_om main-page-default-back-g-om">

    <div class="container">
      <div class="row">

        <div class="col-lg-12">
          <div class="single-product-content-om single-page-wrapper-om">
            <!-- product description  -->
            <div class="product-description-om ">
              <div class="row-om">
                <div class="col-om-1 col-om">
                  <!-- single product slider -->
                  <div class="single-product-slider-om">

                    <div class="s-product-slider-1">
                      <div class="swiper-container">
                        <div class="swiper-wrapper">

                          <div class="swiper-slide">
                            <a class="slider-block-om" data-fancybox="gallery"
                               :href="item.image_path">
                              <figure class="figure-om loading-omd asp-om">
                                <img class="lazy-omd "
                                     :data-src="item.image_path"
                                     alt="..">
                              </figure>
                            </a>
                          </div>
                          <div class="swiper-slide" v-for="img in item.images">
                            <a class="slider-block-om" data-fancybox="gallery"
                               :href="img.file_path">
                              <figure class="figure-om loading-omd asp-om">
                                <img class="lazy-omd "
                                     :data-src="img.file_path"
                                     alt="..">
                              </figure>
                            </a>
                          </div>

                        </div>

                      </div>
                    </div>
                    <div class="s-product-slider-2">
                      <div thumbsSlider="" class="swiper-container">
                        <div class="swiper-wrapper">

                          <div class="swiper-slide">
                            <div class="slider-block-om">
                              <figure class="figure-om loading-omd asp-om">
                                <img class="lazy-omd "
                                     :data-src="item.image_path"
                                     alt="..">
                              </figure>
                            </div>
                          </div>

                          <div class="swiper-slide" v-for="img in item.images">
                            <div class="slider-block-om">
                              <figure class="figure-om loading-omd asp-om">
                                <img class="lazy-omd "
                                     :data-src="img.file_path"
                                     alt="..">
                              </figure>
                            </div>
                          </div>

                        </div>
                        <!-- <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div> -->
                      </div>

                    </div>

                  </div>
                </div>
                <div class="col-om-2 col-om">
                  <h2 class="product-head-om fix-om">{{ item.name }}</h2>
                  <div class="prices-om">
                                        <span class="price-om">
                                            <span class="num-om">{{ item.price }}</span>
                                            <span class="currency-om">{{__('SAR')}}</span>
                                        </span>
                    <span class="price-om del-om" v-if="item.price_before_discount">
                        <span class="num-om">{{ item.price_before_discount }} </span>
                        <span class="currency-om">{{__('SAR')}}</span>
                    </span>
                  </div>

                  <p class="single-page-parg-om  fix-om" v-html="item.details">
                  </p>

                  <div class="add-to-cart-quantity-section-om">

                    <div class="input-group-om quantity-om">
                      <label class="lable-om">{{__('Quantity')}}</label>
                      <input class="input-om" type="number" min="1" v-model="qty">
                    </div>

                    <Link class="add-to-cart-butt-om fix-om " as="button" method="post" :href="`/add-to-cart/${item.id}`" :data="{qty}" :disabled="choosen(item.id)">
                      <span class="text-om" v-if="choosen(item.id)">{{__('Added to Cart')}}</span>
                      <span class="text-om" v-else>{{__('Add to Cart')}}</span>
                      <figure class="figure-om">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16.741" height="16.048"
                             viewBox="0 0 16.741 16.048">

                          <g id="Icon_feather-shopping-cart"
                             transform="translate(-0.75 -0.75)">
                            <path id="Path_580"
                                  d="M13.386 30.693a.693.693 0 1 1-.693-.693.693.693 0 0 1 .693.693z"
                                  class="add-to-cart-om"
                                  transform="translate(-5.651 -15.338)" />
                            <path id="Path_581"
                                  d="M29.886 30.693a.693.693 0 1 1-.693-.693.693.693 0 0 1 .693.693z"
                                  class="add-to-cart-om"
                                  transform="translate(-14.53 -15.338)" />
                            <path id="Path_582"
                                  d="M1.5 1.5h2.771l1.857 9.276a1.386 1.386 0 0 0 1.386 1.115h6.734a1.386 1.386 0 0 0 1.386-1.115l1.108-5.812H4.964"
                                  class="add-to-cart-om" />
                          </g>
                        </svg>

                      </figure>
                    </Link>
                  </div>
                </div>
              </div>
            </div>

            <!-- single-product-tabs-om  -->
            <div class="single-product-tabs-om ">
              <ul class=" nav nav-tabs fix-om" id="singleProductTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link fix-om active" id="product-overview-tab" data-toggle="tab"
                     href="#product-overview" role="tab" aria-controls="product-overview"
                     aria-selected="true">{{__('Overview')}}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fix-om" id="product-specifications-tab" data-toggle="tab"
                     href="#product-specifications" role="tab" aria-controls="product-specifications"
                     aria-selected="false">{{__('Descriptions')}}</a>
                </li>
              </ul>
              <div class="tab-content" id="singleProductTabContent">
                <!-- first tab  -->
                <div class="tab-pane product-overview-tab fade show active" id="product-overview"
                     role="tabpanel" aria-labelledby="product-overview-tab">

                  <p v-html="item.overview">
                  </p>
                </div>
                <!-- second tab  -->
                <div class="tab-pane fade" id="product-specifications" role="tabpanel"
                     aria-labelledby="product-specifications-tab">

                  <p v-html="item.description"></p>

                </div>

              </div>

            </div>

            <div class="related-products-sec-om products-content-sec-om">
              <h2 class="related-products-head-om fix-om">{{ __('Similar products') }}</h2>
              <div class="row-om">

                <div class="col-om" v-for="product in similar_products" :key="product.id">
                  <div >
                    <Link class="product-block-om fix-om" :href="$route('store.product', product.id)">
                      <figure class="product-img-block-om figure-om loading-omd asp-om">
                        <img class="lazy-omd img-om" :data-src="product.image_path" alt="..">
                      </figure>
                      <span class="offer-om fix-om" v-if="product.price_before_discount">{{ __('Discount') }}</span>
                      <h2 class="head-om fix-om">{{  product.name }}</h2>
                      <div class="prices-om">
                        <span class="price-om del-om" v-if="product.price_before_discount">{{ product.price_before_discount }} {{__('SAR')}}</span>
                        <span class="price-om">{{ product.price }} {{__('SAR')}}</span>
                      </div>
                      <Link class="add-to-cart-butt-om fix-om " :href="`/add-to-cart/${product.id}`" as="button" method="post" :disabled="choosen(product.id)">
                        <figure class="figure-om">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16.741" height="16.048"
                               viewBox="0 0 16.741 16.048">
                            <g id="Icon_feather-shopping-cart" transform="translate(-0.75 -0.75)">
                              <path id="Path_580"
                                    d="M13.386 30.693a.693.693 0 1 1-.693-.693.693.693 0 0 1 .693.693z"
                                    class="add-to-cart-om" transform="translate(-5.651 -15.338)" />
                              <path id="Path_581"
                                    d="M29.886 30.693a.693.693 0 1 1-.693-.693.693.693 0 0 1 .693.693z"
                                    class="add-to-cart-om" transform="translate(-14.53 -15.338)" />
                              <path id="Path_582"
                                    d="M1.5 1.5h2.771l1.857 9.276a1.386 1.386 0 0 0 1.386 1.115h6.734a1.386 1.386 0 0 0 1.386-1.115l1.108-5.812H4.964"
                                    class="add-to-cart-om" />
                            </g>
                          </svg>

                        </figure>
                        <span class="text-om" v-if="choosen(product.id)">{{__('Added to Cart')}}</span>
                        <span class="text-om" v-else>{{__('Add to Cart')}}</span>
                      </Link>
                    </Link>

                  </div>
                </div>


              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </main>

</div>
</template>

<script>
import HeadInfo from "../../Shared/HeadInfo";
import Layout from "../../Shared/Layout";
import {Link} from "@inertiajs/inertia-vue";

export default {
  name: "Product",
  layout: Layout,
  components: {HeadInfo, Link},
  props: {
    similar_products: Array,
    item: Object
  },
  data() {
    return {
      qty: 1
    }
  },
  computed: {
    cart() {
      return this.$page.props.cart;
    }
  },
  methods: {
    choosen(id) {
      if (this.cart) {
        return (Object.keys(this.cart)).indexOf(id.toString()) >= 0 ? true : false;
      }
      return false;
    }
  }
}
</script>

<style scoped>
.add-to-cart-om {
  fill: none;
  stroke: #fff;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke-width: 1.5px
}
</style>
