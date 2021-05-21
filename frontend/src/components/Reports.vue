<template>
  <div class="Reports">
    <b-container >
        <b-row>
            <b-col>
                <label>Informe</label> 
                <b-form-select
                    id="input-3"
                    v-model="form.food"
                    :options="foods"
                    
                ></b-form-select>
            </b-col>
            <b-col>
                <label>Fecha</label> 
                <b-form-datepicker id="example-datepicker" v-model="form.date" class="mb-2"></b-form-datepicker>
            </b-col>
            <b-col>
                <b-button variant="success" class="btnsmall" v-on:click="queryReport()" >
                    Generar
                </b-button>
            </b-col>
        </b-row>
        <b-row>
            <b-col>
                <b-table striped hover :items="items" :fields="fields"></b-table>
            </b-col>
        </b-row>
        <div v-if="load">
          <h3>Cargando...</h3>
          <b-spinner class="ml-auto" variant="success"  style="width: 2rem; height: 2rem;"></b-spinner>
      </div>
    </b-container>
  </div>
</template>

<script>
  import {httprequest} from '../api/ajax.js';

export default {
  name: 'Reports',
  data() {
    return {
      load:false,
      form: {
          date:  (new Date()).toISOString().split('T')[0],
          food: 'kitchen',
          checked: []
      },
      foods: [{ text: 'Historial de pedidos', value: 'kitchen' },{ text: 'Historial de compras', value: 'store' }],
      fields: [],
        items: []
    };
  },
  methods:{
    queryReport(){
      this.load=true;
      this.fields,this.items = [];
      httprequest(this.form.food,`api/v1/report?date=${this.form.date}`, 'GET', {}).then(result => {
        this.load=false;
        this.fields = result.data.fields;
        this.items = result.data.data;
      });
    },
  }
}
</script>