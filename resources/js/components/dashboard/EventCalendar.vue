<template>
  <div class="calender-wrap">
    <FullCalendar :options="calendarOptions" class="fc fc-unthemed fc-ltr w-full" />
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';

const props = defineProps<{
  events?: Array<{ title: string; date: string }>
}>();

// Merge incoming or fallback events
const calendarEvents = computed(() => props.events ?? [
  { title: 'SUG Orientation', date: '2025-07-24' },
  { title: 'General Meeting', date: '2025-07-27' },
  { title: 'Alumni Forum', date: '2025-08-01' },
]);

// Single options object
const calendarOptions = computed(() => ({
  plugins: [dayGridPlugin, interactionPlugin],
  initialView: 'dayGridMonth',
  headerToolbar: {
    left: 'prev,next today',
    center: 'title',
    right: 'dayGridDay,dayGridWeek,dayGridMonth'
  },
  navLinks: true,
  selectable: true,
  editable: false,
  dayMaxEvents: 3,
  aspectRatio: 1.8,
  events: calendarEvents.value,
  dateClick(info: any) {
    alert(`Date clicked: ${info.dateStr}`);
  },
  eventClick(info: any) {
    alert(`Event: ${info.event.title} on ${info.event.start?.toISOString().slice(0, 10)}`);
  }
}));
</script>

<style scoped>
/* Rely on your existing fullcalendar.min.css for all .fc-* styling */
</style>
