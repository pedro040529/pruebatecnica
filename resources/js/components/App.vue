<template>
    <main>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <img src="https://www.vectorlogo.zone/logos/vuejs/vuejs-icon.svg" alt="" width="30" height="24">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link exact-active-class="active" to="/" class="nav-link active" aria-current="page">Peliculas</router-link>
        </li>
        <li class="nav-item">
          <router-link exact-active-class="active" to="/turnos" class="nav-link active" aria-current="page">Turnos</router-link>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </main>
    <div>
        <router-view></router-view>
    </div>
</template>