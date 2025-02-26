<template>
    <div>
      <h2>Add Clothing Item</h2>
      <input v-model="name" placeholder="Item Name" />
      <select v-model="category">
        <option value="Tops">Tops</option>
        <option value="Bottoms">Bottoms</option>
        <option value="Shoes">Shoes</option>
      </select>
      <button @click="addItem">Add Item</button>
    </div>
</template>
  
<script>
  import API from "@/api";
  
  export default {
    data() {
      return { name: "", category: "Tops" };
    },
    methods: {
      async addItem() {
        await API.post("/clothing-items", {
          name: this.name,
          category: this.category,
        });
        this.name = "";
        this.$emit("itemAdded"); // Notify parent to refresh list
      },
    },
  };
</script>
  