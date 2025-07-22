<script setup lang="ts">
defineProps<{
  title: string
  links: Array<{ label: string; href?: string }>
}>()
</script>

<template>
  <div class="breadcrumbs-area">
    <h3>{{ title }}</h3>
    <ul>
      <li v-for="(link, index) in links" :key="index">
        <template v-if="link.href">
          <a :href="link.href">{{ link.label }}</a>
        </template>
        <template v-else>
          {{ link.label }}
        </template>
      </li>
    </ul>
  </div>
</template>
