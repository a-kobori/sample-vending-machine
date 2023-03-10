<script lang="ts">
import axios from 'axios'
import { reactive, onMounted } from "vue";

export default {
  setup() {
    const drinks = reactive({
      data: [],
    })
    const getDrinks = async () => {
      const result = await axios.get('http://localhost:3202/api/drinks/')
      drinks.data = Object.assign([], result.data)
      console.log(drinks.data)
    }
    onMounted(() => {
      getDrinks()
    })
    return {
      drinks,
      getDrinks,
    }
  }
}
</script>

<template>
  <h1>Drinks</h1>
  <p>これはDrinks.vueで描画されています</p>
  <p>
    <ul>
      <li v-for="drink in drinks">
        {{ drink.name }}
      </li>
    </ul>
  </p>
</template>