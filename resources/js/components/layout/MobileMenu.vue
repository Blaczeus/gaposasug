<template>
  <div id="side-bar" class="side-bar">
    <!-- Close Button -->
    <button class="close-icon-menu" @click="closeMenu">
      <i class="far fa-times"></i>
    </button>

    <!-- Desktop Info -->
    <div class="inner-main-wrapper-desk">
      <div class="thumbnail">
        <img src="/assets/images/logo/logo__five.svg" alt="Gaposa SUG" />
      </div>

      <div class="inner-content">
        <p class="disc">
          A modern student-focused interface with intuitive design & relevant features for Gaposa SUG.
        </p>

        <!-- Banner -->
        <div class="offcanvase__banner mt--50">
          <div class="offcanvase__banner--content">
            <img src="/assets/images/offcanvase.jpg" alt="Apply Banner" />
            <a href="/admission" class="rts-theme-btn">Apply Now</a>
          </div>
        </div>

        <!-- Contact Info -->
        <div class="offcanvase__info">
          <div class="offcanvase__info--content">
            <a href="tel:+61485826710">
              <span><i class="fa-sharp fa-light fa-phone"></i></span>+(61) 485-826-710
            </a>
            <a href="#">
              <span><i class="fa-sharp fa-light fa-location-dot"></i></span>Yarra Park, Melbourne, Australia
            </a>
            <div class="offcanvase__info--content--social">
              <p class="title">Follow Us:</p>
              <div class="social__links">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile Nav -->
    <div class="mobile-menu-main">
      <nav class="nav-main mainmenu-nav mt--30">
        <ul class="mainmenu metismenu" id="mobile-menu-active">
          <li><a class="mobile-menu-link main" href="/">Home</a></li>
          <li><a class="mobile-menu-link main" href="/about">About</a></li>
          <li><a class="mobile-menu-link main" href="/events">Events</a></li>
          <li><a class="mobile-menu-link main" href="/blogs">News</a></li>
          <li><a class="mobile-menu-link main" href="/student-voice">Student Voice</a></li>

          <li class="has-droupdown">
            <a href="javascript:void(0);" class="main">Alumni</a>
            <ul class="submenu mm-collapse">
              <li><a href="/alumni-benefits">Alumni Benefits</a></li>
              <li><a href="/graduate-support">Graduate Career Support</a></li>
              <li><a href="/networking-events">Events and Networking</a></li>
              <li><a href="/recent-graduates">Recent Graduates</a></li>
              <li><a href="/mentorship">Mentorship</a></li>
              <li><a href="/alumni-account">Alumni Account</a></li>
            </ul>
          </li>

          <li class="has-droupdown">
            <a href="javascript:void(0);" class="main">Support</a>
            <ul class="submenu mm-collapse">
              <li><a href="/support/housing">Housing Issue</a></li>
              <li><a href="/support/academic">Academic</a></li>
              <li><a href="/support/report">Report</a></li>
            </ul>
          </li>
        </ul>
      </nav>

      <!-- Bottom Contact Info -->
      <div class="offcanvase__info--content mt--30">
        <a href="tel:+61485826710">
          <span><i class="fa-sharp fa-light fa-phone"></i></span>+(61) 485-826-710
        </a>
        <a href="#"><span><i class="fa-sharp fa-light fa-location-dot"></i></span>Yarra Park, Melbourne, Australia</a>
        <div class="offcanvase__info--content--social">
          <p class="title">Follow Us:</p>
          <div class="social__links">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted } from 'vue'
import $ from 'jquery'

const closeMenu = () => {
  $('#side-bar').removeClass('show')
  $('#anywhere-home').removeClass('bgshow')
}

onMounted(() => {
  $('#mobile-menu-active').metisMenu()
})
</script>
