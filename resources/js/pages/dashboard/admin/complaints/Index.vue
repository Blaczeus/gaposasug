<script setup>
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import Breadcrumbs from '@/components/dashboard/Breadcrumbs.vue'
import ComplaintTable from '@/components/dashboard/ComplaintsTable.vue'
import { ref, computed, onMounted } from 'vue'
import {usePage} from '@inertiajs/vue3'

const breadcrumbLinks = [
  { label: 'Home', href: '/admin/dashboard' },
  { label: 'Complaints' }
]

const props = defineProps({
  complaints: Array
})

const activeComplaints = computed(() => props.complaints || [])

const searchMatric = ref('')
const searchTitle = ref('')
const searchStatus = ref('')

// On mount, check URL query and set filters
onMounted(() => {
  const urlParams = new URLSearchParams(window.location.search)
  if (urlParams.has('matric_no')) {
    searchMatric.value = urlParams.get('matric_no')
  }
  // Other filters are not needed for now
  // if (urlParams.has('title')) {
  //   searchTitle.value = urlParams.get('title')
  // }
  // if (urlParams.has('status')) {
  //   searchStatus.value = urlParams.get('status')
  // }
})

const filteredComplaints = computed(() => {
  return activeComplaints.value.filter(complaint => {
    const hasMatric = complaint.student?.matric_no?.toLowerCase().includes(searchMatric.value.toLowerCase()) ?? false
    const hasTitle = complaint.title?.toLowerCase().includes(searchTitle.value.toLowerCase()) ?? false
    const hasStatus = complaint.status?.toLowerCase().includes(searchStatus.value.toLowerCase()) ?? false

    return hasMatric && hasTitle && hasStatus
  })
})
</script>

<template>
  <DashboardLayout>
    <Breadcrumbs title="Student Complaints" :links="breadcrumbLinks" />

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
              <input type="text" v-model="searchMatric" placeholder="Search by Matric No..." class="form-control" />
            </div>
            <div class="col-lg-4 form-group">
              <input type="text" v-model="searchTitle" placeholder="Search by Title..." class="form-control" />
            </div>
            <div class="col-lg-3 form-group">
              <input type="text" v-model="searchStatus" placeholder="Search by Status..." class="form-control" />
            </div>
            <div class="col-2-xxxl col-xl-2 col-lg-3 col-12 form-group">
              <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
            </div>
          </div>
        </form>

        <!-- Show table if there are complaints -->
        <div v-if="filteredComplaints.length > 0">
          <ComplaintTable :complaints="filteredComplaints" />
        </div>

        <!-- Show message if no complaints -->
        <div v-else class="text-center text-muted py-5">
          <p>No complaints found.</p>
        </div>

      </div>
    </div>
  </DashboardLayout>
</template>
