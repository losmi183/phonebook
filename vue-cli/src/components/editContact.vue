<template>
  <div class="card text-white bg-dark">
    <div class="card-body">
      <form action>
        <div class="offset-4 d-flex justify-content-left mb-3">
          <button class="btn btn-outline-danger mx-2" @click.prevent="onSave">Save</button>
          <button class="btn btn-outline-danger" @click.prevent="showEdit = false">Cancel</button>
        </div>

        <div class="form-group row">
          <label for class="col-sm-4 text-right">name</label>
          <div class="col-sm-6">
            <input type="text" name="name" v-model="contact.name" />
          </div>
        </div>

        <div class="form-group row">
          <label for class="col-sm-4 text-right">phone</label>
          <div class="col-sm-6">
            <input type="text" name="phone" v-model="contact.phone" />
          </div>
        </div>

        <div class="form-group row">
          <label for class="col-sm-4 text-right">phone 2</label>
          <div class="col-sm-6">
            <input type="text" name="phone2" v-model="contact.phone2" />
          </div>
        </div>

        <div class="form-group row">
          <label for class="col-sm-4 text-right">address</label>
          <div class="col-sm-6">
            <input type="text" name="address" v-model="contact.address" />
          </div>
        </div>

        <div class="form-group row">
          <label for class="col-sm-4 text-right">email</label>
          <div class="col-sm-6">
            <input type="text" name="email" v-model="contact.email" />
          </div>
        </div>

        <div class="form-group row">
          <label for class="col-sm-4 text-right">status</label>
          <div class="col-sm-6">
            <select v-model="contact.status">
              <option value="Friend">Friend</option>
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
  </div>
</template>

<script>
import axios from "axios";

export default {
  props: ["contact"],
  methods: {
    onSave() {
      const token = localStorage.getItem("token");
      axios
        .put(
          "http://phonebook.me/api/contact/" +
            this.contact.id +
            "?token=" +
            token,
          {
            name: this.contact.name,
            phone: this.contact.phone,
            phone2: this.contact.phone2,
            address: this.contact.address,
            email: this.contact.email,
            status: this.contact.status
          }
        )
        .then(response => {
          this.showEdit = false;
        })
        .catch(error => console.log(error));
    }
  }
};
</script>

<style>
</style>