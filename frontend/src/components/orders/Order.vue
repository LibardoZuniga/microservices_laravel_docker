<template>
  <div class="Order">
      <b-alert  variant="success"  dismissible :show="success_finish" >Se finalizo correctamente la orden</b-alert>

      <div v-if="orders.length == 0">
        <h3>Cargando pedidos...</h3>
        <b-spinner class="ml-auto" variant="success"  style="width: 2rem; height: 2rem;"></b-spinner>
      </div>
        <b-card
          v-for="(order, indexOrder) in orders" :key="indexOrder"
          style="max-width: 20rem;height: 15rem;"
        >
          <div class="header">
            Orden #{{indexOrder}}
          </div>
         <b-card-text>
            <b-container >
              <b-row v-for="(recipe) in order" :key="recipe.order_recipes_id" class="mb-1">
                <b-col>{{recipe.name}}</b-col>
                <b-col lg="3">
                  <b-button variant="success" v-on:click="loadIngredient(recipe)" v-if="recipe.status=='preparation'" >
                    <b-icon icon="arrow-right-circle-fill" font-scale="1"></b-icon>
                  </b-button>
                    <b-icon icon="check-circle-fill" variant="success" font-scale="1" v-if="recipe.status=='finish'" ></b-icon>
                  
                </b-col>
              </b-row>
            </b-container>
          </b-card-text>  
          <b-button size="md" variant="success" v-on:click="finish_order(indexOrder)"  v-if="!loadingFinish">Terminar Orden</b-button>

        </b-card>
        <b-modal v-model="modalShow" hide-footer>
          <Recipe :items="item" :title="title" :recipe="recipeSelect" :updateStatus="updateStatus" ></Recipe>
        </b-modal>
  </div>
</template>

<script>
//import axios from 'axios';
import {httprequest} from '../../api/ajax.js';
import Recipe from './Recipe.vue';
export default {
  name: 'Order',
  components:{Recipe},
  props: {
    orders: Array,
    listOrders:Function
  },
  data() {
      return {
        modalShow: false,
        item:{},
        title:'',
        recipeSelect:{},
        success_finish:false,
        loadingFinish:false

      }
  },
  methods: {
    loadIngredient: function (recipe){
      this.title=`orden #${recipe.id} ${recipe.name}`;
      this.recipeSelect=recipe;
      this.modalShow=true;
      this.item={};

      httprequest('store',`api/v1/store?recipe=${recipe.id_recipe}`, 'GET', {}).then(result => {
        this.item=result.data;
      });
    },
    updateStatus: function (){
      this.modalShow=false;
      this.orders=[];
      this.listOrders();
    },
    validate_order(indexOrder){

      const result = this.orders[indexOrder].filter(order => order.status=='preparation');
      return (result.length>0)?false:true;

    },
    finish_order(indexOrder){
      if(this.validate_order(indexOrder)){
        this.success_finish=true;
        this.orders=[];

        httprequest('kitchen',`api/v1/order/${indexOrder}`, 'PUT', {status:'finish'}).then(() => {
          this.listOrders();
        });
        

      }else{
        alert('Debe terminar todos los platos de la orden');
      }
    }

  }

}
</script>
<style scoped>
.header{
  font-weight: bold;
  background: #dee2e6;
  margin-bottom: 5px;
}
.card{
  float: left;
  margin-left: 5px;
  margin-top: 10px;
}
.card-body{
  overflow-y: auto  !important;
}

.card-body::-webkit-scrollbar {
    -webkit-appearance: none;
}
.card-body::-webkit-scrollbar:vertical {
    width:10px;
}
.card-body::-webkit-scrollbar-thumb {
    background-color: #797979;
    border-radius: 20px;
    border: 2px solid #f1f2f3;
}
.headerC{
  width: 100%;
  padding: 5px;
  background-color: #dee2e6;
  font-weight: bold;
  margin-bottom: 3px;

}

.Order{
  overflow: auto  !important;
}

</style>