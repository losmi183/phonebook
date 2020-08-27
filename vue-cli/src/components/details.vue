<template>
  <div class="card text-white bg-dark">
    <div class="card-body row">
      <div class="col-md-4 text-right font-weight-bold">
        <p>Name:</p>
        <p>Phone</p>
        <p>Phone 2</p>
        <p>Email</p>
        <p>Address</p>
        <p>Status</p>
      </div>
      <div class="col-md-8">
        <p>{{ contact.name }}</p>
        <p>{{ contact.phone }}</p>
        <p>{{ contact.phone2 }}</p>
        <p>{{ contact.email }}</p>
        <p>{{ contact.address }}</p>
        <p>{{ contact.status }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["contact"]
};
</script>

<style>
</style>