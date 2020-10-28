import Vue from "vue";
import VueAxios from "vue-axios";
import API_URL from "./config";

export const ApiService = {
    init() {
        Vue.use(VueAxios, axios);
        Vue.axios.defaults.baseURL = API_URL;
    },

    fetchCustomers() {
        return Vue.axios.get(`/customer`).catch(error => {
            console.log(error);
        });
    },

    getCustomer(id) {
        return Vue.axios.get(`/customer/${id}`).catch(error => {
            console.log(error);
        });
    },

    createCustomer(payload) {
        return Vue.axios.post(`/customer`, payload).catch(error => {
            console.log(error);
        });
    },

    updateCustomer(id, payload) {
        return Vue.axios.patch(`/customer/${id}`, payload).catch(error => {
            console.log(error);
        });
    },

    destroyCustomer(id) {
        return Vue.axios.delete(`/customer/${id}`).catch(error => {
            console.log(error);
        });
    },

    fetchInterests() {
        return Vue.axios.get(`/interest`).catch(error => {
            console.log(error);
        });
    },

    createInterest(payload) {
        return Vue.axios.post(`/interest`, payload).catch(error => {
            console.log(error);
        });
    },

    updateInterest(id, payload) {
        return Vue.axios.patch(`/interest/${id}`, payload).catch(error => {
            console.log(error);
        });
    },

    fetchStatus() {
        return Vue.axios.get(`/status`).catch(error => {
            console.log(error);
        });
    },

    createComment(payload) {
        return Vue.axios.post(`/comment`, payload).catch(error => {
            console.log(error);
        });
    },

    updateComment(id, payload) {
        return Vue.axios.patch(`/comment/${id}`, payload).catch(error => {
            console.log(error);
        });
    },

}

export default ApiService;
