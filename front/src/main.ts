import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './index.css'

import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'


/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faUser } from '@fortawesome/free-regular-svg-icons'
import { faCalendar } from '@fortawesome/free-regular-svg-icons'
import { faTags } from '@fortawesome/free-solid-svg-icons'
import { faDashboard } from '@fortawesome/free-solid-svg-icons'
import { faGear } from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faUser)
library.add(faCalendar)
library.add(faTags)
library.add(faDashboard)
library.add(faGear)

createApp(App)
.component('font-awesome-icon', FontAwesomeIcon)
.component('VueDatePicker', VueDatePicker)
.use(router)
.mount('#app')
