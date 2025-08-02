<script setup lang="ts">
import { computed } from 'vue'
import EasyDataTable from 'vue3-easy-data-table'
import 'vue3-easy-data-table/dist/style.css'
import { Link } from '@inertiajs/vue3'

// Define props with proper type safety
const { students } = defineProps<{ students: Array<Record<string, any>> }>()

// Format and flatten student data (safely extract nested user info)
const formattedStudents = computed(() =>
  students.map(student => {
    const matric_no = student.matric_no ?? ''
    if (!matric_no) console.warn('Missing matric_no:', student)
    return {
      matric_no,
      photo: student.photo ?? '/dashboard-assets/img/figure/user4.jpg',
      name: student.user?.name ?? 'N/A',
      course: student.course?.name ?? 'N/A',
      department: student.course?.department ?? 'N/A',
      level: student.level ?? 'N/A',
      gender: student.gender ?? 'N/A',
      phone: student.user?.phone ?? 'N/A',
      email: student.user?.email ?? 'N/A',
      dob: student.dob ?? 'N/A',
      actions: { matric_no }
    }
  })
)
</script>

<template>
  <div class="table-wrapper">
    <EasyDataTable :headers="[
      { text: 'Photo', value: 'photo' },
      { text: 'Full Name', value: 'name' },
      { text: 'Matric No', value: 'matric_no' },
      { text: 'Course', value: 'course' },
      { text: 'Department', value: 'department' },
      { text: 'Level', value: 'level' },
      { text: 'Gender', value: 'gender' },
      { text: 'Phone', value: 'phone' },
      { text: 'Email', value: 'email' },
      { text: 'DOB', value: 'dob' },
      { text: 'Actions', value: 'actions', sortable: false }
    ]" 
    :items="formattedStudents" table-class="w-full" body-text-direction="left" :rows-per-page="10" show-index
      :alternating="true">
      <!-- Render student photo as a circular thumbnail -->
      <template #item-photo="{ photo }">
        <img :src="photo || '/dashboard-assets/img/figure/user4.jpg'" alt="Student photo"
          class="w-10 h-10 rounded-full object-cover mx-auto" />
      </template>

      <!-- Render view button -->
      <template #item-actions="{ actions }">
        <div class="text-center">
          <Link
            v-if="actions?.matric_no"
            :href="route('admin.students.show', actions.matric_no)"
            class="view-button inline-flex items-center"
          >
            <i class="fas fa-eye mr-1 text-blue-500"></i>
            View
          </Link>
          <span v-else class="text-gray-400 text-sm">No ID</span>
        </div>
      </template>
    </EasyDataTable>
  </div>
</template>

<style scoped>
.view-button {
  background-color: #eef6ff;
  color: #1d4ed8;
  font-size: 14px;
  padding: 2px 10px;
  border-radius: 5px;
  border: 1px solid #93c5fd;
  transition: background 0.2s;
  text-decoration: none;
}

.view-button:hover {
  background-color: #dbeafe;
}
</style>
