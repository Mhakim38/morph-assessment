<template>
  <div class="p-4 bg-white rounded shadow text-dark" style="max-width:600px;">
    <h2 class="mb-4">Submit Data</h2>

    <!-- Form -->
    <form @submit.prevent="submitForm" class="mb-4">
      <div class="mb-3">
        <label class="form-label">Item Name</label>
        <input v-model="form.name" type="text" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Amount</label>
        <input v-model.number="form.amount" type="number" step="0.01" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Date</label>
        <input v-model="form.date" type="date" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Data Listing -->
    <h3>Submitted Items</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Amount</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(item, index) in items" :key="index">
          <td>{{ item.name }}</td>
          <td>{{ formatCurrency(item.amount) }}</td>
          <td>{{ formatDate(item.date) }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'

// Form state
const form = reactive({
  name: '',
  amount: null,
  date: ''
})

// List of submitted items
const items = ref([])

// Submit handler
function submitForm() {
  items.value.push({
    name: form.name,
    amount: form.amount,
    date: form.date
  })

  // Reset form
  form.name = ''
  form.amount = null
  form.date = ''
}

</script>

<style scoped>
table {
  width: 100%;
  border-collapse: collapse;
}
</style>
