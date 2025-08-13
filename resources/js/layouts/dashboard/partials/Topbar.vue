<script setup lang="ts">
import { Link, useForm } from '@inertiajs/vue3'

const logoutForm = useForm({})

const logout = () => {
  logoutForm.post('/logout')
}
</script>

<template>
  <div class="navbar navbar-expand-md header-menu-one bg-light">
    <div class="nav-bar-header-one">
      <div class="header-logo">
        <Link href="/" class="d-inline-block">
        <img src="/dashboard-assets/img/logo.png" alt="logo" />
        </Link>
      </div>
      <div class="toggle-button sidebar-toggle">
        <button type="button" class="item-link">
          <span class="btn-icon-wrap">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </button>
      </div>
    </div>

    <div class="d-md-none mobile-nav-bar">
      <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse" data-target="#mobile-navbar"
        aria-expanded="false">
        <i class="far fa-arrow-alt-circle-down"></i>
      </button>
      <button type="button" class="navbar-toggler sidebar-toggle-mobile">
        <i class="fas fa-bars"></i>
      </button>
    </div>

    <div class="header-main-menu navbar-collapse show" id="mobile-navbar">
      <ul class="navbar-nav">
        <!-- Search Bar -->
        <li class="navbar-item header-search-bar">
          <div class="input-group stylish-input-group">
            <span class="input-group-addon">
              <button type="submit">
                <span class="flaticon-search" aria-hidden="true"></span>
              </button>
            </span>
            <input type="text" class="form-control" placeholder="Search dashboard..." />
          </div>
        </li>
      </ul>

      <ul class="navbar-nav">
        <!-- Admin Dropdown -->
        <li class="navbar-item dropdown header-admin">
          <a class="navbar-nav-link dropdown-toggle" href="#" data-toggle="dropdown">
            <div class="admin-title">
              <h5 class="item-title">SUG Admin</h5>
              <span>Administrator</span>
            </div>
            <div class="admin-img">
              <img src="/dashboard-assets/img/figure/admin.jpg" alt="Admin" />
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="item-header">
              <h6 class="item-title">SUG Admin</h6>
            </div>
            <div class="item-content">
              <ul class="settings-list">
                <li>
                  <Link href="/profile"><i class="flaticon-user"></i>My Profile</Link>
                </li>
                <li>
                  <Link href="/messages"><i
                    class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i>Messages</Link>
                </li>
                <li>
                  <Link href="/settings"><i class="flaticon-gear-loading"></i>Settings</Link>
                </li>
                <li>
                  <Link href="/logout" @click="logout"><i class="flaticon-turn-off"></i>Log Out</Link>
                </li>
              </ul>
            </div>
          </div>
        </li>

        <!-- Message Dropdown -->
        <li class="navbar-item dropdown header-message">
          <a class="navbar-nav-link dropdown-toggle" href="#" data-toggle="dropdown">
            <i class="far fa-envelope"></i>
            <span>5</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="item-header">
              <h6 class="item-title d-md-none text-16 mg-l-10">5 Messages</h6>
            </div>
            <div class="item-content">
              <!-- Example Message Item -->
              <div class="media">
                <div class="item-img bg-skyblue">
                  <img src="/dashboard-assets/img/figure/student11.png" alt="user" />
                </div>
                <div class="media-body space-sm">
                  <div class="item-title">
                    <a href="#"><span class="item-name">Maria Zaman</span><span class="item-time">18:30</span></a>
                  </div>
                  <p>Can we discuss the event update for this weekend?</p>
                </div>
              </div>
            </div>
          </div>
        </li>

        <!-- Notification Dropdown -->
        <li class="navbar-item dropdown header-notification">
          <a class="navbar-nav-link dropdown-toggle" href="#" data-toggle="dropdown">
            <i class="far fa-bell"></i>
            <span>8</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="item-header">
              <h6 class="item-title">Notifications</h6>
            </div>
            <div class="item-content">
              <div class="media">
                <div class="item-icon bg-skyblue"><i class="fas fa-check"></i></div>
                <div class="media-body space-sm">
                  <div class="post-title">Complaint resolved</div>
                  <span>1 min ago</span>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>
