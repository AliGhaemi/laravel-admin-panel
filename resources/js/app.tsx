// import './bootstrap';
//
// const dropdownClass = document.getElementsByClassName('dropdown-button')
// const dropdownListItem = document.getElementsByClassName('dropdown-list-item')
//
// for (let i= 0; i < dropdownClass.length; i++) {
//     dropdownClass[i].addEventListener('click', function () {
//         document.getElementsByClassName('dropdown-list')[i].classList.remove('hidden')
//     })
// }
// // for (let i= 0; i < dropdownListItem.length; i++) {
// //     dropdownListItem[i].addEventListener('click', function () {
// //         document.getElementsByTagName('label')[0].
// //         document.getElementsByTagName('input')[0].value =
// //     })
// // }


import '../css/app.css';
import {createInertiaApp} from '@inertiajs/react';
import {createRoot} from 'react-dom/client';
import Layout from "@/Pages/Layout";
import {Provider} from "react-redux";
import store from './Redux/store'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

type PageWithLayout = React.ComponentType<any> & {
    layout?: React.ComponentType<any>;
}
const isAdmin = false;
const auth = {
    user: {
        hasAdminPanelAccess : false,
    }
};

createInertiaApp({
    title: (title) => title ? `${title} - ${appName}` : appName,
    // resolve: (name) => resolvePageComponent(`./Pages/${name}.tsx`, import.meta.glob('./Pages/**/*.tsx')),
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.tsx', {eager: true})
        // console.log(pages)
        let page = pages[`./Pages/${name}.tsx`] as { default: PageWithLayout };
        // console.log(page)
        // if (isAdmin && auth.user.hasAdminPanelAccess) {
        page.default.layout = name.startsWith('Public/') ? undefined : page => <Layout children={page}/>
        // }
        return page
    },
    setup({el, App, props}) {
        createRoot(el).render(
            <Provider store={store}>
                <App {...props} />
            </Provider>
        )
    },
    progress: {
        color: '#4B5563',
    },
});
