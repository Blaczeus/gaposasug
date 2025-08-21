<script setup lang="ts">
import { ref, computed } from 'vue'
import { Link, router } from '@inertiajs/vue3'
import BaseTable from '@/Components/dashboard/BaseTable.vue'

const { complaints, isArchived } = defineProps<{
  complaints: Array<Record<string, any>>,
  isArchived?: boolean
}>()

// Reactive for selected rows
const selectedIds = ref<number[]>([])

// Format complaints data
const formattedComplaints = computed(() =>
  complaints.map(complaint => ({
    id: complaint.id,
    student_name: complaint.student?.user?.name ?? 'N/A',
    matric_no: complaint.student?.matric_no ?? 'N/A',
    title: complaint.title ?? 'N/A',
    status: complaint.status ?? 'N/A',
    submitted_at: complaint.created_at
      ? new Date(complaint.created_at).toLocaleDateString()
      : 'N/A',
    actions: { id: complaint.id }
  }))
)

// Table headers
const headers = [
  { text: 'Student Name', value: 'student_name' },
  { text: 'Matric No', value: 'matric_no' },
  { text: 'Title', value: 'title' },
  { text: 'Status', value: 'status' },
  { text: 'Submitted At', value: 'submitted_at' },
  { text: 'Actions', value: 'actions', sortable: false }
]


// Bulk archive/restore handler
function bulkAction(action: 'archive' | 'restore') {
  if (selectedIds.value.length === 0) {
    alert('No complaints selected')
    return
  }

  // Prevent running bulk action for only 1 selection
  if (selectedIds.value.length === 1) {
    alert('Please select more than one complaint to perform a bulk action')
    return
  }

  if (!confirm(`Are you sure you want to ${action} these complaints?`)) return

  router.post(
    route(`admin.complaints.bulk-${action}`),
    { ids: selectedIds.value },
    { preserveScroll: true }
  )

  selectedIds.value = [] // Clear selection after action
}
</script>

<template>
  <div>
    <!-- Bulk Actions -->
    <div class="mb-3 flex gap-2" v-if="selectedIds.length > 0">
      <button v-if="!isArchived" @click="bulkAction('archive')" class="px-3 py-2 bg-red-600 text-white rounded-md">
        Bulk Archive ({{ selectedIds.length }})
      </button>
      <button v-else @click="bulkAction('restore')" class="px-3 py-2 bg-green-600 text-white rounded-md">
        Bulk Restore ({{ selectedIds.length }})
      </button>
    </div>

    <!-- BaseTable -->
    <BaseTable :headers="headers" :items="formattedComplaints" row-key="id" :check-box="true" v-model="selectedIds">

      <!-- Status badge slot -->
      <template #item-status="{ status }">
        <span class="px-3 py-2 rounded-full text-[12px] font-medium" :class="{
          'bg-yellow-100 text-yellow-800': status === 'pending',
          'bg-blue-100 text-blue-800': status === 'in_progress',
          'bg-green-100 text-green-800': status === 'resolved'
        }">
          {{
          status === 'pending'
          ? 'Pending'
          : status === 'in_progress'
          ? 'In Review'
          : status === 'resolved'
          ? 'Resolved'
          : status
          }}
        </span>
      </template>

      <!-- Actions slot -->
      <template #item-actions="{ actions }">
        <div class="text-center">
          <Link :href="isArchived
            ? route('admin.complaints.archived.show', actions.id)
            : route('admin.complaints.show', actions.id)" class="view-button inline-flex items-center">
          <i class="fas fa-eye mr-1 text-blue-500"></i>
          View
          </Link>
        </div>
      </template>

    </BaseTable>
  </div>
</template>
