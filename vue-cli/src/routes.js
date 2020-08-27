import Contacts from './components/contacts.vue'
import AddContact from './components/addContact.vue'
import EditContact from './components/editContact.vue'
import Signup from './components/user/signup.vue'
import Signin from './components/user/signin.vue'


export const routes = [
    { path: '', component: Contacts },
    { path: '/addContact', component: AddContact },
    { path: '/editContact', component: EditContact },
    { path: '/signup', component: Signup },
    { path: '/signin', component: Signin },
];