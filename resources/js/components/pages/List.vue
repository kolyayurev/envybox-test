<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="list-group">
                    <li class="list-group-item" v-for="item in list">{{ item.name }} : {{ item.text }}</li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    name:"dashboard",
    data(){
        return {
            list:this.$store.state.feedback.list
        }
    },

}
</script>
