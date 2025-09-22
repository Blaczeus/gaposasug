<template>
  <div class="relative">
    <input v-model="search" type="text" placeholder="Search courses..." @input="fetchCourses"
      class="form-control rounded-[8px]" />

    <!-- Suggestions dropdown -->
    <ul v-if="filteredCourses.length && search"
      class="absolute z-10 mt-1 w-full bg-white border rounded shadow max-h-60 overflow-y-auto">
      <li v-for="course in filteredCourses" :key="course.id" @click="toggleCourse(course)"
        class="px-4 py-2 hover:bg-gray-100 cursor-pointer flex justify-between items-center">
        <span>{{ course.name }} ({{ course.code }})</span>
        <span v-if="selectedCourses.some(c => c.id === course.id)" class="text-green-600">✓</span>
      </li>
    </ul>

    <!-- Selected tags -->
    <div v-if="selectedCourses.length" class="flex flex-wrap gap-2 mt-2">
      <span v-for="course in selectedCourses" :key="course.id"
        class="bg-blue-100 text-blue-700 px-2 py-1 rounded flex items-center gap-1">
        {{ course.name }} ({{ course.code }})
        <button type="button" class="ml-1 text-red-600" @click="removeCourse(course.id)">
          ×
        </button>
      </span>
    </div>

    <!-- Hidden input to sync with form -->
    <input type="hidden" :value="modelValue" />
  </div>
</template>

<script setup>
import { ref, watch } from 'vue'

const props = defineProps({
  modelValue: { type: Array, default: () => [] },
})
const emit = defineEmits(['update:modelValue'])

const search = ref('')
const courses = ref([])
const filteredCourses = ref([])
const selectedCourses = ref([])

watch(
  () => props.modelValue,
  (newVal) => {
    // sync external values (ids) with selectedCourses
    if (!newVal) return
    selectedCourses.value = selectedCourses.value.filter(c =>
      newVal.includes(c.id)
    )
  }
)

const fetchCourses = async () => {
  if (search.value.length < 2) {
    filteredCourses.value = []
    return
  }
  try {
    const response = await fetch(`/_dataxnr/course-search?q=${encodeURIComponent(search.value)}`, {
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json',
      },
    })
    const result = await response.json()
    courses.value = result
    filteredCourses.value = result
  } catch (err) {
    console.error('Error fetching courses', err)
  }
}

const toggleCourse = (course) => {
  const exists = selectedCourses.value.find(c => c.id === course.id)
  if (exists) {
    removeCourse(course.id)
  } else {
    selectedCourses.value.push(course)
    emit('update:modelValue', selectedCourses.value.map(c => c.id))
  }
  search.value = ''
  filteredCourses.value = []
}

const removeCourse = (id) => {
  selectedCourses.value = selectedCourses.value.filter(c => c.id !== id)
  emit('update:modelValue', selectedCourses.value.map(c => c.id))
}
</script>
