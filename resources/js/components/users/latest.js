export default {
    name: "latest",
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
