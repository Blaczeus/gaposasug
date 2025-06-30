<script setup lang="ts">
import SwiperInit from '@/components/ui/SwiperInit.vue'
import BackToTop from '@/components/ui/BackToTop.vue'
import Header from '@/components/layout/Header.vue'
import MobileMenu from '@/components/layout/MobileMenu.vue'
import Footer from '@/components/layout/Footer.vue'
import Breadcrumb from '@/components/layout/Breadcrumb.vue'
import SearchBar from '@/components/ui/SearchBar.vue'
import AlumniEventItem from '@/components/ui/alumni/AlumniEventItem.vue'
import { alumniEvents } from '@/data/dummyData'

</script>

<template>
  <div>
    <SwiperInit />
    <!-- header area start -->
    <Header />
    <!-- header area end -->

    <!-- BREADCRUMB AREA -->
    <Breadcrumb title="Gaposa Alumni" :breadcrumbs="[
      { label: 'Home', route: 'home' },
      { label: 'Alumni Benefits' }
    ]" />
    <!-- BREADCRUMB AREA END -->

    <!-- alumni banner -->
    <!-- Alumni Benefits Intro Section -->
    <section class="rts-about-university rts-section-padding">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-8 col-md-7">
            <p class="rts-section-description">
              GAPOSA Alumni Network is a thriving community dedicated to supporting graduates through professional
              development,
              events, mentorship, and more. We believe that graduation is just the beginning of a lifelong connection —
              a journey of continued growth and giving back.
            </p>
          </div>
          <div class="col-lg-4 col-md-5 rts-section-description">
            <h3 class="rts-section-title text-md-end">About GAPOSA Alumni</h3>
          </div>
        </div>
      </div>
    </section>

    <!-- alumni banner end -->

    <!-- upcoming event -->
    <section class="rts__section rts-section-padding rts__light">
      <div class="container">
        <div class="row">
          <div class="rts__section--wrapper">
            <div class="rts__section--wrapper--left">
              <h2 class="rts__section--title text-capitalize">Upcoming Alumni Events</h2>
            </div>
            <div class="rts__section--link">
              <a href="event.html" class="rts-nbg-btn btn-arrow">View All<span><i
                    class="fa-sharp fa-regular fa-arrow-right"></i>
                </span></a>
            </div>
          </div>
        </div>
        <!-- event content -->
        <div class="row g-5">
          <AlumniEventItem v-for="(event, index) in alumniEvents" :key="index" :event="event" />
        </div>
      </div>
    </section>
    <!-- upcoming event end -->


    <!-- Alumni Core Benefits Section -->
    <section class="rts-about-university rts-section-padding">
      <div class="container">
        <div class="row g-5 justify-content-md-center justify-content-start align-items-stretch">
          <!-- Image & Overlay Text -->
          <div class="col-lg-7 col-xl-8 col-md-11 position-relative">
            <div class="alumni-overlay-container h-100">
              <img src="/assets/images/alumni/01.jpg" alt="Stay Connected with GAPOSA"
                class="img-fluid object-cover" />
              <div class="alumni-overlay-content">
                <h3 class="overlay-title">Stay Connected with GAPOSA</h3>
                <p class="overlay-description">Your journey doesn't end at graduation — it evolves. Stay involved and
                  grow with our strong alumni community.</p>
              </div>
            </div>
          </div>

          <!-- Right Side: Core Benefits Boxes -->
          <div class="col-lg-5 col-xl-4 col-md-11 d-flex flex-column justify-content-between">
            <div class="rts-about-details h-100 d-flex flex-column justify-content-between">
              <div class="single-about-info gaposa-green flex-fill">
                <a :href="route('alumni.support')" class="text-decoration-none text-white d-block h-100">
                  <div class="content">
                    <h3 class="title">Career Support</h3>
                    <img src="/assets/images/icon/11.svg" alt="">
                  </div>
                  <div class="desc">
                    <p>Get access to exclusive job opportunities, mentoring, and career-building tools.</p>
                  </div>
                </a>
              </div>

              <div class="single-about-info gaposa-blue flex-fill">
                <a :href="route('alumni.events')" class="text-decoration-none text-white d-block h-100">
                  <div class="content">
                    <h3 class="title">Events & Networking</h3>
                    <img src="/assets/images/icon/12.svg" alt="">
                  </div>
                  <div class="desc">
                    <p>Reconnect with classmates and grow your professional network at our alumni events.</p>
                  </div>
                </a>
              </div>

              <div class="single-about-info gaposa-red flex-fill">
                <a :href="route('alumni.mentorship')" class="text-decoration-none text-white d-block h-100">
                  <div class="content">
                    <h3 class="title">Mentorship</h3>
                    <img src="/assets/images/icon/13.svg" alt="">
                  </div>
                  <div class="desc">
                    <p>Become a mentor or be mentored by experienced GAPOSA alumni in your field.</p>
                  </div>
                </a>
              </div>
            </div>


          </div>
        </div>

        <div class="row !mt-[4rem]">
          <div class="col-12 text-center">
            <a :href="route('alumni.account')" class="rts-theme-btn btn-arrow join-button">Join Now
              <span><i class="fa-regular fa-arrow-right"></i></span>
            </a>
          </div>
        </div>
      </div>
    </section>



    <!-- reunion gallery -->
    <div class="rts-gallery rts__light rts-section-padding ">
      <div class="container">
        <div class="row">
          <div class="rts__section--wrapper v__5">
            <h2 class="rts__section--title">University Reunion Gallery</h2>
          </div>
        </div>
        <div class="gallery-area">
          <div class="row g-5">
            <!-- single gallery item -->
            <div class="col-lg-4 col-md-6">
              <div class="single-gallery">
                <a href="/assets/images/campus/gallery/2x1.jpg" class="single-gallery__item">
                  <img src="/assets/images/campus/gallery/01.jpg" alt="gallery">
                  <div class="single-gallery__icon">
                    <i class="fa-light fa-circle-plus"></i>
                  </div>
                </a>
              </div>
            </div>
            <!-- single gallery item -->
            <div class="col-lg-4 col-md-6">
              <div class="single-gallery">
                <a href="/assets/images/campus/gallery/2x2.jpg" class="single-gallery__item">
                  <img src="/assets/images/campus/gallery/02.jpg" alt="gallery">
                  <div class="single-gallery__icon">
                    <i class="fa-light fa-circle-plus"></i>
                  </div>
                </a>
              </div>
            </div>
            <!-- single gallery item -->
            <div class="col-lg-4 col-md-6">
              <div class="single-gallery">
                <a href="/assets/images/campus/gallery/2x3.jpg" class="single-gallery__item">
                  <img src="/assets/images/campus/gallery/03.jpg" alt="gallery">
                  <div class="single-gallery__icon">
                    <i class="fa-light fa-circle-plus"></i>
                  </div>
                </a>
              </div>
            </div>
            <!-- single gallery item -->
            <div class="col-lg-4 col-md-6">
              <div class="single-gallery">
                <a href="/assets/images/campus/gallery/2x4.jpg" class="single-gallery__item">
                  <img src="/assets/images/campus/gallery/04.jpg" alt="gallery">
                  <div class="single-gallery__icon">
                    <i class="fa-light fa-circle-plus"></i>
                  </div>
                </a>
              </div>
            </div>
            <!-- single gallery item -->
            <div class="col-lg-4 col-md-6">
              <div class="single-gallery">
                <a href="/assets/images/campus/gallery/2x5.jpg" class="single-gallery__item">
                  <img src="/assets/images/campus/gallery/05.jpg" alt="gallery">
                  <div class="single-gallery__icon">
                    <i class="fa-light fa-circle-plus"></i>
                  </div>
                </a>
              </div>
            </div>
            <!-- single gallery item -->
            <div class="col-lg-4 col-md-6">
              <div class="single-gallery">
                <a href="/assets/images/campus/gallery/2x6.jpg" class="single-gallery__item">
                  <img src="/assets/images/campus/gallery/06.jpg" alt="gallery">
                  <div class="single-gallery__icon">
                    <i class="fa-light fa-circle-plus"></i>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- reunion gallery end -->
    <!-- event speaker -->
    <div class="rts-event-speaker rts-section-padding">
      <div class="container">
        <div class="row">
          <div class="rts__section--wrapper">
            <h2 class="rts__section--title text-capitalize">Event Speakers</h2>
          </div>
        </div>
        <!-- event speaker list -->
        <div class="row g-5">
          <!-- single speaker item -->
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="event-speaker">
              <div class="event-speaker__details">
                <div class="speaker-thumb">
                  <img src="/assets/images/speaker/01.jpg" alt="speaker-thumb">
                  <div class="speaker-social-link">
                    <a href="#"><i class="fa-brands fa-skype"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                  </div>
                </div>
                <div class="speaker-meta">
                  <h5 class="speaker__name"><a href="faculty-details.html">Rick Zonson</a></h5>
                  <span class="designation">Assistant Teacher</span>
                </div>
              </div>
            </div>
          </div>
          <!-- single speaker item end -->
          <!-- single speaker item -->
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="event-speaker">
              <div class="event-speaker__details">
                <div class="speaker-thumb">
                  <img src="/assets/images/speaker/02.jpg" alt="speaker-thumb">
                  <div class="speaker-social-link">
                    <a href="#"><i class="fa-brands fa-skype"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                  </div>
                </div>
                <div class="speaker-meta">
                  <h5 class="speaker__name"><a href="faculty-details.html">Thomas Fred</a></h5>
                  <span class="designation">Teacher</span>
                </div>
              </div>
            </div>
          </div>
          <!-- single speaker item end -->
          <!-- single speaker item -->
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="event-speaker">
              <div class="event-speaker__details">
                <div class="speaker-thumb">
                  <img src="/assets/images/speaker/03.jpg" alt="speaker-thumb">
                  <div class="speaker-social-link">
                    <a href="#"><i class="fa-brands fa-skype"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                  </div>
                </div>
                <div class="speaker-meta">
                  <h5 class="speaker__name"><a href="faculty-details.html">Albert Mack</a></h5>
                  <span class="designation">Head Teacher</span>
                </div>
              </div>
            </div>
          </div>
          <!-- single speaker item end -->
          <!-- single speaker item -->
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="event-speaker">
              <div class="event-speaker__details">
                <div class="speaker-thumb">
                  <img src="/assets/images/speaker/04.jpg" alt="speaker-thumb">
                  <div class="speaker-social-link">
                    <a href="#"><i class="fa-brands fa-skype"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                  </div>
                </div>
                <div class="speaker-meta">
                  <h5 class="speaker__name"><a href="faculty-details.html">Micheal Alfred</a></h5>
                  <span class="designation">Assistant Teacher</span>
                </div>
              </div>
            </div>
          </div>
          <!-- single speaker item end -->
        </div>
      </div>
    </div>
    <!-- event speaker end -->

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

