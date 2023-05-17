@extends('Tema.head')
@section('content')
<div class="container my-5">
    <h1 class="mb-4">Actualizar Película</h1>

    <form method="POST" action="{{ route('pelicula.update', $pelicula) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $pelicula->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
            <input type="date" id="fecha_publicacion" name="fecha_publicacion" class="form-control" value="{{ $pelicula->fecha_publicacion }}" required>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen Actual</label>
            <div class="d-flex flex-column justify-content-center align-items-center border rounded" style="height: 400px; width: 400px;" id="dropzone" ondragover="event.preventDefault()" ondrop="handleDrop(event)">
                <span class="mb-3">Click o Arrastre aquí para cambiar la imagen</span>
                <img id="previewImage" src="{{ asset('images/'.$pelicula->imagen) }}" alt="Imagen de la película" class="mt-2 img-thumbnail" style="max-width: 100%; max-height: 100%;">
                <input type="file" id="imagen" name="imagen" class="d-none" accept="image/*">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>

<script>
    const dropzone = document.getElementById("dropzone");
    const fileInput = document.querySelector("#imagen");
    const previewImage = document.querySelector("#previewImage");

    function handleDrop(event) {
        event.preventDefault();
        const file = event.dataTransfer.files[0];
        fileInput.files = event.dataTransfer.files;
        previewImage.src = URL.createObjectURL(file);
        dropzone.classList.remove("border-primary");
    }

    dropzone.addEventListener("click", () => {
        fileInput.click();
    });

    fileInput.addEventListener("change", () => {
        const file = fileInput.files[0];
        previewImage.src = URL.createObjectURL(file);
    });
</script>
@endsection