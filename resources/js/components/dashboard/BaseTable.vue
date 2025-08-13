<script setup lang="ts">
import EasyDataTable from 'vue3-easy-data-table'
import 'vue3-easy-data-table/dist/style.css'

interface Props {
  headers: Array<Record<string, any>>
  items: Array<Record<string, any>>
}

const props = defineProps<Props>()
</script>

<template>
  <div class="table-wrapper">
    <EasyDataTable :headers="props.headers" :items="props.items" table-class="w-full" body-text-direction="left"
      :rows-per-page="10" :alternating="true" show-index>
      <!-- Slot for action buttons -->
      <template v-for="(_, name) in $slots" #[name]="slotProps">
        <slot :name="name" v-bind="slotProps" />
      </template>
    </EasyDataTable>
  </div>
</template>

<style scoped>
.view-button {
  background-color: #eef6ff;
  color: #1d4ed8;
  font-size: 14px;
  padding: 2px 10px;
  border-radius: 5px;
  border: 1px solid #93c5fd;
  transition: background 0.2s;
  text-decoration: none;
}

.view-button:hover {
  background-color: #dbeafe;
}
</style>
