import "./bootstrap";
import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import Icon from "./Components/Icon.vue";
import PaginationLinks from "./Components/PaginationLinks.vue";
import BackButton from "./Components/BackButton.vue";
import Layout from "./Layouts/Layout.vue";
createInertiaApp({
    title: (title) => `Student Portal ${title}`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        const page = pages[`./Pages/${name}.vue`];
        page.default.layout = page.default.layout || Layout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component("Head", Head)
            .component("Icon", Icon)
            .component("Link", Link)
            .component("PaginationLinks", PaginationLinks)
            .component("BackButton", BackButton)
            .mount(el);
    },
    progress: {
        // // The delay after which the progress bar will appear, in milliseconds...
        // delay: 250,

        // The color of the progress bar...
        color: "red",

        // Whether to include the default NProgress styles...
        includeCSS: true,

        // Whether the NProgress spinner will be shown...
        showSpinner: true,
    },
});
