<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
      <a class="navbar-brand" href="/">
        <span class="material-icons">contact_phone</span>
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <router-link to="/" tag="li" class="nav-item">
            <a class="nav-link">Contacts</a>
          </router-link>

          <router-link to="/addContact" tag="li" class="nav-item">
            <a class="nav-link">Add Contact</a>
          </router-link>
        </ul>
        <ul class="navbar-nav ml-auto">
          <router-link to="/signup" tag="li" class="nav-item">
            <a class="nav-link">Signup</a>
          </router-link>

          <router-link to="/signin" tag="li" class="nav-item">
            <a class="nav-link">Signin</a>
          </router-link>
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
span.material-icons {
  font-size: 70px;
  color: #dc3545;
}
li.nav-item > a.nav-link {
  color: white;
}
li.nav-item > a.nav-link:hover {
  color: #af4b55;
}
</style>