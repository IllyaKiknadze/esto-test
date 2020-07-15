<template>
    <div class="container">
        <div class="form-horizontal">
            <p v-if="this.errors.any()" v-for="(index, error) in this.errors" style="color: red;">{{error[0]}}</p>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" required
                       v-model="this.user.email">
            </div>
            <div class="form-group">
                <label for="amount">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required
                       v-model="this.user.name">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required minlength="8"
                       placeholder="********" v-model="this.user.name">
            </div>
            <div class="form-group custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="permissions" name="permissions" value="true">
                <label class="custom-control-label" for="permissions">Is admin user</label>
            </div>
            <button @click="createUser" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</template>

<script src="./create.js"/>
