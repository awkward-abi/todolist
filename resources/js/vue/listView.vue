<template>
    <div v-for="(item, index) in items" :key="index">
        <list-item 
            :item="item"
            class="item"
        />
    </div>
</template>

<script>
import listItem from './listItem'

export default {
    props: ['items'],
    components: {
        listItem
    },
    methods: {
        getList (){
            axios.get('api/items')
                .then(response => {
                    this.items 
                })
        }
    },
    created() {
        this.getList();
        this.$eventBus.on('todoEvent', () => {
            this.getList(); 
        });
    }
}
</script>

<style scoped>
    .item{
        background: #e6e6e6;
        padding: 5px;
        margin-top: 5px;
    }
</style>
