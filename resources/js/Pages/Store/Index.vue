<template>
<div>

  <head-info :title="__('E-commerce')" />

  <main class="main-archive-store-om main_grey_background_om main-page-default-back-g-om">

    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="sp-filters-section-om">
            <div class="filter-search-om">
              <div class="search-group-om">
                <input class="input-om" type="text" v-model="search.word" @keyup="getProducts" :placeholder="__('Search for product')">
                <button class="butt-om fix-om">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14.105"
                         viewBox="0 0 14 14.105">
                      <defs>
                        <clipPath id="clip-path">
                          <path id="Combined_Shape"
                                d="M13.207 14.105a.784.784 0 0 1-.565-.238l-3.121-3.174a5.949 5.949 0 1 1 1.127-1.114l3.124 3.179a.793.793 0 0 1-.566 1.348zM5.944 1.585A4.359 4.359 0 1 0 10.3 5.944a4.364 4.364 0 0 0-4.356-4.359z"
                                class="search-icon-om" />
                        </clipPath>
                      </defs>
                      <g id="Search_icon" transform="translate(0 0)">
                        <path id="Combined_Shape-2"
                              d="M13.207 14.105a.784.784 0 0 1-.565-.238l-3.121-3.174a5.949 5.949 0 1 1 1.127-1.114l3.124 3.179a.793.793 0 0 1-.566 1.348zM5.944 1.585A4.359 4.359 0 1 0 10.3 5.944a4.364 4.364 0 0 0-4.356-4.359z"
                              class="search-icon-om" transform="translate(0 0)" />
                        <g id="Mask_Group_132" clip-path="url(#clip-path)"
                           transform="translate(0 0)">
                          <g id="_Color" transform="translate(-2.378 -2.378)">
                            <path id="N500" d="M0 19.022h19.022V0H0z"
                                  class="search-icon-om" />
                          </g>
                        </g>
                      </g>
                    </svg>
                  </figure>
                </button>
              </div>
            </div>

            <div class="sp-filter-block-om single-page-wrapper-om">
              <div class="head-block-om sp-filter-collapsed-head-om">
                <h2 class="title-om fix-om">{{ __('Category') }}</h2>
              </div>

              <ul class="sp-filter-list-om sp-categories-filter-list-om list-unstyled">


                <li class="li-om sp-sublist-om" v-for="category in categories" :key="category.id">
                  <button class="butt-om fix-om" data-toggle="collapse" :data-target="`#collapseTwo_${category.id}`"
                          aria-expanded="true" aria-controls="collapseTwo">
                    {{ category.name }}
                    <span class="sublist-active-button-om"></span>
                  </button>
                  <ul class="sp-sub-list-om list-unstyled collapse show" :id="`collapseTwo_${category.id}`">
                    <li class="li-om" v-for="subcategory in category.sub_categories">
                      <button :class="`butt-om ${search.sub_category_id == subcategory.id ? 'active' : ''}`" @click="categoryChange(subcategory.id)">
                      {{ subcategory.name }}</button>
                    </li>
                  </ul>
                </li>

              </ul>
            </div>


            <div class="sp-filter-block-om  single-page-wrapper-om">
              <div class="head-block-om sp-filter-collapsed-head-om">
                <h2 class="title-om fix-om">{{__('Price')}}</h2>
              </div>

              <ul class="sp-filter-list-om sp-filter-price-list-om list-unstyled">
                <li class="li-om">
                  <span class="text-om">{{ __('From') }}</span>
                  <div class="input-group-om">
                    <input class="input-om" type="number" v-model="search.min" min="0" @change="getProducts" placeholder="1000">
                  </div>
                </li>

                <li class="li-om">
                  <span class="text-om">{{ __('To') }}</span>
                  <div class="input-group-om">
                    <input class="input-om" type="number" v-model="search.max" @change="getProducts" min="0" placeholder="5000">
                  </div>
                </li>
              </ul>
            </div>

            <div class="sp-filter-block-om single-page-wrapper-om">
              <div class="head-block-om sp-filter-collapsed-head-om">
                <h2 class="title-om fix-om">{{__('Recent')}}</h2>
              </div>

              <ul class="sp-filter-list-om sp-filter-newly-arrived-list-om list-unstyled">
                <li class="li-om">
                  <button class="butt-om fix-om">
                    <label class="label-om">
                      <input class="checkbox-om" type="radio" v-model="search.recent" @change="getProducts" value="30">
                      <span class="text-om"> {{__('Last 30 days')}}</span>
                    </label>
                  </button>
                </li>

                <li class="li-om">
                  <button class="butt-om fix-om">
                    <label class="label-om">
                      <input class="checkbox-om" type="radio" v-model="search.recent" @change="getProducts" value="60">
                      <span class="text-om">{{__('Last 60 days') }}</span>
                    </label>
                  </button>
                </li>
              </ul>
            </div>

          </div>
        </div>
        <div class="col-lg-8">
          <div class="products-content-sec-om single-page-wrapper-om ">
            <div class="sort-by-section-om">
              <h4 class="all-products-head-om fix-om"> {{__('All Products')}} ({{ products.total }})</h4>

              <div class="input-group-om">
                <label class="lable-om">{{ __('Sort by')}}</label>
                <select class="input-om select-om" v-model="search.sort" @change="getProducts">
                  <option value="asc">{{__('Price from low to high')}}</option>
                  <option value="desc">{{__('Price from high to low')}}</option>
                </select>
              </div>
            </div>

            <div class="row-om">

              <div class="col-om" v-for="item in products.data" :key="item.id">
                <div class="product-block-om fix-om">
                  <Link :href="$route('store.product', item.id)">
                    <figure class="product-img-block-om figure-om loading-omd asp-om">
                      <img class="lazy-omd img-om" :data-src="item.image_path" alt="..">
                    </figure>
                    <span class="offer-om fix-om" v-if="item.price_before_discount">{{ __('Discount') }}</span>
                    <h2 class="head-om fix-om"> {{  item.name }}</h2>
                    <div class="prices-om">
                      <span class="price-om del-om" v-if="item.price_before_discount">{{ item.price_before_discount }} {{__('SAR')}}</span>
                      <span class="price-om">{{ item.price }} {{__('SAR')}}</span>
                    </div>
                  </Link>
                  <Link class="add-to-cart-butt-om fix-om " :href="`/add-to-cart/${item.id}`" as="button" method="post" :disabled="choosen(item.id)">
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
                  <span class="text-om" v-if="choosen(item.id)">{{__('Added to Cart')}}</span>
                  <span class="text-om" v-else>{{__('Add to Cart')}}</span>
                </Link>
                </div>
              </div>

            </div>

            <!-- start pagenation  -->
            <pagination class="pagenation-om list-unstyled" :links="products.links" />
            <!-- end pagenation -->

          </div>
        </div>
      </div>
    </div>

  </main>


