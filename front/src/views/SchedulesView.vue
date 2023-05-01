<!-- eslint-disable vue/no-unused-vars -->
<!-- eslint-disable vue/require-v-for-key -->

<template>
  <div class="grid grid-cols-10 gap-4 space-x-16 p-10 bg-slate-100 max-h-screen">
    <Menu />
    <main class="col-span-5">
      <div>
        <span class="text-3xl font-bold text-gray-800 flex pt-5">Schedules {{ this.calendarSelected.name }}</span>
      </div>

      <div class="grid grid-cols-2 space-x-5">
        <div class="form-control pb-5">
          <label class="label">
            <span class="label-text">Seleccione Fecha</span>
          </label>
          <label class="rounded-sm flex">
            <!-- <input type="date" placeholder="09/09/2023" class="input w-full" /> -->
            <VueDatePicker v-model="date" range />
          </label>
        </div>

        <div class="form-control ">
          <label class="label">
            <span class="label-text">Seleccione un Calendario</span>
          </label>
          <select @change="onChangeSelect($event)" v-model="calendarSelected" class="select select-bordered select-md" id="docente">
            <option v-for="calendar, key in calendars" :key="key" :value="key">{{calendar.name}}</option>
          </select>
        </div>
    </div>


        <div>
          <div class="bg-white shadow overflow-hidden rounded-3xl" >
            <div class="flex items-center justify-between py-10 px-8">
              <div>
                <span class="text-4xl font-bold text-gray-800">{{ monthNames[month] }}</span>
                <span class="ml-1 text-4xl text-gray-800 font-bold">{{ year }}</span>
              </div>
              <div class="border rounded-lg px-1" style="padding-top: 2px;">
                <button type="button" class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex cursor-pointer hover:bg-gray-200 p-1 items-center" :class="{'cursor-not-allowed opacity-25': month == 0 }"
                  :disabled="month == 0 ? true : false" @click="month--; getNoOfDays()">
                  <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                  </svg>
                </button>
                <div class="border-r inline-flex h-6"></div>
                <button type="button" class="leading-none rounded-lg transition ease-in-out duration-100 inline-flex items-center cursor-pointer hover:bg-gray-200 p-1" :class="{'cursor-not-allowed opacity-25': month == 11 }"
                  :disabled="month == 11 ? true : false" @click="month++; getNoOfDays()">
                  <svg class="h-6 w-6 text-gray-500 inline-flex leading-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </button>
              </div>
            </div>
        
            <div class="-mx-1 -mb-1">
              <!--Grid de Dias de la semanas-->
              <div class="grid grid-cols-7">
                <div v-for="(day, index) in dayNames" :key="index" class="col-span-1">
                  <div class="px-2 py-2">
                    <div class="text-gray-600 text-sm tracking-wide font-bold text-center">{{ day }}</div>
                  </div>
                </div>
              </div>
              <!--Grid de Dias de la semanas-->
        
              <div class="grid grid-cols-7 border-t border-l content-center">

                <div v-for="blankday in blankDays" class="col-span-1">
                  <div class="text-center border-r border-b px-4 pt-2 h-24"></div>
                </div>

                <div v-for="date, index in noOfDays" :key="index" class="col-span-1">
                  <div class="px-4 pt-2 border-r border-b relative h-24">

                    <div class="inline-flex w-12 h-12 items-center justify-center cursor-pointer text-center rounded-full text-xl p-3"
                      :class="{'bg-blue-500 text-white': isToday(date) == true, 'text-gray-700': isToday(date) == false }">
                      {{ date }}
                    </div>

                    <div class="overflow-y-auto mt-1">
                      <div v-for="dayDisabled in daysDisabledCalendar.filter(dayDisabled => new Date(dayDisabled.day).toDateString() ===  new Date(year, month, date).toDateString())">
                        <div class="px-2 py-1 rounded-lg mt-1 overflow-hidden border border-red-200 text-red-800 bg-red-100">
                        </div>
                      </div>
                    </div>

                  </div>
                </div>

              </div>
            </div>
          </div>
        
      </div>
    </main> 
    
    <div class="col-span-3">
        <div class="grid">
            <div class="pl-10">
                <div class="navbar space-x-2">
                    <div class="flex-none gap-2">
                        <div class="form-control">
                            <div class="input-group">
                                <input type="text" placeholder="Search…" class="input input-sm w-40"/>
                                <button class="btn btn-sm bg-white hover:bg-white border-none">
                                    <img src="lupa.png" width="15"/>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div className="navbar-end space-x-8">
                        <div className="indicator">
                            <img src="notificacion.png" width="30"/>
                        </div>
                        <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                            <div class="w-10 rounded-full">
                            <img src="hombre.png" width="20" />
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <!-- ... -->
            <div class="py-24">
                <div class="bg-white overflow-y-auto max-h-96 rounded-3xl" >
                    <div class="px-10 py-6">
                        <span class="text-3xl font-bold text-gray-800 flex pt-5">Rutas disponibles</span>
                    </div>
                    <div class="flex items-center justify-between px-8">
                        <div>
                            <ul class="menu bg-base-100 rounded-box p-2">
                                <li v-for="route in routes" class="" v-on:click="clickRoute( route.id )"><button class="btn btn-ghost border-l-green-500 border-4 hover:bg-transparent">{{ route.title }}</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>
    
