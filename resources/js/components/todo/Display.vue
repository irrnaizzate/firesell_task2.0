<template>

    <div class="row">

        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h4>Todo List</h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="todo.length > 0">
                                
                                <tr v-for="(t,k) in todo" :key="k">
                                    <td>{{ t.message }}</td>
                                    <td>{{ t.incomplete }}</td>
                                    <td>
                                        <router-link :to='{name:"EditTodo",params:{id:t.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteTodo(t.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>

                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No Todo List found.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>

    </div>

</template>

<script>
export default
{
    name:"todoList",
    data(){
        return{ todo:[] }
    },
    mounted(){
        this.getTodoList()
    },
    methods:{
        async getTodoList(){
            await this.axios.get(`/api/todo`).then(
                reponse=>{ this.todo = response.data }
            ).catch(
                error=>{
                    console.log(error)
                    this.todo = []}
            )
        },
        deleteTodo(id){
            if(confirm("Are you sure to delete this todo list?"))
            {
                this.axios.delete(`/api/todo/${id}`).then(
                    response=>{ this.getTodoList() }
                ).catch(
                    error=>{ console.log(error) })
            }
        }
    }
}
</script>
