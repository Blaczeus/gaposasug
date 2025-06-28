<template>
  <div class="col-lg-4 sticky-coloum-item">
    <div class="rt__sidebar">
      <div class="program-sidebar">
        <!-- curriculum -->
        <div class="program-curriculum">
          <h6 class="heading-title">Category</h6>
          <div class="program-menu">
            <ul class="list-unstyled">
              <li v-for="(cat, i) in categories" :key="i">
                <a href="#">
                  <span><i class="fa-light fa-arrow-right"></i></span>{{ cat }}
                </a>
              </li>
            </ul>
          </div>
        </div>

        <!-- contact info -->
        <div class="program-info">
          <h5>Department Contact Info</h5>
          <p>{{ contact.department }}</p>
          <div class="contact-info">
            <h5>Contact:</h5>
            <a :href="`mailto:${contact.email}`">{{ contact.email }}</a>
            <a :href="`callto:${contact.phone}`">{{ contact.phone }}</a>
          </div>
          <div class="social-info">
            <h5>Social Info:</h5>
            <div class="social-info-link">
              <a v-for="(icon, index) in contact.socials" :key="index" :href="icon.url">
                <i :class="icon.icon"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- join event -->
        <div class="program-event">
          <div class="program-event-content">
            <p>{{ event.blurb }}</p>
            <h4 class="event-title">{{ event.title }}</h4>
            <div class="single-event-content-meta">
              <div class="event-time">
                <span><i class="fa-sharp fa-thin fa-clock"></i></span>
                <span>{{ event.time }}</span>
              </div>
              <div class="event-place">
                <span><i class="fa-sharp fa-thin fa-location-dot"></i></span>
                <span>{{ event.location }}</span>
              </div>
              <div class="event-date">
                <span><i class="fal fa-calendar"></i></span>
                <span>{{ event.date }}</span>
              </div>
            </div>
            <a href="#" class="rts-theme-btn with-arrow btn-white lh-100">
              Join Now <span><i class="fa-thin fa-arrow-right"></i></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  categories: {
    type: Array,
    default: () => ['Course Curriculum', 'Program Faculty', 'Study Abroad', 'Scholarship', 'Education Expo'],
  },
  contact: {
    type: Object,
    default: () => ({
      department: 'B.A. in Africana Studies',
      email: 'barry.Unipix@info.com',
      phone: '664-254-251',
      socials: [
        { icon: 'fa-brands fa-facebook', url: '#' },
        { icon: 'fa-brands fa-instagram', url: '#' },
        { icon: 'fa-brands fa-linkedin', url: '#' },
        { icon: 'fa-brands fa-pinterest', url: '#' },
        { icon: 'fa-brands fa-youtube', url: '#' },
      ],
    }),
  },
  event: {
    type: Object,
    default: () => ({
      blurb: 'Joint New Event About African History',
      title: 'B.A. in Africana Studies',
      time: '10:30 am',
      location: 'Yarra Park, UK',
      date: 'November 28, 2023',
    }),
  },
})
</script>
