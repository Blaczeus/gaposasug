<script setup lang="ts">
import { ref, computed } from 'vue'
import { useForm } from '@inertiajs/vue3'
import { getFallbackImage } from '@/helpers/fallbackImage'
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import Breadcrumbs from '@/components/dashboard/Breadcrumbs.vue'

// Props received from parent
const props = defineProps<{ student: any }>()

// Breadcrumb navigation
const breadcrumbLinks = [
  { label: 'Home', href: '/admin/dashboard' },
  { label: 'Students', href: '/admin/students' },
  { label: 'View Student' }
]

// State for toggling edit mode
const isEditing = ref(false)

// Locks: prevent editing of DOB or Gender if already set
const genderLocked = ref(!!props.student.gender)
const dobLocked = ref(!!props.student.dob)

// Form data and initialization
const form = useForm<{
  email: string
  phone: string
  address: string
  gender: string
  dob: string
  photo: File | null
}>({
  email: props.student.user.email || '',
  phone: props.student.user.phone || '',
  address: props.student.address || '',
  gender: props.student.gender || '',
  dob: props.student.dob || '',
  photo: null,
})

// Photo handling
const originalPhoto = ref(props.student.photo)
const previewPhoto = ref(originalPhoto.value)
const uploadError = ref<string | null>(null)

/**
 * Handles profile photo file selection, validates size/type,
 * and previews the image.
 */
function handlePhotoChange(event: Event) {
  const target = event.target as HTMLInputElement
  const file = target.files?.[0]
  if (!file) return

  // Validate image type
  if (!['image/jpeg', 'image/png', 'image/jpg'].includes(file.type)) {
    uploadError.value = 'Only JPG, JPEG, and PNG formats are allowed.'
    return
  }

  // Validate size (< 2MB)
  if (file.size > 2 * 1024 * 1024) {
    uploadError.value = 'Image must be less than 2MB.'
    return
  }

  // All good - preview and assign to form
  uploadError.value = null
  previewPhoto.value = URL.createObjectURL(file)
  form.photo = file
}

/**
 * Submit the form to update student details.
 */

function save() {
  console.log("Data being sent:", form.data());

  // Transform the form data so Laravel treats it as a PUT request
  form.transform((data) => ({
    ...data,
    _method: 'PUT',
  })).post(route('admin.students.update', props.student.matric_no), {
    preserveScroll: true,
    forceFormData: true, // Important for file uploads
    onSuccess: () => {
      isEditing.value = false;
      originalPhoto.value = previewPhoto.value;
      window.scrollTo({ top: 0, behavior: 'smooth' });
    },
    onError: (errors) => {
      console.error('Update error:', errors);
    },
  });
}

/**
 * Cancel editing and reset form state.
 */
function cancelEdit() {
  isEditing.value = false
  uploadError.value = null
  previewPhoto.value = originalPhoto.value
  form.reset()
}

/**
 * Computed: Determine the correct photo URL (original or fallback).
 */
