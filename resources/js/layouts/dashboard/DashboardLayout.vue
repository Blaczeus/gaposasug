<script setup lang="ts">
import { Head } from '@inertiajs/vue3'; // ✅ Fix the warning
import Sidebar from './partials/Sidebar.vue';
import Topbar from './partials/Topbar.vue';
</script>

<template>

  <Head title="Dashboard" />

  <!-- Preloader Start Here -->
  <!-- <div id="preloader"></div> -->
  <!-- Preloader End Here -->

  <div id="wrapper" class="wrapper bg-ash">
    <!-- Topbar -->
    <Topbar />

    <div class="dashboard-page-one">
      <!-- Sidebar -->
      <Sidebar />

      <!-- Page wrapper -->
      <div class="dashboard-content-one">
        <!-- Page content -->
          <slot />
        <!-- Page content end -->
      </div>

      <!-- Page wrapper end -->
    </div>
  </div>
</template>
