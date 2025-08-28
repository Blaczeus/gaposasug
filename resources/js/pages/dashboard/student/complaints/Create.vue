<script setup>
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'


const props = defineProps({
  complaints: Array, // complaints coming from controller
})
</script>

<template>
  <DashboardLayout>
    <div class="p-6">
      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-semibold">Create Complaints</h1>
        <a :href="route('student.complaints.create')"
          class="px-4 py-2 !bg-blue-600 text-white rounded-lg hover:bg-blue-700">
          + New Complaint
        </a>
      </div>
    </div>
  </DashboardLayout>
</template>
