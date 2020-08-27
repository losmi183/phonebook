<template>
  <div>
    <div class="d-flex justify-content-between">
      <h3>New Contact</h3>
      <button class="btn btn-outline-light" @click="onAdd">Add Contact</button>
    </div>
    <hr />
    <form>
      <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" v-model="name" required />
      </div>

      <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" v-model="phone" required />
      </div>

      <p
        v-if="!phone2Show"
        class="showHide text-light"
        @click.prevent="phone2Show = !phone2Show"
      >Phone 2</p>
      <div v-if="phone2Show" class="form-group">
        <label>Phone 2</label>
        <input type="text" class="form-control" v-model="phone2" />
      </div>

      <p v-if="!otherShow" class="showHide text-light" @click.prevent="otherShow = !otherShow">Other</p>
      <div v-if="otherShow">
        <div class="form-group">
          <label>Address</label>
          <input type="text" class="form-control" v-model="address" />
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" v-model="email" />
        </div>

        <div class="form group">
          <label>Status</label>
          <select v-model="status" class="form-control">
            <option selected value="Friend">Friend</option>
            <option value="Family">Family</option>
            <option value="Work">Work</option>
            <option value="Neighborg">Neighborg</option>
            <option value="Lover">Lover</option>
            <option value="Other">Other</option>
          </select>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      name: "",
      phone: "",
      phone2: "",
      email: "",
      address: "",
      status: "Friend",
      phone2Show: false,
      otherShow: false
    };
  },
  methods: {
    onAdd() {
      const token = localStorage.getItem("token");
      axios
        .post("http://phonebook.me/api/contact?token=" + token, {
          name: this.name,
          phone: this.phone,
          phone2: this.phone2,
          email: this.email,
          address: this.address,
          status: this.status
        })
        .then(response => this.$router.push("/"))
        .catch(error => console.log(error));
    }
  }
};
</script>

<style scoped>
.showHide {
  cursor: pointer;
}
</style>