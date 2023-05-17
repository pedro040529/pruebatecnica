<template>
    <div class="container">
      <div>
        <div class="row justify-content-end mb-10">
          <div class="col-lg-auto">
            <router-link :to='{name:"crearPeliculas"}' class="btn btn-success">Nueva Pelicula</router-link>
          </div>
        </div>
  
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table bg-dark text-white">
                <thead>
                  <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">F.Publicacion</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="pelicula in peliculas" :key="pelicula.id">
                    <td class="text-center">{{ pelicula.id }}</td>
                    <td class="text-center">{{ pelicula.nombre }}</td>
                    <td class="text-center">{{ pelicula.fecha_publicacion }}</td>
                    <td class="text-center">{{ pelicula.estado }}</td>
                    <td class="text-center">
                      <div class="d-flex justify-content-center">
                        <router-link :to="{ name: 'editarPeliculas', params: { id: pelicula.id } }" class="btn btn-info">Editar<i class="fas fa-pen-to-square"></i></router-link>
                        <router-link :to="{ name: 'editarPeliculas', params: { id: pelicula.id } }" class="btn btn-info">Asignar<i class="fas fa-pen-to-square"></i></router-link>
                        <a type="button" @click="borrarPelicula(pelicula.id)" class="btn btn-danger">Borrar</a>
                      </div>
                    </td>
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
export default {
    name: "peliculas",
    data(){
        return{
            peliculas:[]
        }
    },
    mounted(){
        this.listarPeliculas()
    },
    methods:{
        async listarPeliculas(){
            await this.axios.get('/api/pelicula')
            .then(response=>{
                this.peliculas = response.data
            })
            .catch(error=>{
                this.pelicula = []
            })
            },
            borrarPelicula(id){
                if(confirm("¿Confirma eliminar el registro?")){
                    this.axios.delete(`/api/pelicula/${id}`)
                    .then(response=>{
                        this.listarPeliculas()
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            }
        }
    }

</script>