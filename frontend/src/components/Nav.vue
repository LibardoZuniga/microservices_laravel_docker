<template>
  <div class="Nav">
    <b-navbar toggleable="lg" type="dark" variant="success">
          <b-navbar-brand href="#">Alegra Food</b-navbar-brand>
          <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav class="ml-auto">
              <b-nav-form>
                 <b-input-group prepend="Nueva Orden">
                    <b-form-input type="number" placeholder="cantidad" v-model="quantity"></b-form-input>
                    <b-button variant="info" v-on:click="create(quantity)" >Enviar</b-button>
                  </b-input-group>
              </b-nav-form>    
            </b-navbar-nav>
          </b-collapse>
        </b-navbar>
  </div>
</template>

<script>

export default {
  name: 'Nav',
   data() {
    return {
      quantity:''
    }
   },
  props: {
    create: Function
  }
}
</script>