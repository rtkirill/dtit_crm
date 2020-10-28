<template>
    <div>
        <div class="my-3">
            <a href="/new-customer" class="btn btn-success">Add customer</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Name</th>
                <th scope="col">Interest</th>
                <th scope="col">Status</th>
                <th scope="col">Comment</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr
                v-for="(customer, indexCustomer) in customers"
                :key="`customer_${indexCustomer}`"
            >
                <th scope="row">{{customer.updated_at | moment("LL")}}</th>
                <td>{{customer.name}}</td>
                <td>
                    <div
                        v-for="(interest, indexInterest) in customer.interests"
                        :key="`interest_${indexInterest}`"
                    >
                        <div class="d-flex align-items-start"
                             v-if="interest.customer_id === customer.id"
                        >
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" v-model="interest.interest"
                                       aria-label="Interest" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button"
                                            @click="interest.id === undefined ? makeCreateInterest(indexCustomer, indexInterest) : makeUpdateInterest(indexCustomer, indexInterest)">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-if="!isAddingInterest">
                        <button class="btn btn-success" @click="addInterest(indexCustomer)">Add interest</button>
                    </div>
                </td>
                <td>
                    <div>
                        <div class="form-group mx-3 mb-3 w-50">
                            <select class="form-control" id="inputGroupSelect01" :required="true"
                                    v-model="customer.status_id" @change="makeUpdateCustomer(indexCustomer)">
                                <option disabled value="">Choose status</option>
                                <option v-for="stat in statuses"
                                        :key="`status_${stat.id}`"
                                        :value="stat.id"
                                        :selected="customer.status_id === stat.id"
                                >
                                    {{stat.status}}
                                </option>
                            </select>
                        </div>

                    </div>
                </td>
                <td>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Comment..."
                               aria-label="Comment" aria-describedby="basic-addon2" v-model="customer.comment.comment">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button"
                                    @click="customer.comment.customer_id === undefined ? makeCreateComment(indexCustomer) : makeUpdateComment(indexCustomer)"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </td>
                <td>
                    <a :href="`/edit/${customer.id}`" class="btn btn-primary">
                        Edit
                    </a>
                    <button class="btn btn-danger" @click="makeDestroyCustomer(customer.id)">
                        Delete
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
    import ApiService from "../common/api.service";

    export default {
        name: "CustomerList",
        data() {
            return {
                customers: [],
                statuses: [],
                isAddingInterest: false,
            }
        },
        async created() {
            this.customers = await ApiService.fetchCustomers().then(({data}) => {
                //init comment object if null
                data = data.map((item) => {
                    if (item.comment === null) {
                        item.comment = {
                            comment: '',
                        }
                    }
                    return item;
                });
                return data;
            });

            this.statuses = await ApiService.fetchStatus().then(({data}) => data);
        },
        methods: {
            addInterest(index) {
                this.isAddingInterest = true;

                this.customers[index].interests.push({
                    customer_id: this.customers[index]["id"],
                    interest: "",
                    status_id: "",
                });
            },

            makeCreateInterest(indexCustomer, indexInterest) {
                this.isAddingInterest = false;

                ApiService.createInterest(this.customers[indexCustomer].interests[indexInterest]).then(() => {
                    location.reload();
                });
            },

            makeUpdateInterest(indexCustomer, indexInterest) {
                ApiService.updateInterest(this.customers[indexCustomer].interests[indexInterest]["id"], this.customers[indexCustomer].interests[indexInterest]).then(() => {
                    alert("updated!");
                }).catch((e) => {
                    console.log(e);
                });
            },

            makeUpdateCustomer(index) {
                ApiService.updateCustomer(this.customers[index]["id"], this.customers[index]).then(() => {
                    alert("updated!");
                }).catch((e) => {
                    console.log(e);
                });
            },

            makeDestroyCustomer(id) {
                ApiService.destroyCustomer(id).then(() => {
                    location.reload();
                });
            },

            makeCreateComment(index) {
                ApiService.createComment({
                    comment: this.customers[index].comment.comment,
                    customer_id: this.customers[index]["id"]
                }).then(() => {
                    alert("comment was added!");
                });
            },

            makeUpdateComment(index) {
                ApiService.updateComment(this.customers[index].comment.id, this.customers[index].comment).then(() => {
                    alert("comment was updated!");
                });
            }
        }
    }
</script>

<style scoped>

</style>
