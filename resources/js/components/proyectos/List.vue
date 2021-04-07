<template>
  <main>
    <div class="container mt-5">
        <span>{{lunes}}  {{viernes}}</span>
                   <div class="col-12 mb-2 add"> 
                    <router-link :to='{name:"proyectoAdd"}' class="btn btn-primary">Gehitu</router-link>
                    </div> 

      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr id="tabla">
                    <th>Id</th>
                    <th>Izena</th>
                    <th>Barne kodea</th>
                    <th>Garatzaile nagusia</th>
                        <th>Ekintzak</th>
                 
                  </tr>
                </thead>

                <tbody v-if="proyectos.length > 0">
                  <tr v-for="(proyecto, key) in proyectos" :key="key">
                    <td>{{ proyecto.id }}</td>
                    <td>{{ proyecto.nombre }}</td>
                    <td>{{ proyecto.cod_interno }}</td>
                    <td>{{ proyecto.desarrollador_principal }}</td>
                    
                       <td>
                                                         
                                               <router-link :to='{name:"proyectoEdit",params:{id:proyecto.id}}' class="btn btn-success"><i class="far fa-edit"></i></router-link> 
                                                &nbsp;    /   &nbsp;  
                                                    <button type="button" @click="deleteProyecto(proyecto.id)" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
 
<script>

var now = moment();
moment.locale('eu');
var monday = now.clone().weekday(1);
var friday = now.clone().weekday(5);



import moment from 'moment';
import 'moment/locale/eu';

export default {

    name:"ProyectsList",
    data(){
        return {
            lunes: monday,
            viernes:friday,
            proyectos:[],
         
         
            
        }
    },
    mounted(){
        this.getProyectos()
    },  

 

    methods:{
        async getProyectos(){
            await this.axios.get('http://talde-lanak.garapenaeus/api/proyectos/').then(response=>{
                this.proyectos = response.data
            }).catch(error=>{
                console.log(error)
                this.proyectos = []
            })
       
            },
       deleteProyecto(id){
            if(confirm("Proiektua ezabatu nahi duzu?")){
                this.axios.delete(`http://talde-lanak.garapenaeus/api/proyectos/${id}`).then(response=>{
                  
                    this.getProyectos()
             
                }).catch(error=>{
                    console.log(error)
                })
            }
        },
   
      moment: function () {
      return moment();
    }


  },

 
 
    }
     
</script>


<style scoped>

.add{

 display: flex;
justify-content: flex-end;
}

table{
    text-align: center;
}
</style>
