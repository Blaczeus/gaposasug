<template>
  <div class="col-lg-4 col-md-6">
    <div class="single-gallery relative group overflow-hidden rounded-lg">
      <!-- Graduate Image -->
      <img :src="graduate.image" :alt="graduate.name"
        class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105" />

      <!-- Overlay with Details -->
      <div
        class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 z-10 transition-opacity duration-300 flex flex-col items-center justify-center text-center px-4">
        <h5 class="text-white text-6xl md:text-3xl font-extrabold leading-snug break-words drop-shadow-md">
          {{ graduate.name }}
        </h5>
        <p class="text-white text-4xl md:text-xl font-medium mt-2 drop-shadow-sm">
          Class of {{ graduate.year }}
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  graduate: {
    type: Object,
    required: true,
  },
});
</script>
