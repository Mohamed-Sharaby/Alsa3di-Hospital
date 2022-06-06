<template>
<div>
  <!-- header  -->
  <header class="header-om">
    <!-- toolbar  -->
    <div class="header-wraper-om fixed-header-warper">
      <div class="toolbar-sec-om">
        <div class="container">
          <div class="ss-wraper-om">

            <!-- start  toolbar-contact-info -->
            <ul class="toolbar-contact-info list-unstyled">


              <li class="li-om signed-in-menu" v-if="user">
                <div class="contact-block-om link-om"
                     data-target="#signinmodal">
                  <figure class="figure-om">
                    <svg class="svg-om" xmlns="http://www.w3.org/2000/svg" width="18.037"
                         height="18.037" viewBox="0 0 18.037 18.037">
                      <path fill="currentColor"
                            d="M9.018 10.146a5.073 5.073 0 1 0-5.072-5.073 5.074 5.074 0 0 0 5.072 5.073zm4.509 1.127h-1.94a6.132 6.132 0 0 1-5.136 0H4.509A4.509 4.509 0 0 0 0 15.782v.564a1.691 1.691 0 0 0 1.691 1.691h14.655a1.691 1.691 0 0 0 1.691-1.691v-.564a4.509 4.509 0 0 0-4.509-4.509z" />
                    </svg>
                  </figure>
                  <span class="text-om">{{ user.name }}</span>
                  <figure class="arrow-shap-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15" viewBox="0 0 20 15" fill="currentColor">
                      <g id="Group_951" data-name="Group 951" transform="translate(-1145 -106.311)">
                        <rect id="Rectangle_318" data-name="Rectangle 318" width="20" height="15" transform="translate(1145 106.311)" fill="rgba(255,255,255,0)"/>
                        <path id="Icon_ionic-ios-arrow-down" data-name="Icon ionic-ios-arrow-down" d="M11.227,15.27l3.809-3.812a.717.717,0,0,1,1.017,0,.726.726,0,0,1,0,1.02L11.736,16.8a.719.719,0,0,1-.993.021L6.4,12.481a.72.72,0,0,1,1.017-1.02Z" transform="translate(1143.813 100.065)"/>
                      </g>
                    </svg>
                  </figure>
                </div>
                <ul class="sub-menu-list list-unstyled">
                  <li ><Link class="link-om" :href="$route('user.profile')">{{ __('Profile') }}</Link></li>
                  <li ><Link class="link-om" :href="$route('user.reservations')">{{ __('My Reservations') }}</Link></li>
                  <li ><Link class="link-om" :href="$route('user.orders')">{{ __('My Orders') }}</Link></li>
                  <li ><Link class="link-om" :href="$route('user.medical_file')">{{ __('Medical file') }}</Link></li>
                  <li ><Link class="link-om" :href="$route('user.password')">{{ __('Change Password') }}</Link></li>
                  <li ><Link class="link-om logout-link" href="/logout" method="post" >{{ __('Logout') }}</Link></li>
                </ul>
              </li>

              <li class="li-om" v-else>
