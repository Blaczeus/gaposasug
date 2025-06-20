<template>
  <div class="search-input-area" v-if="show">
    <div class="container">
      <div class="search-input-inner">
        <div class="input-div">
          <input
            v-model="query"
            class="search-input autocomplete"
            type="text"
            placeholder="Search by keyword or #"
            autocomplete="off"
            @keydown.enter="handleSearch"
          />
          <button @click="handleSearch">
            <i class="far fa-search"></i>
          </button>
        </div>
      </div>
    </div>
    <div id="close" class="search-close-icon" @click="show = false">
      <i class="far fa-times"></i>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const show = ref(true)
const query = ref('')

function handleSearch() {
  if (query.value.trim()) {
    // Implement search logic or emit event later
    console.log('Searching for:', query.value)
  }
}
</script>

<style scoped>
</style>
