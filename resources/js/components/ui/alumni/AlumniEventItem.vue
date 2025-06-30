<template>
  <div class="col-lg-4 col-md-6 col-sm-6">
    <div class="rts__single--event v__3">
      <div class="rts__single--event--thumb">
        <a :href="event.link">
          <img :src="event.image" :alt="event.title" />
        </a>
      </div>
      <div class="rts__single--event--meta">
        <div class="rts__single--event--meta--dl">
          <span class="date">
            <img src="/assets/images/icon/calendar.svg" alt="calendar icon" />
            <span>{{ event.date }}</span>
          </span>
          <span class="location">
            <i class="fa-sharp fa-light fa-location-dot"></i>
            <span>{{ event.location }}</span>
          </span>
        </div>
        <h5 class="rts__single--event--meta--title">
          <a :href="route('events.details', { slug: event.slug })">{{ event.title }}</a>
        </h5>
        <a :href="route('events.details', { slug: event.slug })" class="rts__round--btn">
          <i class="fa-light fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  event: {
    type: Object,
    required: true,
  },
});
</script>
