<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const goTopButton = ref(null);

const handleScroll = () => {
  if (window.scrollY > 750) {
    goTopButton.value.classList.remove('hidden');
    goTopButton.value.classList.add('scale-100');
  } else {
    goTopButton.value.classList.remove('scale-100');
    goTopButton.value.classList.add('scale-0');
  }
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});
</script>

<template>
  <div class="min-h-screen flex flex-col justify-between items-center w-full">
    <section id="frontend-layout">
      <main id="main" class="flex-grow flex flex-col items-center w-full">
        <slot />
      </main>
    </section>
  </div>
</template>

<style scoped>
* {
  box-sizing: border-box;
}
.group:hover .dropdown-content {
  display: block;
}

.dropdown-content {
  display: none;
}

.nav-button {
  display: flex;
  height: 100px;
}
.vice-nav-icon {
  width: 22px;
  height: 22px;
  margin-right: 6px;
}
.vice-nav-search {
  display: flex;
  align-items: center;
  width: 200px;
  height: 38px;
  border-radius: 40px;
  background-color: #dedede;
  font-size: 18px;
}
.vice-nav-search-icon {
  width: 20px;
  height: 20px;
  background-color: #343557;
}
.vice-nav-search-button {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 33px;
  height: 33px;
  background-color: #343557;
  border-radius: 40px;
}
.dropdown-container {
  position: relative;
}

.vice-nav-button:hover img {
  margin-bottom: -2px;
}
.vice-nav-button:hover div {
  margin-bottom: -2px;
}
.footer-end img {
  display: none;
}
.logo-small {
  display: none;
}
.footer-item a:hover {
  color: #f59801;
  font-weight: 500;
}
.footer-end a:hover {
  color: #f59801;
  font-weight: 500;
}
@media (max-width: 1024px) {
  .footer-item {
    display: none;
  }
  .footer-end img {
    display: block;
  }
}
@media (max-width: 768px) {
  .logo-big {
    display: none;
  }
  .logo-small {
    display: block;
  }
}
</style>
