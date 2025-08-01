<template>
  <div class="relative">
    <Input v-model="search" type="text" placeholder="Search your course" @input="fetchCourses"
      class="bg-white/90 text-black dark:bg-neutral-800 dark:text-white" />
    <ul v-if="filteredCourses.length && search" class="absolute z-10 mt-1 w-full bg-white border rounded shadow">
      <li v-for="course in filteredCourses" :key="course.id" @click="selectCourse(course)"
        class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
        {{ course.name }} ({{ course.code }})
      </li>
    </ul>
    <InputError :message="error" />
  </div>
</template>

<script setup>
import { ref} from 'vue';
import { Input } from '@/components/ui/input';
import InputError from '@/components/InputError.vue';

const props = defineProps({
  modelValue: [String, Number],
  error: String,
});

const emit = defineEmits(['update:modelValue']);

const search = ref('');
const courses = ref([]);
const filteredCourses = ref([]);

const fetchCourses = async () => {
  if (search.value.length < 2) {
    filteredCourses.value = [];
    return;
  }

  try {
    const response = await fetch(`/_dataxnr/course-search?q=${encodeURIComponent(search.value)}`, {
      headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json',
      },
    });

    const result = await response.json();
    courses.value = result;
    filteredCourses.value = result;
  } catch (err) {
    console.error('Error fetching courses', err);
  }
};

const selectCourse = (course) => {
  search.value = `${course.name} (${course.code})`;
  emit('update:modelValue', course.id);
  filteredCourses.value = [];
};
</script>
