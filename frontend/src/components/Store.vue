<template>
  <div class="Store">
    
    <b-alert  variant="danger"  dismissible :show="error_buy" >No se encontro disponibilidad de este producto en el mercado, por intentarlo de nuevo</b-alert>
    <b-alert  variant="success"  dismissible :show="success_buy" >Se compro con exito!</b-alert>
    <b-spinner v-if="loadBuy" class="ml-auto" variant="info"  style="width: 2rem; height: 2rem;"></b-spinner>
    <b-button variant="success" style="float:right;" v-on:click="listStore()">
       <b-icon icon="arrow-clockwise" scale="1" ></b-icon>
    </b-button>
    <b-table small :fields="fields" :items="items" responsive="sm">
      <template #cell(buy)="row" >
        <b-button variant="info" class="btnsmall" v-on:click="buy_store(row)">
            <b-icon icon="shop" font-scale="1"></b-icon>
        </b-button>
      </template>
      <template #cell()="data">
        {{ data.value }}
      </template>
    </b-table>
    <div v-if="items.length == 0">
        <h3>Cargando Bodega...</h3>
        <b-spinner class="ml-auto" variant="success"  style="width: 2rem; height: 2rem;"></b-spinner>
      </div>
  </div>
</template>

<script>
import {httprequest} from '../api/ajax.js';
export default {
  name: 'Store',
  data() {
    return {
        fields: [
          { key: 'name', label: 'Ingrediente' },
          { key: 'quantity', label: 'Total' },
          { key: 'buy', label: 'Comprar' },
        ],
        items: [],
        error_buy:false,
        loadBuy:false,
        success_buy:false
    };
  },
  methods: {
    listStore(){
      this.items=[];
      httprequest('store','api/v1/store', 'GET', {}).then(result => {
        this.items= result.data;
      });
    },
    buy_store(data){
      this.loadBuy=true;
      httprequest('store',`api/v1/store/${data.item.id}`, 'PUT',{buy:'true'}).then(result => {
        if(result.status==200){
          this.success_buy=true;
          this.listStore();
        }else{
          this.error_buy=true;

        }

        this.loadBuy=false;

      });
    }
	},
	mounted() {
    this.listStore();
	}
}
</script>