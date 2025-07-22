<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { Chart, registerables, type ChartData, type ChartOptions } from 'chart.js'

Chart.register(...registerables)

const props = defineProps<{
  chartId?: string
  chartData: ChartData<'line'>
  chartOptions?: ChartOptions<'line'>
}>()

const canvasRef = ref<HTMLCanvasElement | null>(null)

onMounted(() => {
  if (canvasRef.value) {
    new Chart(canvasRef.value, {
      type: 'line',
      data: props.chartData,
      options: props.chartOptions || {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { labels: { color: '#333' } } },
        scales: {
          x: { ticks: { color: '#333' } },
          y: { ticks: { color: '#333' } },
        },
      },
    })
  }
})
</script>

<template>
  <canvas :id="chartId" ref="canvasRef" class="w-full h-full" />
</template>
