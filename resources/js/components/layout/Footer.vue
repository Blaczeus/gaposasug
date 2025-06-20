<template>
  <footer class="rts-footer v_2 pt--100 pb--100">
    <div class="container">
      <div class="row gy-5 gy-lg-0">
        <!-- Logo & Contact -->
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="rts-footer-widget w-320">
            <a href="/" class="d-block rts-footer-logo mb--40">
              <img src="/assets/images/logo/logo__white.svg" alt="Gaposa SUG" />
            </a>
            <p>
              We are passionate education dedicated to providing high-quality
              resources learners all backgrounds.
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

        <!-- Menu Column 1 -->
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

        <!-- Menu Column 2 -->
        <div class="col-lg-2 col-md-6 col-sm-4">
          <div class="rts-footer-widget ml--30">
            <h6 class="rt-semi">Quick Links</h6>
            <div class="rts-footer-menu">
              <ul>
                <li><a href="/about">About</a></li>
                <li><a href="/tution-fee">Tution Fee</a></li>
                <li><a href="/alumni">Alumni</a></li>
                <li><a href="/faculty">Faculty Staff</a></li>
                <li><a href="/event">Event</a></li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Recent Posts -->
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
import { onMounted } from 'vue'

onMounted(() => {
  document.getElementById('year').textContent = new Date().getFullYear()
})
</script>
