<template>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Editar Película</h4>
          </div>
          <div class="card-body">
            <form @submit.prevent="actualizar">
              <div class="row">
                <div class="col-12 mb-2">
                  <div class="form-group">
                    <label>Título</label>
                    <input type="text" class="form-control" v-model="pelicula.nombre">
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="form-group">
                    <label>Fecha de Publicación</label>
                    <input type="date" class="form-control" v-model="pelicula.fecha_publicacion">
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="form-group">
                    <label>Imagen</label>
                    <input type="file" class="form-control-file" @change="handleFileUpload">
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
    name: "edit-pelicula",
    data() {
      return {
        pelicula: {
          nombre: "",
          fecha_publicacion: "",
          imagen: ""
        }
      };
    },
    mounted() {
      this.listarPeliculas();
    },
    methods: {
      async listarPeliculas() {
        this.axios
          .get(`/api/pelicula/${this.$route.params.id}`)
          .then(response => {
            const { nombre, fecha_publicacion, imagen } = response.data;
            this.pelicula.nombre = nombre;
            this.pelicula.fecha_publicacion = fecha_publicacion;
            // No se asigna el valor de imagen para mantener la imagen previa
          })
          .catch(error => {
            console.log(error);
          });
      },
      async actualizar() {
        this.axios
          .put(`/api/pelicula/${this.$route.params.id}`, this.pelicula)
          .then(response => {
            this.$router.push({
              name: "listarPeliculas"
            });
          })
          .catch(error => {
            console.log(error);
          });
      },
      handleFileUpload(event) {
        this.pelicula.imagen = event.target.files[0];
      }
    }
  };
  </script>