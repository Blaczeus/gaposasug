<template>
  <li class="single-event">
    <div class="single-event-counter">
      <div class="count-number rt-clip-text"></div>
    </div>
    <div class="single-event-content">
      <h5 class="event-title">{{ title }}</h5>
      <div class="single-event-content-meta">
        <div class="event-date">
          <span><i class="fal fa-calendar"></i></span>
          <span>{{ date }}</span>
        </div>
        <div class="event-time">
          <span><i class="fa-sharp fa-thin fa-clock"></i></span>
          <span>{{ time }}</span>
        </div>
        <div class="event-place">
          <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
          <span>{{ location }}</span>
        </div>
      </div>
    </div>
  </li>
</template>

<script setup>
defineProps({
  title: {
    type: String,
    required: true,
  },
  date: {
    type: String,
    required: true,
  },
  time: {
    type: String,
    required: true,
  },
  location: {
    type: String,
    required: true,
  },
});
</script>
