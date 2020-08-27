<template>
  <div class="row">
    <div class="card text-white bg-secondary col-6 offset-3">
      <div class="card-body">
        <h3>Signin</h3>
        <hr />
        <form>
          <div v-if="errors">
            <div class="alert alert-danger" v-for="error in errors">{{ error.toString() }}</div>
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
          <button class="btn btn-outline-light btn-block" @click.prevent="onSignin">Signin</button>
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
      email: "",
      password: "",
      errors: ""
    };
  },
  methods: {
    onSignin() {
      axios
        .post("http://phonebook.me/api/user/signin", {
          email: this.email,
          password: this.password
        })
        .then(response => {
          console.log(response);
          const token = response.data.token;
          const user = response.data.user;
          localStorage.setItem("token", token);
          localStorage.setItem("user", user);
        })
        .catch(error => {
          console.log(error);
          this.errors = error.response.data.errors;
        });
    }
  }
};
</script>

<style>
</style>