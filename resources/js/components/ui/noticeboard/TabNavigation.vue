<template>
  <ul class="nav nav-pills pb--30" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link" :class="{ active: activeTab === 'latest' }" id="pills-home-tab" type="button" role="tab"
        aria-controls="pills-home" :aria-selected="activeTab === 'latest'" @click="setTab('latest')">
        Latest
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" :class="{ active: activeTab === 'exam' }" id="pills-profile-tab" type="button" role="tab"
        aria-controls="pills-profile" :aria-selected="activeTab === 'exam'" @click="setTab('exam')">
        Exam
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" :class="{ active: activeTab === 'admission' }" id="pills-contact-tab" type="button"
        role="tab" aria-controls="pills-contact" :aria-selected="activeTab === 'admission'"
        @click="setTab('admission')">
        Admission
      </button>
    </li>
  </ul>
</template>

<script setup>
const props = defineProps({
  activeTab: {
    type: String,
    required: true
  }
})
const emit = defineEmits(['update:activeTab'])

const setTab = (tab) => {
  emit('update:activeTab', tab)
}
</script>
