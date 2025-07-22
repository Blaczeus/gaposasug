<script setup lang="ts">

import { ref } from 'vue';
import SidebarMenuItem from '@/Components/dashboard/SidebarMenuItem.vue';

const openDropdown = ref<string | null>(null);
const setOpenDropdown = (label: string | null) => {
  openDropdown.value = label === openDropdown.value ? null : label;
};
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
        <!-- Dashboard -->
        <SidebarMenuItem label="Dashboard" icon="flaticon-dashboard" href="/admin/dashboard" />

        <!-- Students -->
        <SidebarMenuItem label="Students" icon="flaticon-classmates" :submenu="[
            { label: 'All Students', href: '/admin/students' },
            { label: 'Student Complaints', href: '/admin/students/complaints' },
            { label: 'Welfare Requests', href: '/admin/students/welfare' },
            { label: 'Academic Support', href: '/admin/students/support' }
          ]" :openDropdown="openDropdown" :setOpenDropdown="setOpenDropdown" />

        <!-- Communication -->
        <SidebarMenuItem label="Communication" icon="flaticon-script" :submenu="[
          { label: 'News & Announcements', href: '/admin/news' },
          { label: 'Events & Campaigns', href: '/admin/events' },
          { label: 'Newsletter Manager', href: '/admin/newsletters' }
        ]" :openDropdown="openDropdown" :setOpenDropdown="setOpenDropdown" />

        <!-- Alumni -->
        <SidebarMenuItem label="Alumni" icon="flaticon-multiple-users-silhouette" :submenu="[
          { label: 'Recent Graduates', href: '/admin/alumni/graduates' },
          { label: 'Messages', href: '/admin/alumni/messages' },
          { label: 'Mentorship Programs', href: '/admin/alumni/mentorship' }
        ]" :openDropdown="openDropdown" :setOpenDropdown="setOpenDropdown" />

        <!-- Executives & Management -->
        <SidebarMenuItem label="Executives" icon="flaticon-settings" :submenu="[
          { label: 'Manage Executives', href: '/admin/executives' },
          { label: 'Elections & Voting', href: '/admin/elections' },
          { label: 'Policy Documents', href: '/admin/policies' }
        ]" :openDropdown="openDropdown" :setOpenDropdown="setOpenDropdown" />

        <!-- Finance -->
        <SidebarMenuItem label="Finance" icon="flaticon-technological" :submenu="[
          { label: 'Union Dues', href: '/admin/finance/dues' },
          { label: 'Sponsorships', href: '/admin/finance/sponsorships' },
          { label: 'Expense Tracker', href: '/admin/finance/expenses' }
        ]" :openDropdown="openDropdown" :setOpenDropdown="setOpenDropdown" />

        <!-- Notice -->
        <SidebarMenuItem label="Notice Board" icon="flaticon-script" href="/admin/notices" />

        <!-- Messaging -->
        <SidebarMenuItem label="Messaging" icon="flaticon-chat" href="/admin/messages" />

        <!-- Feedback -->
        <SidebarMenuItem label="Feedback" icon="flaticon-checklist" :submenu="[
          { label: 'Student Polls', href: '/admin/feedback/polls' },
          { label: 'Suggestion Box', href: '/admin/feedback/suggestions' }
        ]" :openDropdown="openDropdown" :setOpenDropdown="setOpenDropdown" />

        <!-- Settings -->
        <SidebarMenuItem label="Account Settings" icon="flaticon-settings" href="/admin/settings" />
      </ul>
    </div>
  </div>
</template>
