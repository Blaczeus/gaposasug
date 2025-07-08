<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

const user = page.props.auth.user;

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

            <div v-if="user.role === 'student'">
                <p>Welcome Student {{ user.name }} 👨‍🎓</p>
                <!-- Render student-specific widgets here -->
                <div class="p-6 max-w-xl mx-auto space-y-4">
                    <h2 class="text-2xl font-semibold">Student Dashboard</h2>

                    <ul class="list-disc list-inside text-gray-700">
                        <li><strong>Name:</strong> {{ user.name }}</li>
                        <li><strong>Email:</strong> {{ user.email }}</li>
                        <li><strong>Role:</strong> {{ user.role }}</li>

                            <li><strong>Matric Number:</strong> {{ user.student.matric_number }}</li>
                            <li><strong>Department:</strong> {{ user.student.department }}</li>
                            <li><strong>Entry Year:</strong> {{ user.student.entry_year }}</li>
                            <li><strong>Graduation Year:</strong> {{ user.student.graduation_year }}</li>
                    </ul>
                </div>
            </div>

            <div v-else-if="user.role === 'alumni'">
                <p>Welcome Alumni {{ user.name }} 🎓</p>
                <!-- Render alumni-specific widgets here -->
            </div>

            <div v-else-if="user.role === 'admin'">
                <p>Welcome Admin {{ user.name }} 🛠️</p>
                <!-- Render admin tools here -->
            </div>

            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div
                    class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
            </div>
            <div
                class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                <PlaceholderPattern />
            </div>
        </div>
    </AppLayout>
</template>
