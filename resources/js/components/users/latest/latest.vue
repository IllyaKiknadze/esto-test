<template>
    <div class="container">
        <h1>Latest users</h1>

        <table class="table" v-if="this.users">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Amount</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(user, index) in this.users" :key="`user-${index}`">
                <th scope="row">{{user.id}}</th>
                <td>{{user.name}}</td>
                <td>{{user.email}}</td>
                <td>{{user.debit_amount}}</td>
            </tr>

            </tbody>
        </table>

        <a v-if="this.authUser && this.authUser.permissions" :href="this.routeCreateUser"
           class="btn btn-primary stretched-link">Create user</a>
    </div>
</template>

<script src="./latest.js"/>
