import './bootstrap';

import { createApp } from 'vue';
import App from './vue/app'

import {library} from '@fortawesome/fontawesome-svg-core'
import { faPlusSquare, faTrash } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import mitt from 'mitt';


library.add(faPlusSquare, faTrash)

const app = createApp(App);

const eventBus = mitt();

app.config.globalProperties.$eventBus = eventBus;


// Make the event bus available throughout the application
export { eventBus };

app.component('font-awesome-icon', FontAwesomeIcon);
app.mount('#app');