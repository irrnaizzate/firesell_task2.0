<template>
    
    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-header">
                    <h4>Update User</h4>
                </div>

                <div class="card-body">
                    <form @submit.prevent="update">

                        <div class="row">

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="users.name">
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" v-model="users.email">
                                </div>
                            </div>

                        </div>

                        <!-- <div class="row">

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" v-model="users.password">
                                </div>
                            </div>

                        </div> -->

                        <div class="row">

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" v-model="users.role">
                                        <option value="0">Admin</option>
                                        <option value="1">User</option>
                                    </select>
                                </div>
                            </div>
                        
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Save</button>
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
    name:"update-userList",
    data(){
        return{
            list:{
                name:"",
                email:"",
                role:"",
                _method:"patch"
            }
        }
    },
    mounted(){
        this.showUserList()
    },
    methods:{
        async showUserList(){
            await this.axios.get(`/api/users/${this.$route.params.id}`).then(
                response=>{
                    const { name, email, role } = response.data
                    this.users.name = name
                    this.users.email = email
                    this.users.role = role
                }
            ).catch(
                error=>{ console.log(error) }
            )
        },
        async update(){
            await this.axios.post(`/api/users/${this.$route.params.id}`).then(
                response=>{ this.router.push({name:"DisplayUser"}) }
            ).catch(
                error=>{ console.log(error) }
            )
        }
    }
}
</script>
