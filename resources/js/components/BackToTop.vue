<script setup>
import { onMounted, onUnmounted } from 'vue'

let scrollHandler
let clickHandler

onMounted(() => {
  const progressWrap = document.querySelector('.progress-wrap')
  const progressPath = document.querySelector('.progress-wrap path')

  if (!progressWrap || !progressPath) return

  const pathLength = progressPath.getTotalLength()

  progressPath.style.transition = 'none'
  progressPath.style.strokeDasharray = `${pathLength} ${pathLength}`
  progressPath.style.strokeDashoffset = pathLength
  progressPath.getBoundingClientRect() // forces layout
  progressPath.style.transition = 'stroke-dashoffset 10ms linear'

  const updateProgress = () => {
    const scroll = window.scrollY
    const height = document.documentElement.scrollHeight - window.innerHeight
    const progress = pathLength - (scroll * pathLength) / height
    progressPath.style.strokeDashoffset = progress
  }

  scrollHandler = () => {
    updateProgress()

    if (window.scrollY > 50) {
      progressWrap.classList.add('active-progress')
    } else {
      progressWrap.classList.remove('active-progress')
    }
  }

  clickHandler = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' })
  }

  updateProgress()
  window.addEventListener('scroll', scrollHandler)
  progressWrap.addEventListener('click', clickHandler)
})

onUnmounted(() => {
  window.removeEventListener('scroll', scrollHandler)
  const progressWrap = document.querySelector('.progress-wrap')
  if (progressWrap && clickHandler) {
    progressWrap.removeEventListener('click', clickHandler)
  }
})
</script>

<template>
  <div style="display: none"><!-- Logic-only component --></div>
</template>
