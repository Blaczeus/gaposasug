]<template>
  <header class="header header__sticky v__1">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="header__wrapper">
            <!-- Logo -->
            <div class="header__logo">
              <a href="/" class="header__logo--link">
                <img src="/assets/images/logo/logo__white.svg" alt="Gaposa SUG Logo" />
              </a>
            </div>

            <!-- NavBar -->
            <NavBar />

            <!-- Right Icons -->
            <div class="header__right">
              <div class="header__right--item">
                <div id="search-btn" class="search__trigger">
                  <i class="fa-sharp fa-light fa-magnifying-glass"></i>
                </div>
                <div id="menu-btn" class="menu__trigger">
                  <img src="/assets/images/icon/bar__line.svg" alt="menu icon" />
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import NavBar from './NavBar.vue'
</script>