</div>
</template>

<script>
import Layout from "../../Shared/Layout";
import HeadInfo from "../../Shared/HeadInfo";
import Pagination from "../../Shared/Pagination";
import {Link} from "@inertiajs/inertia-vue";

export default {
  name: "Index",
  layout: Layout,
  components: {HeadInfo, Pagination, Link},
  props: {
    categories: Array
  },
  data() {
    return {
      search: {
        sub_category_id: '',
        min: '',
        max: '',
        word: '',
        sort: 'asc',
        recent: ''
      },
      products: {links:[]}
    }
  },
  mounted() {
    this.getProducts();
  },
  computed: {
    cart() {
      return this.$page.props.cart;
    }
  },
  methods: {
    async getProducts() {
      await axios.get(this.$route('store.products'), {
        params: this.search
      }).then(response => {
        // console.log('products', response.data.data)
        this.products = response.data.data
      }).catch(error => console.log(error))
    },
    categoryChange(id) {
      this.search.sub_category_id = id
      this.getProducts();
    },
    choosen(id) {
      if (this.cart) {
        return (Object.keys(this.cart)).indexOf(id.toString()) >= 0 ? true : false;
      }
      return false;
    }


  },
  updated() {
    lazyLoad()
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
.search-icon-om {
  fill: currentColor;
}
</style>