<template>
    <div class="retro-background">
      <h1>Rock, Paper, Scissors</h1>
      <Game />
    </div>
  </template>
  
  <script>
  import Game from '../components/Game.vue';
  
  export default {
    components: {
      Game,
    },
  };
  </script>
  
  <style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
  
  html, body {
    height: 100%;
    width: 100%;
    margin: 0;
    overflow: hidden;
  }
  
  .retro-background {
    background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
    background-size: cover;
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px;
    font-family: "Press Start 2P", cursive;
    color: #333;
  }
  
  h1 {
    font-size: 2em;
    margin-bottom: 1em;
    text-shadow: 2px 2px #ff0000;
  }
  </style>