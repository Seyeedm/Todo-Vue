<template>
    <v-card style="width: 600px;display:flex;align-items:center;margin-bottom:2rem" class="mx-auto" color="grey-lighten-3"
        max-width="400">
        <v-card-text>
            <v-text-field :loading="loading" density="compact" variant="solo" label="Add Todo" v-model.lazy="title"
                append-inner-icon="mdi-magnify" single-line hide-details @click:append-inner="onClick"></v-text-field>
        </v-card-text>
        <v-btn class="storetodo" @click="StoreTodo" style="margin-right:1rem">Add</v-btn>
        <v-btn class="edittodo" v-if="edit_mode" @click="EditTodo(item.id)" style="margin-right:1rem;">Update</v-btn>
    </v-card>
    <v-table style="width: 500px;">
        <thead>
            <tr>
                <th class="text-left">
                    Title
                </th>
                <th class="text-left">
                    Opration
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in todos" :key="item.title">
                <td>{{ item.title }}</td>
                <td><v-btn @click="DeleteTodo(item.id)">delete</v-btn><v-btn @click="replacebtn(item.title)">edit</v-btn></td>
            </tr>
        </tbody>
    </v-table>
</template>
<script>
import axios from "axios"

export default {
    name: "TableComponent",
    data() {
        return {
            todos:[],
            title:"",
            edit_mode:false
        }
    },
    mounted() {
        axios.get("http://localhost:8000/api/todo")
            .then((response) => {
                //onsole.log(response.data)
                this.todos = response.data;
            })
            .catch(function (error) {
                console.log(error)
            })
    },
    methods: {
        StoreTodo(){
            axios.post("http://localhost:8000/api/todo",{
                title:this.title
            })
            .then((response) => {
                window.location.reload()
            })
            .catch(function (error) {
                console.log(error)
            })
        },
        DeleteTodo(index){
            axios.delete("http://localhost:8000/api/todo"+"/"+index)
            .then((response) => {
                window.location.reload()
            })
            .catch(function (error) {
                console.log(error)
            })
        },
        EditTodo(index){
            axios.post("http://localhost:8000/api/todo",{
                title:this.title
            })
            .then((response) => {
                window.location.reload()
            })
            .catch(function (error) {
                console.log(error)
            })
        },
        replacebtn(title){
            let storetodo = document.querySelector(".storetodo");
            this.edit_mode=true
            storetodo.style.display="none"
            let edittodo = document.querySelector(".edittodo");
            edittodo.style.display="block"
            this.title=title
            console.log(title)
        }
    },
}
</script>