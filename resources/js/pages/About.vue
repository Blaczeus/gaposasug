<script setup lang="ts">
import BackToTop from '@/components/ui/BackToTop.vue'
import Header from '@/components/layout/Header.vue'
import MobileMenu from '@/components/layout/MobileMenu.vue'
import Footer from '@/components/layout/Footer.vue'
import SearchBar from '@/components/ui/SearchBar.vue'
import Breadcrumb from '@/components/layout/Breadcrumb.vue'
</script>

<template>
  <div>
    <!-- header area start -->
    <Header />
    <!-- header area end -->

    <!-- BREADCRUMB AREA -->
    <Breadcrumb title="About Gaposa" :breadcrumbs="[
        { label: 'Home', route: 'home' },
        { label: 'About' }
      ]" />
    <!-- BREADCRUMB AREA END -->


    <!-- About the SUG -->
    <section class="rts-about-university rts-section-padding">
      <div class="container">
        <div class="row">
          <div class="rts-section">
            <div class="col-lg-4 col-md-5">
              <h3 class="rts-section-title">About the Union</h3>
            </div>
            <div class="col-lg-8 col-md-7">
              <p class="rts-section-description">
                The Student Union Government (SUG) of GAPOSA is the voice and representative body of the student
                community. We are dedicated to promoting student welfare, fostering unity, and building a bridge between
                the student body and the school management through advocacy, transparency, and service.
              </p>
            </div>
          </div>
        </div>
        <div class="row g-5 justify-content-md-center justify-content-start">
          <div class="col-lg-7 col-xl-8 col-md-11">
            <div class="rts-about-section">
              <img src="/assets/images/about/about-01.jpg" alt="About SUG">
            </div>
          </div>
          <div class="col-lg-5 col-xl-4 col-md-11">
            <div class="rts-about-details">
              <div class="single-about-info">
                <div class="content">
                  <h3 class="title">12+</h3>
                  <img src="/assets/images/icon/11.svg" alt="">
                </div>
                <div class="desc">
                  <p>active SUG executives representing student interests</p>
                </div>
              </div>
              <div class="single-about-info">
                <div class="content">
                  <h3 class="title">10,000+</h3>
                  <img src="/assets/images/icon/12.svg" alt="">
                </div>
                <div class="desc">
                  <p>students served across ND & HND programs</p>
                </div>
              </div>
              <div class="single-about-info">
                <div class="content">
                  <h3 class="title">24/7</h3>
                  <img src="/assets/images/icon/13.svg" alt="">
                </div>
                <div class="desc">
                  <p>support and representation, always available</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About the SUG End -->


    <!-- SUG History -->
    <div class="rts-history">
      <div class="container">
        <div class="row g-5 justify-content-md-center justify-content-start align-items-center">
          <div class="col-lg-6 col-md-11">
            <div class="rts-history-image">
              <img src="/assets/images/about/history.jpg" alt="SUG History">
            </div>
          </div>
          <div class="col-lg-6 col-md-11">
            <div class="rts-history-section">
              <h4 class="rts-section-title mb--40">History of the Student Union</h4>
              <p>
                The GAPOSA Student Union Government was established to champion student rights, promote unity, and
                foster leadership on campus. Over the years, the union has evolved into a structured body that plays a
                vital role in policy advocacy, welfare support, and representing student voices at key institutional
                levels.
                <span class="d-block mb--30"></span>
                Through various administrations, the union has led meaningful campaigns, organized impactful events, and
                ensured that the voices of students are always heard where it matters most.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- SUG History End -->



    <!-- SUG Impact Stats -->
    <div class="rts-funfact rts-section-padding">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="rts-funfact-wrapper">
              <div class="single-cta-item">
                <h2 class="single-cta-item__title">95%</h2>
                <p>successful student welfare cases resolved</p>
              </div>
              <div class="single-cta-item">
                <h2 class="single-cta-item__title">50+</h2>
                <p>campus-wide events organized annually</p>
              </div>
              <div class="single-cta-item">
                <h2 class="single-cta-item__title">100%</h2>
                <p>commitment to student representation</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mission and Values -->
    <section class="rts-mission">
      <div class="container">
        <div class="row justify-content-center rt-center">
          <div class="rts-section mb--50">
            <h2 class="rts-section-title">Mission and Values</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="rts-timeline-section">
              <div class="rts-timeline-content">
                <div class="left-side">
                  <div class="single-timeline-item">
                    <h5 class="timeline-title">Advocacy</h5>
                    <p> We speak up for the welfare and rights of every GAPOSA student, on every platform that matters.
                    </p>
                    <img src="/assets/images/about/mission-1.jpg" alt="">
                  </div>
                  <div class="single-timeline-item">
                    <h5 class="timeline-title">Unity</h5>
                    <p> Bridging gaps across departments, levels, and backgrounds to promote one student body, one
                      voice.</p>
                    <img src="/assets/images/about/mission-2.jpg" alt="">
                  </div>
                </div>
                <div class="separator"></div>
                <div class="right-side">
                  <div class="single-timeline-item">
                    <h5 class="timeline-title">Leadership</h5>
                    <p> We foster student leadership, accountability, and civic responsibility through example and
                      service.</p>
                    <img src="/assets/images/about/mission-3.jpg" alt="">
                  </div>
                  <div class="single-timeline-item">
                    <h5 class="timeline-title">Service</h5>
                    <p> Every project, every policy, every word — done in service to students and the future of GAPOSA.
                    </p>
                    <img src="/assets/images/about/mission-4.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Mission End -->


    <section class="rts-campus-tour rts-section-padding">
      <div class="container">
        <div class="row justify-content-center">
          <h2 class="section-title rt-center mb--50">Experience Campus Life</h2>
          <div class="col-12">
            <div class="rts-video-section height-500 mb--50">
              <a href="https://www.youtube.com/watch?v=Uwq1uiuM_9w"
                class="rts-video-section-player popup-video video-btn">
                <i class="fa-sharp fa-solid fa-play"></i>
              </a>
              <img src="/assets/images/about/video-thumb.jpg" alt="GAPOSA campus video">
            </div>
          </div>
          <div class="col-lg-8">
            <div class="rts-video-section-text rt-center mx-3">
              <p>
                Discover what it’s like to be a part of the GAPOSA community. From academics to activities, facilities
                to freedom of expression, this tour gives you a glimpse into student life and how the Student Union
                supports your journey across campus.
              </p>
              <a href="/campus-life" class="mt--15 about-btn rts-nbg-btn btn-arrow">
                Explore Campus Life
                <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Testimonial Start -->
    <div class="rts-testimonial rts-section-padding">
      <div class="container">
        <!-- testimonial content -->
        <div class="row">
          <div class="col-12">
            <div class="rts-testimonial-box">
              <div class="testimonial-item rt-flex">
                <!-- <div class="testimonial-item-image">
                  <img src="/assets/images/testimonial/testimonial-big.jpg" alt="testimonial thumbnail">
                </div> -->
                <div class="testimonial-item-content w-570 rt-relative">
                  <div class="swiper swiper-data" data-swiper='{
                                        "slidesPerView":1,
                                        "loop": true,
                                        "navigation":{
                                            "nextEl":".rt-next",
                                            "prevEl":".rt-prev"
                                        },
                                        "autoplay":{
                                            "delay":"3000"
                                        }
                                }'>
                    <div class="swiper-wrapper">
                      <!-- single testimonial -->
                      <!-- <div class="swiper-slide">
                        <div class="single-testimonial">
                          <div class="rt-between mb--50">
                            <div class="rt-icon">
                              <img src="/assets/images/testimonial/quote.svg" alt="quote icon">
                            </div>
                            <div class="rt-review">
                              <div class="rating-star mb--10">
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-light fa-star"></i>
                              </div>
                              <p class="rt-secondary rt-medium --p-s">4.5 ( 112 Review)</p>
                            </div>
                          </div>
                          <p class="testimonial-text">
                            I would highly recommend Michael Richard to anyone interested the subject matter. It has
                            provided me with invaluable knowledge & a newfound passion topic. My only suggestion would
                            be to add more live.
                          </p>
                          <div class="rt-testimonial-author mt--50">
                            <div class="rt-author-meta rt-flex rt-gap-20">
                              <div class="rt-author-img">
                                <img src="/assets/images/testimonial/author-1.png" alt="author">
                              </div>
                              <div class="rt-author-info">
                                <h5 class="mb-1">David Jhon</h5>
                                <p>Artist and Instructor</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
                      <!-- single testimonial -->
                      <!-- <div class="swiper-slide">
                        <div class="single-testimonial">
                          <div class="rt-between mb--50">
                            <div class="rt-icon">
                              <img src="/assets/images/testimonial/quote.svg" alt="quote icon">
                            </div>
                            <div class="rt-review">
                              <div class="rating-star mb--10">
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-light fa-star"></i>
                              </div>
                              <p class="rt-secondary rt-medium --p-s">4.5 ( 112 Review)</p>
                            </div>
                          </div>
                          <p class="testimonial-text">
                            I would highly recommend Michael Richard to anyone interested the subject matter. It has
                            provided me with invaluable knowledge & a newfound passion topic. My only suggestion would
                            be to add more live.
                          </p>
                          <div class="rt-testimonial-author mt--50">
                            <div class="rt-author-meta rt-flex rt-gap-20">
                              <div class="rt-author-img">
                                <img src="/assets/images/testimonial/author-1.png" alt="author">
                              </div>
                              <div class="rt-author-info">
                                <h5 class="mb-1">David Jhon</h5>
                                <p>Artist and Instructor</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
                      <!-- single testimonial -->
                      <!-- <div class="swiper-slide">
                        <div class="single-testimonial">
                          <div class="rt-between mb--50">
                            <div class="rt-icon">
                              <img src="/assets/images/testimonial/quote.svg" alt="quote icon">
                            </div>
                            <div class="rt-review">
                              <div class="rating-star mb--10">
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-solid fa-star"></i>
                                <i class="fa-sharp fa-light fa-star"></i>
                              </div>
                              <p class="rt-secondary rt-medium --p-s">4.5 ( 112 Review)</p>
                            </div>
                          </div>
                          <p class="testimonial-text">
                            I would highly recommend Michael Richard to anyone interested the subject matter. It has
                            provided me with invaluable knowledge & a newfound passion topic. My only suggestion would
                            be to add more live.
                          </p>
                          <div class="rt-testimonial-author mt--50">
                            <div class="rt-author-meta rt-flex rt-gap-20">
                              <div class="rt-author-img">
                                <img src="/assets/images/testimonial/author-1.png" alt="author">
                              </div>
                              <div class="rt-author-info">
                                <h5 class="mb-1">David Jhon</h5>
                                <p>Artist and Instructor</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
                    </div>
                  </div>
                  <!-- rts arrow -->
                  <!-- <div class="rts-slider-arrow testimonial-arrow">
                    <div class="rt-slider-btn rt-next">
                      <i class="fa-solid fa-chevron-left"></i>
                    </div>
                    <div class="rt-slider-btn rt-prev">
                      <i class="fa-solid fa-chevron-right"></i>
                    </div>
                  </div> -->
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Testimonial end -->

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
