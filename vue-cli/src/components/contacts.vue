<template>
  <div>
    <h5 class="card-title">All Contacts</h5>

    <div v-if="showAlert" class="alert alert-danger">{{ alertMessage }}</div>
    <ul class="list-group">
      <li
        class="list-group-item list-group-item-dark"
        v-for="contact in contacts"
        :key="contact.id"
      >
        <app-contact :contact="contact" @contactDeleted="refresh" @contactUpdated="refresh"></app-contact>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from "axios";
import Contact from "./contact.vue";

export default {
  components: {
    appContact: Contact
  },
  data() {
    return {
      contacts: [],
      showAlert: false,
      alertMessage: ""
    };
  },
  methods: {
    loadContacts() {
      axios
        .get("http://phonebook.me/api/contacts")
        .then(response => (this.contacts = response.data.contacts))
        .then(error => console.log(error));
    },
    refresh(message) {
      this.alertMessage = message;
      this.showAlert = true;
      this.loadContacts();
    }
  },
  beforeMount() {
    this.loadContacts();
  }
};
</script>

<style>
</style>