<style scoped>
.join-button {
  max-width: max-content;
  transition: var(--transition);
  font-weight: 500;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  position: relative;
  background: var(--rt-primary-2);
  color: var(--rt-white);
  overflow: hidden;
  z-index: 1;
  padding: 15px 100px;
  border-radius: 40px;
}

.alumni-overlay-container {
  position: relative;
  border-radius: 10px;
  overflow: hidden;
  height: 100%;
}

.alumni-overlay-container img {
  width: 100%;
  height: 100%;
  /* object-fit: cover; */
  filter: brightness(65%);
  border-radius: 8px;
}

.alumni-overlay-content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(12, 12, 12, 0.7);
  /* dark overlay */
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 40px;
}

.overlay-title {
  font-size: 5rem;
  font-weight: 700;
  margin-bottom: 20px;
  color: #fff;
}

.overlay-description {
  font-size: 2rem;
  line-height: 1.6;
  color: #fff;
}

/* GAPOSA custom color overrides for alumni page only */
.gaposa-green {
  background-color: #0f5132;
  /* deep green */
  border-radius: 8px;
  padding: 24px;
  margin-bottom: 16px;
}

.gaposa-blue {
  background-color: #084298;
  /* deep blue */
  border-radius: 8px;
  padding: 24px;
  margin-bottom: 16px;
}

.gaposa-red {
  background-color: #842029;
  /* deep red */
  border-radius: 8px;
  padding: 24px;
  margin-bottom: 16px;
}

.single-about-info h3.title {
  color: #fff;
}

.single-about-info p {
  color: #eee;
}
</style>
