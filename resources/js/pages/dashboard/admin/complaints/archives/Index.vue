<script setup>
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import Breadcrumbs from '@/components/dashboard/Breadcrumbs.vue'
import ComplaintTable from '@/components/dashboard/ComplaintsTable.vue'
import { ref, computed } from 'vue'

const breadcrumbLinks = [
  { label: 'Home', href: '/admin/dashboard' },
  { label: 'Complaints', href: '/admin/complaints' },
  { label: 'Archived', href: '/admin/complaints/archived' },
]

const props = defineProps({
  complaints: Array
})

const archivedComplaints = computed(() => props.complaints || [])

const searchMatric = ref('')
const searchTitle = ref('')
const searchName = ref('')

const filteredComplaints = computed(() => {
  return archivedComplaints.value.filter(complaint => {
    const matchesMatric = !searchMatric.value || complaint.student?.matric_no?.toLowerCase().includes(searchMatric.value.toLowerCase())
    const matchesTitle = !searchTitle.value || complaint.title?.toLowerCase().includes(searchTitle.value.toLowerCase())
    const matchesName = !searchName.value || complaint.student?.name?.toLowerCase().includes(searchName.value.toLowerCase())

    return matchesMatric && matchesTitle && matchesName
  })
})

</script>

<template>
  <DashboardLayout>
    <Breadcrumbs title="Archived Student Complaints" :links="breadcrumbLinks" />

    <div class="card height-auto mt-6">
      <div class="card-body">
        <div class="heading-layout1 mb-4">
          <div class="item-title">
            <h3>All Complaints</h3>
          </div>
        </div>

        <!-- Filter Form -->
        <form @submit.prevent class="mb-4">
          <div class="row gutters-8">
            <div class="col-lg-3 form-group">
              <input type="text" v-model="searchName" placeholder="Search by Name..." class="form-control" />
            </div>
            <div class="col-lg-3 form-group">
              <input type="text" v-model="searchMatric" placeholder="Search by Matric No..." class="form-control" />
            </div>
            <div class="col-lg-4 form-group">
              <input type="text" v-model="searchTitle" placeholder="Search by Title..." class="form-control" />
            </div>
            <div class="col-2-xxxl col-xl-2 col-lg-3 col-12 form-group">
              <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
            </div>
          </div>
        </form>

        <!-- Show table if there are complaints -->
        <div v-if="filteredComplaints.length > 0">
          <ComplaintTable :complaints="filteredComplaints" :isArchived="true" />
        </div>

        <!-- Show message if no complaints -->
        <div v-else class="text-center text-muted py-5">
          <p>No complaints found.</p>
        </div>

      </div>
    </div>
  </DashboardLayout>
</template>
