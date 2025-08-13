<script setup>
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import Breadcrumbs from '@/components/dashboard/Breadcrumbs.vue'
import StudentTable from '@/components/dashboard/StudentTable.vue'
import { ref, computed } from 'vue'

const breadcrumbLinks = [
  { label: 'Home', href: '/admin/dashboard' },
  { label: 'Students' }
]

const props = defineProps({
  students: Array
})

const searchMatric = ref('')
const searchName = ref('')
const searchDept = ref('')

const filteredStudents = computed(() => {
  return props.students.filter(student => {
    const hasMatric = student.matric_no?.toLowerCase().includes(searchMatric.value.toLowerCase()) ?? false
    const hasName = student.user?.name?.toLowerCase().includes(searchName.value.toLowerCase()) ?? false
    const hasDept = student.course?.department?.toLowerCase().includes(searchDept.value.toLowerCase()) ?? false

    return hasMatric && hasName && hasDept
  })
})
</script>

<template>
  <DashboardLayout>
    <Breadcrumbs title="All Students" :links="breadcrumbLinks" />

    <div class="card height-auto mt-6">
      <div class="card-body">
        <div class="heading-layout1 mb-4">
          <div class="item-title">
            <h3>All Students Data</h3>
          </div>
        </div>

        <!-- Filter Form -->
        <form @submit.prevent class="mb-4">
          <div class="row gutters-8">
            <div class="col-lg-3 form-group">
              <input type="text" v-model="searchMatric" placeholder="Search by Matric No..." class="form-control" />
            </div>
            <div class="col-lg-4 form-group">
              <input type="text" v-model="searchName" placeholder="Search by Name..." class="form-control" />
            </div>
            <div class="col-lg-3 form-group">
              <input type="text" v-model="searchDept" placeholder="Search by Department..." class="form-control" />
            </div>
            <div class="col-2-xxxl col-xl-2 col-lg-3 col-12 form-group">
              <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
            </div>
          </div>
        </form>

        <StudentTable :students="filteredStudents" />
      </div>
    </div>
  </DashboardLayout>
</template>
