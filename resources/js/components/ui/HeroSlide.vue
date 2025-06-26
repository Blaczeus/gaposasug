<template>
  <div class="swiper-slide">
    <div class="rts-slider-height rts-slider-overlay rt-relative">
      <div class="rts-slider-bg" :data-background="background" :style="{ backgroundImage: `url(${background})` }"></div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-xl-6 col-md-8 col-sm-9">
            <div class="rts-slider">
              <div class="rts-slider-content">
                <h6 class="rts-subtitle">{{ subtitle }}</h6>
                <h1 class="rts-slider-title" v-html="title"></h1>
                <p class="rts-slider-desc">{{ description }}</p>
                <div class="rts-slider-btn">
                  <a :href="ctaLink" class="rts-theme-btn btn-arrow">
                    {{ ctaText }} <span><i class="fa-thin fa-arrow-right"></i></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
defineProps({
  background: String,
  subtitle: String,
  title: String,
  description: String,
  ctaLink: String,
  ctaText: String
})
</script>
