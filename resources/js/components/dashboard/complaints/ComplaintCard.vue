<template>
  <component :is="complaint.deleted_at ? 'div' : Link"
    :href="!complaint.deleted_at ? route('student.complaints.show', complaint.id) : null" class="block">
    <div
      class="p-2 bg-white border border-gray-200 rounded-xl shadow-theme-sm dark:border-gray-800 dark:bg-white/5 transition"
      :class="{
        'hover:ring-1 hover:ring-brand-500 cursor-pointer': !complaint.deleted_at,
        'opacity-60 cursor-not-allowed': complaint.deleted_at,
      }">
      <div class="flex flex-col p-3 gap-5 xl:flex-row xl:items-center xl:justify-between">
        <!-- Left section -->
        <div class="flex items-start w-full gap-4">
          <div class="w-full">
            <!-- Title -->
            <p class="text-3xl font-medium !text-black dark:text-white/90">
              {{ complaint.title }}
            </p>
            <!-- Body preview -->
            <p class="text-lg text-muted-foreground mt-0.5 line-clamp-1">
              {{ complaint.description ? complaint.description.substring(0, 100) : '' }}...
            </p>
          </div>
        </div>

        <!-- Right section -->
        <div class="flex flex-col-reverse items-start justify-end w-full gap-4 xl:flex-row xl:items-center xl:gap-6">
          <!-- Response count pill -->
          <span v-if="complaint.responses_count > 0"
            class="px-3 py-1 rounded-full text-[10px] font-medium bg-brand-100 text-brand-800 dark:bg-brand-500/15 dark:text-brand-400">
            {{ complaint.responses_count }}
            {{ complaint.responses_count === 1 ? 'Response' : 'Responses' }}
          </span>

          <!-- Status pill -->
          <span v-if="complaint.deleted_at"
            class="relative group px-3 py-1 rounded-full text-[10px] font-medium bg-red-100 text-red-800 dark:bg-red-500/15 dark:text-red-400 cursor-help">
            Archived
            <!-- Tooltip -->
            <span
              class="absolute left-1/2 -translate-x-1/2 mt-2 w-max px-2 py-1 text-xs rounded bg-black text-white dark:bg-white dark:text-black opacity-0 group-hover:opacity-100 transition-opacity duration-200 shadow-lg">
              This complaint has been archived and can no longer be opened
            </span>
          </span>

          <span v-else class="px-3 py-1 rounded-full text-[10px] font-medium" :class="{
              'bg-yellow-100 text-yellow-800 dark:bg-yellow-500/15 dark:text-yellow-400':
                complaint.status === 'pending',
              'bg-green-100 text-green-800 dark:bg-green-500/15 dark:text-green-400':
                complaint.status === 'resolved',
              'bg-blue-100 text-blue-800 dark:bg-blue-500/15 dark:text-blue-400':
                complaint.status === 'in_progress',
            }">
            {{
            complaint.status === 'pending'
            ? 'Pending'
            : complaint.status === 'in_progress'
            ? 'In Review'
            : complaint.status === 'resolved'
            ? 'Resolved'
            : capitalizedStatus
            }}
          </span>


          <!-- Date -->
          <div class="flex items-center gap-3 text-[10px] text-gray-500 dark:text-gray-400">
            <span class="flex items-center gap-1">
              <CalendarDaysIcon class="w-5 h-5" />
              {{ formattedDate }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </component>
</template>

<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'
import { CalendarDaysIcon } from '@heroicons/vue/24/solid'
import { format, parseISO } from 'date-fns'

const props = defineProps({
  complaint: {
    type: Object,
    required: true,
  },
})

const capitalizedStatus = computed(() =>
  props.complaint.status
    ? props.complaint.status.charAt(0).toUpperCase() +
    props.complaint.status.slice(1)
    : 'Pending'
)

const formattedDate = computed(() => {
  if (!props.complaint.created_at) return 'No date'
  return format(parseISO(props.complaint.created_at), 'MMMM d, yyyy')
})
</script>
