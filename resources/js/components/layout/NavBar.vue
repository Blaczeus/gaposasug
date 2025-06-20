<!-- resources/js/components/layout/NavBar.vue -->
<template>
  <div class="header__menu">
    <div class="navigation">
      <nav class="navigation__menu">
        <ul>
          <li class="navigation__menu--item">
            <a href="/" class="navigation__menu--item__link">Home</a>
          </li>
          <li class="navigation__menu--item">
            <a href="/about" class="navigation__menu--item__link">About</a>
          </li>
          <li class="navigation__menu--item">
            <a href="/events" class="navigation__menu--item__link">Events</a>
          </li>
          <li class="navigation__menu--item">
            <a href="/blog" class="navigation__menu--item__link">News</a>
          </li>
          <li class="navigation__menu--item">
            <a href="/student-voice" class="navigation__menu--item__link">Student Voice</a>
          </li>

          <!-- Alumni Dropdown -->
          <li class="navigation__menu--item has-child has-arrow">
            <a href="/alumni" class="navigation__menu--item__link">Alumni</a>
            <ul class="submenu sub__style">
              <li><a href="/alumni-benefits">Alumni Benefits</a></li>
              <li><a href="/graduate-support">Graduate Career Support</a></li>
              <li><a href="/networking-events">Events and Networking</a></li>
              <li><a href="/recent-graduates">Recent Graduates</a></li>
              <li><a href="/mentorship">Mentorship</a></li>
              <li><a href="/alumni-account">Alumni Account</a></li>
            </ul>
          </li>

          <!-- Support Dropdown -->
          <li class="navigation__menu--item has-child has-arrow">
            <a href="javascript:void(0);" class="navigation__menu--item__link">Support</a>
            <ul class="submenu sub__style">
              <li><a href="/support/housing">Housing Issue</a></li>
              <li><a href="/support/academic">Academic</a></li>
              <li><a href="/support/report">Report</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script setup>
// No logic yet, pure structure.
</script>
