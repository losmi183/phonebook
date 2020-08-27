<template>
  <div id="app" class="container">
    <div class="row">
      <div class="col-12 mt-4">
        <div class="card text-white bg-secondary">
          <div class="card-header">
            <h1 class="text-center main-title">PHONE BOOK</h1>
            <app-navbar></app-navbar>
          </div>
          <div class="card-body">
            <router-view></router-view>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "./components/navbar.vue";

export default {
  components: {
    appNavbar: Navbar
  },
  data() {
    return {};
  }
};
</script>

<style>
.main-title {
  color: #dc3545;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
    Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}
</style>
