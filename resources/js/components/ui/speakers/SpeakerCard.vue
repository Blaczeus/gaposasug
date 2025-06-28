<template>
  <div class="col-lg-3 col-md-4 col-sm-6">
    <div class="event-speaker">
      <div class="event-speaker__details">
        <div class="speaker-thumb">
          <img :src="speaker.image" alt="speaker-thumb" />
          <div class="speaker-social-link">
            <a v-for="(link, i) in speaker.socials" :key="i" :href="link.url" target="_blank">
              <i :class="link.icon"></i>
            </a>
          </div>
        </div>
        <div class="speaker-meta">
          <h5 class="speaker__name">
            <a :href="speaker.profile">{{ speaker.name }}</a>
          </h5>
          <span class="designation">{{ speaker.designation }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  speaker: {
    type: Object,
    required: true,
  },
});
</script>
