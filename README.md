# Rock Paper Scissors Game

This is a Rock Paper Scissors game built with Vue.js and Laravel. The frontend uses a retro theme for a nostalgic look and feel.

## Why Retro Theme?

The retro theme was chosen to give the game a nostalgic and fun appearance, reminiscent of classic arcade games. The vibrant colors and pixelated font add to the overall playful experience.

## Prerequisites

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Running the Application

1. Clone the repository:
    ```sh
    git clone https://github.com/JohnRCabz/rockpaperscissors.git
    cd rock-paper-scissors
    ```

2. Build and run the application using Docker Compose:
    ```sh
    docker-compose up --build
    ```

3. Open your browser and navigate to `http://localhost:8080` to see the application in action.

## Design Decisions

### Frontend
- **Vue.js**: Chosen for its simplicity and ease of integration with other libraries. It provides a reactive and component-based architecture which is perfect for building interactive user interfaces.
- **Retro Theme**: The retro theme was selected to evoke nostalgia and provide a unique, engaging user experience. The design includes vibrant colors and pixelated fonts to mimic classic arcade games.

### Backend
- **Laravel**: Selected for its elegant syntax and powerful features. Laravel simplifies common tasks such as routing, authentication, and caching, making it an excellent choice for building robust web applications.

### Containerization
- **Docker**: Used to ensure consistency across different environments. Docker allows the application to run in isolated containers, making it easier to manage dependencies and deploy the application.
- **Docker Compose**: Facilitates the orchestration of multiple containers, allowing the frontend and backend to run simultaneously with a single command.
