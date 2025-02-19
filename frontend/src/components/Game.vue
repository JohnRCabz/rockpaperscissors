<template>
    <div>
      <div v-if="!gameOver">
        <component
          :is="currentRoundComponent"
          :round-number="currentRound + 1"
          :total-rounds="totalRounds"
          :on-move-selected="handleMoveSelected"
          :is-submitting="isSubmitting"
        ></component>
      </div>
      <div v-else>
        <h2>Game Over</h2>
        <p>Total Rounds: {{ result.total_rounds }}</p>
        <p>Player 1 Wins: {{ result.player1_wins }}</p>
        <p>Player 2 Wins: {{ result.player2_wins }}</p>
        <p>Ties: {{ result.ties }}</p>
        <p>Player 1 Win Percentage: {{ result.player1_win_percentage }}%</p>
        <p>Player 2 Win Percentage: {{ result.player2_win_percentage }}%</p>
        <button @click="restartGame">Restart Game</button>
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  import RoundComponent from "./RoundComponent.vue";
  
  export default {
    components: {
      RoundComponent,
    },
    data() {
      return {
        totalRounds: 10,
        currentRound: 0,
        player2Moves: [],
        result: null,
        gameOver: false,
        isSubmitting: false,
      };
    },
    computed: {
      currentRoundComponent() {
        return "RoundComponent";
      },
    },
    methods: {
      async handleMoveSelected(move) {
        this.player2Moves.push(move);
        if (this.currentRound < this.totalRounds - 1) {
          this.currentRound++;
        } else {
          await this.playGame();
        }
      },
      async playGame() {
        try {
          this.isSubmitting = true;
          const response = await axios.post("http://localhost:8000/play", {
            moves: this.player2Moves,
          });
          this.result = response.data;
          this.gameOver = true;
        } catch (error) {
          console.error("Error playing game:", error);
        } finally {
          this.isSubmitting = false;
        }
      },
      restartGame() {
        this.currentRound = 0;
        this.player2Moves = [];
        this.result = null;
        this.gameOver = false;
        this.isSubmitting = false;
      },
    },
  };
  </script>
  
  <style scoped>
  button {
    margin-top: 1em;
    padding: 8px 16px;
    background-color: #ff6347; 
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-family: "Press Start 2P", cursive;
  }
  button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
  }
  </style>