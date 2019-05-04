<template >
<!-- Modal -->
<div class="modal fade" :id="'modal'+product.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-body">
         
        <select class="form-control" name="type" id="">
          <option  v-for="(item, index) in porductAttr" :key="index" 
          :selected="product.type == index ? true:false "
          :value="index" >{{index}}</option>
        </select>
        <input class="form-control" type="text" name="materialNo" :value="product.materialNo">
        <input class="form-control" type="text" name="sn" :value="product.materialNo">
        <select class="form-control" name="power" id="" v-model="product.power">
          <option  v-for="(item, index) in porductAttr.motor.Power" :key="index" 
          :selected="product.power == item ? true:false "
          :value="item" 
          
          >{{item}}kw</option>
        </select>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" ref="close">Close</button>
        <button type="button" class="btn btn-primary" @click="updateProduct">Save changes</button>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import porductAttrs from '../../../storage/app/json/productAttributes.json'

export default {
  props: ['product'] ,
  data() {
    return {
      // product: this.product,
      porductAttr: porductAttrs
    };
},

created() {
   
},

methods: {
  updateProduct() {
  if(confirm('Are you sure')){
    // console.log(this.product.id);
    fetch('/api/product/'+this.product.id , {
      method: 'put',
      body:  JSON.stringify(this.product),
      headers: {
        'content-type': 'application/json'
      }
    })
    .then(this.$refs.close.click())
    .then(this.$parent.fetchProducts())
    .catch(err => console.log(err));
  }
}
},

}
</script>

<style scoped>

</style>
