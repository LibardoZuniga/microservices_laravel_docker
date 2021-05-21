<template>
  <div id="app">
    <div v-if="!login">
      <h1>Validando login!</h1>
      <b-spinner class="ml-auto" variant="success"  style="width: 3rem; height: 3rem;"></b-spinner>
    </div>
    <Container v-if="login" />
  </div>
</template>

<script>
import Container from './components/Container.vue'
import {logIn} from './api/ajax.js';
export default {
  name: 'App',
  components: {
    Container
    
  },
  data: () => {
    return {
      login: false
    }
  },
  mounted() {
    logIn().then( ()=> {
        this.login=true;
      });

	}
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
