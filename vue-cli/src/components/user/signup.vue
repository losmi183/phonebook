<template>
  <div class="row">
    <div class="card text-white bg-secondary col-6 offset-3">
      <div class="card-body">
        <h3>Signup</h3>
        <hr />
        <form>
          <div v-if="errors">
            <div class="alert alert-danger" v-for="error in errors">{{ error.toString() }}</div>
          </div>

          <div class="form-group row">
            <label for class="col-4 text-right">Name</label>
            <div class="col-8">
              <input type="text" class="form-control" v-model="name" />
            </div>
          </div>

          <div class="form-group row">
            <label for class="col-4 text-right">Email</label>
            <div class="col-8">
              <input type="email" class="form-control" v-model="email" />
            </div>
          </div>

          <div class="form-group row">
            <label for class="col-4 text-right">Password</label>
            <div class="col-8">
              <input type="password" class="form-control" v-model="password" />
            </div>
          </div>

          <hr />
          <button class="btn btn-outline-light btn-block" @click.prevent="onSignup">Signup</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      name: "",
      email: "",
      password: "",
      errors: ""
    };
  },
  methods: {
    onSignup() {
      axios
        .post("http://phonebook.me/api/user", {
          name: this.name,
          email: this.email,
          password: this.password
        })
        .then(response => {
          if (response.status == 201) {
            this.$router.push("/signin");
          }
        })
        .catch(error => {
          // console.log(error);
          this.errors = error.response.data.errors;
        });
    }
  }
};
</script>

<style>
</style>