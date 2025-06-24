<script setup lang="ts">
import BackToTop from '@/components/ui/BackToTop.vue'
import Header from '@/components/layout/Header.vue'
import MobileMenu from '@/components/layout/MobileMenu.vue'
import Footer from '@/components/layout/Footer.vue'
import SearchBar from '@/components/ui/SearchBar.vue'
import Breadcrumb from '@/components/layout/Breadcrumb.vue'
import { reactive } from 'vue'

const form = reactive({
  name: '',
  matric: '',
  department: '',
  subject: '',
  message: ''
})

function submitForm() {
  console.log('Submitted:', { ...form })
  alert('Your message has been submitted.')
  form.name = ''
  form.matric = ''
  form.department = ''
  form.subject = ''
  form.message = ''
}
</script>

<template>
  <div>
    <SwiperInit />
    <Header />

    <Breadcrumb title="Student Voice" :breadcrumbs="[
      { label: 'Home', route: 'home' },
      { label: 'Student Voice' }
    ]" />

    <!-- About section style intro -->
    <section class="rts-about-university rts-section-padding">
      <div class="container">
        <div class="row">
          <div class="rts-section">
            <div class="col-lg-4 col-md-5">
              <h3 class="rts-section-title">Have Your Say</h3>
            </div>
            <div class="col-lg-8 col-md-7">
              <p class="rts-section-description">
                The Student Voice page is your space to be heard. Whether it’s a suggestion, concern, or a
                petition, this is where every GAPOSA student can directly reach the SUG. We believe that real
                change starts with listening to each other — and that’s what this is for.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Student Voice Form -->
    <section class="student-voice-area pt--10 pb--80">
      <div class="container">
        <div class="row mb-50">
          <div class="col-lg-10 offset-lg-1">
            <form @submit.prevent="submitForm" class="student-voice-form">
              <div class="row g-4">
                <div class="col-md-6">
                  <input type="text" class="!border-black !border-1 !rounded-[13px] p-3 text-lg form-control" placeholder="Full Name"
                    v-model="form.name" />
                </div>
                <div class="col-md-6">
                  <input type="text" class="!border-black !border-1 !rounded-[13px] p-3 text-lg form-control" placeholder="Matric Number" v-model="form.matric" />
                </div>
                <div class="col-md-6">
                  <input type="text" class="!border-black !border-1 !rounded-[13px] p-3 text-lg form-control" placeholder="Department" v-model="form.department" />
                </div>
                <div class="col-md-6">
                  <input type="text" class="!border-black !border-1 !rounded-[13px] p-3 text-lg form-control" placeholder="Subject" v-model="form.subject" />
                </div>
                <div class="col-12">
                  <textarea class="!border-black !border-1 !rounded-[13px] p-3 text-lg" rows="5" placeholder="Your message..."
                    v-model="form.message"></textarea>
                </div>
                <div class="col-12 text-end">
                  <button type="submit" class="rts-theme-btn primary mt-4 !rounded-full">Submit Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <!-- Quick Access to Contact Page -->
        <div class="row justify-content-center mt--50">
          <div class="col-lg-6">
            <div class="contact-extra text-center">
              <h5 class="mb--20">Want to speak directly with a Union Rep?</h5>
              <a href="/contact" class="rts-theme-btn btn-secondary w-100 rounded-full">Go to Contact Page</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer and other components -->
    <Footer />
    <MobileMenu />
    <SearchBar />
    <BackToTop />
    <div id="anywhere-home"></div>
  </div>
</template>

<style scoped>
.student-voice-form{
  padding: 30px;
}
</style>
