<script setup lang="ts">
import SwiperInit from '@/components/ui/SwiperInit.vue'
import BackToTop from '@/components/ui/BackToTop.vue'
import Header from '@/components/layout/Header.vue'
import MobileMenu from '@/components/layout/MobileMenu.vue'
import Footer from '@/components/layout/Footer.vue'
import SearchBar from '@/components/ui/SearchBar.vue'
import Breadcrumb from '@/components/layout/Breadcrumb.vue'

</script>

<template>
  <div>
    <SwiperInit />
    <!-- header area start -->
    <Header />
    <!-- header area end -->

    <!-- BREADCRUMB AREA -->
    <Breadcrumb title="Upcoming Events" :breadcrumbs="[
      { label: 'Home', route: 'home' },
      { label: 'Events' }
    ]" />

    <!-- BREADCRUMB AREA END -->

    <!-- university event list -->
    <div class="rts-event rts-section-padding">
      <div class="container">
        <div class="row justify-content-sm-center justify-content-md-start g-5">
          <!-- single event item -->
          <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="single-event">
              <div class="event single-event__content">
                <div class="event__thumb">
                  <img src="/assets/images/campus/event/01.jpg" alt="event thumbnail">
                </div>
                <div class="event__meta">
                  <div class="event__meta--da">
                    <div class="event-date">
                      <span><i class="fal fa-calendar"></i></span>
                      <span>November 28, 2023</span>
                    </div>
                    <div class="event-time">
                      <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                      <span>10:30 am</span>
                    </div>
                  </div>
                  <h5 class="event__title"> <a href="event-details.html">Edu Fest 2023: Igniting Minds Off on
                      Transforming Lives</a></h5>
                </div>
                <div class="event-place">
                  <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                  <span>Yarra Park, UK</span>
                </div>
              </div>
            </div>
          </div>
          <!-- single event item end -->
          <!-- single event item -->
          <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="single-event">
              <div class="event single-event__content">
                <div class="event__thumb">
                  <img src="/assets/images/campus/event/02.jpg" alt="event thumbnail">
                </div>
                <div class="event__meta">
                  <div class="event__meta--da">
                    <div class="event-date">
                      <span><i class="fal fa-calendar"></i></span>
                      <span>November 28, 2023</span>
                    </div>
                    <div class="event-time">
                      <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                      <span>10:30 am</span>
                    </div>
                  </div>
                  <h5 class="event__title"> <a href="event-details.html">Edu Fest 2023: Igniting Minds Off on
                      Transforming Lives</a></h5>
                </div>
                <div class="event-place">
                  <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                  <span>Yarra Park, UK</span>
                </div>
              </div>
            </div>
          </div>
          <!-- single event item end -->
          <!-- single event item -->
          <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="single-event">
              <div class="event single-event__content">
                <div class="event__thumb">
                  <img src="/assets/images/campus/event/03.jpg" alt="event thumbnail">
                </div>
                <div class="event__meta">
                  <div class="event__meta--da">
                    <div class="event-date">
                      <span><i class="fal fa-calendar"></i></span>
                      <span>November 28, 2023</span>
                    </div>
                    <div class="event-time">
                      <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                      <span>10:30 am</span>
                    </div>
                  </div>
                  <h5 class="event__title"> <a href="event-details.html">Edu Fest 2023: Igniting Minds Off on
                      Transforming Lives</a></h5>
                </div>
                <div class="event-place">
                  <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                  <span>Yarra Park, UK</span>
                </div>
              </div>
            </div>
          </div>
          <!-- single event item end -->
          <!-- single event item -->
          <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="single-event">
              <div class="event single-event__content">
                <div class="event__thumb">
                  <img src="/assets/images/campus/event/04.jpg" alt="event thumbnail">
                </div>
                <div class="event__meta">
                  <div class="event__meta--da">
                    <div class="event-date">
                      <span><i class="fal fa-calendar"></i></span>
                      <span>November 28, 2023</span>
                    </div>
                    <div class="event-time">
                      <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                      <span>10:30 am</span>
                    </div>
                  </div>
                  <h5 class="event__title"> <a href="event-details.html">Edu Fest 2023: Igniting Minds Off on
                      Transforming Lives</a></h5>
                </div>
                <div class="event-place">
                  <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                  <span>Yarra Park, UK</span>
                </div>
              </div>
            </div>
          </div>
          <!-- single event item end -->
          <!-- single event item -->
          <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="single-event">
              <div class="event single-event__content">
                <div class="event__thumb">
                  <img src="/assets/images/campus/event/05.jpg" alt="event thumbnail">
                </div>
                <div class="event__meta">
                  <div class="event__meta--da">
                    <div class="event-date">
                      <span><i class="fal fa-calendar"></i></span>
                      <span>November 28, 2023</span>
                    </div>
                    <div class="event-time">
                      <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                      <span>10:30 am</span>
                    </div>
                  </div>
                  <h5 class="event__title"> <a href="event-details.html">Edu Fest 2023: Igniting Minds Off on
                      Transforming Lives</a></h5>
                </div>
                <div class="event-place">
                  <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                  <span>Yarra Park, UK</span>
                </div>
              </div>
            </div>
          </div>
          <!-- single event item end -->
          <!-- single event item -->
          <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="single-event">
              <div class="event single-event__content">
                <div class="event__thumb">
                  <img src="/assets/images/campus/event/06.jpg" alt="event thumbnail">
                </div>
                <div class="event__meta">
                  <div class="event__meta--da">
                    <div class="event-date">
                      <span><i class="fal fa-calendar"></i></span>
                      <span>November 28, 2023</span>
                    </div>
                    <div class="event-time">
                      <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                      <span>10:30 am</span>
                    </div>
                  </div>
                  <h5 class="event__title"> <a href="event-details.html">Edu Fest 2023: Igniting Minds Off on
                      Transforming Lives</a></h5>
                </div>
                <div class="event-place">
                  <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                  <span>Yarra Park, UK</span>
                </div>
              </div>
            </div>
          </div>
          <!-- single event item end -->
          <!-- single event item -->
          <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="single-event">
              <div class="event single-event__content">
                <div class="event__thumb">
                  <img src="/assets/images/campus/event/04.jpg" alt="event thumbnail">
                </div>
                <div class="event__meta">
                  <div class="event__meta--da">
                    <div class="event-date">
                      <span><i class="fal fa-calendar"></i></span>
                      <span>November 28, 2023</span>
                    </div>
                    <div class="event-time">
                      <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                      <span>10:30 am</span>
                    </div>
                  </div>
                  <h5 class="event__title"> <a href="event-details.html">Edu Fest 2023: Igniting Minds Off on
                      Transforming Lives</a></h5>
                </div>
                <div class="event-place">
                  <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                  <span>Yarra Park, UK</span>
                </div>
              </div>
            </div>
          </div>
          <!-- single event item end -->
          <!-- single event item -->
          <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="single-event">
              <div class="event single-event__content">
                <div class="event__thumb">
                  <img src="/assets/images/campus/event/05.jpg" alt="event thumbnail">
                </div>
                <div class="event__meta">
                  <div class="event__meta--da">
                    <div class="event-date">
                      <span><i class="fal fa-calendar"></i></span>
                      <span>November 28, 2023</span>
                    </div>
                    <div class="event-time">
                      <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                      <span>10:30 am</span>
                    </div>
                  </div>
                  <h5 class="event__title"> <a href="event-details.html">Edu Fest 2023: Igniting Minds Off on
                      Transforming Lives</a></h5>
                </div>
                <div class="event-place">
                  <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                  <span>Yarra Park, UK</span>
                </div>
              </div>
            </div>
          </div>
          <!-- single event item end -->
          <!-- single event item -->
          <div class="col-lg-4 col-md-6 col-sm-10">
            <div class="single-event">
              <div class="event single-event__content">
                <div class="event__thumb">
                  <img src="/assets/images/campus/event/06.jpg" alt="event thumbnail">
                </div>
                <div class="event__meta">
                  <div class="event__meta--da">
                    <div class="event-date">
                      <span><i class="fal fa-calendar"></i></span>
                      <span>November 28, 2023</span>
                    </div>
                    <div class="event-time">
                      <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                      <span>10:30 am</span>
                    </div>
                  </div>
                  <h5 class="event__title"> <a href="event-details.html">Edu Fest 2023: Igniting Minds Off on
                      Transforming Lives</a></h5>
                </div>
                <div class="event-place">
                  <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                  <span>Yarra Park, UK</span>
                </div>
              </div>
            </div>
          </div>
          <!-- single event item end -->
        </div>
      </div>
    </div>
    <!-- university event list end -->

    <!-- footer start -->
    <Footer />
    <!-- footer end -->

    <!-- Mobile header style start-->
    <MobileMenu />
    <!-- Mobile header style End -->

    <!-- Search Bar start -->
    <SearchBar />
    <!-- Search Bar end -->

    <!-- rts backto top start -->
    <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
          style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
      </svg>
    </div>
    <BackToTop />
    <div id="anywhere-home">
    </div>
    <!-- rts back to top end -->
  </div>
</template>
