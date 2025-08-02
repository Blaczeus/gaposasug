<script setup lang="ts">
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import Breadcrumbs from '@/components/dashboard/Breadcrumbs.vue'
import InputError from '@/components/InputError.vue'
import TextLink from '@/components/TextLink.vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { ref } from 'vue'

const breadcrumbLinks = [
  { label: 'Home', href: '/admin/dashboard' },
  { label: 'Students', href: '/admin/students' },
  { label: 'View Student' }
]

const props = defineProps<{ student: any }>()
const isEditing = ref(false)
const form = ref({
  email: props.student.user.email,
  phone: props.student.user.phone,
  address: props.student.address,
})
</script>

<template>
  <DashboardLayout>
    <Breadcrumbs title="Student Details" :links="breadcrumbLinks" />

    <div class="card height-auto">
      <div class="card-body">
        <div class="heading-layout1 mb-4 flex justify-between items-center">
          <div class="item-title">
            <h3>About {{ props.student.user.name }}</h3>
          </div>
        </div>

        <div class="single-info-details">
          <!-- Profile Image Container -->
          <div class="item-img w-80 h-80 rounded overflow-hidden border border-gray-300">
            <img :src="props.student.photo || '/dashboard-assets/img/figure/student1.jpg'" alt="student"
              class="w-full h-full object-cover" />
          </div>

          <div class="item-content">
            <!-- Name & Edit Actions -->
            <div class="header-inline item-header mb-2 flex justify-between items-center">
              <h3 class="text-dark-medium font-medium">{{ props.student.user.name }}</h3>
              <div class="header-elements">
                <ul class="flex space-x-2">
                  <li><a href="#" @click.prevent="isEditing = !isEditing"><i class="far fa-edit"></i></a></li>
                  <li><a href="#"><i class="fas fa-print"></i></a></li>
                  <li><a href="#"><i class="fas fa-download"></i></a></li>
                </ul>
              </div>
            </div>

            <p class="mb-4">{{ props.student.bio || 'No bio available.' }}</p>

            <div class="info-table table-responsive">
              <table class="table text-nowrap">
                <tbody>
                  <!-- Name -->
                  <tr>
                    <td>Name:</td>
                    <td class="font-medium text-dark-medium">{{ props.student.user.name }}</td>
                  </tr>

                  <!-- Gender -->
                  <tr>
                    <td>Gender:</td>
                    <td class="font-medium text-dark-medium">{{ props.student.gender || 'N/A' }}</td>
                  </tr>

                  <!-- Matric No -->
                  <tr>
                    <td>Matric No:</td>
                    <td class="font-medium text-dark-medium">{{ props.student.matric_no }}</td>
                  </tr>

                  <!-- Course -->
                  <tr>
                    <td>Course:</td>
                    <td class="font-medium text-dark-medium">{{ props.student.course.name }}</td>
                  </tr>

                  <!-- Department -->
                  <tr>
                    <td>Department:</td>
                    <td class="font-medium text-dark-medium">{{ props.student.course.department }}</td>
                  </tr>

                  <!-- Date Of Birth -->
                  <tr>
                    <td>Date Of Birth:</td>
                    <td class="font-medium text-dark-medium">{{ props.student.dob || 'N/A' }}</td>
                  </tr>

                  <!-- Email -->
                  <tr>
                    <td class="align-top pt-4">E-mail:</td>
                    <td class="font-medium text-dark-medium">
                      <template v-if="!isEditing">
                        {{ props.student.user.email }}
                      </template>
                      <template v-else>
                        <div class="mb-2">
                          <Label for="email">Email</Label>
                          <Input id="email" v-model="form.email" type="email" class="mt-1" />
                        </div>
                      </template>
                    </td>
                  </tr>

                  <!-- Phone -->
                  <tr>
                    <td class="align-top pt-4">Phone:</td>
                    <td class="font-medium text-dark-medium">
                      <template v-if="!isEditing">
                        {{ props.student.user.phone }}
                      </template>
                      <template v-else>
                        <div class="mb-2">
                          <Label for="phone">Phone</Label>
                          <Input id="phone" v-model="form.phone" type="text" class="mt-1" />
                        </div>
                      </template>
                    </td>
                  </tr>

                  <!-- Address -->
                  <tr>
                    <td class="align-top pt-4">Address:</td>
                    <td class="font-medium text-dark-medium">
                      <template v-if="!isEditing">
                        {{ props.student.address || 'N/A' }}
                      </template>
                      <template v-else>
                        <div class="mb-2">
                          <Label for="address">Address</Label>
                          <Input id="address" v-model="form.address" class="mt-1" />
                        </div>
                      </template>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Save Button -->
            <div v-if="isEditing" class="mt-4">
              <Button @click.prevent="save">Save Changes</Button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>
