<template>
    <div>
        <validation-observer
            ref="observer"
            v-slot="{ invalid }"
        >
            <form @submit.prevent="submit">
                <div class="row">
                    <div class="col-md-6">
                        <h3><b>Deal information</b></h3>
                        <validation-provider
                            v-slot="{ errors }"
                            name="DealName"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="dealName"
                                :error-messages="errors"
                                label="Deal Name"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="DealOwner"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="dealOwner"
                                :error-messages="errors"
                                label="Deal Owner"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="LeadSource"
                            rules="required"
                        >
                            <v-select
                                v-model="leadSource"
                                :items="['-None-',
                                'Advertisement',
                                'Cold Call',
                                'Employee Referral',
                                'External Referral',
                                'Partner',
                                'Online Store',
                                'Public Relations',
                                'Trade Show',
                                'Sales Email Alias',
                                'Seminar Partner',
                                'Internal Seminar',
                                'Web Download',
                                'Web Research',
                                'Chat',
                                ]"
                                :error-messages="errors"
                                label="Lead source"
                                data-vv-name="select"
                                required
                            ></v-select>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Amount"
                            rules="required|max:16|integer"
                        >
                            <v-text-field
                                v-model="amount"
                                :error-messages="errors"
                                label="Amount"
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Stage"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="stage"
                                :error-messages="errors"
                                label="Stage"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="closingDate"
                            rules="required"
                            class="position-relative"

                        >
                            <v-text-field
                                v-model="closingDate"
                                :error-messages="errors"
                                label="Closing Date"
                                required
                                readonly
                                @click="triggerModalDate = true"
                            ></v-text-field>
                            <div class="position-absolute z-1 start-0">
                                <v-date-picker v-if="triggerModalDate" @change="triggerModalDate = false"  v-model="closingDate"></v-date-picker>
                            </div>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Probability"
                            rules="required|max:3|min_value:0|max_value:100|integer"
                        >
                            <v-text-field
                                v-model="probability"
                                :error-messages="errors"
                                label="Probability"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="accountType"
                            rules="required"
                        >
                            <v-select
                                v-model="accountType"
                                :items="['Existing Business', 'New Business']"
                                :error-messages="errors"
                                label="Account type"
                                data-vv-name="select"
                                required
                            ></v-select>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Expected_Revenue"
                            rules="required|max:16|integer"
                        >
                            <v-text-field
                                v-model="Expected_Revenue"
                                :error-messages="errors"
                                label="Expected revenue"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Next_Step"
                            rules="required|max:500"
                        >
                            <v-textarea
                                v-model="Next_Step"
                                :error-messages="errors"
                                label="Next step"
                                required
                            ></v-textarea>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="dealDescription"
                            rules="required|max:500"
                        >
                            <v-textarea
                                v-model="dealDescription"
                                :error-messages="errors"
                                label="Deal description"
                                required
                            ></v-textarea>
                        </validation-provider>
                    </div>
                    <div class="col-md-6">
                        <h3 class="mt-3 mt-md-0 "><b>Account information</b></h3>
                        <validation-provider
                            v-slot="{ errors }"
                            name="AccountName"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="accountName"
                                :error-messages="errors"
                                label="Account Name"
                                required
                            ></v-text-field>
                        </validation-provider>
                        <validation-provider
                            v-slot="{ errors }"
                            name="AccountOwner"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="accountOwner"
                                :error-messages="errors"
                                label="Account owner"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="AccountNumber"
                            rules="integer|max:18"
                        >
                            <v-text-field
                                v-model="accountNumber"
                                :error-messages="errors"
                                label="Account number"
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Fax"
                            rules="required|max:16|integer"
                        >
                            <v-text-field
                                v-model="fax"
                                :error-messages="errors"
                                label="Fax"
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="AccountSite"
                            rules="required|integer|max:16"
                        >
                            <v-text-field
                                v-model="annualRevenue"
                                :error-messages="errors"
                                label="Annual Revenue"
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Rating"
                            rules="required"
                        >
                            <v-select
                                v-model="rating"
                                :items="['-None-',
                                'Acquired',
                                'Active',
                                'Market Failed',
                                'Project Cancelled',
                                'Shut Down'
                                ]"
                                :error-messages="errors"
                                label="Rating"
                                data-vv-name="select"
                                required
                            ></v-select>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="TicketSymbol"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="ticketSymbol"
                                :error-messages="errors"
                                label="Ticket Symbol"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Ownership"
                            rules="required"
                        >
                            <v-select
                                v-model="ownership"
                                :items="['-None-',
                                'Other',
                                'Private',
                                'Public',
                                'Subsidiary',
                                'Partnership',
                                'Government',
                                'Privately Held',
                                'Public Company',
                                ]"
                                :error-messages="errors"
                                label="Ownership"
                                data-vv-name="select"
                                required
                            ></v-select>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Employees"
                            rules="required|max:9|integer"
                        >
                            <v-text-field
                                v-model="employees"
                                :error-messages="errors"
                                label="Employees"
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="SICCode"
                            rules="required|max:9|integer"
                        >
                            <v-text-field
                                v-model="SICCode"
                                :error-messages="errors"
                                label="SIC Code"
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Phone"
                            :rules="{
                      required: true,
                      max: 18,
                      regex: '^[\\+]?[(]?[0-9]{3}[)]?[-\\s\\.]?[0-9]{3}[-\\s\\.]?[0-9]{4,6}$'
                    }"
                        >
                            <v-text-field
                                v-model="phone"
                                :error-messages="errors"
                                label="Account Phone"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Email"
                            rules="required|email"
                        >
                            <v-text-field
                                v-model="email"
                                :error-messages="errors"
                                label="E-mail"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Website"
                            :rules="{
                      required: true,
                      regex: 'https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b([-a-zA-Z0-9()@:%_\\+.~#?&//=]*)'
                    }">
                            <v-text-field
                                v-model="website"
                                :error-messages="errors"
                                label="Account website"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="AccountSite"
                            :rules="{
                      required: true,
                    }">
                            <v-text-field
                                v-model="accountSite"
                                :error-messages="errors"
                                label="Account Site"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="industry"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="industry"
                                :error-messages="errors"
                                label="Industry"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <h3><b>Address information</b></h3>

                        <validation-provider
                            v-slot="{ errors }"
                            name="BillingStreet"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="billingStreet"
                                :error-messages="errors"
                                label="Billing street"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="BillingStreet"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="billingCity"
                                :error-messages="errors"
                                label="Billing city"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="BillingStreet"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="billingState"
                                :error-messages="errors"
                                label="Billing state"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="billingCode"
                            rules="required|max:30|integer"
                        >
                            <v-text-field
                                v-model="billingCode"
                                :error-messages="errors"
                                label="Billing code"
                                required
                            ></v-text-field>
                        </validation-provider>


                        <validation-provider
                            v-slot="{ errors }"
                            name="billingCountry"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="billingCountry"
                                :error-messages="errors"
                                label="Billing country"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="shippingStreet"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="shippingStreet"
                                :error-messages="errors"
                                label="Shipping street"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="shippingCity"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="shippingCity"
                                :error-messages="errors"
                                label="Shipping city"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="shippingState"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="shippingState"
                                :error-messages="errors"
                                label="Shipping state"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="shippingCode"
                            rules="required|max:30|integer"
                        >
                            <v-text-field
                                v-model="shippingCode"
                                :error-messages="errors"
                                label="Shipping code"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="shippingCountry"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="shippingCountry"
                                :error-messages="errors"
                                label="Shipping country"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <h3><b>Description information</b></h3>

                        <validation-provider
                            v-slot="{ errors }"
                            name="description"
                            rules="required|max:500"
                        >
                            <v-textarea
                                v-model="description"
                                :error-messages="errors"
                                label="description"
                                required
                            ></v-textarea>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            rules="required"
                            name="checkbox"
                        >
                            <v-checkbox
                                v-model="checkbox"
                                :error-messages="errors"
                                value="1"
                                label="Do you agree completely?"
                                type="checkbox"
                                required
                            ></v-checkbox>
                        </validation-provider>
                        <v-btn
                            class="mr-4"
                            type="submit"
                            :disabled="invalid"
                        >
                            submit
                        </v-btn>
                        <v-btn @click="clear">
                            clear
                        </v-btn>
                    </div>
                </div>
            </form>
        </validation-observer>
        <v-snackbar
            :timeout="3000"
            value="rounded"
            tile
            density="compact"
            v-for="item in response"
            :value="item.message"
            :color="item.code === 'SUCCESS' ? 'green green-accent-4' : 'red darken-1'"
            :key="item.id"
        >
            <span class="font-weight-medium">{{ item.status }}</span>
            <span class="caption">{{ item.message }}</span>
        </v-snackbar>
    </div>
