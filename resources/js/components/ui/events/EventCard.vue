<template>
  <div class="single-event">
    <div class="event single-event__content">
      <div class="event__thumb">
        <img :src="event.image" alt="event thumbnail" />
      </div>
      <div class="event__meta">
        <div class="event__meta--da">
          <div class="event-date">
            <span><i class="fal fa-calendar"></i></span>
            <span>{{ event.date }}</span>
          </div>
          <div class="event-time">
            <span><i class="fa-sharp fa-thin fa-clock"></i></span>
            <span>{{ event.time }}</span>
          </div>
        </div>
        <h5 class="event__title">
          <a :href="route('events.details', { slug: event.slug })">{{ event.title }}</a>
        </h5>
      </div>
      <div class="event-place">
        <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
        <span>{{ event.location }}</span>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  event: {
    type: Object,
    required: true,
    validator: (value) => {
      return (
        'title' in value &&
        'date' in value &&
        'time' in value &&
        'location' in value &&
        'image' in value &&
        'slug' in value
      )
    },
  },
})
</script>
