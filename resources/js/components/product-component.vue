<template >
    <div class="container card">
        <table class="table ">
            <thead>
                <th>#</th>
                <th>Type</th>
                <th>Material number</th>
                <th>S.N</th>
                <th>Power</th>
                <th>created_at</th>
                <th>Action</th>
            </thead>
            <tbody>
                    <tr v-for="product in products" v-bind:key="product.id" 
                    v-on:click="clickList(product.id)" 
                    data-toggle="collapse" :data-target="'#demo'+product.id" class="accordion-toggle">
                    <td>{{product.id}}</td>
                    <td>{{product.type}}</td>
                    <td>{{product.materialNo}}</td>
                    <td>{{product.sn}}</td>
                    <td>{{JSON.parse(product.specifics).sn }}</td>
                    <td>{{product.created_at}}</td>
                    <td>
                        <button type="button" class="close" data-dismiss="modal" @click="deleteProduct(product.id)">&times;</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" :data-target="'#modal'+product.id">
                        Edit</button>
                        <product-edit-component :product="product"></product-edit-component>
                    </td>
                </tr>
               
            </tbody>
        </table> 
        <nav aria-label="Page navigation ">
            <ul class="pagination justify-content-center">
                <li class="page-item " v-bind:class="[{disabled: !pagination.prev_page_url}]" ><a class="page-link" href="#" @click="fetchProducts(pagination.prev_page_url)" >Previous</a></li>
                <li class="page-item" v-for="(page, index) in pagination.page_links" :key="index"
                  v-bind:class="[{disabled: pagination.current_page == index+1}]"><a class="page-link" href="#" @click="fetchProducts(page)">{{index+1}}  </a></li>
                <li class="page-item" v-bind:class="[{disabled: !pagination.next_page_url}]" ><a class="page-link" href="#" @click="fetchProducts(pagination.next_page_url)" >Next</a></li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            csrfToken: document.querySelector(`meta[name="csrf-token"]`).getAttribute(`content`),
            products: [],
            product: {
                id : '', 
                type : '', 
                materialNo : '', 
                sn : '', 
                created_at : ''
            },
            product_id: '', 
            pagination: '',
            edit: false
        };
},
// components: {
//     product-edit-component
// },

created() {
    this.fetchProducts();
    // console.log();
},

methods: {
    fetchProducts(page_url){
        console.log('I am fetching');
        let vm = this;
        page_url = page_url || 'api/product';

        fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.products = res.data;
                vm.makePagination(res.meta, res.links);
            })
            .catch(err => console.log(err));
    },
    makePagination(meta, links) {
      let page_count = meta.last_page;
      let page_links= Array(page_count);
      for (let index = 0; index < page_links.length; index++) {
          page_links [index] = 'http://dal.local/api/product?page=' + (index+1) ;
      }
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev,
        page_links : page_links
        
      };
      this.pagination = pagination;
    },
    clickList: function (id) {
    console.log("product " + id);
    },
    deleteProduct(id){
        if (confirm('Are you sure')) {
            fetch(`/api/product/${id}` , {
                method: 'delete' ,
                 headers: { "X-CSRF-Token": this.csrfToken }
            })
            .then(res => res.json())
            .then(data =>{
                this.fetchProducts();
            })
            .catch(err => console.log(err));
        }
       
    },


},

}
</script>

<style scoped>
tr:hover td{
    color: red;
    text-decoration-line: underline;
    background-color: grey;
}
table .hidden-row{
padding: 0 8px;
}
</style>
