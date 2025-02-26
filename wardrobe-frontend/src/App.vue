<script setup>
import Login from "@/components/Login.vue";
</script>

<template>
  <div id="app">
    <router-view />
  </div>
</template>

<style>
/* Apply a light background with soft colors */
#app {
  background-color: #f5f5f5; /* Light gray for a clean look */
  color: #333; /* Dark text for readability */
  font-family: Arial, sans-serif;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
}

/* Ensure all input fields look clean */
input {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

/* Improve buttons */
button {
  background-color: #007bff; /* Blue primary button */
  color: white;
  border: none;
  padding: 10px 15px;
  cursor: pointer;
  border-radius: 5px;
  font-size: 16px;
}

button:hover {
  background-color: #0056b3; /* Darker blue on hover */
}

/* Style the links */
p {
  font-size: 14px;
  margin-top: 10px;
}

p:hover {
  text-decoration: underline;
  cursor: pointer;
}
</style>
