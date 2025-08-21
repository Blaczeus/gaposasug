<script setup>
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import Breadcrumbs from '@/components/dashboard/Breadcrumbs.vue'
import { Link } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

const { complaint } = defineProps({
  complaint: {
    type: Object,
    required: true
  }
})

const breadcrumbLinks = [
  { label: 'Home', href: '/admin/dashboard' },
  { label: 'Complaints', href: '/admin/complaints' },
  { label: 'View Complaint' }
]

// Status mapping for frontend label + backend value
const statusMap = {
  pending: { label: 'Mark as In Review', next: 'in_progress' },
  in_progress: { label: 'Mark as Resolved', next: 'resolved' }
}

// Update complaint status
function updateComplaintStatus(nextStatus) {
  if (!nextStatus) return
  router.put(`/admin/complaints/${complaint.id}/status`, {
    status: nextStatus
  }, {
    preserveScroll: true
  })
}

// Archive complaint (soft delete)
function archiveComplaint() {
  if (complaint.status !== 'resolved') {
    alert('Only resolved complaints can be archived. Please resolve it first.');
    return;
  }
  if (!confirm('Archive this resolved complaint? You can restore it later.')) return;

  router.delete(`/admin/complaints/${complaint.id}`, {
    preserveScroll: true,
  });
}

</script>

<template>
  <DashboardLayout>
    <Breadcrumbs title="Complaint Details" :links="breadcrumbLinks" />

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
      <!-- Main Complaint Card -->
      <div class="xl:col-span-2">
        <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-lg p-8 transition">
          <!-- Header -->
          <div class="flex flex-col md:flex-row md:justify-between gap-4 mb-6">
            <div>
              <h2 class="text-2xl font-bold text-gray-800 dark:text-white leading-none">
                {{ complaint.title }}
              </h2>
            </div>
            <div>
              <span class="px-4 py-1.5 rounded-full text-sm font-semibold" :class="{
                'bg-yellow-100 text-yellow-800': complaint.status === 'pending',
                'bg-blue-100 text-blue-800': complaint.status === 'in_progress',
                'bg-green-100 text-green-800': complaint.status === 'resolved'
              }">
                {{
                complaint.status === 'pending'
                ? 'Pending'
                : complaint.status === 'in_progress'
                ? 'In Review'
                : complaint.status === 'resolved'
                ? 'Resolved'
                : complaint.status
                }}
              </span>
            </div>
          </div>

          <!-- Description -->
          <div class="mb-6">
            <p class="!text-black !dark:text-gray-300 text-md font-medium mb-2">
              Description
            </p>
            <div
              class="bg-gray-50 dark:bg-neutral-700 rounded-xl p-4 text-gray-800 dark:text-gray-200 whitespace-pre-line">
              {{ complaint.description || complaint.body || 'No description provided.' }}
            </div>
          </div>

          <!-- Metadata -->
          <div
            class="flex flex-col md:flex-row md:items-center md:justify-around gap-6 items-center  pt-4 border-t border-gray-200 dark:border-neutral-700 text-lg">
            <!-- Submitted By -->
            <div class="font-semibold">
              <span class="font-extrabold text-gray-900 dark:text-gray-100">Submitted By: </span>
              <Link :href="`/admin/students/${complaint.student.matric_no}`" class="text-blue-600 hover:underline ml-1">
              {{ complaint.user.name }} ({{ complaint.user.email }})
              </Link>
            </div>

            <!-- Department -->
            <div class="font-semibold">
              <span class="font-extrabold text-gray-900 dark:text-gray-100">Department: </span>
              <span class="text-gray-700 dark:text-gray-300">
                {{ complaint.student?.course?.department_name || 'Not Assigned' }}
              </span>
            </div>

            <!-- Date -->
            <div class="font-semibold">
              <span class="font-extrabold text-gray-900 dark:text-gray-100">Date: </span>
              <span class="text-gray-700 dark:text-gray-300">
                {{ new Date(complaint.created_at).toLocaleString('en-US', {
                weekday: 'short',
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
                }) }}
              </span>
            </div>
          </div>

        </div>
      </div>

      <!-- Sidebar Actions -->
      <div class="space-y-6">
        <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-md p-6">
          <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Actions</h3>

          <!-- Status Update Button -->
          <button v-if="statusMap[complaint.status]" @click="updateComplaintStatus(statusMap[complaint.status].next)"
            class="w-full mb-3 bg-green-500 hover:bg-green-600 text-white rounded-lg py-2 px-4 transition">
            {{ statusMap[complaint.status].label }}
          </button>

          <!-- Archive Complaint Button -->
          <button @click="archiveComplaint" :disabled="complaint.status !== 'resolved'" :class="[
            'w-full py-2 px-4 rounded-lg transition',
            complaint.status !== 'resolved'
              ? 'bg-gray-300 text-gray-600 cursor-not-allowed'
              : 'bg-red-500 hover:bg-red-600 text-white'
          ]">
            {{ complaint.status !== 'resolved' ? 'Resolve to Archive' : 'Archive Complaint' }}
          </button>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>
