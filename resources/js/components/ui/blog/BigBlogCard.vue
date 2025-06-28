<template>
  <div class="single-blog">
    <div class="blog single-blog__content">
      <div class="blog__thumb">
        <a :href="blog.link">
          <img :src="blog.image" alt="blog thumbnail" />
        </a>
      </div>
      <div class="blog__meta">
        <div class="blog__meta--da">
          <div class="blog-date">
            <span><i class="fal fa-calendar"></i></span>
            <span>{{ blog.date }}</span>
          </div>
          <div class="blog-author">
            <span><i class="far fa-user"></i></span>
            <span><a href="#">{{ blog.author }}</a></span>
          </div>
          <div class="blog-cat">
            <span><i class="fa-light fa-tags"></i></span>
            <span><a href="#">{{ blog.category }}</a></span>
          </div>
        </div>
        <h5 class="blog__title">
          <a :href="blog.link">{{ blog.title }}</a>
        </h5>
        <p class="excerpt">{{ blog.excerpt }}</p>
        <a :href="blog.link" class="rts-theme-btn primary">Read More</a>
      </div>
    </div>
  </div>
</template>

<script setup>
const props = defineProps({
  blog: {
    type: Object,
    required: true,
    validator: (b) =>
      'title' in b &&
      'image' in b &&
      'date' in b &&
      'author' in b &&
      'category' in b &&
      'excerpt' in b &&
      'link' in b,
  },
})
</script>
