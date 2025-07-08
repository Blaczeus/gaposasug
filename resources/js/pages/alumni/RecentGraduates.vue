<script setup lang="ts">
import SwiperInit from '@/components/ui/SwiperInit.vue'
import BackToTop from '@/components/ui/BackToTop.vue'
import Header from '@/components/layout/Header.vue'
import MobileMenu from '@/components/layout/MobileMenu.vue'
import Footer from '@/components/layout/Footer.vue'
import Breadcrumb from '@/components/layout/Breadcrumb.vue'
import SearchBar from '@/components/ui/SearchBar.vue'
import RecentGraduateItem from '@/components/ui/alumni/RecentGraduateItem.vue'
import { recentGraduates } from '@/data/dummyData'

const graduates = recentGraduates

</script>

<template>
  <div>
    <SwiperInit />
    <!-- header area start -->
    <Header />
    <!-- header area end -->

    <!-- BREADCRUMB AREA -->
    <Breadcrumb title="Recent Graduates" :breadcrumbs="[
      { label: 'Home', route: 'home' },
      { label: 'Recent Graduates' }
    ]" />
    <!-- BREADCRUMB AREA END -->

    <!-- Intro Section -->
    <section class="rts-about-university rts-section-padding">
      <div class="container">
        <div class="row items-center">
          <div class="col-lg-4 col-md-5">
            <h3 class="rts-section-title text-md-end">Class of {{ new Date().getFullYear() }}</h3>
          </div>
          <div class="col-lg-8 col-md-7">
            <p class="rts-section-description">
              Celebrate the newest additions to the GAPOSA Alumni family! Our recent graduates are stepping into the
              world
              with fresh ideas, energy, and ambition. This page recognizes their achievement and marks the beginning of
              their journey beyond the classroom.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Recent Graduates Gallery -->
    <section class="rts-gallery rts__light rts-section-padding">
      <div class="container">
        <div class="row">
          <div class="rts__section--wrapper v__5">
            <h2 class="rts__section--title">Meet Our Recent Graduates</h2>
          </div>
        </div>
        <div class="gallery-area">
          <div class="row g-5">
            <RecentGraduateItem v-for="graduate in graduates" :key="graduate.slug" :graduate="graduate" />
          </div>
        </div>
      </div>
    </section>
    <!-- End Recent Graduates Gallery -->



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
