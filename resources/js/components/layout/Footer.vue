<template>
  <footer class="footer pt--100 pb--80" v-if="!isHome">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="footer__widget">
            <div class="footer__widget--logo">
              <a href="/"><img src="/assets/images/logo/logo__white.svg" alt="Gaposa SUG logo" /></a>
            </div>
            <p class="footer__widget--description">
              We are passionate about empowering GAPOSA students and providing high-quality resources to learners of all
              backgrounds.
            </p>
            <div class="footer__widget--social">
              <ul class="social">
                <li class="social__link"><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                <li class="social__link"><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li class="social__link"><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                <li class="social__link"><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer__widget">
            <h6 class="footer__widget--title">Our Campus</h6>
            <div class="footer__widget--menu">
              <ul>
                <li><a href="/academic">Academic</a></li>
                <li><a href="/athletics">Athletics</a></li>
                <li><a href="/campus-life">Campus life</a></li>
                <li><a href="/research">Research</a></li>
                <li><a href="/academic-area">Academic Area</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="footer__widget">
            <h6 class="footer__widget--title">Quick Links</h6>
            <div class="footer__widget--menu">
              <ul>
                <li><a href="/about">About</a></li>
                <li><a href="/tution-fee">Tuition Fee</a></li>
                <li><a href="/alumni">Alumni</a></li>
                <li><a href="/faculty">Faculty Staff</a></li>
                <li><a href="/events">Events</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer__widget">
            <h6 class="footer__widget--title">Quick Access</h6>
            <div class="footer__widget--button">
              <a href="/admission" class="cta__button active">Apply Now</a>
              <a href="/scholarship" class="cta__button">Scholarships</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <footer class="rts-footer v_2 pt--100 pb--100" v-else>
    <div class="container">
      <div class="row gy-5 gy-lg-0">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="rts-footer-widget w-320">
            <a href="/" class="d-block rts-footer-logo mb--40">
              <img src="/assets/images/logo/logo__white.svg" alt="Gaposa SUG" />
            </a>
            <p>
              We are passionate about empowering GAPOSA students and providing high-quality resources to learners of all
              backgrounds.
            </p>
            <div class="rts-contact-link">
              <a href="mailto:contact@gaposa.edu.ng">
                <i class="fa-sharp fa-light fa-location-dot"></i>
                Park, Melbourne, Australia
              </a>
              <a href="callto:121">
                <i class="fa-thin fa-phone"></i>
                485-826-710
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="rts-footer-widget">
            <h6 class="rt-semi">Our Campus</h6>
            <div class="rts-footer-menu">
              <ul>
                <li><a href="/academic">Academic</a></li>
                <li><a href="/athletics">Athletics</a></li>
                <li><a href="/campus-life">Campus life</a></li>
                <li><a href="/research">Research</a></li>
                <li><a href="/academic-area">Academic Area</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 col-sm-4">
          <div class="rts-footer-widget ml--30">
            <h6 class="rt-semi">Quick Links</h6>
            <div class="rts-footer-menu">
              <ul>
                <li><a href="/about">About</a></li>
                <li><a href="/tution-fee">Tuition Fee</a></li>
                <li><a href="/alumni">Alumni</a></li>
                <li><a href="/faculty">Faculty Staff</a></li>
                <li><a href="/events">Events</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-8">
          <div class="rts-footer-widget ml--30">
            <h6 class="rt-semi">Recent Post</h6>
            <div class="rts-post-widget">
              <ul class="list-unstyled">
                <li class="single-post">
                  <a href="/blog-details" class="blog-thumb">
                    <img src="/assets/images/blog/w-1.jpg" alt="latest post" />
                  </a>
                  <div class="post-content">
                    <span class="rt-date">October 29, 2023</span>
                    <a href="/blog-details">
                      Avoid These 4 Common When Managing Remote Teams
                    </a>
                  </div>
                </li>
                <li class="single-post">
                  <a href="/blog-details" class="blog-thumb">
                    <img src="/assets/images/blog/small-thumb-1.jpg" alt="latest post" />
                  </a>
                  <div class="post-content">
                    <span class="rt-date">October 29, 2023</span>
                    <a href="/blog-details">
                      Avoid These 4 Common When Managing Remote Teams
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div class="rts-footer-copy-right v_1">
    <div class="container">
      <div class="row">
        <div class="rt-center">
          <p class="--p-xs">
            Copyright &copy; <span id="year"></span> All Rights Reserved by
            <a href="#">Gaposa SUG</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

onMounted(() => {
  document.getElementById('year').textContent = new Date().getFullYear()
})

const page = usePage()
const isHome = computed(() => page.url === '/')
</script>
