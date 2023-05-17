<template>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Editar Turno</h4>
          </div>
          <div class="card-body">
            <form @submit.prevent="actualizar">
              <div class="row">
                <div class="col-12 mb-2">
                  <div class="form-group">
                    <label for="">Turno</label>
                    <input type="time" class="form-control" v-model="turno.turno">
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="form-group">
                    <label>Estado</label>
                    <input type="checkbox" class="form-check-input" v-model="estadoCheckbox">
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Guardar</button>
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
    name: "edit-turno",
    data() {
      return {
        turno: {
          turno: "",
          estado: 0
        },
        estadoCheckbox: false
      };
    },
    mounted() {
      this.listarTurno();
    },
    watch: {
      estadoCheckbox(value) {
        this.turno.estado = value ? 1 : 0;
      }
    },
    methods: {
      async listarTurno() {
        this.axios
          .get(`/api/turno/${this.$route.params.id}`)
          .then(response => {
            const { turno, estado } = response.data;
            this.turno.turno = turno;
            this.estadoCheckbox = estado === 1;
          })
          .catch(error => {
            console.log(error);
          });
      },
      async actualizar() {
        this.axios
          .put(`/api/turno/${this.$route.params.id}`, this.turno)
          .then(response => {
            this.$router.push({
              name: "listarTurnos"
            });
          })
          .catch(error => {
            console.log(error);
          });
      }
    }
  };
  </script>
  