<template>
  <div class="single-blog-post">
    <div class="blog-thumb">
      <a :href="post.link">
        <img :src="post.image" :alt="post.title" />
      </a>
    </div>
    <div class="blog-content">
      <div class="post-meta">
        <div class="rt-author">
          <span><i class="fa-light fa-user"></i></span>
          <a href="#">{{ post.author }}</a>
        </div>
        <div class="rt-date">
          <span><i class="fal fa-calendar"></i></span>
          <span>{{ post.date }}</span>
        </div>
      </div>
      <a :href="post.link" class="post-title">{{ post.title }}</a>
    </div>
  </div>
</template>

<script setup>
defineProps({
  post: {
    type: Object,
    required: true
  }
})
</script>