<!--                <a class="contact-block-om link-om show-login" href="#!" data-toggle="modal" data-target="#signinmodal">-->
                <a class="contact-block-om link-om show-login" @click="$bvModal.show('login-modal')">
                  <figure class="figure-om">
                    <svg class="svg-om" xmlns="http://www.w3.org/2000/svg" width="18.037"
                         height="18.037" viewBox="0 0 18.037 18.037">
                      <path fill="currentColor"
                            d="M9.018 10.146a5.073 5.073 0 1 0-5.072-5.073 5.074 5.074 0 0 0 5.072 5.073zm4.509 1.127h-1.94a6.132 6.132 0 0 1-5.136 0H4.509A4.509 4.509 0 0 0 0 15.782v.564a1.691 1.691 0 0 0 1.691 1.691h14.655a1.691 1.691 0 0 0 1.691-1.691v-.564a4.509 4.509 0 0 0-4.509-4.509z" />
                    </svg>
                  </figure>
                  <span class="text-om">{{ __('Login') }}</span>
                </a>
              </li>

              <li class="li-om">
                <a class="contact-block-om link-om" :href="`tel: +${settings.phone}`" target="_blank">
                  <figure class="figure-om">
                    <svg class="svg-om" xmlns="http://www.w3.org/2000/svg" width="18.006"
                         height="18.006" viewBox="0 0 18.006 18.006">
                      <path fill="currentColor"
                            d="M17.352.865L13.694.021a.849.849 0 0 0-.967.489l-1.688 3.938a.842.842 0 0 0 .243.985l2.131 1.744a13.034 13.034 0 0 1-6.232 6.232l-1.744-2.131a.843.843 0 0 0-.985-.243L.513 12.723a.854.854 0 0 0-.492.971l.844 3.657a.844.844 0 0 0 .823.654A16.316 16.316 0 0 0 18.006 1.688a.843.843 0 0 0-.654-.823z"
                            transform="translate(.001 .001)" />
                    </svg>
                  </figure>
                  <span class="text-om">
                      {{ __('Phone') }} :
                      {{ settings.phone }}
                  </span>
                </a>
              </li>
              <li class="li-om">
                <a class="contact-block-om link-om" :href="`mailto: ${settings.email}`" target="_blank">
                  <figure class="figure-om">
                    <svg class="svg-om" xmlns="http://www.w3.org/2000/svg" width="22.909"
                         height="18" viewBox="0 0 22.909 18">
                      <path fill="currentColor"
                            d="M22.977 5.625H4.432A2.188 2.188 0 0 0 2.25 7.807v13.636a2.188 2.188 0 0 0 2.182 2.182h18.545a2.188 2.188 0 0 0 2.182-2.182V7.807a2.188 2.188 0 0 0-2.182-2.182zm-.277 4.636l-9 6-9-6V8.08l9 6 9-6z"
                            transform="translate(-2.25 -5.625)" />
                    </svg>
                  </figure>
                  <span class="text-om">
                      {{ __('Email') }} :
                      {{ settings.email }}
                  </span>
                </a>
              </li>
            </ul>
            <!-- end toolbar-contact-info  -->

            <div class="toolbar-lang-social-wr-om">

              <div class="social-om">
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

              <div class="toolbar-lang-block-om">
                <button class="butt-om ">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20.272" height="20.272"
                         viewBox="0 0 20.272 20.272">
                      <path fill="currentColor" stroke="#0178b5" stroke-width="0.5px"
                            d="M12.876 3a9.886 9.886 0 1 0 9.9 9.886A9.881 9.881 0 0 0 12.876 3zm6.851 5.932h-2.916a15.471 15.471 0 0 0-1.364-3.519 7.938 7.938 0 0 1 4.28 3.519zm-6.841-3.915a13.926 13.926 0 0 1 1.888 3.915H11a13.926 13.926 0 0 1 1.886-3.915zm-7.652 9.846a7.733 7.733 0 0 1 0-3.954h3.342a16.327 16.327 0 0 0-.138 1.977 16.327 16.327 0 0 0 .138 1.977zm.811 1.977h2.916a15.471 15.471 0 0 0 1.364 3.519 7.9 7.9 0 0 1-4.28-3.518zm2.916-7.908H6.045a7.9 7.9 0 0 1 4.281-3.519 15.471 15.471 0 0 0-1.365 3.519zm3.925 11.824A13.926 13.926 0 0 1 11 16.841h3.776a13.926 13.926 0 0 1-1.89 3.914zm2.314-5.893h-4.627a14.545 14.545 0 0 1-.158-1.977 14.419 14.419 0 0 1 .158-1.977H15.2a14.419 14.419 0 0 1 .158 1.977 14.545 14.545 0 0 1-.158 1.977zm.247 5.5a15.471 15.471 0 0 0 1.364-3.519h2.916a7.938 7.938 0 0 1-4.281 3.519zm1.75-5.5a16.327 16.327 0 0 0 .138-1.977 16.327 16.327 0 0 0-.138-1.977h3.342a7.733 7.733 0 0 1 0 3.954z"
                            transform="rotate(180 11.511 11.511)" />
                    </svg>
                  </figure>
                  <span class="text-om">
                    {{ locale == 'ar' ? 'العربية' : 'English' }}
                  </span>
                </button>

                <ul class="sub-menu-om list-unstyled">
                  <li class="li-om"><a @click="changeLocale('ar')" class="link-om">العربية</a></li>
                  <li class="li-om"><a @click="changeLocale('en')" class="link-om">English</a></li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- header content  -->
      <div class="header-sec-om ">
        <div class="container">
          <div class="ss-wraper-om">

            <Link class="header-logo-om" href="/">
              <figure class="figure-om">
                <img src="/assets/images/logo.png" alt="..">
              </figure>
            </Link>

            <nav class="nav-om" id="navbar-menu-om">
              <button class="close-butt-om"></button>
              <div class="toolbar-lang-block-om">
                <button class="butt-om ">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20.272" height="20.272"
                         viewBox="0 0 20.272 20.272">
                      <path fill="currentColor" stroke="#0178b5" stroke-width="0.5px"
                            d="M12.876 3a9.886 9.886 0 1 0 9.9 9.886A9.881 9.881 0 0 0 12.876 3zm6.851 5.932h-2.916a15.471 15.471 0 0 0-1.364-3.519 7.938 7.938 0 0 1 4.28 3.519zm-6.841-3.915a13.926 13.926 0 0 1 1.888 3.915H11a13.926 13.926 0 0 1 1.886-3.915zm-7.652 9.846a7.733 7.733 0 0 1 0-3.954h3.342a16.327 16.327 0 0 0-.138 1.977 16.327 16.327 0 0 0 .138 1.977zm.811 1.977h2.916a15.471 15.471 0 0 0 1.364 3.519 7.9 7.9 0 0 1-4.28-3.518zm2.916-7.908H6.045a7.9 7.9 0 0 1 4.281-3.519 15.471 15.471 0 0 0-1.365 3.519zm3.925 11.824A13.926 13.926 0 0 1 11 16.841h3.776a13.926 13.926 0 0 1-1.89 3.914zm2.314-5.893h-4.627a14.545 14.545 0 0 1-.158-1.977 14.419 14.419 0 0 1 .158-1.977H15.2a14.419 14.419 0 0 1 .158 1.977 14.545 14.545 0 0 1-.158 1.977zm.247 5.5a15.471 15.471 0 0 0 1.364-3.519h2.916a7.938 7.938 0 0 1-4.281 3.519zm1.75-5.5a16.327 16.327 0 0 0 .138-1.977 16.327 16.327 0 0 0-.138-1.977h3.342a7.733 7.733 0 0 1 0 3.954z"
                            transform="rotate(180 11.511 11.511)" />
                    </svg>
                  </figure>
                  <span class="text-om">
                      {{ locale == 'ar' ? 'العربية' : 'English' }}
                  </span>
                </button>

                <ul class="sub-menu-om list-unstyled">
                  <li class="li-om"><a href="#!" class="link-om">العربية</a></li>
                  <li class="li-om"><a href="#!" class="link-om">English</a></li>
                </ul>
              </div>

              <figure class="figure-om nav-logo-om">
                <img src="/assets/images/logo.png" alt="..">
              </figure>

              <a class="header-reserv-link-om link-om" href="#!">
                <figure class="figure-om">
                  <svg class="svg-om" xmlns="http://www.w3.org/2000/svg" width="22.81" height="26.068"
                       viewBox="0 0 22.81 26.068">
                    <path fill="currentColor"
                          d="M0 23.625a2.445 2.445 0 0 0 2.444 2.444h17.922a2.445 2.445 0 0 0 2.444-2.444V9.776H0zm16.293-9.979a.613.613 0 0 1 .611-.611h2.036a.613.613 0 0 1 .611.611v2.037a.613.613 0 0 1-.611.611H16.9a.613.613 0 0 1-.611-.611zm0 6.517a.613.613 0 0 1 .611-.611h2.036a.613.613 0 0 1 .611.611V22.2a.613.613 0 0 1-.611.611H16.9a.613.613 0 0 1-.611-.611zm-6.517-6.518a.613.613 0 0 1 .611-.611h2.037a.613.613 0 0 1 .611.611v2.037a.613.613 0 0 1-.611.611h-2.037a.613.613 0 0 1-.611-.611zm0 6.517a.613.613 0 0 1 .611-.611h2.037a.613.613 0 0 1 .611.611V22.2a.613.613 0 0 1-.611.611h-2.037a.613.613 0 0 1-.611-.611zm-6.517-6.517a.613.613 0 0 1 .611-.611h2.036a.613.613 0 0 1 .611.611v2.037a.613.613 0 0 1-.611.611H3.87a.613.613 0 0 1-.611-.611zm0 6.517a.613.613 0 0 1 .611-.611h2.036a.613.613 0 0 1 .611.611V22.2a.613.613 0 0 1-.611.611H3.87a.613.613 0 0 1-.611-.611zm17.107-16.9h-2.444V.815A.817.817 0 0 0 17.107 0h-1.629a.817.817 0 0 0-.815.815v2.444H8.146V.815A.817.817 0 0 0 7.332 0H5.7a.817.817 0 0 0-.815.815v2.444H2.444A2.445 2.445 0 0 0 0 5.7v2.446h22.81V5.7a2.445 2.445 0 0 0-2.444-2.441z" />
                  </svg>
                </figure>
                <span class="text-om">{{ __('Book an appointment') }}</span>
              </a>


              <div class="social-om">
                <a class="link-om" href="#!">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15.869" height="15.869"
                         viewBox="0 0 15.869 15.869">
                      <path fill="currentColor"
                            d="M14.169 2.25H1.7A1.7 1.7 0 0 0 0 3.95v12.469a1.7 1.7 0 0 0 1.7 1.7h4.862v-5.4H4.33v-2.535h2.232V8.249A3.1 3.1 0 0 1 9.88 4.832 13.52 13.52 0 0 1 11.847 5v2.164h-1.108a1.27 1.27 0 0 0-1.432 1.372v1.649h2.436l-.39 2.539H9.307v5.4h4.862a1.7 1.7 0 0 0 1.7-1.7V3.95a1.7 1.7 0 0 0-1.7-1.7z"
                            transform="translate(0 -2.25)" />
                    </svg>
                  </figure>
                </a>
                <a class="link-om" href="#!">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17.426" height="14.153"
                         viewBox="0 0 17.426 14.153">
                      <path fill="currentColor"
                            d="M15.635 6.908c.011.155.011.31.011.464A10.092 10.092 0 0 1 5.484 17.533 10.093 10.093 0 0 1 0 15.93a7.388 7.388 0 0 0 .862.044A7.153 7.153 0 0 0 5.3 14.449a3.578 3.578 0 0 1-3.339-2.477 4.5 4.5 0 0 0 .675.055 3.777 3.777 0 0 0 .94-.122A3.572 3.572 0 0 1 .708 8.4v-.044a3.6 3.6 0 0 0 1.614.453 3.577 3.577 0 0 1-1.106-4.776A10.152 10.152 0 0 0 8.58 7.77a4.032 4.032 0 0 1-.088-.818 3.575 3.575 0 0 1 6.181-2.444 7.032 7.032 0 0 0 2.267-.862 3.562 3.562 0 0 1-1.57 1.968 7.16 7.16 0 0 0 2.057-.553 7.677 7.677 0 0 1-1.791 1.846z"
                            transform="translate(0 -3.381)" />
                    </svg>
                  </figure>
                </a>
                <a class="link-om" href="#!">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17.699" height="13.276"
                         viewBox="0 0 17.699 13.276">
                      <path fill="currentColor"
                            d="M17.583 7.432a2.687 2.687 0 0 0-2.558-2.807c-1.915-.09-3.869-.125-5.863-.125h-.623c-1.991 0-3.948.035-5.864.124A2.693 2.693 0 0 0 .121 7.439C.034 8.669 0 9.9 0 11.131s.035 2.462.118 3.7a2.7 2.7 0 0 0 2.555 2.818c2.012.093 4.076.135 6.175.131s4.159-.035 6.175-.131a2.7 2.7 0 0 0 2.558-2.818c.083-1.234.121-2.465.118-3.7s-.033-2.465-.116-3.699zm-10.427 7.09V7.729l5.013 3.395z"
                            transform="translate(0 -4.5)" />
                    </svg>

                  </figure>
                </a>
                <a class="link-om" href="#!">
                  <figure class="figure-om">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15.955" height="15.951"
                         viewBox="0 0 15.955 15.951">
                      <path fill="currentColor"
                            d="M7.974 6.123a4.09 4.09 0 1 0 4.09 4.09 4.083 4.083 0 0 0-4.09-4.09zm0 6.748a2.659 2.659 0 1 1 2.659-2.659 2.664 2.664 0 0 1-2.659 2.659zm5.211-6.916A.954.954 0 1 1 12.231 5a.952.952 0 0 1 .954.956zm2.709.968A4.72 4.72 0 0 0 14.6 3.582a4.752 4.752 0 0 0-3.342-1.288c-1.317-.075-5.264-.075-6.581 0a4.745 4.745 0 0 0-3.338 1.285A4.736 4.736 0 0 0 .051 6.921c-.075 1.317-.075 5.264 0 6.581a4.72 4.72 0 0 0 1.288 3.342 4.758 4.758 0 0 0 3.342 1.288c1.317.075 5.264.075 6.581 0a4.721 4.721 0 0 0 3.338-1.288 4.751 4.751 0 0 0 1.293-3.344c.075-1.317.075-5.261 0-6.577zm-1.7 7.99a2.692 2.692 0 0 1-1.516 1.516c-1.05.416-3.542.32-4.7.32s-3.655.093-4.7-.32a2.692 2.692 0 0 1-1.516-1.516c-.416-1.05-.32-3.541-.32-4.7s-.093-3.655.32-4.7A2.692 2.692 0 0 1 3.272 4c1.05-.416 3.542-.32 4.7-.32s3.655-.093 4.7.32a2.692 2.692 0 0 1 1.516 1.516c.416 1.05.32 3.541.32 4.7s.1 3.652-.316 4.699z"
                            transform="translate(.005 -2.238)" />
                    </svg>
                  </figure>
                </a>
                <a class="link-om" href="#!">
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
              <ul class="nav-list-om list-unstyled">
                <li><Link href="/about">{{ __('About') }}</Link></li>
                <li class="sub-menu-om">
                  <a class="collapse-head-om" href="#!">{{ __('Branches') }}</a>
                  <ul class="sub-menu-list list-collapse-om list-unstyled">
                    <li v-for="branch in $page.props.branches"><Link :href="`/branch/${branch.id}`">{{ branch.name }}</Link></li>
                  </ul>
                </li>
                <li><Link href="/specialty">{{  __('Specializations') }}</Link></li>
                <li><Link href="/doctors">{{ __('Doctors') }}</Link></li>
                <li><Link class="store" href="/store">{{__('E-commerce') }}</Link></li>
                <li><Link href="/news">{{ __('News & Events') }}</Link></li>
                <li><Link href="/contact-us">{{  __('Contact Us') }}</Link></li>
              </ul>

            </nav>

            <div class="cart-reservation-block-om">

              <Link class="header-cart-block-om butt-om" as="button" href="/cart" :disabled="Object.keys(cart).length == 0">
                <figure class="figure-om">
                  <svg class="svg-om" xmlns="http://www.w3.org/2000/svg" width="42.554"
                       height="34.399" viewBox="0 0 42.554 34.399">
                    <g>
                      <path fill="currentColor"
                            d="M31.484 6.058a1.332 1.332 0 0 0-1.378-1.378h-7.04a1.373 1.373 0 0 0-.854.285 1.331 1.331 0 0 0-.494.764L21 8.665H.807L.6 8.035a1.239 1.239 0 0 0-1.292-.958.922.922 0 0 0-.389.06 1.29 1.29 0 0 0-.719.479 1.309 1.309 0 0 0-.27.809 1.674 1.674 0 0 0 .06.389l3.535 11.774a1.289 1.289 0 0 0 .475.719 1.316 1.316 0 0 0 .809.27h16.752a1.332 1.332 0 0 0 .854-.3 1.4 1.4 0 0 0 .494-.75l3.235-13.121h5.962a1.355 1.355 0 0 0 .974-.389 1.279 1.279 0 0 0 .404-.959zm-11.145 5.333l-1.857 7.43H3.832l-.059-.269-2.158-7.16h18.724zm-1.258 14.5a2.629 2.629 0 0 0-.824-1.947 2.706 2.706 0 0 0-1.962-.809 2.756 2.756 0 0 0 0 5.512 2.7 2.7 0 0 0 1.962-.808 2.632 2.632 0 0 0 .824-1.948zm-1.947-12.163h-4.973v2.755h4.375zm-7.34 2.756l-.03-2.755H4.91l.719 2.755zm-1.109 9.407a2.63 2.63 0 0 0-.825-1.947 2.7 2.7 0 0 0-1.96-.809 2.654 2.654 0 0 0-1.947.809 2.751 2.751 0 0 0 0 3.895 2.655 2.655 0 0 0 1.947.808 2.7 2.7 0 0 0 1.962-.808 2.63 2.63 0 0 0 .823-1.948z"
                            transform="translate(-50.553 9) translate(61.623 -3.247)" />
                    </g>
                  </svg>

                </figure>
                <span class="number-om" v-if="Object.keys(cart).length > 0">{{ Object.keys(cart).length }}</span>
              </Link>
              <Link class="header-reserv-link-om link-om" :href="$route('book.appointment')">
                <figure class="figure-om">
                  <svg class="svg-om" xmlns="http://www.w3.org/2000/svg" width="22.81" height="26.068"
                       viewBox="0 0 22.81 26.068">
                    <path fill="currentColor"
                          d="M0 23.625a2.445 2.445 0 0 0 2.444 2.444h17.922a2.445 2.445 0 0 0 2.444-2.444V9.776H0zm16.293-9.979a.613.613 0 0 1 .611-.611h2.036a.613.613 0 0 1 .611.611v2.037a.613.613 0 0 1-.611.611H16.9a.613.613 0 0 1-.611-.611zm0 6.517a.613.613 0 0 1 .611-.611h2.036a.613.613 0 0 1 .611.611V22.2a.613.613 0 0 1-.611.611H16.9a.613.613 0 0 1-.611-.611zm-6.517-6.518a.613.613 0 0 1 .611-.611h2.037a.613.613 0 0 1 .611.611v2.037a.613.613 0 0 1-.611.611h-2.037a.613.613 0 0 1-.611-.611zm0 6.517a.613.613 0 0 1 .611-.611h2.037a.613.613 0 0 1 .611.611V22.2a.613.613 0 0 1-.611.611h-2.037a.613.613 0 0 1-.611-.611zm-6.517-6.517a.613.613 0 0 1 .611-.611h2.036a.613.613 0 0 1 .611.611v2.037a.613.613 0 0 1-.611.611H3.87a.613.613 0 0 1-.611-.611zm0 6.517a.613.613 0 0 1 .611-.611h2.036a.613.613 0 0 1 .611.611V22.2a.613.613 0 0 1-.611.611H3.87a.613.613 0 0 1-.611-.611zm17.107-16.9h-2.444V.815A.817.817 0 0 0 17.107 0h-1.629a.817.817 0 0 0-.815.815v2.444H8.146V.815A.817.817 0 0 0 7.332 0H5.7a.817.817 0 0 0-.815.815v2.444H2.444A2.445 2.445 0 0 0 0 5.7v2.446h22.81V5.7a2.445 2.445 0 0 0-2.444-2.441z" />
                  </svg>
                </figure>
                <span class="text-om">{{ __('Book an appointment') }}</span>
              </Link>

              <button class="menu-button-om butt-om" id="menu-butt-activ-om">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars"
                     class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 448 512">
                  <path fill="currentColor"
                        d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                  </path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </header>
  <div class="overlay"></div>

