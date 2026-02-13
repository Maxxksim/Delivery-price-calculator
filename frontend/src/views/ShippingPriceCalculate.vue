<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const carriers = ref([])
const carrier = ref('')
const weight = ref(null)
const result = ref(null)
const error = ref('')

onMounted(async () => {
  try {
    const { data } = await axios.get('/api/shipping/carriers')
    carriers.value = data.carriers
  } catch (e) {
    error.value = 'Failed to load carriers'
    console.error(e)
  }
})

async function calculatePrice() {
  result.value = null
  error.value = ''

  if (!carrier.value) {
    error.value = 'Please select a carrier'
    return
  }

  if (!weight.value || weight.value <= 0) {
    error.value = 'Please enter a valid weight'
    return
  }

  try {
    const { data } = await axios.post('/api/shipping/calculate', {
      carrier: carrier.value,
      weightKg: weight.value,
    })

    result.value = data
  } catch (e) {
    if (e.response && e.response.data) {
      const resp = e.response.data
      if (resp.errors) {
        const firstField = Object.keys(resp.errors)[0]
        error.value = resp.errors[firstField][0]
      } else {
        error.value = resp.error || 'Unknown error'
      }
    } else {
      error.value = 'Failed to calculate price'
    }
    console.error(e)
  }
}
</script>

<template>
  <div class="container">
    <h1>Delivery price calculator</h1>

    <label>
      Parcel weight (kg):
      <input type="number" v-model.number="weight" step="0.01" min="0" />
    </label>

    <label>
      Select carrier:
      <select v-model="carrier">
        <option value="">Select a carrier</option>
        <option v-for="c in carriers" :key="c" :value="c">{{ c }}</option>
      </select>
    </label>

    <button @click="calculatePrice">Calculate price</button>

    <div v-if="result" class="result">Price: {{ result.price }} {{ result.currency }}</div>
    <div v-if="error" class="error">{{ error }}</div>
  </div>
</template>

<style scoped>
.container {
  max-width: 400px;
  margin: 30px auto;
  font-family: Arial, sans-serif;
}
label {
  display: block;
  margin-top: 10px;
}
input,
select {
  width: 100%;
  padding: 5px;
  margin-top: 5px;
}
button {
  margin-top: 15px;
  padding: 7px 15px;
}
.result {
  margin-top: 20px;
  font-weight: bold;
  color: green;
}
.error {
  margin-top: 20px;
  color: red;
  font-weight: bold;
}
</style>
