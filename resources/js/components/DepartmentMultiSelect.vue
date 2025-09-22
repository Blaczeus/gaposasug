<template>
  <div class="relative">
    <input v-model="search" type="text" placeholder="Search departments..." @input="fetchDepartments"
      class="form-control rounded-[8px]" />

    <ul v-if="filteredDepartments.length && search"
      class="absolute z-10 mt-1 w-full bg-white border rounded shadow max-h-60 overflow-y-auto">
      <li v-for="dept in filteredDepartments" :key="dept.id" @click="toggleDepartment(dept)"
        class="px-4 py-2 hover:bg-gray-100 cursor-pointer flex justify-between items-center">
        <span>{{ dept.name }}</span>
        <span v-if="selectedDepartments.some(d => d.id === dept.id)" class="text-green-600">✓</span>
      </li>
    </ul>

    <!-- Selected tags -->
    <div v-if="selectedDepartments.length" class="flex flex-wrap gap-2 mt-2">
      <span v-for="dept in selectedDepartments" :key="dept.id"
        class="bg-blue-100 text-blue-700 px-2 py-1 rounded flex items-center gap-1">
        {{ dept.name }}
        <button type="button" class="ml-1 text-red-600" @click="removeDepartment(dept.id)">×</button>
      </span>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const props = defineProps({
  modelValue: { type: Array, default: () => [] }
})
const emit = defineEmits(['update:modelValue'])

const search = ref('')
const filteredDepartments = ref([])
const selectedDepartments = ref([])

const fetchDepartments = async () => {
  if (search.value.length < 2) {
    filteredDepartments.value = []
    return
  }
  try {
    const response = await fetch(`/_dataxnr/department-search?q=${encodeURIComponent(search.value)}`, {
      headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' }
    })
    const result = await response.json()
    filteredDepartments.value = result
  } catch (err) {
    console.error('Error fetching departments', err)
  }
}

const toggleDepartment = (dept) => {
  const exists = selectedDepartments.value.find(d => d.id === dept.id)
  if (exists) {
    removeDepartment(dept.id)
  } else {
    selectedDepartments.value.push(dept)
    emit('update:modelValue', selectedDepartments.value.map(d => d.id))
  }
  search.value = ''
  filteredDepartments.value = []
}

const removeDepartment = (id) => {
  selectedDepartments.value = selectedDepartments.value.filter(d => d.id !== id)
  emit('update:modelValue', selectedDepartments.value.map(d => d.id))
}
</script>
