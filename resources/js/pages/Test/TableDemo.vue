<script setup lang="ts">
import { ref } from 'vue'
import EasyDataTable from 'vue3-easy-data-table'
import { ClickRowArgument, Item } from 'vue3-easy-data-table'
import 'vue3-easy-data-table/dist/style.css'

// Props from Laravel
const props = defineProps<{
  complaints: Array<{ id: number; title: string; status: string }>
}>()

// Define headers
const headers = [
  { text: 'ID', value: 'id' },
  { text: 'Title', value: 'title' },
  { text: 'Status', value: 'status' },
]

// Track selected row IDs
// const selectedIds = ref<Array<number>>([])
const itemsSelected = ref<Item[]>([]);

</script>

<template>
  <div class="p-6">
    <h1 class="text-xl font-bold mb-4">Complaints Table Test</h1>

    <EasyDataTable :headers="headers" :items="props.complaints" :rows-per-page="5" :checkbox="true" row-key="id"
      v-model:items-selected="itemsSelected" alternating show-index />

    <div class="mt-4 p-2 border rounded">
      <p class="font-semibold">Selected IDs:</p>
      <pre>{{ itemsSelected }}</pre>
    </div>
  </div>
</template>
