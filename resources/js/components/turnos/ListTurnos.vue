<template>
    <div class="container">
      <div>
        <div class="row justify-content-end mb-10">
          <div class="col-lg-auto">
            <router-link :to='{name:"crearTurnos"}' class="btn btn-success">Nuevo Turno</router-link>
          </div>
        </div>
  
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table class="table bg-dark text-white">
                <thead>
                  <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Turno</th>
                    <th class="text-center">Estado:</th>
                    <th class="text-center">Acciones</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="turno in turnos" :key="turno.id">
                    <td class="text-center">{{ turno.id }}</td>
                    <td class="text-center">{{ turno.turno }}</td>
                    <td class="text-center">{{ turno.estado }}</td>
                    <td class="text-center">
                      <div class="d-flex justify-content-center">
                        <router-link :to="{ name: 'editarTurnos', params: { id: turno.id } }" class="btn btn-info">Editar<i class="fas fa-pen-to-square"></i></router-link>
                        <a type="button" @click="borrarTurno(turno.id)" class="btn btn-danger">Borrar</a>
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
    name: "turnos",
    data(){
        return{
            turnos:[]
        }
    },
    mounted(){
        this.listarTurnos()
    },
    methods:{
        async listarTurnos(){
            await this.axios.get('/api/turno')
            .then(response=>{
                this.turnos = response.data
            })
            .catch(error=>{
                this.turnos = []
            })
            },
            borrarTurno(id){
                if(confirm("¿Confirma eliminar el registro?")){
                    this.axios.delete(`/api/turno/${id}`)
                    .then(response=>{
                        this.listarTurnos()
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            }
        }
    }

</script>