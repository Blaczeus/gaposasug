<script setup>
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import Breadcrumbs from '@/components/dashboard/Breadcrumbs.vue'
import CourseMultiSelect from '@/components/CourseMultiSelect.vue'
import DepartmentMultiSelect from '@/components/DepartmentMultiSelect.vue'
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'
import { useDropZone } from '@vueuse/core'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css'

const props = defineProps({
  courses: { type: Array, default: () => [] }
})

const form = useForm({
  title: '',
  body: '',
  audience: 'all',
  course_ids: [],
  department_ids: [],
  pinned: false,
  important: false,
  starts_at: null,
  ends_at: null,
  attachments: [],
})

// Dropzone
const dropZoneRef = ref(null)
const fileInput = ref(null)

function onDrop(files) {
  if (files && files.length > 0) {
    form.attachments = Array.from(files)
  }
}

const { isOverDropZone } = useDropZone(dropZoneRef, {
  dataTypes: ['image/*', 'application/pdf'],
  onDrop,
})

function openFileDialog() {
  fileInput.value?.click()
}

function submit() {
  form.post(route('admin.notices.store'), { preserveScroll: true })
}

const breadcrumbLinks = [
  { label: 'Home', href: '/admin/dashboard' },
  { label: 'Announcements', href: route('admin.notices.index') },
  { label: 'Create Announcement' }
]
</script>

<template>
  <DashboardLayout>
    <Breadcrumbs title="Create Announcement" :links="breadcrumbLinks" />

    <div class="row">
      <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-12">
        <div class="card mb-3">
          <!-- Header -->
          <div class="card-header flex items-center bg-primary text-white">
            <svg viewBox="0 0 16 16" width="1em" height="1em" fill="currentColor" class="bi bi-megaphone mr-2">
              <path d="M3 3h1v10H3V3zm2..." />
            </svg>
            New Announcement
          </div>

          <div class="card-body">
            <form enctype="multipart/form-data" @submit.prevent="submit">
              <!-- Title -->
              <div class="form-group mb-4">
                <label class="text-lg font-black text-black">TITLE</label>
                <input required v-model="form.title" type="text" placeholder="Enter announcement title"
                  class="form-control form-control-lg" />
                <div v-if="form.errors.title" class="text-lg font-medium mt-2 ml-2 text-red-600">{{ form.errors.title }}</div>
              </div>

              <!-- Body -->
              <div class="form-group mb-4">
                <label class="text-lg font-black text-black">BODY</label>
                <QuillEditor v-model:content="form.body" theme="snow" contentType="html"
                  class="min-h-[200px] bg-white" />
                <div v-if="form.errors.body" class="text-lg font-medium mt-2 ml-2 text-red-600">{{ form.errors.body }}</div>
              </div>

              <!-- Audience -->
              <div class="form-group mb-4">
                <label class="text-lg font-black text-black">AUDIENCE</label>
                <select v-model="form.audience" class="form-control form-control-lg">
                  <option value="all">All Users</option>
                  <option value="students">Students</option>
                  <option value="alumni">Alumni</option>
                  <option value="admins">Admins</option>
                  <option value="courses">Specific Courses</option>
                  <option value="departments">Specific Departments</option>
                </select>
                <div v-if="form.errors.audience" class="text-lg font-medium mt-2 ml-2 text-red-600">{{ form.errors.audience }}</div>
              </div>

              <!-- Courses -->
              <div class="form-group mb-4" v-if="form.audience === 'courses'">
                <label class="text-lg font-black text-black">TARGET COURSES</label>
                <CourseMultiSelect v-model="form.course_ids" />
                <div v-if="form.errors.course_ids" class="text-lg font-medium mt-2 ml-2 text-red-600">{{ form.errors.course_ids }}</div>
              </div>

              <!-- Departments -->
              <div class="form-group mb-4" v-if="form.audience === 'departments'">
                <label class="text-lg font-black text-black">TARGET DEPARTMENTS</label>
                <DepartmentMultiSelect v-model="form.department_ids" />
                <div v-if="form.errors.department_ids" class="text-lg font-medium mt-2 ml-2 text-red-600">{{ form.errors.department_ids }}
                </div>
              </div>

              <!-- Flags -->
              <div class="form-group mb-4 flex gap-4">
                <label class="flex items-center gap-2">
                  <input type="checkbox" v-model="form.pinned" /> Pin to top
                </label>
                <label class="flex items-center gap-2">
                  <input type="checkbox" v-model="form.important" /> Mark as important
                </label>
              </div>

              <!-- Schedule -->
              <div class="form-group mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <label class="text-lg font-black text-black">STARTS AT</label>
                  <input type="datetime-local" v-model="form.starts_at" class="form-control" />
                  <div v-if="form.errors.starts_at" class="text-lg font-medium mt-2 ml-2 text-red-600">{{ form.errors.starts_at }}</div>
                </div>
                <div>
                  <label class="text-lg font-black text-black">ENDS AT</label>
                  <input type="datetime-local" v-model="form.ends_at" class="form-control" />
                  <div v-if="form.errors.ends_at" class="text-lg font-medium mt-2 ml-2 text-red-600">{{ form.errors.ends_at }}</div>
                </div>
              </div>

              <!-- Dropzone -->
              <div class="form-group mb-4">
                <label class="text-lg font-black text-black">ATTACHMENTS</label>
                <div ref="dropZoneRef"
                  class="dropzone flex items-center justify-center border-2 border-dashed rounded cursor-pointer min-h-[150px]"
                  :class="isOverDropZone ? 'bg-green-50 border-green-400' : 'bg-gray-50 border-gray-300'"
                  @click="openFileDialog" @dragover.prevent @drop.prevent>
                  <span v-if="!form.attachments.length" class="flex flex-col items-center text-center">
                    Drag & drop files here, or click to select
                    <p class="text-xs mt-1"><b>Supported:</b> Images, PDF</p>
                  </span>
                  <span v-else class="flex flex-col items-start gap-2">
                    <span v-for="(file, i) in form.attachments" :key="i" class="flex items-center gap-2">
                      <span class="text-lg font-medium">File: {{ file.name }}</span>
                      <button type="button" @click="form.attachments.splice(i, 1)"
                        class="text-red-600 text-sm hover:underline">
                        Remove
                      </button>
                    </span>
                  </span>
                </div>

                <!-- Hidden input to open file picker -->
                <input type="file" ref="fileInput" class="hidden" multiple accept="image/*,application/pdf"
                  @change="e => form.attachments = Array.from(e.target.files)" />

                <div v-if="form.errors.attachments" class="text-lg font-medium mt-2 ml-2 text-red-600 mt-1">
                  {{ form.errors.attachments }}
                </div>
              </div>

              <!-- Submit -->
              <button
                type="submit"
                :disabled="form.processing"
                class="px-16 py-2.5 bg-blue-600 text-white !rounded-[12px] text-lg font-semibold shadow-md 
                      hover:bg-blue-700 hover:!shadow-lg 
                      focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1
                      transition-all duration-200 ease-in-out 
                      disabled:opacity-50 disabled:cursor-not-allowed mt-5"
              >
                <span v-if="form.processing">Saving...</span>
                <span v-else>Create</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>
