<script setup lang="ts">
import { computed } from 'vue'
import BaseTable from '@/Components/dashboard/BaseTable.vue'
import { Link } from '@inertiajs/vue3'

const { students } = defineProps<{ students: Array<Record<string, any>> }>()

const headers = [
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
]

const items = computed(() =>
  students.map(student => ({
    matric_no: student.matric_no ?? '',
    name: student.user?.name ?? 'N/A',
    course: student.course?.name ?? 'N/A',
    department: student.course?.department ?? 'N/A',
    level: student.level ?? 'N/A',
    gender: student.gender ?? 'N/A',
    phone: student.user?.phone ?? 'N/A',
    email: student.user?.email ?? 'N/A',
    dob: student.dob ?? 'N/A',
    actions: { matric_no: student.matric_no ?? '' }
  }))
)
</script>

<template>
  <BaseTable :headers="headers" :items="items">
    <template #item-actions="{ actions }">
      <div class="text-center">
        <Link v-if="actions?.matric_no" :href="route('admin.students.show', actions.matric_no)"
          class="view-button inline-flex items-center">
        <i class="fas fa-eye mr-1 text-blue-500"></i>
        View
        </Link>
        <span v-else class="text-gray-400 text-sm">No ID</span>
      </div>
    </template>
  </BaseTable>
</template>
