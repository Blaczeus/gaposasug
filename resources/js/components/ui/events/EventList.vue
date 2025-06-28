<template>
  <div class="rts-event rts-section-padding">
    <div class="container">
      <div class="row justify-content-sm-center justify-content-md-start g-5">
        <div v-for="(event, index) in events" :key="index" class="col-lg-4 col-md-6 col-sm-10">
          <EventCard :event="event" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import EventCard from './EventCard.vue'
import { events } from '@/data/dummyData'
</script>
