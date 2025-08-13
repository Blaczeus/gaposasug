<script setup>
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import Breadcrumbs from '@/components/dashboard/Breadcrumbs.vue'
import ComplaintTable from '@/components/dashboard/ComplaintsTable.vue'
import { ref, computed } from 'vue'

const breadcrumbLinks = [
  { label: 'Home', href: '/admin/dashboard' },
  { label: 'Complaints' }
]

const props = defineProps({
  complaints: Array
})

// Dummy fallback data
const dummyComplaints = [
  {
    id: 1,
    title: 'No electricity in hostel',
    status: 'Pending',
    created_at: '2025-08-01T10:30:00',
    student: {
      matric_no: 'SUG/23/0001',
      user: { name: 'Blessing Ojo' }
    }
  },
  {
    id: 2,
    title: 'Water shortage in Block B',
    status: 'Resolved',
    created_at: '2025-08-02T09:15:00',
    student: {
      matric_no: 'SUG/23/0023',
      user: { name: 'Michael Adeyemi' }
    }
  },
  {
    id: 3,
    title: 'Unfair grading in MTH201',
    status: 'Pending',
    created_at: '2025-08-03T13:45:00',
    student: {
      matric_no: 'SUG/23/0078',
      user: { name: 'Chinaza Ekene' }
    }
  }
]

// Use real complaints if passed, else fallback to dummy
const activeComplaints = computed(() => props.complaints?.length ? props.complaints : dummyComplaints)

const searchMatric = ref('')
const searchTitle = ref('')
const searchStatus = ref('')

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

        <ComplaintTable :complaints="filteredComplaints" />
      </div>
    </div>
  </DashboardLayout>
</template>
