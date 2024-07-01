<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>

    <!-- Collegamneto CSS -->
    <link rel="stylesheet" href="./style.css">

    <!-- Collegamento CDN Vue-3 -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <!-- Collegamento CDN Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>






<body>

    <div id="app" class="container"> <!-- Istanza Vue 3 -->
        <h1>Todo List</h1>
        <div class="add-todo">
            <input type="text" v-model="newTodo" placeholder="New Todo">
            <button @click="addTodo">Add</button>
        </div>
        <div v-for="(todo, index) in todos" :key="index" class="todo-item">
            <input type="checkbox" v-model="todo.completed">
            <span :class="{ completed: todo.completed }">{{ todo.text }}</span>
            <button @click="deleteTodo(index)">Delete</button>
        </div>
    </div>  <!-- Chiusura istanza Vue 3 -->

</body>

</html>