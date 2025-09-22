<script setup lang="ts">
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'
import BaseTable from '@/Components/dashboard/BaseTable.vue'

const { notices } = defineProps<{
  notices: Array<Record<string, any>>
}>()

// Format notices data for BaseTable
const formattedNotices = computed(() =>
  notices.map(notice => ({
    id: notice.id,
    title: notice.title ?? 'N/A',
    audience: notice.audience ?? 'N/A',
    pinned: notice.pinned,
    important: notice.important,
    starts_at: notice.starts_at
      ? new Date(notice.starts_at).toLocaleDateString()
      : '-',
    ends_at: notice.ends_at
      ? new Date(notice.ends_at).toLocaleDateString()
      : '-',
    actions: { id: notice.id }
  }))
)

// Table headers
const headers = [
  { text: 'Title', value: 'title' },
  { text: 'Audience', value: 'audience' },
  { text: 'Pinned', value: 'pinned' },
  { text: 'Important', value: 'important' },
  { text: 'Starts At', value: 'starts_at' },
  { text: 'Ends At', value: 'ends_at' },
  { text: 'Actions', value: 'actions', sortable: false }
]
</script>

<template>
  <BaseTable :headers="headers" :items="formattedNotices" row-key="id" :check-box="false">
    <!-- Audience formatting -->
    <template #item-audience="{ audience }">
      <span class="capitalize">{{ audience }}</span>
    </template>

    <!-- Pinned badge -->
    <template #item-pinned="{ pinned }">
      <span v-if="pinned" class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
        Yes
      </span>
      <span v-else class="text-gray-400">No</span>
    </template>

    <!-- Important badge -->
    <template #item-important="{ important }">
      <span v-if="important" class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">
        Yes
      </span>
      <span v-else class="text-gray-400">No</span>
    </template>

    <!-- Actions slot -->
    <template #item-actions="{ actions }">
      <div class="flex gap-2 justify-center">
        <Link :href="route('admin.notices.show', actions.id)" class="text-blue-600 hover:underline">
        View
        </Link>
        <Link :href="route('admin.notices.edit', actions.id)" class="text-yellow-600 hover:underline">
        Edit
        </Link>
      </div>
    </template>
  </BaseTable>
</template>
