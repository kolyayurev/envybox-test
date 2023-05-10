<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3>Form</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" :class="{ 'is-invalid' : v$.form.name.$error }"  id="name" v-model="form.name">
                                <div class="invalid-feedback">Обязательное поле</div>
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Text</label>
                                <textarea class="form-control"  :class="{ 'is-invalid' : v$.form.text.$error }"  id="text" rows="3" v-model="form.text"></textarea>
                                <div class="invalid-feedback">Обязательное поле</div>
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
import { useVuelidate } from '@vuelidate/core'
import { required, maxLength } from '@vuelidate/validators'

export default {
    name:"dashboard",
    setup () {
        return { v$: useVuelidate() }
    },
    data(){
        return {
            form:{
                name: null,
                text: null,
            }
        }
    },
    validations () {
        return {
            form: {
                name: { required,  maxLength: maxLength(255), },
                text: { required, maxLength: maxLength(1024), },
            },
        }
    },
    methods:{
        ...mapActions({
            storeFeedback:"feedback/store"
        }),
        async submit(){
            let _this = this;

            const valid = await this.v$.form.$validate();

            if (!valid) return

            this.storeFeedback(this.form).then(()=>{
                _this.clearForm();
                _this.v$.form.$reset();
            });



        },
        clearForm(){
            this.form.name = null;
            this.form.text = null;
        }
    }
}
</script>
