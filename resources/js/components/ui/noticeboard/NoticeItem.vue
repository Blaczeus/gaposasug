<template>
  <li class="single-notice">
    <div class="single-notice-item">
      <div class="notice-date">
        {{ notice.day }}
        <span>{{ notice.month }}</span>
      </div>
      <div class="notice-content">
        <p>
          <a :href="notice.link">
            {{ notice.title }}
          </a>
        </p>
      </div>
    </div>
  </li>
</template>

<script setup>
defineProps({
  notice: {
    type: Object,
    required: true
  }
})
</script>
