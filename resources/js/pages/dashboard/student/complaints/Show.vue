<script setup>
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import Breadcrumbs from '@/components/dashboard/Breadcrumbs.vue'
import { computed } from 'vue'

const { complaint } = defineProps({
  complaint: {
    type: Object,
    required: true
  }
})

const breadcrumbLinks = [
  { label: 'Home', href: '/student/dashboard' },
  { label: 'Complaints', href: route('student.complaints.index') },
  { label: 'View Complaint' }
]

const departmentName = computed(() => {
  return complaint.student && complaint.student.course
    ? complaint.student.course.department
    : 'Not Assigned'
})
</script>

<template>
  <DashboardLayout>
    <Breadcrumbs title="Complaint Details" :links="breadcrumbLinks" />

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
      <!-- Main Complaint Card -->
      <div class="xl:col-span-2 mb-12">
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
            <div v-html="complaint.description || 'No description provided.'"
              class="bg-gray-50 dark:bg-neutral-700 rounded-xl p-4 text-gray-800 dark:text-gray-200 whitespace-pre-line prose max-w-none">
            </div>
          </div>


          <!-- Attachments -->
          <div class="mb-6">
            <p class="!text-black !dark:text-gray-300 text-md font-medium mb-2">
              Attachment
            </p>

            <!-- If there is an attachment -->
            <div v-if="complaint.attachment"
              class="bg-gray-50 dark:bg-neutral-700 rounded-xl p-4 flex items-center gap-4">
              <!-- If it's a PDF -->
              <template v-if="complaint.attachment.toLowerCase().endsWith('.pdf')">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-500" fill="currentColor"
                  viewBox="0 0 24 24">
                  <path d="M6 2h9l5 5v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
                </svg>
                <div class="flex flex-col">
                  <span class="text-sm text-gray-600 dark:text-gray-300">
                    {{ complaint.attachment.split('/').pop() }}
                  </span>
                  <a :href="`/storage/${complaint.attachment}`" target="_blank"
                    class="text-blue-600 dark:text-blue-400 hover:underline text-sm">
                    Open PDF
                  </a>
                </div>
              </template>

              <!-- If it's an image -->
              <template v-else>
                <img :src="`/storage/${complaint.attachment}`" alt="Attachment Preview"
                  class="w-20 h-20 object-cover rounded-lg border border-gray-300 dark:border-gray-600" />
                <div class="flex flex-col">
                  <span class="text-md text-gray-600 dark:text-gray-300">
                    {{ complaint.attachment.split('/').pop() }}
                  </span>
                  <a :href="`/storage/${complaint.attachment}`" target="_blank"
                    class="text-blue-600 dark:text-blue-400 hover:underline text-lg">
                    View Full Image
                  </a>
                </div>
              </template>
            </div>

            <!-- If no attachment -->
            <div v-else class="bg-gray-50 dark:bg-neutral-700 rounded-xl p-4 text-gray-500 dark:text-gray-400 italic">
              No attachment uploaded.
            </div>
          </div>


          <!-- Metadata -->
          <div
            class="flex flex-col md:flex-row md:items-center md:justify-around gap-6 items-center pt-4 border-t border-gray-200 dark:border-neutral-700 text-lg">
            <!-- Department -->
            <div v-if="0" class="font-semibold">
              <span class="font-extrabold text-gray-900 dark:text-gray-100">Department: </span>
              <span class="text-gray-700 dark:text-gray-300">
                {{ departmentName}}
              </span>
            </div>

            <!-- Last Updated -->
            <div class="font-semibold">
              <span class="font-extrabold text-gray-900 dark:text-gray-100">Last Updated: </span>
              <span class="text-gray-700 dark:text-gray-300">
                {{ new Date(complaint.updated_at).toLocaleString('en-US', {
                weekday: 'short',
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
                }) }}
              </span>
            </div>

            <!-- Date -->
            <div class="font-semibold">
              <span class="font-extrabold text-gray-900 dark:text-gray-100">Submitted At: </span>
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

      <!-- Sidebar -->
      <div class="space-y-6">
        <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-md p-6">
          <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600 dark:text-green-400" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 20h9M12 4h9M4 8h16M4 16h16" />
            </svg>
            Admin Message
          </h3>

          <!-- Admin Responses -->
          <div v-if="complaint.responses?.length"
            class="mb-6 space-y-4 max-h-100 overflow-y-auto overflow-x-hidden pr-2 scrollbar-thin scrollbar-thumb-blue-500 scrollbar-track-blue-100 rounded-lg custom-scrollbar">

            <div v-for="response in complaint.responses.filter(r => r.visible_to_student)" :key="response.id"
              class="bg-green-50 dark:bg-green-900/40 border border-green-200 dark:border-green-800 rounded-xl !p-4 relative mt-4 mb-4">
              <!-- Icon -->
              <div
                class="absolute -top-3 -right-3 bg-green-600 dark:bg-green-500 text-white rounded-full p-2 shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
              </div>

              <p class="text-lg !text-black font-medium dark:text-gray-400 mb-2">
                {{ new Date(response.created_at).toLocaleString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
                }) }}
              </p>

              <p class="text-gray-800 dark:text-gray-200 whitespace-pre-line">
                {{ response.response }}
              </p>
            </div>
          </div>

          <div v-else class="text-gray-500 dark:text-gray-400 italic flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            No response from admin yet.
          </div>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>

<!-- Custom Scrollbar Styles -->
<style scoped>
.custom-scrollbar::-webkit-scrollbar {
  width: 6px;
}

.custom-scrollbar::-webkit-scrollbar-track {
  background: transparent;
}

.custom-scrollbar::-webkit-scrollbar-thumb {
  background-color: #3b82f6;
  /* Tailwind blue-500 */
  border-radius: 9999px;
  /* fully rounded */
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
  background-color: #2563eb;
  /* Tailwind blue-600 */
}
</style>
