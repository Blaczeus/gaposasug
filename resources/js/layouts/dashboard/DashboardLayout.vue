<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
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
        <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="fa fa-angle-up"></i></a>
        <!-- Page content end -->
      </div>

      <!-- Page wrapper end -->
    </div>
  </div>
</template>
