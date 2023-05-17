<template>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card-header">
            <h4>Crear Turno</h4>
          </div>
        </div>
        <div class="card-body">
          <form @submit.prevent="crear">
            <div class="row">
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label for="">Turno</label>
                  <input type="time" class="form-control" v-model="turno.turno">
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label for="">Estado</label>
                  <input type="checkbox" v-model="turno.estado" true-value="1" false-value="0">
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
  </template>
  
  <script>
  export default {
    name: "crearTurnos",
    data() {
      return {
        turno: {
          turno: "",
          estado: 0
        }
      };
    },
    methods: {
      async crear() {
        await this.axios
          .post("/api/turno", this.turno)
          .then(response => {
            this.$router.push({ name: "listarTurnos" });
          })
          .catch(error => {
            console.log(error);
          });
      }
    }
  };
  </script>
  