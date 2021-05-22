<template>
  <div class="Recipe">
      <b-card
        :header="title"
        header-bg-variant="success"
        header-text-variant="white"
        align="center"
        title="Ingredientes"
      >
        <b-card-text>
          <b-container >
              <b-row  class="mb-1 headerTable">
                <b-col>Producto</b-col>
                <b-col>Cant</b-col>
                <b-col>Bodega</b-col>
              </b-row>
              <b-row  class="mb-1 " v-for="(item,indexItem) in items" :key="indexItem">
                <b-col>{{item.name}}</b-col>
                <b-col>{{item.quantity_recipe}}</b-col>
                <b-col>
                  <div v-if="item.quantity > 0">
                    {{item.quantity}}
                  </div>
                  <div v-else-if="item.quantity < 1">
                     <small>Agotado  </small>
                      <b-button variant="info" class="btnsmall" v-on:click="steps(1)">
                        comprar
                      </b-button>
                  </div>
                </b-col>
              </b-row>
            </b-container>
        </b-card-text>
        <div v-if="Object.keys(items).length == 0 || loadingFinish">
          <b-spinner class="ml-auto" variant="success"  style="width: 2rem; height: 2rem;"></b-spinner>
        </div>
        <b-button size="lg" variant="success" v-on:click="finish_recipe()"  v-if="!loadingFinish">Terminar Plato</b-button>

      </b-card>
  </div>
</template>

<script>
import {httprequest} from '../../api/ajax.js';
export default {
  name: 'Recipe',
  props: {
    items: Object,
    recipe: Object,
    title: String,
    updateStatus:Function,
    steps:Function
    
  },
  data() {
    return {
      loadingFinish:false
          };
  },
  methods: {
    validate_finish(){
      const result = this.items.filter(item => item.quantity_recipe > item.quantity);
      return (result.length>0)?false:true;
    },
    finish_recipe(){
      if(this.validate_finish()){
        this.loadingFinish=true;

        this.items.forEach(function(item) {
           httprequest('store',`api/v1/store/${item.id}`, 'PUT', {quantity:item.quantity_recipe});
        });
         
        httprequest('kitchen',`api/v1/order/recipe/${this.recipe.order_recipes_id}`, 'PUT', {status:'finish'}).then(() => {
          this.loadingFinish=false;
          this.updateStatus();
        }); 
      }else{
        alert('No tiene la cantidad suficiente en bodega para terminar este plato');
      }
      
    }
  }
}
</script>
<style scoped>
.headerTable{
  font-weight: bold;
  background: silver;
}

.btnsmall{
  padding: 1px ;
  font-size:12px;
}
</style>