<script setup>
import { ref, computed } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  complaints: Array, // complaints coming from controller
})

const search = ref('')

// filter complaints based on search input
const filteredComplaints = computed(() => {
  if (!search.value) return props.complaints
  return props.complaints.filter(c =>
    c.title.toLowerCase().includes(search.value.toLowerCase()) ||
    c.body.toLowerCase().includes(search.value.toLowerCase())
  )
})

function goToComplaint(id) {
  router.visit(route('student.complaints.show', id))
}
</script>

<template>
  <div class="p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-xl font-semibold">My Complaints</h1>
      <a :href="route('student.complaints.create')"
        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
        + New Complaint
      </a>
    </div>

    <!-- Search -->
    <div class="mb-4">
      <input v-model="search" type="text" placeholder="Search complaints..."
        class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300" />
    </div>

    <!-- Complaints list -->
    <div v-if="filteredComplaints.length">
      <ul class="space-y-4">
        <li v-for="complaint in filteredComplaints" :key="complaint.id" @click="goToComplaint(complaint.id)"
          class="p-4 border rounded-lg cursor-pointer hover:bg-gray-50 transition">
          <div class="flex justify-between items-center">
            <h2 class="font-medium text-gray-800">
              {{ complaint.title }}
            </h2>
            <span class="text-xs px-2 py-1 rounded-full" :class="{
              'bg-yellow-100 text-yellow-800': complaint.status === 'pending',
              'bg-green-100 text-green-800': complaint.status === 'resolved',
              'bg-gray-200 text-gray-600': complaint.status === 'archived'
            }">
              {{ complaint.status }}
            </span>
          </div>
          <p class="text-sm text-gray-600 mt-1">
            {{ complaint.body.substring(0, 100) }}...
          </p>
          <p class="text-xs text-gray-400 mt-1">
            Submitted on {{ complaint.created_at }}
          </p>
        </li>
      </ul>
    </div>

    <!-- Empty state -->
    <div v-else class="text-center py-12 text-gray-500">
      <p class="mb-3">You haven’t submitted any complaints yet.</p>
      <a :href="route('student.complaints.create')"
        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
        Submit a Complaint
      </a>
    </div>
  </div>
</template>
