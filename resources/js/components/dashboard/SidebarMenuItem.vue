<!-- SidebarMenuItem.vue -->
<template>
  <li class="nav-item sidebar-nav-item" v-if="hasSubmenu" :class="{ active: isOpen }">
    <a href="#" class="nav-link" @click.prevent="toggleDropdown">
      <i :class="icon"></i><span>{{ label }}</span>
    </a>

    <ul v-if="hasSubmenu" class="nav sub-group-menu" :class="{ 'menu-open': isOpen }" :style="{ display: isOpen ? 'block' : 'none' }">
      <li v-for="(item, index) in props.submenu" :key="index" class="nav-item">
        <a :href="item.href" class="nav-link">
          <i class="fas fa-angle-right"></i>{{ item.label }}
        </a>
      </li>
    </ul>
  </li>

  <li class="nav-item" v-else>
    <a :href="href" class="nav-link">
      <i :class="icon"></i><span>{{ label }}</span>
    </a>
  </li>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const props = defineProps({
  label: String,
  icon: String,
  href: String,
  submenu: {
    type: Array as () => { label: string; href: string }[],
    default: () => [],
  },
});

const isOpen = ref(false);

const hasSubmenu = !!(Array.isArray(props.submenu) && props.submenu.length > 0);

function toggleDropdown() {
  if (hasSubmenu) {
    isOpen.value = !isOpen.value;
  }
}
</script>
