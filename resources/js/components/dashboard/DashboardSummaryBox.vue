<script setup lang="ts">
import type { FunctionalComponent } from 'vue'
import { Link } from '@inertiajs/vue3'

defineProps<{
  icon: FunctionalComponent
  iconBg: string
  iconColor: string
  title: string
  count: number | string
  prefix?: string
  link?: string
}>()
</script>

<template>
  <div class="col-xl-3 col-sm-6 col-12">
    <Link :href="link || '#'" class="block">
    <div class="dashboard-summery-one mg-b-20 hover:shadow-md transition-shadow duration-200">
      <div class="row align-items-center">
        <div class="col-6">
          <div :class="`rounded-full items-center justify-center flex w-34 h-34 ${iconBg}`">
            <component :is="icon" class="w-20 h-20" :class="iconColor" />
          </div>
        </div>
        <div class="col-6">
          <div class="item-content">
            <div class="item-title">{{ title }}</div>
            <div class="item-number">
              <span v-if="prefix">{{ prefix }}</span>
              <span class="counter" :data-num="count">{{ count }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    </Link>
  </div>
</template>


