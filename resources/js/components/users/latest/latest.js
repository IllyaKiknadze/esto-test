export default {
    name: "user-latest",
    props: {
        authUser: {
            type: Object,
            required: true
        },
        users: {
            type: Array,
            required: true
        },
        routeCreateUser: {
            type: String,
            required: true
        }
    },
}
