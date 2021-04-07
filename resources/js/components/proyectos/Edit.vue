<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Proiektua editatu </h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Id </label>
                                    <input type="text" class="form-control" v-model="proyecto.id" disabled>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Izena</label>
                                    <input type="text" class="form-control" v-model="proyecto.nombre">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Barne kodea</label>
                                     <select  name="cod_interno" v-model="proyecto.cod_interno" class="form-control">
                                     <option  >1</option>
                                     <option >2</option>
                                     <option  >3</option>
                                         </select>
                                </div>
                            </div> 
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Garatzaile nagusiak</label>
                                    <input type="text" class="form-control" v-model="proyecto.desarrollador_principal">
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="col-6">       <button type="submit" class="btn btn-primary">Atzera</button></div>
                                  <div class="col-6">   <button type="submit" class="btn btn-primary">Proiektua baieztatu</button></div>
                         
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"proyectoEdit",
    data(){
        return {
            proyecto:{
                id:"",
                nombre:"",
                cod_interno:"",
                desarrollador_principal:"",
                
            }
        }
    },
    mounted(){
        this.showProyecto()
    },
    methods:{
        async showProyecto(){
            await this.axios.get(`http://talde-lanak.garapenaeus/api/proyectos/${this.$route.params.id}`).then(response=>{
                const { id, nombre, cod_interno, desarrollador_principal } = response.data
                this.proyecto.id = id
                this.proyecto.nombre = nombre
                this.proyecto.cod_interno = cod_interno
                this.proyecto.desarrollador_principal = desarrollador_principal
              
            }).catch(error=>{
                console.log(error)
            })
        },
        async update(){
            await this.axios.put(`http://talde-lanak.garapenaeus/api/proyectos/${this.$route.params.id}`,this.proyecto).then(response=>{
                this.$router.push({name:"ProyectsList"})
                location.reload();
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>