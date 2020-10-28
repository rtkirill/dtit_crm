<template>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <form @submit.prevent="customer.id === undefined ? create() : update()">
                    <div class="form-group">
                        <label for="exampleInputName">ФИО</label>
                        <input type="text" class="form-control" id="exampleInputName" placeholder="Введите ФИО" v-model="customer.name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Введите email" v-model="customer.email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTel">Телефон</label>
                        <input type="text" class="form-control" id="exampleInputTel" aria-describedby="emailHelp" placeholder="Введите телефон" v-model="customer.tel" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
	import ApiService from "../common/api.service";

    export default {
		name: "CustomerCreate",
        props: ["isNew", "customerId"],
        data() {
		    return {
		        customer: {
		            name: "",
		            email: "",
		            tel: "",
                }
            }
        },
        async mounted() {
		    if(!this.isNew) {
                this.customer = await ApiService.getCustomer(this.customerId).then(({data}) => {
                    return data;
                });
            }
        },
        methods: {
		    create() {
		        ApiService.createCustomer(this.customer).then(() => {
		            location.replace('/');
                });
            },
            update() {
                ApiService.updateCustomer(this.customer.id, this.customer).then(() => {
                    location.replace('/');
                });
            }
        }
	}
</script>

<style scoped>

</style>
