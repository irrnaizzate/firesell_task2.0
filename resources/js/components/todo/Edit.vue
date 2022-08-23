<template>

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">
                    <h4>Update Todo List</h4>
                </div>

                <div class="card-body">
                    <form @submit.prevent="update">

                        <div class="row">

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Message</label>
                                    <input type="text" class="form-control" v-model="todo.message">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" v-model="todo.is_complete">
                                        <option value="0">Pending</option>
                                        <option value="1">Complete</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </div> 

                    </form>
                </div>
            </div>

        </div>

    </div>

</template>

<script>
export default
{
    name:"update-todoList",
    data(){
        return{
            list:{
                message:"",
                is_complete:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showTodoList()
    },
    methods:{
        async showTodoList(){
            await this.axios.get(`/api/todo/${this.$route.params.id}`).then(
                response=>{
                    const { message, is_complete } = response.data
                    this.todo.message = message
                    this.todo.is_complete = is_complete
                }
            ).catch(
                error=>{ console.log(error) }
            )
        },
        async update(){
            await this.axios.post(`/api/todo/${this.$route.params.id}`).then(
                response=>{ this.router.push({name:"DisplayTodo"}) }
            ).catch(
                error=>{ console.log(error) }
            )
        }
    }

    
}
</script>
