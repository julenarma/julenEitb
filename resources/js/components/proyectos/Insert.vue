<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Proiektua gehitu</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Izena</label>
                                    <input type="text" class="form-control" v-model="proyecto.nombre">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Barne Kodea</label>
                                   <select  name="cod_interno" v-model="proyecto.cod_interno" class="form-control">
                                     <option >1</option>
                                     <option>2</option>
                                     <option >3</option>
                               </select>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Garatzaile nagusiak</label>
                               <select name="desarrollador_principal" v-model="proyecto.desarrollador_principal" class="form-control">
                                     <option >1</option>
                                     <option >2</option>
                                     <option >3</option>
                               </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Proiektua gehitu</button>
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
    name:"proyectoAdd",
    data(){
        return {
             proyecto:{
          
                nombre:"",
                cod_interno:"",
                desarrollador_principal:"",
                
            }
        }
    },
    methods:{

      async create(){
        
                this.axios.post('http://talde-lanak.garapenaeus/api/proyectos/',this.proyecto).then(response=>{
                    this.$router.push({name:"ProyectsList"})

          Toast.fire({
         icon: 'success',
         title: 'Proiektua ondo sortu da'
          })
                }).catch(error=>{
                    console.log(error)
                })
        

        }
    }
}
</script>