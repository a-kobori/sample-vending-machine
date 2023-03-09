<script lang="ts">
import axios from 'axios'

export default {
  data() {
    return {
      name: 'Unknown'
    }
  },
  methods: {
    async getSample(id: number) {
      const result = await axios.get('http://localhost:3202/api/sample/' + id)
      this.name = result.data[0].name
    }
  }
}
</script>

<template>
  <h1>Hello, {{ name }}</h1>
  <p>これはSample.vueで描画されています</p>
  <p>
    このボタンを押すと、sampleテーブルの指定されたidのレコードのnameを取得します<br />
    <ul>
      <li><button v-on:click="getSample(1)">id:1</button></li>
      <li><button v-on:click="getSample(2)">id:2</button></li>
    </ul>
  </p>
</template>