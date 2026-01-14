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
import $ from 'jquery'

// Form state
const form = reactive({
  name: '',
  amount: null,
  date: ''
})

// List of submitted items
const items = ref([])

const storeUrl = document.getElementById('app')?.dataset.storeUrl
const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')

// Submit handler
function submitForm() {

    $.ajax({
      url: storeUrl,
      method: 'POST', 
      headers: {
        'X-CSRF-TOKEN': csrf
      },
      data: form,
      
      success: function(response) {
        items.value.push(response)
      },
      error: function(error) {
        alert('Error submitting form. Please try again.')
      },
      complete: function() {
        // Reset form fields after request completes (success or error)
        form.name = ''
        form.amount = null
        form.date = ''
      }
    })
}

// Format currency (MYR example)
function formatCurrency(value) {
  return new Intl.NumberFormat('en-MY', { 
    style: 'currency', 
    currency: 'MYR' 
  }).format(value);
}

// Format date (human-readable)
function formatDate(value) {
  return new Intl.DateTimeFormat('en-MY', { 
    year: 'numeric', 
    month: 'short', 
    day: 'numeric' 
  }).format(new Date(value));
}

</script>

<style scoped>
table {
  width: 100%;
  border-collapse: collapse;
}
</style>
