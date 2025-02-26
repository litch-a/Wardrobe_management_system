<template>
  <div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 shadow-lg rounded-xl w-full max-w-md border">
      <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
        {{ isLogin ? "Login" : "Register" }}
      </h2>

      <!-- Show Name field only when registering -->
      <div v-if="!isLogin" class="mb-4">
        <label class="block text-gray-700 text-sm font-medium mb-2">Full Name</label>
        <input
          v-model="name"
          type="text"
          placeholder="Enter your full name"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50"
        />
      </div>

      <!-- Email Field -->
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-medium mb-2">Email</label>
        <input
          v-model="email"
          type="email"
          placeholder="Enter your email"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50"
        />
      </div>

      <!-- Password Field -->
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-medium mb-2">Password</label>
        <input
          v-model="password"
          type="password"
          placeholder="Enter your password"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50"
        />
      </div>

      <!-- Confirm Password (Only for Registration) -->
      <div v-if="!isLogin" class="mb-4">
        <label class="block text-gray-700 text-sm font-medium mb-2">Confirm Password</label>
        <input
          v-model="password_confirmation"
          type="password"
          placeholder="Confirm your password"
          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50"
        />
      </div>

      <!-- Submit Button -->
      <button
        @click="isLogin ? login() : register()"
        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition-all duration-300 shadow-md"
      >
        {{ isLogin ? "Login" : "Register" }}
      </button>

      <!-- Toggle Between Login/Register -->
      <p
        @click="toggleForm"
        class="text-sm text-center text-blue-600 mt-4 cursor-pointer hover:underline"
      >
        {{ isLogin ? "Don't have an account? Register" : "Already have an account? Login" }}
      </p>
    </div>
  </div>
</template>
<script>
import API from "@/api";

export default {
  data() {
    return {
      name: "",
      email: "",
      password: "",
      isLogin: true,
    };
  },
  methods: {
    async login() {
      try {
        const response = await API.post("/login", {
          email: this.email,
          password: this.password,
        });
        localStorage.setItem("token", response.data.token);
        alert("Login successful!");
        this.$router.push("/clothing-list"); // Redirect after login
      } catch (error) {
        console.error("Login failed", error);
        alert("Login failed. Please check your credentials.");
      }
    },
    async register() {
      try {
        const response = await API.post("/register", {
          name: this.name, //Send name when registering
          email: this.email,
          password: this.password,
          password_confirmation: this.password,
        });
        alert("Registration successful! You can now log in.");
        this.isLogin = true;
      } catch (error) {
        console.error("Registration failed", error);
        alert("Registration failed. Please try again.");
      }
    },
    toggleForm() {
      this.isLogin = !this.isLogin;
    },
  },
};
</script>
