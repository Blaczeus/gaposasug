<script setup>
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import Breadcrumbs from '@/components/dashboard/Breadcrumbs.vue'

const breadcrumbLinks = [
  { label: 'Home', href: '/admin/dashboard' },
  { label: 'Students', href: '/admin/students' },
  { label: 'View Student' }
]

const props = defineProps({
  student: Object
})
</script>

<template>
  <DashboardLayout>
    <Breadcrumbs title="Student Details" :links="breadcrumbLinks" />

    <div class="card mt-6">
      <div class="card-body">
        <h3 class="mb-4">Raw Student Data Preview</h3>

        <pre class="bg-gray-100 p-4 rounded text-sm overflow-auto">
{{ JSON.stringify(student, null, 2) }}
        </pre>
      </div>
    </div>
  </DashboardLayout>
</template>
