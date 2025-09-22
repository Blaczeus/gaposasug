<script setup>
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import Breadcrumbs from '@/components/dashboard/Breadcrumbs.vue'
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'
import { useDropZone } from '@vueuse/core'
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css'

const form = useForm({
  title: '',
  description: '',
  attachment: null,
})

// Dropzone
const dropZoneRef = ref(null)
const fileInput = ref(null)

function onDrop(files) {
  if (files && files.length > 0) {
    form.attachment = files[0]
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
  form.post(route('student.complaints.store'), { preserveScroll: true })
}

const breadcrumbLinks = [
  { label: 'Home', href: '/student/dashboard' },
  { label: 'Complaints', href: route('student.complaints.index') },
  { label: 'Create Complaint' }
]
</script>

<template>
  <DashboardLayout>
    <Breadcrumbs title="Create Complaint" :links="breadcrumbLinks" />

    <div class="row">
      <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1 col-md-12">
        <div class="card mb-3">
          <!-- Header -->
          <div class="card-header flex items-center bg-danger text-white">
            <svg viewBox="0 0 16 16" width="1em" height="1em" fill="currentColor" class="bi bi-sticky mr-2">
              <path d="M2.5 1A1.5..." />
            </svg>
            Open New Complaint
          </div>

          <div class="card-body">
            <form enctype="multipart/form-data" @submit.prevent="submit">
              <!-- Title -->
              <div class="form-group mb-4">
                <label for="title" class="text-lg font-black text-black">TITLE</label>
                <input v-model="form.title" type="text" placeholder="Enter complaint title"
                  class="form-control form-control-lg" />
                <div v-if="form.errors.title" class="text-sm text-red-600">{{ form.errors.title }}</div>
              </div>

              <!-- Description (Quill) -->
              <div class="form-group mb-4">
                <label class="text-lg font-black text-black" for="description">DESCRIPTIONS</label>
                <QuillEditor v-model:content="form.description" theme="snow" contentType="html"
                  class="min-h-[200px] bg-white" />
                <div v-if="form.errors.description" class="text-sm text-red-600">{{ form.errors.description }}</div>
              </div>

              <!-- Dropzone -->
              <div class="form-group mb-4">
                <label class="text-lg font-black text-black" for="attachment">ATTACHMENTS</label>
                <div ref="dropZoneRef"
                  class="dropzone flex items-center justify-center border-2 border-dashed rounded cursor-pointer min-h-[150px]"
                  :class="isOverDropZone ? 'bg-green-50 border-green-400' : 'bg-gray-50 border-gray-300'"
                  @click="openFileDialog" @dragover.prevent @drop.prevent>
                  <span v-if="!form.attachment" class="flex flex-col items-center text-center">
                    Drag & drop a file here, or click to select
                    <p class="text-xs mt-1"><b>Supported:</b> Images, PDF</p>
                  </span>
                  <span v-else class="flex items-center gap-2">
                    <span class="text-lg font-medium">File: {{ form.attachment.name }}</span>
                    <button type="button" @click="form.attachment = null" class="text-red-600 text-sm hover:underline">
                      Remove
                    </button>
                  </span>
                </div>

                <!-- Hidden input to open file picker -->
                <input type="file" ref="fileInput" class="hidden" accept="image/*,application/pdf"
                  @change="e => form.attachment = e.target.files[0]" />

                <div v-if="form.errors.attachment" class="text-sm text-red-600 mt-1">
                  {{ form.errors.attachment }}
                </div>
              </div>

              <!-- Submit -->
              <button type="submit" :disabled="form.processing"
                class="btn btn-danger btn-lg btn-fill-lg bg-danger text-white hover:bg-red-700 rounded-lg mt-5">
                <span v-if="form.processing">Submitting...</span>
                <span v-else>Send</span>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>
