<template>
      <div class="row">
        <div class="col-12">  
                  <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>firstName</th>
                                    <th>surname</th>
                                    <th>age</th>
                                    <th>gender</th>
                                    <th>connections</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td >{{ people.id }}</td>
                                    <td>{{ people.firstName }}</td>
                                    <td>{{ people.surname }}</td>
                                    <td>{{ people.age }}</td>
                                    <td>{{ people.gender }}</td>
                                    <td>{{ people.connections }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>   
                   
                    <hr>
                    <h2>Direct friends</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>firstName</th>
                                    <th>surname</th>
                                    <th>age</th>
                                    <th>gender</th>
                                    <th>connections</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="itemsContains(indice.connections)"  v-for="indice in blogs2">
                                    <td >{{ indice.id }}</td>
                                    <td>{{ indice.firstName }}</td>
                                    <td>{{ indice.surname }}</td>
                                    <td>{{ indice.age }}</td>
                                    <td>{{ indice.gender }}</td>
                                    <td>{{ indice.connections }}</td>
                                    <td><a class="btn btn-sm btn-primary" :href="'/editar/' + indice.id"><i class="fa fa-eye"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 

            <hr>
            <h2>Friends of friends</h2>
            <div  v-if="itemsContains(indice.connections)"  v-for="indice in blogs2">
                <div v-for="(dado_do_end, key) in indice.connections ">
                  <div v-if="itemsContains2(dado_do_end, indice2.id, indice.id)" v-for="indice2 in blogs3">
                       {{ indice2.firstName }} 
                        <a class="btn btn-sm btn-primary" :href="'/editar/' + indice2.id"><i class="fa fa-eye"></i></a>
                    </div> 
                </div>
            </div>
            <hr>
        </div>
    </div>
</template>

<script>

 export default {
       name:"blogs",
       data(){
           return {
              id: this.$route.params.id, //this is the id from the browser,
              blogs:[],
              blogs2:[],
              blogs3:[],
              people:{
                id:"",
                firstName:"",
                surname:"",
                age:"",
                gender:"",
                connections:""
              }
           }
       },
      
        mounted(){
            //this.mostrarPeople()
            fetch('http://localhost:3000/teste/' + this.$route.params.id)
            .then(res => res.json())
            .then(data => this.people = data)
            .catch(err => console.log(err.message)),

           fetch('http://localhost:3000/teste' )
            .then(res => res.json())
            .then(data => this.blogs2 = data)
            .catch(err => console.log(err.message))

            fetch('http://localhost:3000/teste' )
            .then(res => res.json())
            .then(data => this.blogs3 = data)
            .catch(err => console.log(err.message))
            
        },
         methods: {
        async mostrarPeople(){
            this.axios.get('/api/people/'+ this.$route.params.id)
            .then(response=>{
                const { id, firstName,surname,age,gender } = response.data
                this.people.id = id
                this.people.firstName = firstName
                this.people.surname = surname
                this.people.age = age
                this.people.gender = gender
            }).catch(error=>{
                console.log(error)
            })
        },
    itemsContains(n) {
       
        for (let i = 0; i <= n.length; i++) {
                if(n[i] == this.$route.params.id){
                    return true;
                }
        };
        
    },
    itemsContains2(idu,idu2, idu3) {
        if((idu == idu2) && (idu != this.$route.params.id) && (idu != idu3) ){
               return true;
        }
    }
  }
        
    }
</script>