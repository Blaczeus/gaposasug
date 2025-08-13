<script setup lang="ts">
import DashboardLayout from '@/layouts/dashboard/DashboardLayout.vue'
import Breadcrumbs from '@/components/dashboard/Breadcrumbs.vue'
import DashboardSummaryBox from '@/components/dashboard/DashboardSummaryBox.vue'
import { User, CalendarClock, AlertCircle, Banknote } from 'lucide-vue-next'
import LineChart from '@/components/dashboard/charts/LineChart.vue'
import BarChart from '@/components/dashboard/charts/BarChart.vue'
import DoughnutChart from '@/components/dashboard/charts/DoughnutChart.vue'
import EventCalendar from '@/components/dashboard/EventCalendar.vue'


const complaintsChartData = {
  labels: ['Jan', 'Feb', 'Mar', 'Apr'],
  datasets: [
    {
      label: 'Complaints',
      data: [10, 25, 15, 30],
      borderColor: 'rgba(255, 159, 64, 1)',
      backgroundColor: 'rgba(255, 159, 64, 0.2)',
      fill: true,
      tension: 0.4,
    },
  ],
}

const complaintData = {
  labels: ['Pending', 'In Progress', 'Resolved'],
  datasets: [
    {
      label: 'Complaint Status',
      data: [12, 7, 9],
      backgroundColor: ['#facc15', '#60a5fa', '#4ade80'], // yellow, blue, green
      borderColor: ['#fcd34d', '#93c5fd', '#86efac'],
      borderWidth: 1
    }
  ]
}

const totalComplaints = complaintsChartData.datasets[0].data.reduce((a, b) => a + b, 0)
const averageComplaints = Math.round(totalComplaints / complaintsChartData.datasets[0].data.length)


const duesExpensesChartData = {
  labels: ['Jan', 'Feb', 'Mar', 'Apr'],
  datasets: [
    {
      label: 'Dues Collected',
      data: [5000, 10000, 15000, 20000],
      backgroundColor: 'rgba(75, 192, 192, 0.6)',
    },
    {
      label: 'Expenses',
      data: [2000, 4000, 8000, 10000],
      backgroundColor: 'rgba(255, 99, 132, 0.6)',
    },
  ],
}

const totalDues = duesExpensesChartData.datasets[0].data.reduce((a, b) => a + b, 0)
const totalExpenses = duesExpensesChartData.datasets[1].data.reduce((a, b) => a + b, 0)
const balance = totalDues - totalExpenses


const summaryData = [
  {
    title: 'Students',
    count: 1200,
    icon: User,
    iconBg: 'bg-light-green',
    iconColor: 'text-green',
    link: '/admin/students'
  },
  {
    title: 'Active Complaints',
    count: 45,
    icon: AlertCircle,
    iconBg: 'bg-light-yellow',
    iconColor: 'text-orange',
    link: '/admin/complaints'
  },
  {
    title: 'Union Dues Collected',
    count: 75000,
    prefix: '₦',
    icon: Banknote,
    iconBg: 'bg-light-red',
    iconColor: 'text-red',
    link: '/admin/finance'
  },
  {
    title: 'Upcoming Events',
    count: 3,
    icon: CalendarClock,
    iconBg: 'bg-light-blue',
    iconColor: 'text-blue',
    link: '/admin/events'
  },
]

const breadcrumbLinks = [
  { label: 'Home', href: '/admin/dashboard' },
  { label: 'Admin' }
]
</script>

<template>
  <DashboardLayout>
    <Breadcrumbs title="Admin Dashboard" :links="breadcrumbLinks" />

    <!-- Row 1 -->
    <div class="row gutters-20">
      <DashboardSummaryBox v-for="(item, index) in summaryData" :key="index" v-bind="item" />
    </div>

    <!-- Row 2: Charts -->
    <div class="row gutters-20">
      <div class="col-12 col-xl-6">
        <div class="card dashboard-card pd-b-20">
          <div class="card-body">
            <h3 class="mb-3 font-black">Complaints Trend</h3>

            <div class="text-2xl text-muted mb-3">
              Total Complaints: {{ totalComplaints }} | Avg per Month: {{ averageComplaints }}
            </div>

            <div class="h-[300px] max-h-[320px]">
              <LineChart :chartData="complaintsChartData" />
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-xl-6">
        <div class="card dashboard-card pd-b-20">
          <div class="card-body">
            <h3 class="mb-3 font-black">Dues vs Expenses</h3>
            <div class="text-2xl text-muted mb-3">
              Total Dues: ₦{{ totalDues.toLocaleString() }} |
              Total Expenses: ₦{{ totalExpenses.toLocaleString() }} |
              Balance: <span :class="balance >= 0 ? 'text-green-600' : 'text-red-600'">₦{{ balance.toLocaleString()
                }}</span>
            </div>
            <div class="h-[300px] max-h-[320px]">
              <BarChart :chartData="duesExpensesChartData" />
            </div>
          </div>
        </div>
      </div>

      <!-- Doughnut Chart for Complaint Status -->
      <div class="col-12 col-xl-4">
        <div class="card dashboard-card pd-b-20">
          <div class="card-body">
            <h3 class="mb-3 font-semibold">Complaint Status Breakdown</h3>
            <div class="text-2xl text-center my-4 text-gray-500">
              Total Complaints: 28 | Pending: 12 | In Progress: 7 | Resolved: 9
            </div>
            <div class="h-[260px] max-h-[280px] w-full">
              <DoughnutChart :chartData="complaintData" />
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-xl-8">
        <div class="card dashboard-card-four pd-b-20">
          <div class="card-body">
            <div class="heading-layout1">
              <div class="item-title">
                <h3>Event Calendar</h3>
              </div>
            </div>
            <div class="calender-wrap">
              <!-- Just drop in our cleaned component: -->
              <EventCalendar :events="[
                { title: 'Orientation', date: '2025-07-24' },
                { title: 'Meeting', date: '2025-07-27' },
                { title: 'Forum', date: '2025-08-01' }
              ]" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </DashboardLayout>
</template>
