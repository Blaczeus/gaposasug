<template>
  <section class="rts-breadcrumb breadcrumb-height breadcumb-bg" :style="`background-image: url(${backgroundImage})`">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="breadcrumb-content">
            <ul class="breadcrumb">
              <li v-for="(crumb, index) in breadcrumbs" :key="index" class="breadcrumb-item"
                :class="{ active: index === breadcrumbs.length - 1 }"
                :aria-current="index === breadcrumbs.length - 1 ? 'page' : null">
                <template v-if="index !== breadcrumbs.length - 1">
                  <Link :href="resolveHref(crumb)" v-if="isInertiaLink(crumb)">{{ crumb.label }}</Link>
                  <a :href="crumb.href" v-else>{{ crumb.label }}</a>
                </template>
                <template v-else>{{ crumb.label }}</template>
              </li>
            </ul>
            <h2 class="section-title">{{ title }}</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
  title: String,
  breadcrumbs: {
    type: Array,
    required: true, // Example: [{ label: 'Home', route: 'home' }, { label: 'About' }]
  },
  background: {
    type: String,
    default: '/assets/images/banner/breadcrumb.jpg'
  }
})

const backgroundImage = computed(() => props.background)

const isInertiaLink = (crumb) => crumb.route || (typeof crumb.href === 'undefined' && crumb.label)

const resolveHref = (crumb) => crumb.route ? route(crumb.route) : crumb.href
</script>
