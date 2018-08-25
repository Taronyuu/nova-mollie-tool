<template>
    <div>
        <heading class="mb-6" v-html="toolTitle"></heading>

        <div class="card relative">
            <div class="overflow-hidden overflow-x-auto relative">
                <table cellpadding="0" cellspacing="0" data-testid="resource-table" class="table w-full">
                    <thead>
                    <tr>
                        <th class="text-left">
                          <span class="inline-flex items-center">
                             ID
                          </span>
                        </th>
                        <th class="text-left">
                          <span class="inline-flex items-center">
                             Amount
                          </span>
                        </th>
                        <th class="text-left">
                          <span class="inline-flex items-center">
                             Status
                          </span>
                        </th>
                        <th class="text-left">
                          <span class="inline-flex items-center">
                             Description
                          </span>
                        </th>
                        <th class="text-right">
                            <span class="inline-flex">
                                Created at
                            </span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr
                        v-for="transaction in transactions"
                    >
                        <td>
                           <span class="whitespace-no-wrap text-left">
                               <a class="no-underline text-90 block" :target="'mollie_transaction_'+transaction.id" :href="'https://www.mollie.com/dashboard/payments/'+transaction.id">
                                   <div class="flex items-center">
                                       <span>{{ transaction.id }}</span>&nbsp;
                                       <svg class="fill-current w-4 h-4 mr-2 text-60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M576 14.4l-.174 163.2c0 7.953-6.447 14.4-14.4 14.4H528.12c-8.067 0-14.56-6.626-14.397-14.691l2.717-73.627-2.062-2.062-278.863 278.865c-4.686 4.686-12.284 4.686-16.971 0l-23.029-23.029c-4.686-4.686-4.686-12.284 0-16.971L474.379 61.621l-2.062-2.062-73.626 2.717C390.626 62.44 384 55.946 384 47.879V14.574c0-7.953 6.447-14.4 14.4-14.4L561.6 0c7.953 0 14.4 6.447 14.4 14.4zM427.515 233.74l-24 24a12.002 12.002 0 0 0-3.515 8.485V458a6 6 0 0 1-6 6H54a6 6 0 0 1-6-6V118a6 6 0 0 1 6-6h301.976c10.691 0 16.045-12.926 8.485-20.485l-24-24A12.002 12.002 0 0 0 331.976 64H48C21.49 64 0 85.49 0 112v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V242.225c0-10.691-12.926-16.045-20.485-8.485z"></path></svg>
                                   </div>
                               </a>
                           </span>
                        </td>
                        <td>
                            <span class="whitespace-no-wrap text-left">
                                {{ transaction.amount.value }} ({{ transaction.amount.currency }})
                            </span>
                        </td>
                        <td>
                            <span class="whitespace-no-wrap text-left">
                                {{ transaction.status }}
                            </span>
                        </td>
                        <td>
                            <span class="whitespace-no-wrap text-left">
                                {{ transaction.description }}
                            </span>
                        </td>
                        <td class="text-right">
                            <span class="whitespace-no-wrap text-right">
                                {{ moment(transaction.createdAt).format('MMMM Do YYYY, h:mm:ss a') }}
                            </span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="bg-20 rounded-b">
                <nav class="flex">
                    <button
                            rel="prev"
                            class="btn btn-link py-3 px-4"
                            @click="prevPage"
                            :class="buttonIsActive('prev')"
                            :disabled="!prev"
                    >
                        Previous
                    </button>
                    <button
                            rel="next"
                            class="ml-auto btn btn-link py-3 px-4"
                            @click="nextPage"
                            :class="buttonIsActive('next')"
                            :disabled="!next"
                    >
                        Next
                    </button>
                </nav>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            transactions: {},
            next: null,
            prev: null,
            requestData: {},
        }
    },

    methods: {
        moment: moment,

        nextPage() {
            if(this.next) {
                this.requestData = {
                    url: this.next,
                };
            }
            this.refreshPage();
        },

        prevPage() {
            if(this.prev) {
                this.requestData = {
                    url: this.prev,
                };
            }
            this.refreshPage();
        },

        refreshPage() {
            Nova.request().get('/nova-vendor/nova-mollie-tool/mollie/payments', {params: this.requestData})
                .then((response) => {
                    this.transactions = response.data.payments;
                    this.next         = response.data.next;
                    this.prev         = response.data.prev;
                });
        },

        buttonIsActive(type) {
            let active = false;
            if(type === 'prev') {
                if(this.prev) {
                    active = true;
                } else {
                    active = false;
                }
            } else if(type === 'next') {
                if(this.next) {
                    active = true;
                } else {
                    active = false;
                }
            }

            if(active) {
                return ['text-primary', 'dim'];
            } else {
                return ['text-80', 'opacity-50'];
            }
        }
    },

    computed: {
        toolTitle() {
            console.log(Nova);
            return Nova.config.tool_title;
        }
    },

    mounted() {
        this.refreshPage();
    },
}
</script>

<style>
    /* Scoped Styles */
</style>
