<template>

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">
                    <h4>Add Todo List</h4>
                </div>

                <div class="card-body">
                    <form @submit.prevent="create">

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
    name:"add-todolist",
    data(){
        return{
            list:{
                message:"",
                is_complete:""
            }
        }
    },
    methods:{
        async create(){
            await this.axios.post(`/api/todo/store`,this.list).then(
                response=>{ this.router.push({name:"DisplayTodo"}) }
            ).catch(
                error=>{ console.log(error) }
            )
        }
    }
}
</script>
