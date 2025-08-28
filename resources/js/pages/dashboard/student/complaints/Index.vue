<script setup>
import { ref, computed } from 'vue'
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import ComplaintCard from '@/components/dashboard/complaints/ComplaintCard.vue'

const props = defineProps({
  complaints: Array, // complaints coming from controller
})

const search = ref('')
const statusFilter = ref('') // '' = All

const filteredComplaints = computed(() => {
  return props.complaints.filter(complaint => {
    const matchesSearch =
      complaint.title?.toLowerCase().includes(search.value.toLowerCase()) ||
      complaint.description?.toLowerCase().includes(search.value.toLowerCase()) ||
      complaint.user?.name?.toLowerCase().includes(search.value.toLowerCase()) // if user relation is loaded

    const matchesStatus =
      !statusFilter.value || // no filter = show all
      (statusFilter.value === 'archived' && complaint.deleted_at) ||
      (statusFilter.value !== 'archived' && complaint.status === statusFilter.value)

    return matchesSearch && matchesStatus
  })
})
</script>


<template>
  <DashboardLayout>
    <div class="p-6">
      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-semibold">My Complaints</h1>
        <a :href="route('student.complaints.create')"
          class="px-4 py-2 !bg-blue-600 text-white rounded-lg hover:bg-blue-700">
          + New Complaint
        </a>
      </div>

      <!-- Search + Filter -->
      <div class="mb-4 flex flex-col sm:flex-row gap-3">
        <input v-model="search" type="text" placeholder="Search by title, description or name..."
          class="w-full sm:w-2/3 px-3 py-2 border bg-white text-black rounded-lg focus:ring focus:ring-blue-300" />

        <select v-model="statusFilter"
          class="w-full sm:w-1/3 px-3 py-2 border bg-white text-black rounded-lg focus:ring focus:ring-blue-300">
          <option value="">All Statuses</option>
          <option value="pending">Pending</option>
          <option value="in_progress">In Review</option>
          <option value="resolved">Resolved</option>
          <option value="archived">Archived</option>
        </select>
      </div>

      <!-- Complaints list -->
      <div class="p-6">
        <ul v-if="filteredComplaints.length" class="space-y-2">
          <ComplaintCard v-for="complaint in filteredComplaints" :key="complaint.id" :complaint="complaint" />
        </ul>
        <p v-else class="text-muted-foreground">No complaints found.</p>
      </div>
    </div>
  </DashboardLayout>
</template>