const displayPhoto = computed(() => {
  // Show preview if user selected a new photo
  if (previewPhoto.value) return previewPhoto.value

  // If student has photo, use the exact path (assuming it's already `student_photos/...`)
  if (props.student.photo) {
    const relativePath = props.student.photo.replace(/^storage\//, '')
    return `${window.location.origin}/storage/${relativePath}`
  }

  // No photo at all – fallback will be handled in @error
  return ''
})


function handleImageError(event: Event) {
  const img = event.target as HTMLImageElement
  console.warn('Failed to load student image. Using fallback.')
  img.src = getFallbackImage(props.student.gender)
}

</script>

<template>
  <DashboardLayout>
    <Breadcrumbs title="Student Details" :links="breadcrumbLinks" />

    <!-- Success Message -->
    <div v-if="$page.props.flash.success" class="mb-4 text-green-600 font-medium">
      {{ $page.props.flash.success }}
    </div>

    <div class="card height-auto">
      <div class="card-body">
        <div class="heading-layout1 mb-4 flex justify-between items-center">
          <div class="item-title">
            <h3>{{ props.student.user.name.toUpperCase() }} - {{ props.student.matric_no }}</h3>
          </div>
          <div class="header-elements">
            <button @click.prevent="isEditing ? cancelEdit() : isEditing = true"
              class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark flex items-center gap-2 px-4 py-2 rounded-[6px]">
              <i class="far fa-edit"></i>
              <span>{{ isEditing ? 'Cancel' : 'Edit' }}</span>
            </button>
          </div>
        </div>

        <!-- Legend for locked fields -->
        <div class="flex items-center gap-2 mb-6 text-red-600">
          <i class="fas fa-lock"></i>
          <span class="text-[15px]">Fields with red lock icons are locked and can't be edited.</span>
        </div>

        <!-- Centered Profile Image -->
        <div class="flex justify-center mb-16">
          <!-- Profile Image Upload & Preview -->
          <div class="item-img w-80 h-80 rounded-full overflow-hidden border border-gray-300 mb-4">
            <img :src="displayPhoto" @error="handleImageError" alt="student" class="w-full h-full object-cover" />
          </div>

          <div v-if="isEditing" class="form-group flex flex-col items-center space-y-2 mt-4">
            <label for="photo-upload"
              class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark px-4 py-2 rounded-[6px] cursor-pointer">
              <i class="fas fa-camera mr-2"></i>Change Photo
            </label>
            <input id="photo-upload" type="file" accept="image/*" @change="handlePhotoChange" class="hidden" />
            <span v-if="uploadError" class="text-[13px] text-red-600 mt-1 ml-4 block">{{ uploadError }}</span>
          </div>
        </div>

        <!-- Student Info Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-24 gap-y-4">
          <!-- Name -->
          <div class="form-group relative">
            <span class="block text-2xl mb-3 font-semibold text-black">Name:</span>
            <input type="text" :value="props.student.user.name" class="form-control rounded-[8px]" disabled />
            <i class="fas fa-lock text-red-600 absolute right-3 top-17"></i>
          </div>

          <!-- Matric No -->
          <div class="form-group relative">
            <span class="block text-2xl mb-3 font-semibold text-black">Matric No:</span>
            <input type="text" :value="props.student.matric_no" class="form-control rounded-[8px]" disabled />
            <i class="fas fa-lock text-red-600 absolute right-3 top-17"></i>
          </div>

          <!-- Course -->
          <div class="form-group relative">
            <span class="block text-2xl mb-3 font-semibold text-black">Course:</span>
            <input type="text" :value="props.student.course.name" class="form-control rounded-[8px]" disabled />
            <i class="fas fa-lock text-red-600 absolute right-3 top-17"></i>
          </div>

          <!-- Department -->
          <div class="form-group relative">
            <span class="block text-2xl mb-3 font-semibold text-black">Department:</span>
            <input type="text" :value="props.student.course.department" class="form-control rounded-[8px]" disabled />
            <i class="fas fa-lock text-red-600 absolute right-3 top-17"></i>
          </div>

          <!-- Date of Birth -->
          <div class="form-group relative">
            <span class="block text-2xl mb-3 font-semibold text-black">Date of Birth:</span>

            <!-- Editable DOB -->
            <div v-if="!dobLocked && isEditing">
              <input type="date" v-model="form.dob" class="form-control rounded-[8px]" />
              <div v-if="form.errors.dob" class="text-[13px] text-red-600 mt-1 ml-4">{{ form.errors.dob }}</div>
            </div>

            <!-- Locked DOB -->
            <div v-else class="relative">
              <input type="text" :value="form.dob" class="form-control rounded-[8px] pr-10" disabled />
              <i class="fas fa-lock text-red-600 absolute top-1/2 right-3 -translate-y-1/2"></i>
            </div>
          </div>

          <!-- Gender -->
          <div class="form-group relative">
            <span class="block text-2xl mb-3 font-semibold text-black">Gender:</span>

            <!-- Editable Gender -->
            <div v-if="!genderLocked && isEditing">
              <select v-model="form.gender" class="form-control rounded-[8px]">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <div v-if="form.errors.gender" class="text-[13px] text-red-600 mt-1 ml-4">{{ form.errors.gender }}</div>
            </div>

            <!-- Locked Gender -->
            <div v-else class="relative">
              <input type="text" :value="form.gender" class="form-control rounded-[8px] pr-10" disabled />
              <i class="fas fa-lock text-red-600 absolute top-1/2 right-3 -translate-y-1/2"></i>
            </div>
          </div>

          <!-- Email -->
          <div class="form-group">
            <span class="block text-2xl mb-3 font-semibold text-black">Email:</span>
            <input type="email" v-model="form.email" :disabled="!isEditing" class="form-control rounded-[8px]" />
            <div v-if="form.errors.email" class="text-[13px] text-red-600 mt-1 ml-4">{{ form.errors.email }}</div>
          </div>

          <!-- Phone -->
          <div class="form-group">
            <span class="block text-2xl mb-3 font-semibold text-black">Phone:</span>
            <input type="text" v-model="form.phone" :disabled="!isEditing" class="form-control rounded-[8px]" />
            <div v-if="form.errors.phone" class="text-[13px] text-red-600 mt-1 ml-4">{{ form.errors.phone }}</div>
          </div>

          <!-- Address -->
          <div class="form-group md:col-span-2">
            <span class="block text-2xl mb-3 font-semibold text-black">Address:</span>
            <input type="text" v-model="form.address" :disabled="!isEditing" class="form-control rounded-[8px]" />
            <div v-if="form.errors.address" class="text-[13px] text-red-600 mt-1 ml-4">{{ form.errors.address }}</div>
          </div>
        </div>

        <!-- Save / Cancel Buttons -->
        <div v-if="isEditing" class="col-12 form-group mt-6">
          <button type="button" @click.prevent="save"
            class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark py-2 px-5">
            Save
          </button>
          <button type="button" @click.prevent="cancelEdit"
            class="btn-fill-lg bg-blue-dark btn-hover-yellow ml-2 py-2 px-5">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>
