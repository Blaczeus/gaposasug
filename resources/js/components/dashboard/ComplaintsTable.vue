<script setup lang="ts">
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'
import BaseTable from '@/Components/dashboard/BaseTable.vue'

const { complaints } = defineProps<{
  complaints: Array<Record<string, any>>
}>()

// Format complaints data
const formattedComplaints = computed(() =>
  complaints.map(complaint => ({
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
</script>

<template>
  <div>
    <!-- BaseTable -->
    <BaseTable :headers="headers" :items="formattedComplaints">

      <!-- Status badge slot -->
      <template #item-status="{ status }">
        <span class="px-3 py-2 rounded-full text-[12px] font-medium" :class="{
          'bg-yellow-100 text-yellow-800': status === 'Pending',
          'bg-green-100 text-green-800': status === 'Resolved',
          'bg-gray-100 text-gray-800': !['Pending', 'Resolved'].includes(status)
        }">
          {{ status }}
        </span>
      </template>

      <!-- Actions slot -->
      <template #item-actions="{ actions }">
        <div class="text-center">
          <Link :href="`/admin/complaints/${actions.id}`" class="view-button inline-flex items-center">
          <i class="fas fa-eye mr-1 text-blue-500"></i>
          View
          </Link>
        </div>
      </template>

    </BaseTable>
  </div>
</template>
