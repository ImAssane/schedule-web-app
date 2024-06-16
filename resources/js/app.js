import '../css/app.css'; 
import { createApp, h } from 'vue';
import { createInertiaApp, Link } from '@inertiajs/vue3';
import { ZiggyVue } from 'ziggy-js';
import { Ziggy } from './ziggy.js';
import AppHead from '@/Widgets/AppHead.vue';
import SideBarLayout from '@/Layout/SideBarLayout.vue';
import AuthLayout from '@/Layout/AuthLayout.vue';


createInertiaApp({
  progress: {
    color: '#E21E2A',
  },
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`]

    let folder =  name.split('/')[1];
    let root =  name.split('/')[0];

    if(folder == 'Auth'){
      page.default.layout = AuthLayout 
    }else if(folder == 'Welcome'){
      page.default.layout = null
    }else if(root == 'Schedule'){
      page.default.layout = SideBarLayout 
    }else{
      page.default.layout = SideBarLayout 
    }
    
    return page;
  },
  setup({ el, App, props, plugin }) {
    const myapp = createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue, Ziggy)
      .component("AppHead", AppHead) 
      .component("Link", Link)
      myapp.config.globalProperties.$route = route;
      myapp.mount(el);
  },

})