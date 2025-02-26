<template>
    <div>
      <h2>Edit Item</h2>
      <input v-model="updatedItem.name" placeholder="Item Name" />
      <select v-model="updatedItem.category">
        <option value="Tops">Tops</option>
        <option value="Bottoms">Bottoms</option>
        <option value="Shoes">Shoes</option>
      </select>
      <button @click="updateItem">Save</button>
    </div>
  </template>
  
  <script>
  import API from "@/api";
  
  export default {
    props: ["item"],
    data() {
      return { updatedItem: { ...this.item } };
    },
    methods: {
      async updateItem() {
        try {
        await API.put(`/clothing-items/${this.updatedItem.id}`, this.updatedItem);
        this.$emit("itemUpdated"); // Notify parent component of the update
      } catch (error) {
        console.error("Error updating item:", error);
      }
    }
  },
  watch: {
    // Watch for changes in the prop and update local data
    item: {
      handler(newItem) {
        this.updatedItem = { ...newItem };
      },
      deep: true,
      immediate: true
    }
}
  };
  </script>
  