</template>

<script>
import { required, digits, email, max, max_value, min_value, integer, regex } from 'vee-validate/dist/rules'
import { extend, ValidationObserver, ValidationProvider, setInteractionMode } from 'vee-validate'

setInteractionMode('eager')

extend('digits', {
    ...digits,
    message: '{_field_} needs to be {length} digits. ({_value_})',
})

extend('required', {
    ...required,
    message: '{_field_} can not be empty',
})

extend('max', {
    ...max,
    message: '{_field_} may not be greater than {length} characters',
})

extend('regex', {
    ...regex,
    message: '{_field_} {_value_} isn\'t correct',
})

extend('email', {
    ...email,
    message: 'Email must be valid',
})

extend('max_value', {
    ...max_value,
    message: '{_value_} must be not more than 100',
})

extend('min_value', {
    ...min_value,
    message: '{_value_} must be not less than 0',
})

extend('integer', {
    ...integer,
    message: '{_value_} must be numbers',
})

export default {
    components: {
        ValidationProvider,
        ValidationObserver,
    },
    data: () => ({
        dealName: '',
        dealOwner: '',
        leadSource: '',

        amount: '',
        annualRevenue: '',
        accountNumber: 0,
        accountSite: '',
        fax: '',
        stage: '',
        closingDate: '',
        probability: '',
        description: '',
        dealDescription: '',


        accountName: '',
        accountOwner: '',
        accountType: '',


        shippingStreet: '',
        shippingCity: '',
        shippingState: '',
        shippingCode: '',
        shippingCountry: '',
        billingStreet: '',
        billingCity: '',
        billingState: '',
        billingCode: '',
        billingCountry: '',



        phone: '',
        email: '',
        website: '',
        industry: '',

        rating: '',
        ticketSymbol: '',
        ownership: '',
        employees: '',
        SICCode: '',
        Expected_Revenue: '',
        Next_Step: '',


        checkbox: null,
        triggerModalDate: false,
        response: [
            {
                id: '',
                status: '',
                message: '',
                code: ''
            }
        ],
        id: 1
    }),

    methods: {
        submit () {
            this.send();
        },
        clear () {
            this.dealName = ''

            this.dealOwner = ''
            this.leadSource = ''
            this.amount = ''
            this.accountNumber = ''
            this.accountSite = ''
            this.fax = ''
            this.stage = ''
            this.closingDate = ''
            this.probability = ''
            this.description = ''
            this.dealDescription = ''


            this.accountName = ''
            this.accountOwner = ''
            this.accountType = ''


            this.shippingStreet = ''
            this.shippingCity = ''
            this.shippingState = ''
            this.shippingCode = ''
            this.shippingCountry = ''
            this.billingStreet = ''
            this.billingCity = ''
            this.billingState = ''
            this.billingCode = ''
            this.billingCountry = ''
            this.annualRevenue = ''


            this.phone = ''
            this.email = ''
            this.website = ''
            this.industry = ''

            this.rating = ''
            this.ticketSymbol = ''
            this.ownership = ''
            this.employees = ''
            this.SICCode = ''
            this.Expected_Revenue = ''
            this.Next_Step = ''

            this.checkbox = null
            this.$refs.observer.reset()
        },
        send() {
            const form = {};
            form.dealName = this.dealName;

            form.dealOwner = this.dealOwner;
            form.leadSource = this.leadSource;
            form.amount = this.amount;
            form.accountNumber = this.accountNumber;
            form.fax = this.fax;
            form.accountSite = this.accountSite;
            form.stage = this.stage;
            form.closingDate = this.closingDate;
            form.probability = this.probability;
            form.description = this.description;
            form.dealDescription = this.dealDescription;
            form.annualRevenue = this.annualRevenue;

            form.accountName = this.accountName;
            form.accountOwner = this.accountOwner;
            form.accountType = this.accountType;

            form.shippingStreet = this.shippingStreet
            form.shippingCity = this.shippingCity
            form.shippingState = this.shippingState
            form.shippingCode = this.shippingCode
            form.shippingCountry = this.shippingCountry
            form.billingStreet = this.billingStreet
            form.billingCity = this.billingCity
            form.billingState = this.billingState
            form.billingCode = this.billingCode
            form.billingCountry = this.billingCountry

            form.phone = this.phone;
            form.email = this.email;
            form.website = this.website;
            form.industry = this.industry;
            form.Expected_Revenue = this.Expected_Revenue
            form.Next_Step = this.Next_Step

            form.rating = this.rating;
            form.ticketSymbol = this.ticketSymbol;
            form.ownership = this.ownership;
            form.employees = this.employees;
            form.SICCode = this.SICCode;

            axios.post('/account', form).then(({ data }) => {
                this.validateOfZohoCRM(data, data.response.account);
                this.validateOfZohoCRM(data, data.response.deal);
            }).catch( (error ) => {
                if( error.response.data ){
                    const self = this;
                    this.response.push({
                        id: ++self.id,
                        message: Object.values(error.response.data.errors)[0][0],
                        status: 'ERROR',
                        code: 'ERROR'
                    })
                    console.log(this.response)
                }
            })
        },
        validateOfZohoCRM(data, record) {
            if (record.data['0'].code === "INVALID_DATA") {
                this.response.push({
                    id: ++this.id,
                    code: record.data['0'].code,
                    status: record.data['0'].status,
                    message: record.data['0'].details.api_name + ': '
                        + record.data['0'].details.expected_data_type
                });
            }
            else {
                this.response.push({
                    id: ++this.id,
                    code: record.data['0'].code,
                    status: record.data['0'].status,
                    message: record.data['0'].message
                }) ;
                this.clear();
            }
        },

    }
}
</script>

<style scoped>

</style>
