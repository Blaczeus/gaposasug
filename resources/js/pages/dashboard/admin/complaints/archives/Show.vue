<script setup>
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import Breadcrumbs from '@/components/dashboard/Breadcrumbs.vue'
import { Link, router } from '@inertiajs/vue3'

const { complaint } = defineProps({
  complaint: {
    type: Object,
    required: true
  }
})

const breadcrumbLinks = [
  { label: 'Home', href: '/admin/dashboard' },
  { label: 'Archived Complaints', href: '/admin/complaints/archived' },
  { label: 'View Complaint' }
]

// Restore complaint
function restoreComplaint() {
  if (!confirm('Restore this archived complaint?')) return

  router.patch(route('admin.complaints.restore', complaint.id), {}, {
    preserveScroll: true
  })
}
</script>

<template>
  <DashboardLayout>
    <Breadcrumbs title="Archived Complaint Details" :links="breadcrumbLinks" />

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
              <span class="px-4 py-1.5 rounded-full text-sm font-semibold bg-green-100 text-green-800">Resolved</span>
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
            class="flex flex-col md:flex-row md:items-center md:justify-around gap-6 items-center pt-4 border-t border-gray-200 dark:border-neutral-700 text-lg">
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
      <div>
        <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-md p-6">
          <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Actions</h3>
          <!-- Restore Complaint Button -->
          <button @click="restoreComplaint"
            class="w-full py-2 px-4 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition">
            Restore Complaint
          </button>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>
