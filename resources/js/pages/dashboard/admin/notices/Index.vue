<script setup>
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import Breadcrumbs from '@/components/dashboard/Breadcrumbs.vue'
import AnnouncementTable from '@/components/dashboard/AnnouncementTable.vue'
import { ref, computed } from 'vue'
import { Link } from '@inertiajs/vue3'

// Breadcrumbs
const breadcrumbLinks = [
  { label: 'Home', href: '/admin/dashboard' },
  { label: 'Announcements' }
]

// Props
const props = defineProps({
  notices: { type: Object, required: true }
})


// Alias notices
const allNotices = computed(() => props.notices.data ?? [])

// Search filters
const searchTitle = ref('')
const searchAudience = ref('')

// Filtered list
const filteredNotices = computed(() => {
  return allNotices.value.filter(notice => {
    const hasTitle =
      notice.title?.toLowerCase().includes(searchTitle.value.toLowerCase()) ??
      false
    const hasAudience =
      notice.audience
        ?.toLowerCase()
        .includes(searchAudience.value.toLowerCase()) ?? false

    return hasTitle && hasAudience
  })
})
</script>

<template>
  <DashboardLayout>
    <Breadcrumbs title="Announcements" :links="breadcrumbLinks" />

    <div class="card height-auto mt-6">
      <div class="card-body">
        <!-- Header -->
        <div class="heading-layout1 mb-4 flex items-center justify-between">
          <div class="item-title">
            <h3>All Announcements</h3>
          </div>
          <Link :href="route('admin.notices.create')"
            class="btn-fill-lg font-medium text-light !bg-blue-600 text-white rounded-md px-4 py-2">
          + Create Announcement
          </Link>
        </div>

        <!-- Filter Form -->
        <form @submit.prevent class="mb-4">
          <div class="row gutters-8">
            <div class="col-lg-6 form-group">
              <input type="text" v-model="searchTitle" placeholder="Search by Title..." class="form-control" />
            </div>
            <div class="col-lg-6 form-group">
              <input type="text" v-model="searchAudience" placeholder="Search by Audience (all, students, alumni...)"
                class="form-control" />
            </div>
          </div>
        </form>

        <!-- Show table -->
        <div v-if="filteredNotices.length > 0">
          <AnnouncementTable :notices="filteredNotices" />
        </div>

        <!-- Empty state -->
        <div v-else class="text-center text-muted py-5">
          <p>No announcements found.</p>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>
