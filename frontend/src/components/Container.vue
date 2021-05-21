<template>
  <b-container >
    <b-row>
      <b-col>
        <Nav :create="createorders"></Nav>
      </b-col>
    </b-row>
    <b-row>
      <b-col>
        <b-card no-body>
          <b-tabs card>
            <b-tab title="Cocina" active>
              <b-row>
                <b-col>
                  <Order :orders.sync="order" :listOrders="listOrders" ></Order>
                </b-col>

              </b-row>
            </b-tab>
            <b-tab title="Bodega">
              <Store></Store>
            </b-tab>
            <b-tab title="Informes">
              <Reports></Reports>
            </b-tab>
          </b-tabs>
        </b-card>
      </b-col>
<!--         <b-col>1 of 3</b-col>
        <b-col col lg="4">3 of 3</b-col> -->
    </b-row>
  </b-container>
</template>

<script>
import Nav from './Nav.vue';
import Store from './Store.vue';
import Reports from './Reports.vue';
import Order from './orders/Order.vue';
import {httprequest} from '../api/ajax.js';
export default {
  name: 'Container',
  components:{Nav,Reports,Store,Order},
  data() {
    return {
      order:[]
    };
  },
  methods: {
		createorders(quantitys){
        this.order=[];
        httprequest('kitchen','api/v1/order', 'POST', {quantity:quantitys}).then(result => {
          console.log(result);
          this.listOrders();
        });
    },
    listOrders(){
      httprequest('kitchen','api/v1/order', 'GET', {}).then(result => {
        this.order=result.data;
      });
    }
	},
	mounted() {
    this.listOrders();
	}
  

}
</script>
