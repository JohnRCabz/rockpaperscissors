<template>
    <div class="card">
      <div class="card-body">
        <label>Round {{ roundNumber }}:</label>
        <select v-model="selectedMove" class="select-dropdown">
          <option value="rock">Rock</option>
          <option value="paper">Paper</option>
          <option value="scissors">Scissors</option>
        </select>
        <button :disabled="isSubmitting" @click="nextRound">
          <span v-if="isSubmitting" class="loader"></span>
          {{ isLastRound ? 'Submit Results' : 'Next' }}
        </button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      roundNumber: Number,
      totalRounds: Number,
      onMoveSelected: Function,
      isSubmitting: Boolean,
    },
    data() {
      return {
        selectedMove: 'rock',
      };
    },
    computed: {
      isLastRound() {
        return this.roundNumber === this.totalRounds;
      },
    },
    methods: {
      nextRound() {
        this.onMoveSelected(this.selectedMove);
      },
    },
  };
  </script>
  
  <style scoped>
  .card {
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 16px;
    margin: 16px 0;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 90%; 
    max-width: 800px; 
  }
  .card-body {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .select-dropdown {
    margin: 0.5em;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
  }
  button {
    margin-top: 1em;
    padding: 8px 16px;
    background-color: #ff6347;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    display: flex;
    align-items: center;
    font-family: "Press Start 2P", cursive;
  }
  button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
  }
  .loader {
    border: 2px solid #f3f3f3;
    border-top: 2px solid #ff6347;
    border-radius: 50%;
    width: 12px;
    height: 12px;
    animation: spin 1s linear infinite;
    margin-right: 8px;
  }
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  </style>