<script>
import { defineComponent, ref } from 'vue';
import Menu from '@/components/Menu.vue';
const date = ref()

export default defineComponent(
  {

    data() {
      return {
        month: '',
        year: '',
        noOfDays: [],
        blankDays: [],
        dateInit: '',
        dateFin: '',
        today: '',
        days: ['Sunday', 'Monday', 'Tusday', 'Wendsney', 'Thursday', 'Friday', 'Saturday'],
        //Recursos API
        calendarSelected: {},
        daysDisabledCalendar: [],
        calendars: [],
        routes: [],
        date: date
      }
    },

    components:{
      Menu,
    },

    mounted() {
      this.today = new Date(2020, 3, 1)
      this.month = this.today.getMonth()
      this.year = this.today.getFullYear()
      this.datepickerValue = new Date(this.year, this.month, this.today.getDate()).toDateString()
      //Recursos API
      this.getCalendars()
      this.getDaysDisabledCalendar()
      this.getRoutes()
    },
    computed: {
      monthNames() {
        return ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
      },
      dayNames() {
        return ['Sunday', 'Monday', 'Tusday', 'Wendsney', 'Thursday', 'Friday', 'Saturday']
      }
    },
    methods: {
      isToday(date) {
        const today = new Date()
        const d = new Date(this.year, this.month, date)

        return today.toDateString() === d.toDateString() ? true : false
      },
      showEventModal(date) {
        this.openEventModal = true
        this.eventDate = new Date(this.year, this.month, date).toDateString()
      },
      addEvent() {
        if (this.eventTitle == '') {
          return
        }

        this.events.push({
          eventDate: this.eventDate,
          eventTitle: this.eventTitle,
          eventTheme: this.eventTheme
        })

        this.eventTitle = ''
        this.eventDate = ''
        this.eventTheme = 'blue';

        this.openEventModal = false
      },
      getNoOfDays() {
        let daysInMonth = new Date(this.year, this.month + 1, 0).getDate()

        let dayOfWeek = new Date(this.year, this.month).getDay()
        let blankDaysArray = []

        for (var i = 1; i <= dayOfWeek; i++) {
          blankDaysArray.push(i)
        }

        let daysArray = []
        // eslint-disable-next-line no-redeclare
        for (var i = 1; i <= daysInMonth; i++) {
          daysArray.push(i)
        }

        this.blankDays = blankDaysArray
        this.noOfDays = daysArray
      },
      //Metodos del API
      async getCalendars() {
          try {
              const calendars = await fetch(`http://localhost:8000/api/calendars`).then( r => r.json() );
              this.calendars = calendars.data
              this.calendarSelected = calendars.data[0]
              console.log(this.calendarSelected)

          } catch (error) {
              this.$router.push('/')
              console.log('No hay nada que hacer aquí')
          }
      },

      async getDaysDisabledCalendar() {
          try {
              console.log(this.calendarSelected)
              const daysDisabledCalendar = await fetch(`http://localhost:8000/api/get_calendar_days_disabled/${this.calendarSelected.id}`).then( r => r.json() );
              this.daysDisabledCalendar = daysDisabledCalendar.data
              this.route

          } catch (error) {
              this.$router.push('/')
              console.log('No hay nada que hacer aquí')
          }
      },

      async getRoutes() {
          try {
              const routes = await fetch(`http://localhost:8000/api/get_routes_by_calendar/${this.calendarSelected.id}`).then( r => r.json() );
              console.log(routes)
              this.routes = routes.data

          } catch (error) {
              this.$router.push('/')
              console.log('No hay nada que hacer aquí')
          }
      },

      onChangeSelect(event) {
        this.calendarSelected = this.calendars[event.target.value];
        this.getDaysDisabledCalendar();
        this.getRoutes()
      },

      async clickRoute(id){
        try {
              const routeInfo = await fetch(`http://localhost:8000/api/routes/${id}`).then( r => r.json() );
              const date = routeInfo.data.start_timestamp.split(' ');
              this.today = new Date(date[0]+'T'+date[1])
              this.month = this.today.getMonth()
              this.year =  this.today.getFullYear()
              this.datepickerValue = new Date(this.year, this.month, this.today.getDate()).toDateString()
              console.log(date)
              console.log(routeInfo)

          } catch (error) {
              this.$router.push('/')
              console.log('No hay nada que hacer aquí')
          }
      },
    }
  }
) 
</script>