<!--  start Main-->
  <section>
    <slot />
  </section>
<!--  end Main-->

<our-foot :settings="settings" />

</div>
</template>

<script>


import {Link} from '@inertiajs/inertia-vue'
import OurFoot from "./OurFoot";
import { BModal } from 'bootstrap-vue'

export default {
  name: "Layout",
  components : {Link, OurFoot, BModal},
  props: {
    settings: Object,
  },
  data() {
    return {
      //locale: ''
    }
  },
  computed: {
    locale () {
      return window.locale || 'English';
    },
    user() {
      return this.$page.props.auth.user
    },
    cart() {
      return this.$page.props.cart || {}
    }
  },
  mounted() {
      swiper_slider();
      if (this.$page.props.flash.success) {
        this.$toasted.success(this.$page.props.flash.success, {icon: 'fa-check'})
      }
  },
  methods: {
    changeLocale(lang) {
      window.location.href = window.location.pathname+"?"+$.param({'lang':lang})
    },
    getParameterByName(name) {
      var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
      return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
    },
    showModal(){
      this.$bvModal.show('bv-modal-example')
    }
  },
  updated() {
    lazyLoad();
    swiper_slider();
    let login = this.getParameterByName('status');
    if (login && login.length > 0 && !this.user) {
      $('.show-login').trigger('click')
    }
  }

}
</script>

<style scoped>

</style>