<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3>Dashboard</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" v-model="form.name">
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Text</label>
                                <textarea class="form-control" id="text" rows="3" v-model="form.text"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary"  @click.prevent="submit">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapActions} from 'vuex'

export default {
    name:"dashboard",
    data(){
        return {
            form:{
                name: null,
                text: null,
            }
        }
    },
    methods:{
        ...mapActions({
            sendFeedback:"feedback/send"
        }),
        submit(){
            this.sendFeedback(this.form)
        }
    }
}
</script>
