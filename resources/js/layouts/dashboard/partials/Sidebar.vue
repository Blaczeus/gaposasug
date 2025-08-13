<script setup lang="ts">
/* eslint-disable @typescript-eslint/no-explicit-any */
declare function route(name: string, params?: any): string;

import { ref, computed, watch } from 'vue';
import { usePage, router } from '@inertiajs/vue3';
import SidebarMenuItem from '@/Components/dashboard/SidebarMenuItem.vue';

interface MenuItem {
  label: string;
  icon?: string;
  href?: string;
  submenu?: MenuItem[];
}

const openDropdown = ref<string | null>(null);
const setOpenDropdown = (label: string | null) => {
  openDropdown.value = label === openDropdown.value ? null : label;
};

const page = usePage();
const role = computed(() => (page.props.auth?.role ?? null) as 'admin' | 'student' | 'alumni' | null);

// Static menus based on role
const allMenus: Record<string, MenuItem[]> = {
  admin: [
    { label: 'Dashboard', icon: 'flaticon-dashboard', href: route('dashboard') },
    {
      label: 'Students', icon: 'flaticon-classmates', submenu: [
        { label: 'All Students', href: route('admin.students') },
        { label: 'Student Complaints', href: route('admin.complaints.index') },
      ]
    },
    { label: 'Complaints', icon: 'flaticon-checklist', href: route('admin.complaints.index') },
  ],
  student: [
    { label: 'Dashboard', icon: 'flaticon-dashboard', href: route('dashboard') },
    { label: 'Complaints', icon: 'flaticon-checklist', href: route('student.complaints.index') },
    { label: 'New Complaint', icon: 'flaticon-edit', href: route('student.complaints.create') },
  ],
  alumni: [
    { label: 'Dashboard', icon: 'flaticon-dashboard', href: route('dashboard') },
    { label: 'Benefits', icon: 'flaticon-gift', href: route('alumni.benefits') },
    { label: 'Graduate Support', icon: 'flaticon-life-buoy', href: route('alumni.support') },
    { label: 'Networking Events', icon: 'flaticon-calendar', href: route('alumni.events') },
    { label: 'Recent Graduates', icon: 'flaticon-users', href: route('alumni.recent') },
    { label: 'Mentorship', icon: 'flaticon-graduation-cap', href: route('alumni.mentorship') },
    { label: 'Account', icon: 'flaticon-user', href: route('alumni.account') },
  ]
};

// Menu to render (based on role)
const menuItems = computed<MenuItem[]>(() => {
  if (!role.value) return [];
  return allMenus[role.value] ?? [];
});
// Logout if role is missing
watch(
  role,
  (newRole) => {
    if (newRole === undefined) return; // still loading props
    if (!newRole) {
      router.visit(route('logout'), {
        method: 'post',
        onFinish: () => {
          window.location.href = route('login');
        }
      });
    }
  },
  { immediate: true }
);
</script>

<template>
  <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
    <div class="mobile-sidebar-header d-md-none">
      <div class="header-logo">
        <a href="/">
          <img :src="'/dashboard-assets/img/logo1.png'" alt="Logo" />
        </a>
      </div>
    </div>

    <div class="sidebar-menu-content">
      <ul class="nav nav-sidebar-menu sidebar-toggle-view">
        <template v-for="item in menuItems" :key="item.label">
          <SidebarMenuItem
            :label="item.label"
            :icon="item.icon"
            :href="item.href"
            :submenu="item.submenu"
            :openDropdown="openDropdown"
            :setOpenDropdown="setOpenDropdown"
          />
        </template>
      </ul>
    </div>
  </div>
</template>
