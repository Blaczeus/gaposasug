<template>
  <div class="rts-newsletter v_1 rts-cta-background rts__white">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="rts-newsletter-box" :style="{ backgroundImage: `url(${background})` }">
            <div class="rts-newsletter-box-content">
              <h4 class="newsletter-title">{{ title }}</h4>
              <div class="newsletter-form w-530">
                <form @submit.prevent="handleSubmit">
                  <input type="email" v-model="email" placeholder="Enter your email" required />
                  <button type="submit" class="rts-nbg-btn btn-arrow">
                    {{ buttonText }}
                    <span><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                  </button>
                </form>
              </div>
              <p v-if="submitted" class="text-success mt-2">Thanks for subscribing!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

defineProps({
  title: {
    type: String,
    default: 'Don’t Miss Awesome Stories From Our Alumni',
  },
  background: {
    type: String,
    default: '/assets/images/newsletter/bg-1.jpg',
  },
  buttonText: {
    type: String,
    default: 'Subscribe',
  }
})

const email = ref('')
const submitted = ref(false)

function handleSubmit() {
  // Will be replaced with actual backend integration later
  if (email.value) {
    submitted.value = true
    setTimeout(() => {
      submitted.value = false
      email.value = ''
    }, 3000)
  }
}
</script>
