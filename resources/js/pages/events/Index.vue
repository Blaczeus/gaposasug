<script setup lang="ts">
import SwiperInit from '@/components/ui/SwiperInit.vue'
import BackToTop from '@/components/ui/BackToTop.vue'
import Header from '@/components/layout/Header.vue'
import MobileMenu from '@/components/layout/MobileMenu.vue'
import Footer from '@/components/layout/Footer.vue'
import SearchBar from '@/components/ui/SearchBar.vue'
import Breadcrumb from '@/components/layout/Breadcrumb.vue'
import EventList from '@/components/ui/events/EventList.vue'

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
    <EventList />
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
