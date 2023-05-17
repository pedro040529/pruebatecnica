<template>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card-header">
            <h4>Crear película</h4>
          </div>
        </div>
        <div class="card-body">
          <form @submit.prevent="crear">
            <div class="row">
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label for="">Título</label>
                  <input type="text" class="form-control" v-model="pelicula.nombre">
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label for="">Fecha de Publicación</label>
                  <input type="date" class="form-control" v-model="pelicula.fecha_publicacion">
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label for="">Imagen</label>
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
  </template>

<script>
export default {
  name: "create-pelicula",
  data() {
    return {
      pelicula: {
        nombre: "",
        fecha_publicacion: "",
        imagen: ""
      }
    };
  },
  methods: {
    async crear() {
      const formData = new FormData();
      formData.append("nombre", this.pelicula.nombre);
      formData.append("fecha_publicacion", this.pelicula.fecha_publicacion);
      formData.append("imagen", this.pelicula.imagen);

      await this.axios
        .post("/api/pelicula", formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          }
        })
        .then(response => {
          this.$router.push({ name: "listarPeliculas" });
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