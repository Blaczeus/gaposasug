<template>
  <ul class="list-unstyled notice-content-box">
    <NoticeItem v-for="(notice, index) in notices" :key="index" :notice="notice" />
  </ul>
</template>

<script setup>
import NoticeItem from './NoticeItem.vue'

defineProps({
  notices: {
    type: Array,
    required: true
  }
})
</script>
