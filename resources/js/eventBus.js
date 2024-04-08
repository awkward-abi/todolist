import { createApp } from 'vue';

const app = createApp({});
const eventBus = app.config.globalProperties.$eventBus = new app._Vue();

export default eventBus;
