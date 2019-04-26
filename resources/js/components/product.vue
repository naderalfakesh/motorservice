<template >
    <div class="container card">
        <div class="row">
            <div class="col"><p>Type</p></div>
            <div class="col"><p>Material number</p></div>
            <div class="col"><p>S.N</p></div>
            <div class="col"><p>created_at</p></div>
        </div>
        <div class="row" v-for="product in products" v-bind:key="product.id" >
            <div class="col"><p>{{product.type}}</p></div>
            <div class="col"><p>{{product.materialNo}}</p></div>
            <div class="col"><p>{{product.sn}}</p></div>
            <div class="col"><p>{{JSON.parse(product.specifics).sn }}</p></div>
        </div>
        <a class="btn btn-primary" href="#" @click="fetchProducts(pagination.next_page_url)" >Next</a>

    </div>
</template>

<script>
export default {
    data() {
        return {
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

created() {
    this.fetchProducts();
},

methods: {
    fetchProducts(page_url){
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
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };
      this.pagination = pagination;
    }
},

}
</script>