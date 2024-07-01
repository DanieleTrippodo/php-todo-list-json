const { createApp } = Vue;

const app = createApp({
    data() {
        return {
            todos: [],
            newTodo: ''
        };
    },





/* Sezione Funzioni ----------------------------------------------------------------------- */

    methods: {
        fetchTodos() {
            axios.get('api.php?action=read')
                .then(response => {
                    this.todos = response.data;
                })
                .catch(error => {
                    console.error('Errore, non trovo la todolist!:', error);
                });
        },
        addTodo() {
            if (this.newTodo.trim() === '') return;

            const newTodo = {
                text: this.newTodo,
                completed: false
            };

            axios.post('api.php?action=add', newTodo)
                .then(response => {
                    this.todos.push(newTodo);
                    this.newTodo = '';
                })
                .catch(error => {
                    console.error('Errore, non trovo la todolist!:', error);
                });
        },
        deleteTodo(index) {
            const todo = this.todos[index];
            axios.post('api.php?action=delete', todo)
                .then(response => {
                    this.todos.splice(index, 1);
                })
                .catch(error => {
                    console.error('Errore, non trovo la todolist!:', error);
                });
        }
    },
    mounted() {
        this.fetchTodos();
    }
});

app.mount('#app');
