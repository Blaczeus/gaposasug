<script setup lang="ts">
import { ref } from 'vue'
import SwiperInit from '@/components/ui/SwiperInit.vue'
import BackToTop from '@/components/ui/BackToTop.vue'
import Header from '@/components/layout/Header.vue'
import MobileMenu from '@/components/layout/MobileMenu.vue'
import Footer from '@/components/layout/Footer.vue'
import SearchBar from '@/components/ui/SearchBar.vue'
import HeroSlide from '@/components/ui/HeroSlide.vue'
import EventItem from '@/components/ui/events/EventItem.vue'
import TabNavigation from '@/components/ui/noticeboard/TabNavigation.vue';
import NoticeList from '@/components/ui/noticeboard/NoticeList.vue';
import BlogPost from '@/components/ui/blog/BlogPost.vue'
import FeaturedBlogPost from '@/components/ui/blog/FeaturedBlogPost.vue'
import NewsletterBox from '@/components/NewsletterBox.vue'

const featuredPost = {
  title: 'How the Student Union is Tackling Campus Issues in 2025',
  author: 'GAPOSA SUG',
  date: 'June 25, 2025',
  image: '/assets/images/blog/big-thumb-1.jpg',
  link: 'blog-details.html'
}

const otherPosts = [
  {
    title: 'Inside the Union: How We Organize and Support Students',
    author: 'SUG Publicity Officer',
    date: 'June 24, 2025',
    image: '/assets/images/blog/small-thumb-1.jpg',
    link: 'blog-details.html'
  },
  {
    title: 'Campus Safety Tips Every Student Should Know',
    author: 'Union Welfare Dept',
    date: 'June 23, 2025',
    image: '/assets/images/blog/small-thumb-2.jpg',
    link: 'blog-details.html'
  },
  {
    title: 'Highlights from Our Recent Leadership Summit',
    author: 'GAPOSA SUG',
    date: 'June 21, 2025',
    image: '/assets/images/blog/small-thumb-3.jpg',
    link: 'blog-details.html'
  }
]

const activeTab = ref('latest');

const latestNotices = [
  { day: "20", month: "Jan", title: "Notice Regarding Upcoming Campus Event: Spring Fling Carnival.", link: "notice-details.html" },
  { day: "22", month: "Jan", title: "Important Notice: Changes to Examination Schedule for Fall Semester 2024.", link: "notice-details.html" },
  // ...
];

const examNotices = [
  { day: "20", month: "Jan", title: "Important Notice: Midterm Examination Schedule for Spring Semester 2024.", link: "notice-details.html" },
  // ...
];

const admissionNotices = [
  { day: "26", month: "Jan", title: "Admission Notice: Applications Now Open for Fall 2024 Intake", link: "notice-details.html" },
  // ...
];


const events = [
  {
    title: 'Diversity, Equity, and Inclusion',
    date: 'November 28, 2023',
    time: '10:30 am',
    location: 'Yarra Park, UK'
  },
  {
    title: 'Talking Money With Kids and Teens',
    date: 'November 28, 2023',
    time: '10:30 am',
    location: 'Yarra Park, UK'
  },
  {
    title: 'Planning for College After Affirmative Action',
    date: 'November 28, 2023',
    time: '10:30 am',
    location: 'Yarra Park, UK'
  }
];

</script>

