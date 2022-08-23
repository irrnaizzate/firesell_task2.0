<template>
    
    <div class="row">

        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h4>User List</h4>
                </div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="users.length > 0">
                                
                                <tr v-for="(u,k) in users" :key="k">
                                    <td>{{ u.name }}</td>
                                    <td>{{ u.email }}</td>
                                    <td>{{ u.role }}</td>
                                    <td>
                                        <router-link :to='{name:"EditUser",params:{id:u.id}}' class="btn btn-success">Edit</router-link>
                                        <button type="button" @click="deleteUser(u.id)" class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>

                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="4" align="center">No User List found.</td>
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
    name:"userList",
    data(){
        return{ users:[] }
    },
    mounted(){
        this.getUserList();
    },
    methods:{
        async getUserList(){
            await this.axios.get(`/api/users`).then(
                reponse=>{ this.users = response.data }
            ).catch(
                error=>{
                    console.log(error)
                    this.users = []}
            )
        },
        deleteUser(id){
           if(confirm("Are you sure to delete this user?"))
            {
                this.axios.delete(`/api/users/${id}`).then(
                    response=>{ this.getUserList() }
                ).catch(
                    error=>{ console.log(error) })
            } 
        }
    }

}
</script>