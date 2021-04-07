<template>
  <main>
    <div class="container mt-5">
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
                 
                  </tr>
                </thead>

                <tbody v-if="proyectos.length > 0">
                  <tr v-for="(proyecto, key) in proyectos" :key="key">
                    <td>{{ proyecto.id }}</td>
                    <td>{{ proyecto.nombre }}</td>
                    <td>{{ proyecto.cod_interno }}</td>
                    <td>{{ proyecto.desarrollador_principal }}</td>
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
export default {
  name: "ProyectsListUser",
  data() {
    return {
      proyectos: [],
    };
  },
  mounted() {
    this.getProyectos();
  },
  methods: {
    async getProyectos() {
      await this.axios
        .get("http://talde-lanak.garapenaeus/api/proyectos/")
        .then((response) => {
          this.proyectos = response.data;
        })
        .catch((error) => {
          console.log(error);
          this.proyectos = [];
        });
    },
  },
};
</script>




