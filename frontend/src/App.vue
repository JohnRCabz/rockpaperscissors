<template>
    <div id="app">
      <router-view />
    </div>
  </template>
  
  <script>
  export default {
    name: 'App',
  };
  </script>
  
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
  
  html, body, #app {
    height: 100%;
    width: 100%;
    margin: 0;
    overflow: hidden;
  }
  
  #app {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
  </style>