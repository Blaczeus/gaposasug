<script setup lang="ts">
import { computed } from 'vue'
import EasyDataTable from 'vue3-easy-data-table'
import 'vue3-easy-data-table/dist/style.css'

/**
 * Props
 * - headers: columns
 * - items: data rows
 * - rowKey: unique key field name
 * - checkBox: enable selection checkboxes
 * - modelValue: the v-model from parent (array of ids)
 */
interface Props {
  headers: Array<Record<string, any>>
  items: Array<Record<string, any>>
  rowKey?: string
  checkBox?: boolean
  modelValue?: Array<any>
}

// ✅ provide defaults so TS never complains
const props = withDefaults(defineProps<Props>(), {
  headers: () => [],
  items: () => [],
  rowKey: 'id',
  checkBox: false,
  modelValue: () => []
})

const emit = defineEmits(['update:modelValue'])

// convenience: which field is the key for each row
const keyField = computed(() => props.rowKey)

/**
 * itemsSelectedProxy
 * - getter: convert parent's ids (modelValue) -> item objects (present on current page)
 * - setter: convert item objects -> ids and emit update:modelValue
 */
const itemsSelectedProxy = computed({
  get(): Record<string, any>[] {
    if (!props.modelValue.length) return []
    return props.items.filter(i => props.modelValue.includes(i[keyField.value]))
  },
  set(newItems: Record<string, any>[]) {
    const ids = newItems.map(i => i[keyField.value])
    emit('update:modelValue', ids)
  }
})
</script>

<template>
  <div class="table-wrapper">
    <EasyDataTable :headers="props.headers" :items="props.items" :rows-per-page="10" :alternating="true" show-index
      :checkbox="props.checkBox" :fixed-checkbox="false" :checkbox-column-width="36" :row-key="keyField"
      v-model:items-selected="itemsSelectedProxy" table-class="w-full" body-text-direction="left">
      <!-- pass-through slots for custom rendering -->
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
