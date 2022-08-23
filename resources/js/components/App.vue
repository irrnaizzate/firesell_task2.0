<template>
    <main>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a to="/" class="navbar-brand" href="#">Laravel Task Firesell</a>
                <div class="collapse navbar-collapse">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link"> Home </a>
                        <a @click="go('DisplayUser')" class="nav-item nav-link"> User </a>
                        <a @click="go('DisplayTodo')" class="nav-item nav-link"> Todo </a>
                        <a class="nav-item nav-link"> Files </a>
                        <!-- <router-link exact-active-class="active" to="/" class="nav-item nav-link">Home</router-link>
                        <router-link exact-active-class="active" :to='{name:"DisplayTodo"}' class="nav-item nav-link">Todo</router-link> -->
                    </div>
                </div>
            </div>
        </nav>

        <div class="container mt-5">
            
        </div>

    </main>
</template>
 
<script>
    export default
    {
        methods:{
            go(direct){
                this.$router.push({ name: direct })
            }
        }
    }
</script>