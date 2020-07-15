export default {
    name: "userCreate",
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