<template>
  <div>
    <SwiperInit />
    <!-- header area start -->
    <Header />
    <!-- header area end -->
    <!-- hero slider start -->
    <div class="rts-hero-slider rt-relative v_2">
      <div class="rts-hero-slider-active swiper swiper-data" data-swiper='{
        "slidesPerView":1,
        "effect": "fade",
        "loop": false,
        "speed": 1000,
        "navigation":{
            "nextEl":".rt-next",
            "prevEl":".rt-prev"
        },
        "autoplay":{
            "delay":"7000"
        }
      }'>
        <div class="swiper-wrapper">
          <HeroSlide background="/assets/images/banner/slider__1.png" subtitle="Knowledge meets innovation"
            title="Inspiring Minds<br>Shaping Futures"
            description="Empowering GAPOSA students to thrive through bold leadership and unified representation." 
            ctaLink="/academic" ctaText="View Our Program" />
          <HeroSlide background="/assets/images/banner/slider__2.png" subtitle="Driven by Purpose"
            title="Your Voice.<br>Your Union."
            description="We amplify your concerns, shape school policy, and protect your academic welfare."
            ctaLink="/student-voice" ctaText="Raise Your Voice" />
          <HeroSlide background="/assets/images/banner/slider__3.jpg" subtitle="Strength in Unity"
            title="A Government<br>By Students, For Students"
            description="The SUG is here to support, serve, and lead every student of GAPOSA with transparency and purpose."
            ctaLink="/about" ctaText="Learn More About Us" />
        </div>

        <!-- Slider Arrows -->
        <div class="rts-slider-arrow">
          <div class="rt-slider-btn rt-next"><i class="fa-regular fa-arrow-left"></i></div>
          <div class="rt-slider-btn rt-prev"><i class="fa-regular fa-arrow-right"></i></div>
        </div>
      </div>
    </div>
    <!-- hero slider  end -->

    <!-- get involved start -->
    <section class="rts-application-area rts-section-padding v_2 relative">
      <div class="container">
        <div class="row justify-content-center">
          <div class="rts-section rt-center mb--60 pb-96 relative z-10">
            <h2 class="rts-section-title">Get Involved with SUG</h2>
            <p class="mt--10">Become a volunteer, join a committee, or contribute to student leadership and events. Your
              voice matters.</p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="rts-application-form">
              <div class="rts-application-form-content v__2 relative z-20 rounded-md shadow-md">
                <h5 class="heading-title mb--25 text-lg">Join the Team</h5>
                <form action="#" class="rts-form">
                  <div class="rts-input rt-flex">
                    <div class="single-input">
                      <input type="text" name="name" placeholder="Full Name" required>
                    </div>
                    <div class="single-input">
                      <input type="text" name="matric" placeholder="Matric Number" required>
                    </div>
                    <div class="single-input">
                      <input type="text" name="department" placeholder="Department" required>
                    </div>
                    <div class="single-input">
                      <input type="email" name="email" placeholder="Email (optional)">
                    </div>
                  </div>

                  <div class="rts-input w-full">
                    <div class="single-input">
                      <input type="text" name="interest"
                        placeholder="Area of Interest (e.g., Media, Welfare, Academics)" required>
                    </div>
                  </div>

                  <div class="rts-input w-full">
                    <div class="single-input">
                      <textarea name="message" placeholder="Tell us why you'd like to join" rows="4"
                        required></textarea>
                    </div>
                  </div>

                  <button type="submit" class="rts-theme-btn rts-nbg-btn btn-arrow v2 full-btn">Join the Team <span><i
                        class="fa-sharp fa-regular fa-arrow-right"></i></span></button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="rt-shape">
          <img src="/assets/images/apply/shape/01.png" alt="shape" class="shape rt-shape__1">
          <img src="/assets/images/apply/shape/02.png" alt="shape" class="shape rt-shape__2">
          <img src="/assets/images/apply/shape/03.png" alt="shape" class="shape rt-shape__3">
          <img src="/assets/images/apply/shape/04.png" alt="shape" class="shape rt-shape__4">
        </div>
      </div>
    </section>
    <!-- get involved end -->

    <!-- campus life start -->
    <div class="rts-campus rts-campus-bg v_2">
      <div class="container">
        <div class="row g-40 align-items-center">
          <div class="col-lg-6">
            <div class="rts-left-section">
              <h2 class="section-title">
                Student Life
                <span>at GAPOSA</span>
              </h2>
              <div class="left-section-content">
                <p>Life at Gateway ICT Polytechnic goes beyond classrooms. The Student Union Government plays an active
                  role in creating a vibrant campus through events, advocacy, and opportunities for leadership and
                  community engagement. From cultural celebrations to student-led initiatives, we help shape a dynamic
                  student experience.</p>
                <a href="/campus-life" class="rts-theme-btn primary btn-arrow">
                  Explore More<span><i class="fa-thin fa-arrow-right"></i></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="rts-right-section rt-relative">
              <div class="campus-video">
                <img src="/assets/images/feature/campus-2.jpg" alt="SUG in action">
                <a class="video-play popup-video" href="https://www.youtube.com/watch?v=Uwq1uiuM_9w">
                  <img src="/assets/images/icon/play-round.svg" class="round" alt="">
                  <img src="/assets/images/icon/play-icon.svg" class="play-icon" alt="">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- campus life end -->

    <!-- program start -->
    <section class="rts-program v_2 rts-section-padding">
      <!-- <div class="container">
          <div class="row rt-center">
            <div class="col-sm-12">
              <div class="rts__section--wper v__5">
                <h2 class="rts__section--title">Discover Our Program</h2>
              </div>
            </div>
          </div>
          <div class="row justify-content-center g-0">
            <div class="col-lg-4 col-md-10">
              <div class="rts-program-single">
                <div class="rts-program-single__content">
                  <div class="rts-program-hover">
                    <div class="icon">
                      <img src="/assets/images/program/icon/03.svg" alt="education">
                    </div>
                    <a href="program-single.html" class="program-link">Graduate Admissions</a>
                    <p>Embark on a journey of knowledge, discovery, and growth at Unipix University.</p>
                    <a href="program-single.html" class="about-btn rts-nbg-btn btn-arrow 
  rt-white before-white">Visit Program <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-10">
              <div class="rts-program-single ">
                <div class="rts-program-single__content">
                  <div class="rts-program-hover center-item rt-primary-bg">
                    <ul class="list-unstyled">
                      <li class="single-program">
                        <div class="icon-box">
                          <img src="/assets/images/icon/04.svg" alt="">
                        </div>
                        <a href="program-single.html">Major Programs</a>
                      </li>
                      <li class="single-program">
                        <div class="icon-box">
                          <img src="/assets/images/icon/05.svg" alt="">
                        </div>
                        <a href="program-single.html">Minors Programs</a>
                      </li>
                      <li class="single-program">
                        <div class="icon-box">
                          <img src="/assets/images/icon/06.svg" alt="">
                        </div>
                        <a href="program-single.html">Bachelor’s & Master’s</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-10">
              <div class="rts-program-single">
                <div class="rts-program-single__content">
                  <div class="rts-program-hover">
                    <div class="icon">
                      <img src="/assets/images/program/icon/01.svg" alt="education">
                    </div>
                    <a href="program-single.html" class="program-link">Online Education</a>
                    <p>Embark on a journey of knowledge, discovery, and growth at Unipix University.</p>
                    <a href="program-single.html" class="about-btn rts-nbg-btn btn-arrow 
  rt-white before-white">Visit Program <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div> -->
    </section>
    <!-- program end -->

    <!-- student support section -->
    <section class="rts-scholarship rts-scholarship-bg rts-section-height">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="rts-scholarship-info">
              <h2 class="rts-section-title">Student Support & Relief Programs</h2>
              <p class="w-740 mb--50">
                The SUG is committed to supporting GAPOSA students facing financial hardship or other challenges. From
                emergency aid and relief drives to subsidized resources and peer-led initiatives, we aim to provide
                practical help when it's needed most.
              </p>
              <a href="/support" class="rts-theme-btn btn-arrow">Learn More<span><i
                    class="fa-thin fa-arrow-right"></i></span></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- student support section end -->

    <!-- notice board start -->
    <section class="rts-notice rts-section-padding rts-section-padding">
      <div class="container">
        <div class="row gy-5 gy-lg-0 justify-content-md-center">

          <!-- Alumni Event Section -->
          <div class="col-md-11 col-lg-7">
            <div class="rts-event-section">
              <h4 class="rts-section-title mb--25">Alumni Event</h4>
              <div class="rts-event-section-content">
                <template v-if="events.length">
                  <ul class="list-unstyled rts-counter">
                    <EventItem v-for="(event, index) in events" :key="index" :title="event.title" :date="event.date"
                      :time="event.time" :location="event.location" />
                  </ul>
                </template>
                <p v-else class="text-muted">No upcoming alumni events at the moment.</p>
              </div>
            </div>
          </div>

          <!-- Notice Tabs Section -->
          <div class="col-md-11 col-lg-5">
            <div class="rts-notice-section">
              <div class="rts-section rt-between pb--25 rts-border-bottom-2">
                <h4 class="rts-section-title">Notice</h4>
                <a href="#" class="rts-arrow">View All <span><i
                      class="fa-sharp fa-regular fa-arrow-right"></i></span></a>
              </div>

              <div class="rts-tab">
                <TabNavigation v-model:activeTab="activeTab" />

                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show" :class="{ active: activeTab === 'latest' }" id="pills-home"
                    role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <template v-if="latestNotices.length">
                      <NoticeList :notices="latestNotices" />
                    </template>
                    <p v-else class="text-muted">No latest notices available.</p>
                  </div>

                  <div class="tab-pane fade show" :class="{ active: activeTab === 'exam' }" id="pills-profile"
                    role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                    <template v-if="examNotices.length">
                      <NoticeList :notices="examNotices" />
                    </template>
                    <p v-else class="text-muted">No exam-related notices available.</p>
                  </div>

                  <div class="tab-pane fade show" :class="{ active: activeTab === 'admission' }" id="pills-contact"
                    role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                    <template v-if="admissionNotices.length">
                      <NoticeList :notices="admissionNotices" />
                    </template>
                    <p v-else class="text-muted">No admission notices available.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- notice board end -->

    <!-- blog area start -->
    <div class="rts-blog rts-section-padding v_2 no-bg">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-11 col-lg-12">
            <div class="rts-section rts-border-bottom-1 mb--50 pb--20">
              <h2 class="rts-section-title">Latest From Our Blogs</h2>
              <p class="rts-section-description">
                Get updates, tips, and news relevant to GAPOSA students and the Student Union.
              </p>
              <a href="/blog" class="rts-arrow">
                View All <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
              </a>
            </div>
          </div>
        </div>

        <!-- blog content -->
        <div class="row g-5">
          <div class="col-lg-6">
            <!-- Featured blog -->
            <FeaturedBlogPost :post="featuredPost" />
          </div>

          <div class="col-lg-6">
            <div class="rts-blog-post">
              <BlogPost v-for="(post, index) in otherPosts" :key="index" :post="post" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- blog area end -->

    <!-- newsletter -->
    <NewsletterBox />
    <!-- newsletter end -->

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
