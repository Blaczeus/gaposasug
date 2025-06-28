<script setup lang="ts">
import SwiperInit from '@/components/ui/SwiperInit.vue'
import BackToTop from '@/components/ui/BackToTop.vue'
import Header from '@/components/layout/Header.vue'
import MobileMenu from '@/components/layout/MobileMenu.vue'
import Footer from '@/components/layout/Footer.vue'
import SearchBar from '@/components/ui/SearchBar.vue'
import Breadcrumb from '@/components/layout/Breadcrumb.vue'
import BigBlogCard from '@/components/ui/blog/BigBlogCard.vue'
import BlogSidebar from '@/components/ui/blog/BlogSidebar.vue'
import { blogs, blogSidebarData } from '@/data/dummyData'

const categories = blogSidebarData.categories
const contact = blogSidebarData.contact
const sidebarEvent = blogSidebarData.event

</script>

<template>
  <div>
    <SwiperInit />
    <!-- header area start -->
    <Header />
    <!-- header area end -->

    <!-- BREADCRUMB AREA -->
    <Breadcrumb title="Latest News" :breadcrumbs="[
        { label: 'Home', route: 'home' },
        { label: 'News' }
      ]" />
    <!-- BREADCRUMB AREA END -->


    <!-- university blog list -->
    <div class="rts-blog v_5 rts-section-padding">
      <div class="container">
        <div class="row sticky-coloum-wrap g-5">
          <div class="col-lg-8">
            <div class="row">
              <div class="col-12">
                <BigBlogCard v-for="(blog, index) in blogs" :key="index" :blog="blog" />
              </div>
            </div>
          </div>
          <BlogSidebar :categories="categories" :contact="contact" :event="sidebarEvent" />
        </div>
        <div class="rts-load-more-btn rt-center mt--60">
          <a href="#" class="rts-theme-btn primary primary lh-100">Load More</a>
        </div>
      </div>
    </div>
    <!-- university blog list end -->

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
