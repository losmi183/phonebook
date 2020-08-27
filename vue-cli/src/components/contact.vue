<template>
  <div class="row">
    <div class="col-2">{{ contact.name }}</div>
    <div class="col-2">{{ contact.phone }}</div>
    <div class="col-2">
      <button
        title="View Details"
        class="btn btn-sm btn-outline-danger"
        @click="showDetail = !showDetail"
      >
        <span class="material-icons">remove_red_eye</span>
      </button>
      <button
        title="Edit Contact"
        class="btn btn-sm btn-outline-danger"
        @click="showEdit = !showEdit"
      >
        <span class="material-icons">edit</span>
      </button>
      <button title="Delete Contact" class="btn btn-sm btn-outline-danger mt-1" @click="onDelete">
        <span class="material-icons">delete</span>
      </button>
    </div>

    <div v-if="showDetail" class="col-6">
      <app-details :contact="contact"></app-details>
    </div>

    <div v-if="showEdit" class="col-6">
      <app-edit :contact="contact"></app-edit>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Details from "./details.vue";
import Edit from "./editContact.vue";

export default {
  components: {
    appDetails: Details,
    appEdit: Edit
  },
  props: ["contact"],
  data() {
    return {
      showEdit: false,
      showDetail: false
    };
  },
  methods: {
    onDelete() {
      if (confirm("You will permanently delete Contact! Are You Sure? ")) {
        const token = localStorage.getItem("token");
        axios
          .delete(
            "http://phonebook.me/api/contact/" +
              this.contact.id +
              "?token=" +
              token
          )
          .then(response => {
            console.log(response);
            this.$emit("contactDeleted", "Contact Deleted");
          })
          .catch(error => console.log(error));
      }
    }
  },
  watch: {
    showEdit: function(val) {
      if (val) {
        this.showDetail = false;
      }
    },
    showDetail: function(val) {
      if (val) {
        this.showEdit = false;
      }
    }
  }
};
</script>

<style>
</style>