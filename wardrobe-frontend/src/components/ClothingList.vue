<template>
  <div class="flex h-screen bg-gray-100">
    <!-- Sidebar Navigation -->
    <aside class="w-1/5 bg-indigo-900 text-white p-6 flex flex-col gap-6 shadow-lg">
      <h2 class="text-xl font-bold">Wardrobe Manager</h2>
      <button @click="showAddModal = true" class="btn">
        <i class="fas fa-plus-circle"></i> Add Item
      </button>
      <button @click="showEditModal = true" class="btn">
        <i class="fas fa-edit"></i> Edit Item
      </button>
      <button @click="showDeleteModal = true" class="btn">
        <i class="fas fa-trash-alt"></i> Delete Item
      </button>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-8">
      <div class="flex justify-between items-center mb-6">
        <!-- Search Bar on the Far Left -->
        <input
          v-model="searchQuery"
          placeholder="Search categories e.g. Tops, Bottoms, Shoes"
          class="p-2 border border-gray-300 rounded-md w-1/3 focus:ring focus:ring-purple-300"
        />
        
        <!-- User Info on the Far Right -->
        <div class="flex items-center gap-4 text-indigo-900">
          <span class="text-lg font-semibold">{{ user.full_name }}</span>
          <button @click="logout" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
            Logout
          </button>
        </div>
      </div>
      
      <!-- Clothing Items List -->
      <div class="grid grid-cols-3 gap-6">
        <div v-for="item in filteredItems" :key="item.id" class="bg-purple-200 p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
          <img
            :src="getImagePath(item.image)"
            alt="Clothing Item"
            class="w-full h-40 object-cover rounded-md border border-purple-500"
          />
          <h3 class="text-lg font-semibold mt-2 text-indigo-900">{{ item.name }}</h3>
          <p class="text-gray-700">{{ item.category }}</p>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import API from "@/api";
export default {
  data() {
    return {
      clothingItems: [],
      searchQuery: "",
      user: {},
      showAddModal: false,
      showEditModal: false,
      showDeleteModal: false,
    };
  },
  computed: {
    filteredItems() {
      return this.clothingItems.filter(item =>
        item.category.toLowerCase().includes(this.searchQuery.toLowerCase())
      );
    },
  },
  methods: {
    getImagePath(image) {
      return image ? `/storage/${image}` : "/placeholder.jpg";
    },
    async fetchUserProfile() {
      try {
        const response = await API.get("/user/profile");
        this.user = response.data;
      } catch (error) {
        console.error("Error fetching user profile:", error);
      }
    },
    async fetchClothingItems() {
      try {
        const response = await fetch("http://127/0/0/1:8000/api/clothing-items");
        const data = await response.json();
        this.clothingItems = response.data;
      } catch (error) {
        console.error("Error fetching clothing items:", error);
      }
    },
    logout() {
      alert("Logging out...");
    },
  },
  mounted() {
    this.fetchUserProfile();
    this.fetchClothingItems();
  },
};
</script>

<style scoped>
.btn {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 12px;
  background-color: white;
  color: #4f46e5;
  border-radius: 6px;
  text-align: left;
  transition: 0.3s;
  font-weight: 500;
}
.btn:hover {
  background-color: #e0e7ff;
}
</style>
