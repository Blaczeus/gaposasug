<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head} from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const { user } = defineProps<{ user: any }>()

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">

            <!-- STUDENT VIEW -->
            <template v-if="user.role === 'student'">
                <p class="text-xl font-semibold">Welcome Student {{ user.name }}</p>

                <div class="grid auto-rows-min gap-4 md:grid-cols-3 mt-4">
                    <div class="p-4 border rounded-xl">
                        <PlaceholderPattern>
                            <h3 class="font-bold text-lg mb-2">Student Info</h3>
                            <ul class="text-gray-700 text-sm space-y-1">
                                <li><strong>Name:</strong> {{ user.name }}</li>
                                <li><strong>Email:</strong> {{ user.email }}</li>
                                <li><strong>Matric No:</strong> {{ user.student?.matric_number }}</li>
                                <li><strong>Department:</strong> {{ user.student?.department }}</li>
                                <li><strong>Entry Year:</strong> {{ user.student?.phone }}</li>
                                <li><strong>Graduation Year:</strong> {{ user.student?.level }}</li>
                            </ul>
                        </PlaceholderPattern>
                    </div>

                    <div class="border rounded-xl">
                        <PlaceholderPattern>
                            <h3 class="font-bold text-lg mb-2">Class Schedule</h3>
                            <p class="text-sm text-gray-600">Coming soon...</p>
                        </PlaceholderPattern>
                    </div>

                    <div class="border rounded-xl">
                        <PlaceholderPattern>
                            <h3 class="font-bold text-lg mb-2">Result Checker</h3>
                            <p class="text-sm text-gray-600">Coming soon...</p>
                        </PlaceholderPattern>
                    </div>
                </div>
            </template>

            <!-- ALUMNI VIEW -->
            <template v-else-if="user.role === 'alumni'">
                <p class="text-xl font-semibold">Welcome Alumni {{ user.name }} 🎓</p>

                <div class="grid auto-rows-min gap-4 md:grid-cols-3 mt-4">
                    <div class="p-4 border rounded-xl">
                        <PlaceholderPattern>
                            <h3 class="font-bold text-lg mb-2">Alumni Info</h3>
                            <ul class="text-gray-700 text-sm space-y-1">
                                <li><strong>Name:</strong> {{ user.name }}</li>
                                <li><strong>Email:</strong> {{ user.email }}</li>
                                <li><strong>Department:</strong> {{ user.alumni?.department }}</li>
                                <li><strong>Graduation Year:</strong> {{ user.alumni?.graduation_year }}</li>
                                <li><strong>Job:</strong> {{ user.alumni?.current_job || 'N/A' }}</li>
                                <li><strong>LinkedIn:</strong> <a :href="user.alumni?.linkedin_profile" target="_blank"
                                        class="text-blue-600 hover:underline">View Profile</a></li>
                            </ul>
                        </PlaceholderPattern>
                    </div>

                    <div class="border rounded-xl">
                        <PlaceholderPattern>
                            <h3 class="font-bold text-lg mb-2">Alumni Events</h3>
                            <p class="text-sm text-gray-600">Coming soon...</p>
                        </PlaceholderPattern>
                    </div>

                    <div class="border rounded-xl">
                        <PlaceholderPattern>
                            <h3 class="font-bold text-lg mb-2">Mentorship Program</h3>
                            <p class="text-sm text-gray-600">Coming soon...</p>
                        </PlaceholderPattern>
                    </div>
                </div>
            </template>

            <!-- ADMIN VIEW -->
            <template v-else-if="user.role === 'admin'">
                <p class="text-xl font-semibold">Welcome Admin {{ user.name }} 🛠️</p>

                <div class="grid auto-rows-min gap-4 md:grid-cols-3 mt-4">
                    <div class="border rounded-xl">
                        <PlaceholderPattern class="p-4">
                            <h3 class="font-bold text-lg mb-2">User Management</h3>
                            <p class="text-sm text-gray-600">Manage students, alumni, and admins.</p>
                        </PlaceholderPattern>
                    </div>

                    <div class="border rounded-xl">
                        <PlaceholderPattern>
                            <h3 class="font-bold text-lg mb-2">Site Settings</h3>
                            <p class="text-sm text-gray-600">Update general site configuration.</p>
                        </PlaceholderPattern>
                    </div>

                    <div class="border rounded-xl">
                        <PlaceholderPattern>
                            <h3 class="font-bold text-lg mb-2">Reports</h3>
                            <p class="text-sm text-gray-600">Access usage and feedback reports.</p>
                        </PlaceholderPattern>
                    </div>
                </div>
            </template>

            <!-- DEFAULT FALLBACK (Optional) -->
            <template v-else>
                <div class="p-4 border rounded-xl">
                    <PlaceholderPattern>
                        <p class="text-gray-600">No dashboard data available for this role.</p>
                    </PlaceholderPattern>
                </div>
            </template>
        </div>
    </AppLayout>
</template>
