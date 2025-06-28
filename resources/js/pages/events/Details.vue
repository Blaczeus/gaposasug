<script setup lang="ts">
import SwiperInit from '@/components/ui/SwiperInit.vue'
import BackToTop from '@/components/ui/BackToTop.vue'
import Header from '@/components/layout/Header.vue'
import MobileMenu from '@/components/layout/MobileMenu.vue'
import Footer from '@/components/layout/Footer.vue'
import SearchBar from '@/components/ui/SearchBar.vue'
import Breadcrumb from '@/components/layout/Breadcrumb.vue'
import SpeakerCard from '@/components/ui/speakers/SpeakerCard.vue'
import { speakers, events } from '@/data/dummyData'
import { usePage } from '@inertiajs/vue3'

const props = defineProps({
  slug: {
    type: String,
  },
})

const event = events.find((e) => e.slug === props.slug);

</script>

<template>
  <div>
    <SwiperInit />
    <!-- header area start -->
    <Header />
    <!-- header area end -->

    <!-- BREADCRUMB AREA -->
    <Breadcrumb :title="event?.title || 'Event Details'" :breadcrumbs="[
      { label: 'Home', route: 'home' },
      { label: 'Events', route: 'events' },
      { label: event?.title || 'Event Details' }
    ]" />

    <!-- BREADCRUMB AREA END -->

    <!-- event details -->
    <div class="rts-event-details pt--120">
      <div class="container">
        <div class="row justify-content-md-center justify-content-start">
          <div class="col-lg-7 col-md-10">
            <div class="event-details">
              <div class="event-details__content">
                <div class="event-details__content--thumb">
                  <img :src="event.image" alt="event details" />
                </div>
                <div class="event-details__content--text">
                  <div class="rts-section">
                    <h4 class="rts-section-title">About The Event</h4>
                    <p class="description">
                      Join us for the {{ event.title }}, a thought-provoking educational event
                      designed to inspire and empower individuals to navigate the challenges and opportunities of
                      tomorrow's world. This symposium brings together leading experts, visionaries, and innovators from
                      various fields to explore cutting-edge ideas and share insights on shaping the future.
                    </p>
                  </div>
                </div>
                <div class="event-details__content--feature">
                  <!-- single feature -->
                  <div class="single-feature">
                    <p class="feature-heading">Interactive Workshops:</p>
                    <p class="feature-description">
                      Connect with like-minded individuals, professionals, and mentors.
                      Build a network that will support your personal and professional growth, fostering collaboration
                      and idea exchange.
                    </p>
                  </div>
                  <!-- single feature -->
                  <div class="single-feature">
                    <p class="feature-heading">Networking Opportunities:</p>
                    <p class="feature-description">
                      Hear from renowned thought leaders who will delve into topics such as
                      artificial intelligence, sustainability, and the future of work. Gain valuable perspectives.
                    </p>
                  </div>
                  <!-- single feature -->
                  <div class="single-feature">
                    <p class="feature-heading">Registration:</p>
                    <p class="feature-description">
                      Secure your spot today and be part of the {{ event.title }}.
                      Early bird registration is now open at www.Unipix. Don’t miss this opportunity to gain valuable
                      insights.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-5 col-md-10">
            <div class="event-sidebar">
              <!-- event information -->
              <div class="event-information">
                <h5 class="rts-section-title">Event Information</h5>
                <div class="single-info">
                  <div class="info-repeat">
                    <div class="left-side">
                      <span><i class="fa-light fa-money-check-dollar"></i></span> Cost:
                    </div>
                    <div class="right-side">
                      <span class="desc price">$86.00</span>
                    </div>
                  </div>
                  <div class="info-repeat">
                    <div class="left-side">
                      <span><i class="fa-regular fa-calendar-week"></i></span> Date:
                    </div>
                    <div class="right-side">
                      <span class="desc">{{ event.date }}</span>
                    </div>
                  </div>
                  <div class="info-repeat">
                    <div class="left-side">
                      <span><i class="fa-thin fa-users"></i></span> Total Slot:
                    </div>
                    <div class="right-side">
                      <span class="desc">54</span>
                    </div>
                  </div>
                  <div class="info-repeat">
                    <div class="left-side">
                      <span><i class="fa-regular fa-lock"></i></span> Booked Slot:
                    </div>
                    <div class="right-side">
                      <span class="desc">0</span>
                    </div>
                  </div>
                </div>

                <div class="book-button">
                  <a href="#" class="rts-theme-btn primary">Book Now</a>
                </div>

                <!-- countdown -->
                <div class="event-count-down">
                  <div class="count-item">
                    <p><span id="day"></span>day</p>
                  </div>
                  <div class="count-item">
                    <p><span id="hour"></span>hours</p>
                  </div>
                  <div class="count-item">
                    <p><span id="minute"></span>minute</p>
                  </div>
                  <div class="count-item">
                    <p><span id="second"></span>second</p>
                  </div>
                </div>

                <div class="event-timeout rt-center mt--20">
                  <div id="timeout"></div>
                </div>
              </div>

              <!-- event venue -->
              <div class="event-venue mt--50">
                <h5 class="rts-section-title">Event Venue</h5>
                <div class="event-venu-information">
                  <div class="single-info">
                    <div class="info-repeat">
                      <div class="left-side bold">Venue:</div>
                      <div class="right-side">
                        <span class="desc">{{ event.location }}</span>
                      </div>
                    </div>
                    <div class="info-repeat">
                      <div class="left-side bold">Location:</div>
                      <div class="right-side">
                        <span class="desc location">Pinecrest Golf Club, 123 Fairway Lane, Anytown, USA</span>
                      </div>
                    </div>
                    <div class="info-repeat">
                      <div class="left-side bold">Phone Number:</div>
                      <div class="right-side">
                        <span class="desc"><a href="callto:121">(+1) 0 221 457 441</a></span>
                      </div>
                    </div>
                    <div class="info-repeat">
                      <div class="left-side bold">Web Site:</div>
                      <div class="right-side">
                        <span class="desc">
                          <a href="#">www.Unipix.com</a>
                          <span class="social-links">
                            <a href="#"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                            <a href="#"><i class="fa-brands fa-youtube"></i></a>
                          </span>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end event venue -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- event details end -->

    <!-- event speaker -->
    <div class="rts-event-speaker mt-44">
      <div class="container">
        <div class="row">
          <div class="rts-section text-center">
            <h3 class="rts-section-title">Event Speakers</h3>
          </div>
        </div>
        <!-- event speaker list -->
        <div class="row g-5 mb-40 justify-center">
          <SpeakerCard v-for="(speaker, index) in speakers" :key="index" :speaker="speaker" />
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
