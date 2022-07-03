<template>
    <div class="row">
        <div class="col-12">  
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>id</th>
                            <th>firstName</th>
                            <th>surname</th>
                            <th>age</th>
                            <th>gender</th>
                            <th>conn</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="people in peoples" :key="people.id">
                            <td>{{ people.id }}</td>
                            <td>{{ people.firstName }}</td>
                            <td>{{ people.surname }}</td>
                            <td>{{ people.age }}</td>
                            <td>{{ people.gender }}</td>
                            <td>{{ people.connections }}</td>
                            <td>
                                <router-link :to='{name:"editarBlog",params:{id:people.id}}' class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></router-link>
                           </td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>                          
        </div>
    </div>
</template>

<script>
export default {
    name:"peoples",
    data(){
        return {
            peoples:[]
        }
    },
    mounted(){
        //this.mostrarPeoples()
        
        fetch('http://localhost:3000/teste')
        .then(res => res.json())
        .then(data => this.peoples = data)
        .catch(err => console.log(err.message))
        
    },
    methods:{
        async mostrarPeoples(){
            await this.axios.get('/api/people').then(response=>{
                this.peoples = response.data
            }).catch(error=>{
                console.log(error)
                this.peoples = []
            })
        }
    }
}
</script>