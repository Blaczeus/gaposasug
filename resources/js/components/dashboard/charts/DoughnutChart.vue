<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { Chart, registerables, type ChartData, type ChartOptions } from 'chart.js'

Chart.register(...registerables)

const props = defineProps<{
  chartId?: string
  chartData: ChartData<'doughnut'>
  chartOptions?: ChartOptions<'doughnut'>
}>()

const canvasRef = ref<HTMLCanvasElement | null>(null)

onMounted(() => {
  if (canvasRef.value) {
    new Chart(canvasRef.value, {
      type: 'doughnut',
      data: props.chartData,
      options: props.chartOptions || {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom',
            labels: {
              color: '#333',
              font: { weight: 'bold' }
            }
          }
        },
      },
    })
  }
})
</script>

<template>
  <canvas :id="chartId" ref="canvasRef" class="w-full h-full" />
</template>
